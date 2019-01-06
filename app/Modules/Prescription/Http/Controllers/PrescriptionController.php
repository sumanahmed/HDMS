<?php

namespace App\Modules\Prescription\Http\Controllers;

use App\Models\MedicineTakingSchedule;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\TestCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class PrescriptionController extends Controller
{
    public function index(){

        return view("prescription::prescription.index");
    }

    public function create(){
        $patients       = Patient::select('serial','name')->get();
        $doctors        = Doctor::all();
        $test_category  = TestCategory::all();

        return view("prescription::prescription.create", compact('patients','doctors', 'test_category'));
    }

    public function medicineTakingSchedule($type_id){

        $medicine_taking_schedule = MedicineTakingSchedule::where('type', $type_id)->get();

        return Response::json($medicine_taking_schedule);
    }

    public function store(Request $request){

        $this->validate($request,[
            ''  => 'required',
        ]);

    }

}
