@extends('layouts.master')
@section('title')
    Patient
@endsection
@section('styles')

@endsection

@section('angular')
    <script src="{{url('app/patient/patient.module.js')}}"></script>
    <script src="{{url('app/patient/patient.controller.js')}}"></script>
@endsection

@section('content')
    <div class="uk-grid" ng-app="patientApp" ng-controller="PatientController">
        <div class="uk-width-large-10-10">
            {!! Form::open(['url' => route('stuff_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Patient</span></h2>
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="name">Name<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Name</label>
                                        <input class="md-input" type="text" id="name" name="name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="error">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="age">Age<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Age</label>
                                        <input class="md-input" type="number" id="age" name="age">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="gender">Gender<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <span>
                                        <input type="radio" name="gender" id="val_radio_male" value="1" data-md-icheck />
                                            <label for="val_radio_male" class="inline-label">Male</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="radio" name="gender" value="2"id="val_radio_female" data-md-icheck />
                                            <label for="val_radio_female" class="inline-label">Female</label>
                                        </span>
                                        @if ($errors->has('gender'))
                                            <span class="error">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="admission_date">Admission Date<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="text" id="admission_date" name="admission_date" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}" data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                                        @if ($errors->has('admission_date'))
                                            <span class="error">
                                                <strong>{{ $errors->first('admission_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1 ">

                                        <div id="accor" class="uk-accordion" data-uk-accordion="">
                                            <h3 class="uk-accordion-title uk-accordion-title-success">Patient Details</h3>
                                            <div data-wrapper="true" style="overflow:hidden;height:0;position:relative;" aria-expanded="false">
                                                <div class="uk-accordion-content">
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-2">
                                                            <label for="weight">Blood Pressure</label>
                                                            <input class="md-input" type="text" id="blood_pressure" name="blood_pressure" value="{{ old('blood_pressure') }}" required>
                                                            @if ($errors->has('email'))
                                                                <span class="error">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="uk-width-medium-1-2">
                                                            <label for="weight">Weight</label>
                                                            <input class="md-input" type="number" id="weight" name="weight">
                                                            @if ($errors->has('weight'))
                                                                <span class="error">
                                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-3  uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="problem">Problem<span class="req">*</span></label>
                                                        </div>
                                                        <div class="uk-width-medium-2-3">
                                                            <textarea class="md-input ckeditor" id="problem" name="problem" value="{{ old('problem') }}" required></textarea>
                                                            @if ($errors->has('problem'))
                                                                <span class="error">
                                                                    <strong>{{ $errors->first('problem') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                            <div class="uk-width-medium-1-3  uk-vertical-align">
                                                                <label class="uk-vertical-align-middle" for="superivse_doctor_id">Supervise Doctor<span class="req">*</span></label>
                                                            </div>
                                                            <div class="uk-width-medium-2-3">
                                                                <select id="type" name="superivse_doctor_id" required data-md-selectize aria-required="true">
                                                                    <option value="">Choose..</option>
                                                                    @foreach($supervised_doctors as $doctor)
                                                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('superivse_doctor_id'))
                                                                    <span class="error">
                                                                        <strong>{{ $errors->first('superivse_doctor_id') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div style=" padding:10px;height: 40px; color: white; background-color: maroon">
                                            Take Test
                                        </div>

                                    </div>
                                    <div class="uk-width-1-2" style="padding: 10px; height: 40px; position:relative;background: maroon ">
                                        <div id="inv" style="position: absolute; right: 10px; height: 40px; ">
                                            <input type="checkbox" name="checkbox_test" id="checkbox_test" style=" margin-top: -1px; height: 25px; width: 20px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="uk-grid" id="testBody" style="display:none;" >
                                    <div class="uk-width-medium-1-1">
                                        <table class="uk-table">
                                            <thead>
                                                <tr>
                                                    <th class="uk-text-nowrap">Test Category</th>
                                                    <th class="uk-text-nowrap">Test Name</th>
                                                    <th class="uk-text-nowrap">Body Part</th>
                                                    <th class="uk-text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="form_section" id="d_form_section">
                                                    <td>
                                                        <select id="test_category_id_0" name="test_category_id[0]" ng-model="test_category_id" ng-change="getTestCategory(0)" required>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="md-input" id="test_name_0" name="test_name[0]" ng-init="test_name[0]='1'" ng-model="test_name[0]" />
                                                    </td>
                                                    <td>
                                                        <input class="md-input" id="body_part_0" name="body_part[0]" ng-init="body_part[0]='1'" ng-model="body_part[0]"/>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btnSectionClone" data-section-clone="#d_form_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                    </td>
                                                </tr>

                                                <tr ng-repeat="test_category in testcategories track by $index" ng-class="{'last':$last}"  class="form_section" id="d_form_section">
                                                    <td>
                                                        <select id="test_category_id_@{{ $index + 1 }}" name="test_category_id[]" ng-model="test_category_id" ng-change="getTestCategory($index + 1)" required>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="md-input" id="test_name_@{{ $index + 1 }}" name="test_name[]" ng-init="test_name[$index+1]='0.00'" ng-model="test_name[$index+1]" />
                                                    </td>
                                                    <td>
                                                        <input class="md-input" id="body_part_@{{ $index + 1 }}" name="body_part[]" ng-init="body_part[$index+1]='0.00'" ng-model="body_part[$index+1]"/>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div style=" padding:10px;height: 40px; color: white; background-color: #7cb342">
                                            Prescription
                                        </div>

                                    </div>
                                    <div class="uk-width-1-2" style="padding: 10px; height: 40px; position:relative;background: #7cb342 ">
                                        <div id="inv" style="position: absolute; right: 10px; height: 40px; ">
                                            <input type="checkbox" name="checkbox_prescription" id="checkbox_prescription" style=" margin-top: -1px; height: 25px; width: 20px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="uk-grid" id="prescriptionBody" style="display:none;" >
                                    <div class="uk-width-medium-1-1">
                                        <table class="uk-table">
                                            <thead>
                                                <tr>
                                                    <th class="uk-text-nowrap">SL No</th>
                                                    <th class="uk-text-nowrap">Medicine Name</th>
                                                    <th class="uk-text-nowrap">Type</th>
                                                    <th class="uk-text-nowrap">Schedule</th>
                                                    <th class="uk-text-nowrap">Duration</th>
                                                    <th class="uk-text-nowrap">Advise</th>
                                                    <th class="uk-text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="form_section" id="prescription_section">
                                                    <td>1</td>
                                                    <td><input type="text" class="md-input" name="medicine_name[]" value="{{ old('medicine_name') }}" placeholder="Medicine Name" /></td>
                                                    <td>
                                                        <select id="medicine_type" name="medicine_type[]" data-md-selectize aria-required="true">
                                                            <option selected disabled>Medicine Type</option>
                                                            <option value="1">Tablet</option>
                                                            <option value="2">Capsule</option>
                                                            <option value="3">Injection</option>
                                                            <option value="5">Syrup</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div id="tabletCapsule" style="display: none;">
                                                            <select id="tablet_capsule_id" name="tablet_capsule_id[]" data-md-selectize aria-required="true">
                                                                <option selected disabled>Medicine Type</option>
                                                                <option value="111">1-1-1</option>
                                                                <option value="100">1-0-0</option>
                                                                <option value="010">0-1-0</option>
                                                                <option value="001">0-0-1</option>
                                                                <option value="101">1-0-1</option>
                                                                <option value="011">0-1-1</option>
                                                                <option value="110"> 1-1-0</option>
                                                            </select>
                                                        </div>
                                                        <div id="injection" style="display: none;">
                                                            <select id="injection_type_id" name="injection_type_id[]" data-md-selectize aria-required="true">
                                                                <option selected disabled>Medicine Type</option>
                                                                <option value="1">IM</option>
                                                                <option value="2">IV</option>
                                                            </select>
                                                        </div>
                                                        <div id="syrup" style="display: none;">
                                                            <select id="syrup_id" name="syrup_id[]" data-md-selectize aria-required="true">
                                                                <option selected disabled>Medicine Type</option>
                                                                <option value="111">1-1-1</option>
                                                                <option value="100">1-0-0</option>
                                                                <option value="010">0-1-0</option>
                                                                <option value="001">0-0-1</option>
                                                                <option value="101">1-0-1</option>
                                                                <option value="011">0-1-1</option>
                                                                <option value="110"> 1-1-0</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="md-input" name="duration[]" value="{{ old('duration') }}"  placeholder="Duration" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="md-input" name="advise[]" value="{{ old('advise') }}"  placeholder="Advise" />
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btnSectionClone" data-section-clone="#prescription_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div style=" padding:10px;height: 40px; color: white; background-color: #2D2D2D ">
                                            Patient Current Status
                                        </div>

                                    </div>
                                    <div class="uk-width-1-2" style="padding: 10px; height: 40px; position:relative;background: #2D2D2D ">
                                        <div id="inv" style="position: absolute; right: 10px; height: 40px; ">
                                            <input type="checkbox" name="checkbox_patient_status" id="checkbox_patient_status" style=" margin-top: -1px; height: 25px; width: 20px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="uk-grid" id="patientStatusBody" style="display:none;" >
                                    <div class="uk-width-medium-1-1">

                                        <table class="uk-table">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">SL No</th>
                                                <th class="uk-text-nowrap">Symptom</th>
                                                <th class="uk-text-nowrap">Status</th>
                                                <th class="uk-text-nowrap">Doctor</th>
                                                <th class="uk-text-nowrap">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="form_section" id="patient_status_section">
                                                <td>1</td>
                                                <td>
                                                    <input class="md-input" name="symptom[]" value="{{ old('symptom') }}" placeholder="New Symptom" />
                                                </td>
                                                <td>
                                                    <input class="md-input" name="status[]" value="{{ old('status') }}" placeholder="Status" />
                                                </td>
                                                <td>
                                                    <select id="test_category_id" name="test_category_id[]" data-md-selectize aria-required="true">
                                                        <option selected disabled>Choose Test Category</option>
                                                        <option value="6">Thursday</option>
                                                        <option value="7">Friday</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="#" class="btnSectionClone" data-section-clone="#patient_status_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="email">Email</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="email">Email</label>
                                        <input class="md-input" type="email" id="email" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="error">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="image">File</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input type="file" name="image" class="md-input">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="discharge_date">Discharge Date</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="discharge_date">Discharge Date</label>
                                        <input class="md-input" type="text" id="discharge_date" name="discharge_date" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}" data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                                        @if ($errors->has('discharge_date'))
                                            <span class="error">
                                                <strong>{{ $errors->first('discharge_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid uk-ma" data-uk-grid-margin>
                                    <div class="uk-width-1-1 uk-float-left">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#medicine_type").change(function() {
            var medicineType = $(this).val();
            if(medicineType == 1 || medicineType == 2) {
                $("#tabletCapsule").show();
                $("#injection").hide();
                $("#syrup").hide();
            }
            else  if(medicineType == 3) {
                $("#injection").show();
                $("#tabletCapsule").hide();
                $("#syrup").hide();
            } else {
                $("#syrup").show();
                $("#injection").hide();
                $("#tabletCapsule").hide();
            }
        });
    </script>

    <script>
        $("#checkbox_test").on("click",function () {
            $("#testBody").toggle(800);
        });

        $("#checkbox_prescription").on("click",function () {
            $("#prescriptionBody").toggle(800);
        });
        $("#checkbox_patient_status").on("click",function () {
            $("#patientStatusBody").toggle(800);
        });
    </script>
    <script>
        $('#sidebar_patient_setting').addClass('current_section');
        $('#sidebar_patient').addClass('act_item');

        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>

    <script src="{{ url('bower_components/ckeditor/ckeditor.js') }}"></script>
@endsection