@extends('layouts.master')

@section('content')

    <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                    <span class="uk-text-muted uk-text-small">Approved Agent</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">{{--{{ $approve_agent }}--}}</span></h2>
                </div>
            </div>
        </div>

    </div>
    <script>
        window.onload =  function (ev) {
            $("#sidebar_master").addClass('current_section');
        }


        function deleterow(link) {

            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>
@endsection

@section('custom_footer_js')
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
    </script>
    <script src="bower_components/parsleyjs/dist/parsley.min.js"></script>
    <script src="{{ asset('assets/js/pages/components_notifications.min.js') }} "></script>
@endsection

