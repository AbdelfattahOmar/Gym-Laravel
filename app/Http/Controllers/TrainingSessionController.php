<?php

namespace App\Http\Controllers;
use App\Models\TrainingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use DataTables;

class TrainingSessionController extends Controller
{
    public function index(Request $request)
    {
        $trainingSessions = TrainingSession::all();
       
        return view('trainingSession.listSessions', ['trainingSessions' => $trainingSessions]);


       
    }





public function create()
    {
        $trainingSessions = TrainingSession::all();

        $users = User::all();

        foreach ($users as $user) {
            if ($user->hasRole('coach')) {
                $coaches[] = $user;
            }
        }
        return view('trainingSession.training_session', [
            'trainingSessions' => $trainingSessions,
            'coaches' => $coaches,
        ]);
    }
  
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'day' => ['required', 'date', 'after_or_equal:today'],
            'starts_at' => ['required'],
            'finishes_at' => ['required'],

        ]);



        $validate_old_seesions = TrainingSession::where('day', '=', $request->day)->where("starts_at", "!=", null)->where("finishes_at", "!=", null)->where(function ($q) use ($request) {
            $q->whereRaw("starts_at = '$request->starts_at' and finishes_at ='$request->finishes_at'")
                ->orwhereRaw("starts_at < '$request->starts_at' and finishes_at > '$request->finishes_at'")
                ->orwhereRaw("starts_at > '$request->starts_at' and starts_at < '$request->finishes_at'")
                ->orwhereRaw("finishes_at > '$request->starts_at' and finishes_at < '$request->finishes_at'")
                ->orwhereRaw("'$request->starts_at' > '$request->finishes_at'")
                ->orwhereRaw("'starts_at' > 'finishes_at'")
                ->orwhereRaw("starts_at > '$request->starts_at' and finishes_at < '$request->finishes_at'");
        })->get()->toArray();


        if (count($validate_old_seesions) > 0)
            return back()->withErrors("please check your time")->withInput();
        $requestData = request()->all();
        $session = TrainingSession::create($requestData);
        $user_id = $request->input('user_id');
        $id = $session->id;
        $data = array('user_id' => $user_id, "training_session_id" => $id);
        DB::table('training_session_user')->insert($data);

        return redirect()->route('trainingSession.listSessions');
    }





public function show($id)
{
    $userId = DB::select("select user_id from training_session_user where training_session_id = $id");

    $user = User::find($id);


    $trainingSession = TrainingSession::findorfail($id);
    //dd($trainingSession);
     return view('trainingSession.show_training_session', ['trainingSession' => $trainingSession]);
}

}
