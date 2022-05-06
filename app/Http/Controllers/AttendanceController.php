<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
class AttendanceController extends Controller
{
    
    public function attendance()
    {
        $history_attendances=Attendance::select(DB::raw('training_sessions.name as training_session_name,gyms.name as gym_name,cities.name as gym_city,Date(attendances.attendance_at
        ) as attendance_date,Time(attendances.attendance_at) as attendance_time , users.name as name , users.email as email'))
        ->join('users', 'users.id', '=', 'attendances.user_id')
        ->join('training_sessions', 'training_sessions.id', '=', 'attendances.training_session_id')
        ->join('gyms',"gyms.id",'=','users.gym_id')
        ->join('cities',"gyms.city_id",'=','cities.id')
        ->get();
        // dd($history_attendances);
        return view('attendances.attendance', [
            'attendances' =>$history_attendances,
        ]);
    }
}
