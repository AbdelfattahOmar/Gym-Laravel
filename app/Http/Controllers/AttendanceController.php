<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class AttendanceController extends Controller
{
    public function attendance(Request $request)
     {  
    //     if ($request->ajax()) {
    //         $data = Attendance::select('*')->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn('UserName',function ($row){
    //                 return 
    //             })
    //             ->make(true);
    //     }

    //     return view('coach.index');

    }
}
