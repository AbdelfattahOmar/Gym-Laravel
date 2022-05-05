<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class CoachController extends Controller
{
    public function index()
    {
       
        return view('coach.index');
    }

}
