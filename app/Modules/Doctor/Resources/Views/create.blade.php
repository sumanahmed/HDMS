@extends('layouts.master')
@section('title')
    Doctor
@endsection
@section('styles')

@endsection

@section('content')
    <div class="uk-grid">
        <div class="uk-width-large-10-10">
            {!! Form::open(['url' => route('doctor_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Doctor</span></h2>
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
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                                        <label class="uk-vertical-align-middle" for="email">Email<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Email</label>
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
                                        <label class="uk-vertical-align-middle" for="mobile">Mobile<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="income_date">Mobile</label>
                                        <input class="md-input" type="number" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
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
                                        <input class="md-input" type="text" id="degree" value="{{ old('degree') }}" name="degree">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="designation">Designation</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Designation</label>
                                        <input class="md-input" type="text" id="designation" value="{{ old('designation') }}" name="designation">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="doctor_type">Doctor Type</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="type" name="doctor_type" required data-md-selectize aria-required="true">
                                            <option value="1">Duty Doctor</option>
                                            <option value="2">Supervised Doctor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="work_place">Work Place</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="age">Work Place</label>
                                        <input class="md-input" type="text" id="work_place" value="{{ old('work_place') }}" name="work_place">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="specialization">Specialization<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="nid">Specialization</label>
                                        <input class="md-input" type="text" id="nid" name="specialization"  value="{{ old('specialization') }}" required>
                                        @if ($errors->has('specialization'))
                                            <span class="error">
                                                <strong>{{ $errors->first('specialization') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="d_form_section">Chamber Days<span class="req">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">

                                        <div class="uk-grid uk-grid-medium form_section" id="d_form_section" data-uk-grid-match>
                                            <div class="uk-width-9-10">
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-1">
                                                        <div class="parsley-row">
                                                            <select id="chamber_days" name="chamber_days" required data-md-selectize aria-required="true">
                                                                <option value="1">Saturday</option>
                                                                <option value="2">Sunday</option>
                                                                <option value="3">Monday</option>
                                                                <option value="4">Tuesday</option>
                                                                <option value="5">Wednesday</option>
                                                                <option value="6">Thursday</option>
                                                                <option value="7">Friday</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-2">
                                                        <div class="parsley-row">
                                                            <label>Chamber Start Time</label>
                                                            <input type="text" class="md-input" name="chamber_start_time[]" data-uk-timepicker>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2">
                                                        <div class="parsley-row">
                                                            <select id="chamber_start_time_am_pm" name="chamber_start_time_am_pm[]" required data-md-selectize aria-required="true">
                                                                <option value="1">AM</option>
                                                                <option value="2">PM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2">
                                                        <div class="parsley-row">
                                                            <label>Chamber End Time</label>
                                                            <input type="text" class="md-input" name="chamber_end_time[]" data-uk-timepicker>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2">
                                                        <div class="parsley-row">
                                                            <select id="chamber_end_time_am_pm" name="chamber_end_time_am_pm[]" required data-md-selectize aria-required="true">
                                                                <option value="1">AM</option>
                                                                <option value="2">PM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-10 uk-text-center">
                                                <div class="uk-vertical-align uk-height-1-1">
                                                    <div class="uk-vertical-align-middle">
                                                        <a href="#" class="btnSectionClone" data-section-clone="#d_form_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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