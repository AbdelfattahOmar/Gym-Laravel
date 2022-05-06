<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GymManagerController extends Controller
{
  
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::role('gymManager')->get();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){     
     
                        $btn = '<a href="/gymManager/show/'.$row->id.'" class="btn btn-success fw-bold mr-2">View</a>';
                        $btn .= '<a href="/gymManager/'.$row->id.'/edit" style="color:#fff" class="btn btn-info fw-bold mr-2">Edit</a>';
                        $btn .= '<form action="/gymManager/'.$row->id.'" method="POST" class="d-inline">
                        <input type="hidden" name="_token" value="'.csrf_token().'" />
                        <input type="hidden" name="_method" value="delete" />
                        <button onClick="if(!confirm("Are you sure?")){return false;}" type="submit" class="btn btn-danger fw-bold mr-2">Delete</button>
                        </form>';
                        $btn .= ' <a href="javascript:void(0)" onclick="banUser({{ '.$row->id.' }})" class="btn btn-dark "><i
                        class="fa fa-user-lock"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('gymManager.index');
    }

    public function unAuth()
    {
        return view('500');
    }
    

    public function create(){
        return view('gymManager.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:20',
            'password' => 'required |min:6',
            'email' => 'required|string|unique:users,email,',
            'national_id' => 'digits_between:10,17|required|numeric|unique:users',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);


        if ($request->hasFile('profile_image') == null) {
            $imageName = 'imgs/defaultImg.jpg';
        } else {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }
       
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->profile_image = $imageName;
        $user->national_id = $request->national_id;
        $user->assignRole('gymManager');
        $user->save();

        return to_route('gymManager.index');
    }

    public function show($id){
        $gymManager = User::find($id);
        return view('gymManager.show' , [
            'gymManager' => $gymManager
        ]);
    }

    public function edit($id)
    {
        $gymManager = User::find($id);
        return view('gymManager.edit', [
            'gymManager' => $gymManager
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:20',
            'password' => 'required |min:6',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'national_id' => 'digits_between:10,17|numeric|unique:users,national_id,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->national_id = $request->national_id;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
            $user->profile_image = $imageName;
        }
        $user->save();
        
        return to_route('gymManager.index');
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();
        return to_route('gymManager.index'); 
       
    }
}


       