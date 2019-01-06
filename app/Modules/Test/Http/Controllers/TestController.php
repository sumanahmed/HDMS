<?php

namespace App\Modules\Test\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\TestCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){

        return view("test::test.index");
    }

    public function create(){
        $patients       = Patient::select('serial','name')->get();
        $doctors        = Doctor::all();
        $test_category  = TestCategory::all();

        return view("test::test.create", compact('patients','doctors', 'test_category'));
    }
}
