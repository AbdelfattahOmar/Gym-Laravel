<?php

namespace App\Http\Controllers;
use App\Models\TrainingSession;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    public function index()
    {
        $trainingSessions = TrainingSession::all();
        // if (count($trainingSessions) <= 0) {
        //     return view('empty');
        // }
        return view('trainingSession.listSessions', ['trainingSessions' => $trainingSessions]);
    }

}
