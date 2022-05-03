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
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/home" class="edit btn btn-primary btn-sm mx-2">View</a>';
                    $btn .= '<a href="/home" class="edit btn btn-info btn-sm mx-2">Edit</a>';
                    $btn .= '<a href="/home" class="edit btn btn-danger btn-sm mx-2">Delete</a>';
                    return $btn;
                })
                ->addColumn('Manager Name', function ($row) {
                    return User::find($row->manager_id)->name ?? 'No Manager Assigned';
                })
                ->addColumn('Created At', function ($row) {
                    return City::find($row->id)->created_at->format('d - M - Y');
                })

                ->rawColumns(['action', 'Manager Name', 'Created At'])
                ->make(true);
        }
        return view('city.index');
    }

}