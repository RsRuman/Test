<?php

namespace App\Http\Controllers;
use App\Division;
use App\District;
use App\Thana;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
      $divisions = Division::all()->pluck('name', 'id');
      return view('welcome', compact('divisions'));
    }

    public function getDistrict($id){
      $districts = District::where('division_id', $id)->pluck('name', 'id');
      return json_encode($districts);
    }

    public function getThana($id){
      $thanas = Thana::where('district_id', $id)->pluck('name', 'id');
      return json_encode($thanas);
    }

    public function store(Request $request){
      $validateData = $request->validate([
        'name' => 'required|min:6|max:50',
        'dob' => 'required',
        'dieses' => 'required',
        'cell' => 'required',
        'division' => 'required',
        'district' => 'required',
        'thana' => 'required',
      ]);
      $patients = new Patient;
      $division = $request->division;
      $division = Division::find($division)->name;
      $district = $request->district;
      $district = District::find($district)->name;
      $thana = $request->thana;
      $thana = Thana::find($thana)->name;
      $loc = "".$division.", ".$district.", ".$thana;
      $patients->name = $request->name;
      $patients->dob = $request->dob;
      $patients->dieses = $request->dieses;
      $patients->cell = $request->cell;
      $patients->location = $loc;
      $patients->save();
      return redirect('/')->with('message', 'Record inserted successfully!');
    }
}
