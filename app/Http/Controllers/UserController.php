<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){     
     
                    $btn = '<a href="/user/show/' . $row->id . '" class="btn btn-success fw-bold mr-2">View</a>';
                    $btn .= '<a href="/user/'.$row->id.'/edit" style="color:#fff" class="btn btn-info fw-bold mr-2">Edit</a>';
                    $btn .= '<form action="/user/'.$row->id.'" method="POST" class="d-inline">
                        <input type="hidden" name="_token" value="'.csrf_token().'" />
                        <input type="hidden" name="_method" value="delete" />
                        <button onClick="if(!confirm("Are you sure?")){return false;}" type="submit" class="btn btn-danger fw-bold mr-2">Delete</button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('user.index');
    }

    public function unAuth()
    {
        return view('500');
    }

    public function show($id){
        $user = User::find($id);
        return view('user.show' , [
            'user' => $user
        ]);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user
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
        
        return to_route('users.index');
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();
        return to_route('users.index'); 
       
    }

    public function store(StoreRequest $request)
    {
        $requestData = request()->all();
        User::create($requestData);
        return redirect()->route('user.admin_profile');
    }
    
    public function destroy()
    {
        return redirect()->route('');
    }

    public function banUser($userID)
    {
        User::find($userID)->ban([
            'comment' => 'banned by admin',
            'expired_at' => '+3 month',
        ]);
        return response()->json(['success' => 'Record deleted successfully!']);
    }

    public function listBanned()
    {
        $userRole = Auth::user()->getRoleNames();
        $allBannedUser = 0;
        switch ($userRole['0']) {
            case 'admin':
                $allBannedUser = User::role(['cityManager', 'gymManager', 'coach', 'user'])->onlyBanned()->get();
                break;
            case 'cityManager':
                $allBannedUser = User::role(['gymManager', 'coach', 'user'])->onlyBanned()->get();
                break;
            case 'gymManager':
                $allBannedUser = User::role(['coach', 'user'])->onlyBanned()->get();
                break;
        }
        if (count($allBannedUser) <= 0) { //for empty statement
            return view('empty');
        }
        return view('ban.showBanned', [
            'banUsers' => $allBannedUser,
        ]);
    }

    public function unBan($userID)
    {
        $x = User::find($userID)->unban();
        return $this->listBanned();
    }
}