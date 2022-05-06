<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class CoachController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::role('coach')->get();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){     
     
                        $btn = '<a href="/gymManager/show/'.$row->id.'" class="btn btn-success fw-bold mr-2">View</a>';
                        $btn .= '<a href="/gymManager/'.$row->id.'/edit" style="color:#fff" class="btn btn-info fw-bold mr-2">Edit</a>';
                        // $btn .= '<button class="deleteRecord" data-id="'.$row->id.'" >Delete</button>';
                        $btn .= '<form action="'.$row->id.'" method="POST" class="d-inline">
                        <input type="hidden" name="_token" value="'.csrf_token().'" />
                        <input type="hidden" name="_method" value="delete" />
                        <button onClick="if(!confirm("Are you sure?")){return false;}" type="submit" class="btn btn-danger fw-bold mr-2">Delete</button>
                    </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('coach.index');
    }
public function unAuth()
    {
        return view('500');
    }

}
