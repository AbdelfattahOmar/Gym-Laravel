<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    #=======================================================================================#
    #			                          list Function                                   	#
    #=======================================================================================#
    public function index()
    {
        $allCities = City::paginate(10);
        if (count($allCities) <= 0) { //for empty statement
            return view('empty');
        }

        return view("city.list", ['allCities' => $allCities]);
    }

    #=======================================================================================#
    #			                          show Function                                   	#
    #=======================================================================================#
    public function show($cityID)
    {
        $totalRevenue = 0;
        $gymsManagers = 0;
        $coaches = 0;
        $users = 0;

        $cityData = City::find($cityID);

        $citiesManagers = User::find($cityData->manager_id);
 
        return view("city.show", [
            'citiesManagers' => $citiesManagers,
            'cityData' => $cityData,
        ]);
    }
    #=======================================================================================#
    #			                          create Function                                   #
    #=======================================================================================#
    public function create()
    {
        $cityManagers = $this->selectCityManagers();
        return view("city.create", ['cityManagers' => $cityManagers]);
    }
    #=======================================================================================#
    #			                          store Function                                   #
    #=======================================================================================#
    public function store(CityRequest $request)
    {
        $requestData = request()->all();
        if ($requestData['manager_id'] == 'optional') {
            City::create([
                'name' => $requestData['name'],
            ]);
        } else {
            City::create($requestData);
        }
        return to_route('city.index'); 
    }
    
    public function edit($cityID)
    {
        $cityData = City::find($cityID);
        $cityManagers = $this->selectCityManagers();
        return view('city.edit', ['cityData' => $cityData, 'cityManagers' => $cityManagers]);
    }
    
    public function update($cityID, UpdateCityRequest $request)
    {
        $fetchData = request()->all();
        $flight = City::find($cityID);
        $flight->name = $fetchData['name'];
        if ($fetchData['manager_id'] == 'optional')
            $flight->manager_id = null;
        else
            $flight->manager_id = $fetchData['manager_id'];
        $flight->save();
        return to_route('city.index'); 
    }

    public function destroy($cityID)
    {
        $city = City::find($cityID);
        $manager = $city->manager;
        if($manager != null) {
            return redirect()->back()->with('alert', 'Updated!');
        }

        $city->delete();     

        return to_route('city.index'); 
    }

   
  
    public function restore($cityID)
    {
        City::withTrashed()->find($cityID)->restore();
        return $this->showDeleted();
    }
    
    private function selectCityManagers()
    {
        return User::select('users.*', 'cities.manager_id')
            ->role('cityManager')
            ->withoutBanned()
            ->leftJoin('cities', 'users.id', '=', 'cities.manager_id')
            ->whereNull('cities.manager_id')
            ->get();
    }
}