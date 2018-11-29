<?php

namespace App\Modules\Patient\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index(){
        $patients  =   Patient::all();
        return view('patient::index',compact('patients'));
    }

    public function create(){
        $duty_doctors       = Doctor::where('doctor_type',1)->get();
        $supervised_doctors = Doctor::where('doctor_type',2)->get();

        return view('patient::create',compact('duty_doctors','supervised_doctors'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'type'=>'required',
            'name'=>'required|min:5|max:35',
            'mobile'=>'required|numeric',
            'gender'=>'required',
            'nid'=>'required|numeric|unique:stuffs',
            'joining_date'=>'required',
        ]);

        try {

            $patient = new Patient();

            $patient->type         = $request->type;
            $patient->name         = $request->name;
            $patient->mobile       = $request->mobile;
            $patient->age          = $request->age;
            $patient->gender       = $request->gender;
            $patient->nid          = $request->nid;
            $patient->degree       = $request->degree;
            $patient->joining_date = date('Y-m-d', strtotime($request->joining_date));

            if($request->hasFile('image')){
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

    public function edit($id){
        $patient  =   Patient::find($id);
        return view('stuff::edit',compact('stuff'));
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
}
