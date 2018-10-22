@extends('layouts.master')
@section('title')
    Doctor
@endsection
@section('styles')

@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">All Doctors</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="dt_default" >
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Department</th>
                                            <th>Name</th>
                                            <th>Chamber Days</th>
                                            <th>Chamber Time</th>
                                            <th>Specialist</th>
                                            <th>Degree</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Department</th>
                                            <th>Name</th>
                                            <th>Chamber Days</th>
                                            <th>Chamber Time</th>
                                            <th>Specialist</th>
                                            <th>Degree</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @foreach($doctors as $key=>$doctor)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $doctor->department->name }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>
                                                @foreach($chamber_days as $chamber_day)
                                                    @if($chamber_day->chamber_day_id == 1)
                                                        Saturday,
                                                    @elseif($chamber_day->chamber_day_id == 2)
                                                        Sunday,
                                                    @elseif($chamber_day->chamber_day_id == 3)
                                                        Monday,
                                                    @elseif($chamber_day->chamber_day_id == 4)
                                                        Tuesday,
                                                    @elseif($chamber_day->chamber_day_id == 5)
                                                        Wednesday,
                                                    @elseif($chamber_day->chamber_day_id == 6)
                                                        Thursday,
                                                    @else
                                                        Friday
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $doctor->chamber_time}}</td>
                                            <td>{{ $doctor->specialization }}</td>
                                            <td>{{ $doctor->degree }}</td>
                                            <td>
                                                <a href="{{ route('doctor_edit', ['id' => $doctor->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="doctor_id" value="{{ $doctor->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('doctor_create') }}" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#sidebar_doctor').addClass('current_section');


        $('.delete_btn').click(function () {
            var id = $(this).next('.doctor_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/doctor/delete/"+id;
            })
        })
    </script>
@endsection