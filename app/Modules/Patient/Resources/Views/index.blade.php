@extends('layouts.master')
@section('title')
    Patient
@endsection
@section('styles')

@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">

                    @if($message = Session::get('success'))
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
                                <h2 class="heading_b"><span class="uk-text-truncate">All Patient</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table id="dt_colVis" class="uk-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Patient ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Age</th>
                                        <th>Status</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                        <th>Patient ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Age</th>
                                        <th>Status</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                        @foreach($patients as $key=>$value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ "PID-".str_pad($value->serial, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->age }}</td>
                                            <td>{{ $value->admit_status == 1 ? "Admitted" : "Discharged" }}</td>
                                            <td class="uk-text-right">
                                                <a href="{{ route('patient_prescription', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Prescription" class="md-icon material-icons">history</i>
                                                </a>
                                                <a href="{{ route('patient_show', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('patient_edit', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="stuff_id" value="{{ $value->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('patient_create') }}" class="md-fab md-fab-accent branch-create">
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
        $('#sidebar_patient_setting').addClass('current_section');
        $('#sidebar_patient').addClass('act_item');

        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })

        $('.delete_btn').click(function () {
            var id = $(this).next('.stuff_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/patient/delete/"+id;
            })
        })

    </script>
@endsection