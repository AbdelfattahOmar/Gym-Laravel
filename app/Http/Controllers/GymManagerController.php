<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GymManagerController extends Controller
{
    public function index(){
        $allGymManagers = User::role('gymManager')->get();
        return view('gymManager.index' , [
            'allGymManagers' => $allGymManagers
        ]);
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


       





