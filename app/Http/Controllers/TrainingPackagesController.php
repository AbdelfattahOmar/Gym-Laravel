<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingPackage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TrainingPackagesController extends Controller
{
    public function index()
    {
        $packages = TrainingPackage::all();
        if (count($packages) <= 0) { //for empty statement
            return view('empty');
        }
        return view('trainingPackages.listPackages', ['packages' => $packages]);
    }

    public function show($id)
    {
        $package = TrainingPackage::findorfail($id);
        return view('trainingPackages.show_training_package', ['package' => $package]);
    }

    public function edit($id)
    {
        $packages = TrainingPackage::all();

        $package = TrainingPackage::find($id);

        return view('trainingPackages.editPackage', ['package' => $package, 'packages' => $packages]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:10', 'max:4000'],
            'sessions_number' => ['required', 'numeric', 'min:1', 'max:60']
        ]);


        TrainingPackage::where('id', $id)->update([

            'name' => $request->all()['name'],
            'price' => $request->price * 100,
            'sessions_number' => $request->sessions_number,
        ]);

        return redirect()->route('trainingPackeges.listPackeges');
    }

    public function create()
    {
        $packages = TrainingPackage::all();


        return view('trainingPackages.createPackage', [
            'packages' => $packages,

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:10', 'max:4000'],
            'sessions_number' => ['required', 'numeric', 'min:1', 'max:60'],
        ]);

        $requestData = request()->all();
        $package = TrainingPackage::create($requestData);

        $id = $package->id;


        $data = array('gym_id' => $request->gym_id, "training_package_id" => $id);
        DB::table('gyms_training_packages')->insert($data);



        return redirect()->route('trainingPackeges.listPackeges');
    }



    public function destroy($id)
    {
        $package = TrainingPackage::findorfail($id);
        $package->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}