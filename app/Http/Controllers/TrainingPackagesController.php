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

    public function deletePackage($id)
    {
        $package = TrainingPackage::findorfail($id);
        $package->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}