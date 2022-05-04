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
}
