<?php

namespace App\Modules\Doctor\Http\Controllers;

use App\Models\Department;
use App\Models\DoctorChamber;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index(){
        $doctors  =   Doctor::all();
        return view('doctor::index',compact('doctors'));
    }

    public function create(){
        $departments    =   Department::all();
        return view('doctor::create',compact('departments'));
    }

    public function store(Request $request){

        $this->validate($request,[

            'department_id'=>'required',
            'name'=>'required|min:5|max:35',
            'mobile'=>'required|numeric',
            'email'=>'required',
            'degree'=>'required',
            'designation'=>'required',
            'specialization'=>'required',
            'chamber_day_id'=>'required',
            'chamber_time'=>'required',

        ]);

        try {

            $doctor                 = new Doctor();

            $doctor->name           = $request->name;
            $doctor->email          = $request->email;
            $doctor->mobile         = $request->mobile;
            $doctor->degree         = $request->degree;
            $doctor->designation    = $request->designation;
            $doctor->doctor_type    = $request->doctor_type;
            $doctor->department_id  = $request->department_id;
            $doctor->specialization = $request->specialization;
            $doctor->chamber_time   = $request->chamber_time;

            for($i=0; $i< count($request->chamber_day_id); $i++){

                $doctor_chamber_day                     = new DoctorChamber();

                $doctor_chamber_day->doctor_id          = $doctor['id'] == null ? 1 : $doctor['id'];
                $doctor_chamber_day->chamber_day_id     = $request[$i]['chamber_day_id'];
                $doctor_chamber_day->save();
            }

            if($request->hasFile('image')){
                $image          = $request->file('image');
                $image_name     = time().$image->getClientOriginalName();
                $fileurl        = $image->move('doctor/', $image_name);
                $doctor->image  = $fileurl;
            }


            if($doctor->save()){
                return redirect()
                    ->route('doctor_index')
                    ->with('alert.status', 'success')
                    ->with('alert.message','Created Successfullly');
            } else {
                return redirect()
                    ->route('doctor_index')
                    ->with('alert.status', 'danger')
                    ->with('alert.message','Not Created');
            }




        }

        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function edit($id){
        $doctor  =   Doctor::find($id);
        return view('doctor::edit',compact('doctor'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'department_id'=>'required',
            'name'=>'required|min:5|max:35',
            'mobile'=>'required|numeric',
            'email'=>'required',
            'degree'=>'required',
            'designation'=>'required',
            'specialization'=>'required',
            'chamber_day_id'=>'required',
            'chamber_time'=>'required',
        ]);

        try {

            $doctor                 = Doctor::find($id);

            $doctor->name           = $request->name;
            $doctor->email          = $request->email;
            $doctor->mobile         = $request->mobile;
            $doctor->degree         = $request->degree;
            $doctor->designation    = $request->designation;
            $doctor->doctor_type    = $request->doctor_type;
            $doctor->department_id  = $request->department_id;
            $doctor->specialization = $request->specialization;
            $doctor->chamber_time   = $request->chamber_time;

            /*for($i=0; $i< count($request->chamber_days); $i++){

                $doctor_chamber_day                         = new DoctorChamber();
                $doctor_chamber_day[$i]->doctor_id          = $doctor->id;
                $doctor_chamber_day[$i]->chamber_day_id     = $request[$i]['chamber_day_id'];
                $doctor_chamber_day[$i]->save();
            }*/


            if($request->hasFile('image')){

                if ($doctor->image) {
                    $delete_path             = public_path($doctor->image);
                    if(file_exists($delete_path)){
                        $delete  = unlink($delete_path);
                    }
                }

                $image       = $request->file('image');
                $image_name  = time().$image->getClientOriginalName();
                $fileurl     = $image->move('doctor/', $image_name);
                $doctor->image = $fileurl;
            }


            if($doctor->save()){
                return redirect()
                    ->route('doctor_index')
                    ->with('alert.status', 'success')
                    ->with('alert.message','Created Successfullly');
            } else {
                return redirect()
                    ->route('doctor_index')
                    ->with('alert.status', 'danger')
                    ->with('alert.message','Created Successfullly');
            }




        }

        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function delete($id){
        $doctor = Doctor::find($id);

        if($doctor->delete()){

            if (isset($doctor->image)) {
                $delete_path             = public_path($doctor->image);
                if(file_exists($delete_path)){
                    $delete  = unlink($delete_path);
                }
            }
            return redirect()
                ->route('doctor_index')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Deleted successfully!!!');
        }
        return redirect()
            ->route('doctor_index')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong!!!');


    }
}
