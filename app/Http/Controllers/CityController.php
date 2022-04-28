<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Routing\Controller;

class CityController extends Controller
{
 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = City::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                           $btn .= '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">Edit</a>';
                           $btn .= '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('Manager Name', function($row){
     
                            return User::find($row->manager_id)->name ?? 'No Manager';
                    })

                    ->rawColumns(['action', 'Manager Name'])
                    ->make(true);
        }
        
        return view('city.index');
    }
}