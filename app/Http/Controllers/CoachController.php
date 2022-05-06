<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class CoachController extends Controller
{
    public function index()
    {
        $coaches = User::role('coach')->get();
            return view('coach.index' , [
                'coaches' => $coaches 
            ]);
    }

    

}
