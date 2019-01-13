@extends('layouts.master')
@section('title')
    Prescription
@endsection
@section('styles')

@endsection

@section('content')
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large uk-row-first">
                <div class="md-list-outside-wrapper">
                    <div class="scroll-wrapper scrollbar-inner" style="position: relative;">
                        <div class="scrollbar-inner scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 380px;">
                            <ul class="md-list md-list-outside">

                                <li class="heading_list">Recent Prescription</li>

                                @foreach($prescriptions as $prescription)
                                    <li>
                                        <a href="{{ route('prescription_show', ['id' => $prescription->id]) }}" class="md-list-content">
                                            <span class="md-list-heading uk-text-truncate">   <span class="uk-text-small uk-text-muted">{{ date('d-m-Y',strtotime($prescription->date)) }}</span></span>
                                            <span class="uk-text-small uk-text-muted">Doctor: -{{ $prescription->doctor->name }}</span>
                                        </a>
                                    </li>
                                @endforeach

                                <li class="uk-text-center">
                                    <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{ route('prescription_index') }}">See All</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-width-large-8-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="{{ route('prescription_edit', ['id' => $prescription->id]) }}">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">Patient : {{ "PID-".$prescription->patient->serial }}</h3>
                        </div>

                        <div class="md-card-content invoice_content print_bg">

                            {{--@if($theader->getBanner()->headerType)
                                <div class="" style="text-align: center;">
                                    <img src="{{ asset($theader->getBanner()->file_url) }}">
                                </div>
                            @else
                                <div class="uk-grid" data-uk-grid-margin style="text-align: center; margin-top:50px;">
                                    <h1 style="width: 100%; text-align: center;"><img style="text-align: center;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/> {{ $OrganizationProfile->company_name }}</h1>
                                </div>
                                <div class="" style="text-align: center;">

                                    <p>{{ $OrganizationProfile->street }},{{ $OrganizationProfile->city }},{{ $OrganizationProfile->state }},{{ $OrganizationProfile->country }}</p>

                                    <p style="margin-top: -17px;">{{ $OrganizationProfile->email }},{{ $OrganizationProfile->contact_number }}</p>
                                </div>
                            @endif--}}

                            <div class="uk-grid" data-uk-grid-margin>

                                <div class="uk-width-5-5" style="font-size: 12px;">
                                    <div class="uk-grid">
                                        <h2 style="text-align: center; width: 90%;" class="">Prescription</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># Prescription : {{ $prescription->id }}</p>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="invoice_id">

                            <div class="uk-grid">
                                <div class="uk-width-small-1-3 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-bold">Doctor :</span>
                                        <table>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ ": ".$prescription->doctor->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Specialized</td>
                                                <td>{{ ": ".$prescription->doctor->specialization }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chamber</td>
                                                <td>{{ ": ".$prescription->doctor->chamber_time }}</td>
                                            </tr>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-3">
                                </div>
                                <div class="uk-width-small-1-3">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-bold">Patient :</span>
                                        <table>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ ": ".$prescription->patient->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Age</td>
                                                <td>{{ ": ".$prescription->patient->age }}</td>
                                            </tr>
                                            <tr>
                                                <td>BP</td>
                                                <td>{{ ": ".$prescription->patient->blood_pressure }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-1-2 uk-row-first">
                                    <h3 class="heading_a">Test </h3>
                                    <table id="table_center" border="1" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Test Name</th>
                                            <th>Body Part</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                            @foreach($tests as $test)
                                                <tr class="uk-table-middle">
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $test->test_name }}</td>
                                                    <td>{{ $test->body_part }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="uk-width-1-2">
                                    <h3 class="heading_a">Medicine</h3>
                                    <table id="table_center" border="1" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Medicine</th>
                                            <th>Schedule</th>
                                            <th>Duration</th>
                                            <th>Advise</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($prescription_medicine as $medicine)
                                            <tr class="uk-table-middle">
                                                <td>{{ $i }}</td>
                                                <td>{{ $medicine->name }}</td>
                                                <td>{{ $medicine->taking_time }}</td>
                                                <td>{{ $medicine->duration }}</td>
                                                <td>{{ $medicine->advise }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes: <span class=""><?php $prescription->summary ?></span></span>
                                </div>
                            </div>

                            <div class="uk-grid" style="margin-top:70px;">
                                <div class="uk-width-1-2" style="text-align: left">
                                    <p class="uk-text-small uk-margin-bottom">Customer Signature</p>
                                </div>
                                <div class="uk-width-1-2" style="text-align: right">
                                    <p class="uk-text-small uk-margin-bottom">Company Representative</p>
                                </div>
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
        $('#sidebar_prescription_setting').addClass('current_section');
        $('#sidebar_prescription').addClass('act_item');

        $(window).load(function(){
            $("#tiktok_account").trigger('click');

        })
    </script>

@endsection

@section('sweet_alert')
    <script>
        function _(el) {
            return document.getElementById(el);
        }

        function uploadFile(){
            _("progressBar").style.display = "block";
            var file = _("file1").files[0];


            var size= file.size/1024/1024;
            if(size>10){
                _("status").innerHTML = "file size not allowed";
                _("status").style.color = "red";
                return false;
            }
            _("status").style.color = "black";
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", window.location.href);
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
             _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }

        function completeHandler(event) {
             _("status").innerHTML = event.target.responseText;

           // UIkit.modal.alert(event.target.responseText)
            _("progressBar").value = 100;
            _("progressBar").style.display = "block";
        }

        function errorHandler(event) {
            //  _("status").innerHTML = "Upload Failed";
            alert("Upload Failed");
            _("progressBar").style.display = "none";
        }

        function abortHandler(event) {
            // _("status").innerHTML = "Upload Aborted";
            alert("Upload Aborted");
            _("progressBar").style.display = "none";
        }
        
        
        $('#sidebar_main_account').addClass('current_section');
        $('#sidebar_primary_sales').addClass('act_item');
        $(window).load(function(){
            $("#tiktok_account").trigger('click');
        });

        
    </script>
@endsection