@extends('layouts.master')
@section('title')
    Doctor
@endsection
@section('styles')

@endsection

@section('content')
    <div class="uk-grid">
        <div class="uk-width-large-10-10">
            {!! Form::open(['url' => route('doctor_update', $doctor->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Update Doctor</span></h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="department_id">Department<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="type" name="department_id" required data-md-selectize aria-required="true">
                                            <option value="">Choose..</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" @if($doctor->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                            <span class="error">
                                                <strong>{{ $errors->first('department_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="name">Name<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Name</label>
                                        <input class="md-input" type="text" id="name" name="name" value="{{ $doctor->name }}" required>
                                        @if ($errors->has('name'))
                                            <span class="error">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="email">Email<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Email</label>
                                        <input class="md-input" type="email" id="email" name="email" value="{{ $doctor->email }}" required>
                                        @if ($errors->has('email'))
                                            <span class="error">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="mobile">Mobile<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Mobile</label>
                                        <input class="md-input" type="number" id="mobile" name="mobile" value="{{ $doctor->mobile }}" required>
                                        @if ($errors->has('mobile'))
                                            <span class="error">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="degree">Degree</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Degree</label>
                                        <input class="md-input" type="text" id="degree" value="{{ $doctor->degree }}" name="degree">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="designation">Designation</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Designation</label>
                                        <input class="md-input" type="text" id="designation" value="{{ $doctor->designation }}" name="designation">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="doctor_type">Doctor Type</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="type" name="doctor_type" required data-md-selectize aria-required="true">
                                            <option value="1" @if($doctor->type == 1) selected @endif>Duty Doctor</option>
                                            <option value="2" @if($doctor->type == 2) selected @endif>Supervised Doctor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="work_place">Work Place</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Work Place</label>
                                        <input class="md-input" type="text" id="work_place" value="{{ $doctor->work_place }}" name="work_place">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="specialization">Specialization<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="nid">Specialization</label>
                                        <input class="md-input" type="text" id="nid" name="specialization"  value="{{ $doctor->specialization }}" required>
                                        @if ($errors->has('specialization'))
                                            <span class="error">
                                                <strong>{{ $errors->first('specialization') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="chamber_day_id">Chamber Days<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="1" data-md-icheck /></span>
                                            <label>Saturday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="2" data-md-icheck /></span>
                                            <label>Sunday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="3" data-md-icheck /></span>
                                            <label>Monday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="4" data-md-icheck /></span>
                                            <label>Tuesday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="5" data-md-icheck /></span>
                                            <label>Wednesday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="6" data-md-icheck /></span>
                                            <label>Thursday</label>
                                            <span class="uk-input-group-addon"><input type="checkbox" name="chamber_day_id[]" value="7" data-md-icheck /></span>
                                            <label>Friday</label>
                                        </div>
                                        @if ($errors->has('chamber_day_id'))
                                            <span class="error">
                                                <strong>{{ $errors->first('chamber_day_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="chamber_time">Chamber Time<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="chamber_time">6:00 A.M to 10 A.M</label>
                                        <input class="md-input" type="text" id="nid" name="chamber_time"  value="{{ old('chamber_time') }}" required>
                                        @if ($errors->has('chamber_time'))
                                            <span class="error">
                                                <strong>{{ $errors->first('chamber_time') }}</strong>
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

        $('#sidebar_doctor').addClass('current_section');

    </script>
@endsection