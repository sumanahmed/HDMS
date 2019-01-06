<?php

namespace App\Modules\Patient\Http\Controllers;

use App\Models\Doctor;
use App\Models\PatientCurrentStatus;
use App\Models\TestCategory;
use App\Models\Ward;
use App\Models\WardBed;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Response;

class PatientController extends Controller
{
    public function index(){
        $patients  =   Patient::all();
        return view('patient::index',compact('patients'));
    }

    public function create(){
        $duty_doctors       = Doctor::where('doctor_type',1)->get();
        $supervised_doctors = Doctor::where('doctor_type',2)->get();
        $patient_id         = Patient::select('serial')->orderBy('created_at','DESC')->first();

        if($patient_id != null){
            $patient_id = $patient_id['serial'] + 1;
            $patient_id = "PID-".str_pad($patient_id, 6, '0', STR_PAD_LEFT);
        }else{
            $patient_id = 1;
            $patient_id = "PID-".str_pad($patient_id, 6, '0', STR_PAD_LEFT);
        }

        $wards      = Ward::all();
        $beds       = WardBed::all();

        return view('patient::create',compact('duty_doctors','supervised_doctors', 'patient_id','wards','beds'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|min:5|max:35',
            'age'=>'required',
            'blood_pressure'=>'required|numeric',
            'weight'=>'required|numeric',
            'problem'=>'required',
            'supervise_doctor_id'=>'required',
        ]);

        $serial   =   trim($request->serial, "PID-");

        DB::beginTransaction();

        try {

            $patient                        = new Patient();

            $patient->serial                = $serial;
            $patient->name                  = $request->name;
            $patient->age                   = $request->age;
            $patient->blood_pressure        = $request->blood_pressure;
            $patient->weight                = $request->weight;
            $patient->problem               = $request->problem;
            $patient->supervise_doctor_id   = $request->supervise_doctor_id;
            $patient->admit_status          = $request->admit_status;
            $patient->ward_id               = $request->ward_id;
            $patient->bed_id                = $request->bed_id;
            $patient->admission_date        = date('Y-m-d', strtotime($request->admission_date));
            $patient->discharge_date        = null;
            $patient->email                 = $request->email;
            $patient->mobile                = $request->mobile;

            if($request->hasFile('image')){
                $image          = $request->file('image');
                $image_name     = time().$image->getClientOriginalName();
                $fileurl        = $image->move('patient/', $image_name);
                $patient->image = $fileurl;
            }


            if($patient->save()) {

                if (count($request->symptom) > 0) {

                    for ($i = 0; $i < count($request->symptom); $i++) {

                        $patient_current_status             = new PatientCurrentStatus();
                        $patient_current_status->patient_id = $patient->id;
                        $patient_current_status->symptom    = $request->symptom[$i];
                        $patient_current_status->status     = $request->status[$i];
                        $patient_current_status->doctor_id  = $request->doctor_id[$i];
                        
                        $patient_current_status->save();

                    }

                    if ($patient_current_status->save()) {

                        DB::commit();

                        return redirect()
                            ->route('patient_index')
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'Created Successfullly');
                    } else {

                        DB::rollBack();

                        return redirect()
                            ->route('patient_index')
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Created Successfullly');
                    }
                }
            }

        }catch(Exception $ex){

            DB::rollBack();

            $msg = $ex->getMessage();
            return redirect()->route('patient_index')
                ->with('alert.status', 'danger')
                ->with('alert.message', "Fail : $msg");
        }
    }

    public function edit($id){
        $patient            = Patient::find($id);
        $duty_doctors       = Doctor::where('doctor_type',1)->get();
        $supervised_doctors = Doctor::where('doctor_type',2)->get();
        $wards              = Ward::all();
        $patient_bed_id     = Patient::select('bed_id')->where('id','!=', $id)->where('ward_id', $patient->ward_id)->get()->toArray();
        $beds               = WardBed::select('id','bed_no')->whereNotIn('id', $patient_bed_id)->where('ward_id', $patient->ward_id)->get();
        $patient_status     = PatientCurrentStatus::where('patient_id', $id)->get();

        return view('patient::edit',compact('patient','duty_doctors','supervised_doctors','wards','beds','patient_status'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'type'          =>  'required',
            'name'          =>  'required|min:5|max:35',
            'mobile'        =>  'required|numeric',
            'gender'        =>  'required',
            'nid'           =>  'required|numeric',
            'joining_date'  =>  'required',
        ]);

        try {

            $patient = Patient::find($id);

            $patient->type         = $request->type;
            $patient->name         = $request->name;
            $patient->mobile       = $request->mobile;
            $patient->age          = $request->age;
            $patient->gender       = $request->gender;
            $patient->nid          = $request->nid;
            $patient->degree       = $request->degree;
            $patient->joining_date = date('Y-m-d', strtotime($request->joining_date));

            if($request->hasFile('image')){

                if ($patient->image) {
                    $delete_path             = public_path($patient->image);
                    if(file_exists($delete_path)){
                        $delete  = unlink($delete_path);
                    }
                }

                $image       = $request->file('image');
                $image_name  = time().$image->getClientOriginalName();
                $fileurl     = $image->move('stuff/', $image_name);
                $patient->image = $fileurl;
            }


            if($patient->save()){
                return redirect()
                    ->route('patient_index')
                    ->with('alert.status', 'success')
                    ->with('alert.message','Created Successfullly');
            } else {
                return redirect()
                    ->route('patient_index')
                    ->with('alert.status', 'danger')
                    ->with('alert.message','Created Successfullly');
            }




        }

        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function delete($id){
        $patient = Patient::find($id);

        if($patient->delete()){

            if (isset($patient->image)) {
                $delete_path             = public_path($patient->image);
                if(file_exists($delete_path)){
                    $delete  = unlink($delete_path);
                }
            }
            return redirect()
                ->route('patient_index')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Deleted successfully!!!');
        }
        return redirect()
            ->route('patient_index')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong!!!');

    }

    public function patientGetBed($ward_id){
        $patient_bed_id = Patient::select('bed_id')->where('ward_id', $ward_id)->get()->toArray();
        $beds           = WardBed::select('id','bed_no')->whereNotIn('id', $patient_bed_id)->where('ward_id', $ward_id)->get();

        return Response::json($beds);
    }

}
