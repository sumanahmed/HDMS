@extends('layouts.master')
@section('title')
    Prescription
@endsection
@section('styles')
    <style>
        #table_center th,td{
            border-bottom-color: black !important;
        }
        table#info{
            font-size: 12px !important;
            line-height: 2px;
            border: 1px solid black !important;
            min-width: 200px;
            float:right;
        }
        table#info tr td{
            border: 1px solid black !important;
        }
        table#info tr{
            padding: 0px;
            border: 1px solid black !important;
        }
        @media print {
            body {

                margin-top: -100px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="uk-width-medium-8-10 uk-container-center reset-print">

        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-3-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside notes_list" id="notes_list">

                        <li class="heading_list uk-text-danger">Important Notes</li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="1">
                                <span class="md-list-heading uk-text-truncate">Animi laudantium accusantium.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="2">
                                <span class="md-list-heading uk-text-truncate">Perferendis labore inventore ut.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="3">
                                <span class="md-list-heading uk-text-truncate">Et perspiciatis qui velit.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="4">
                                <span class="md-list-heading uk-text-truncate">Ut laudantium quia.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="5">
                                <span class="md-list-heading uk-text-truncate">Eaque omnis sunt.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="6">
                                <span class="md-list-heading uk-text-truncate">Sunt iusto autem quia eum veniam.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="7">
                                <span class="md-list-heading uk-text-truncate">Fuga dicta vel reprehenderit quaerat.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="8">
                                <span class="md-list-heading uk-text-truncate">Odit repellendus repudiandae.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="9">
                                <span class="md-list-heading uk-text-truncate">Praesentium in aliquid necessitatibus omnis accusamus.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="10">
                                <span class="md-list-heading uk-text-truncate">Vero delectus ut non.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>

                        <li class="heading_list">Other Notes</li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="11">
                                <span class="md-list-heading uk-text-truncate">Provident voluptatem dolorem temporibus repellendus quisquam.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="12">
                                <span class="md-list-heading uk-text-truncate">Ad magnam eum rerum adipisci repellat.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="13">
                                <span class="md-list-heading uk-text-truncate">Id repellendus et voluptatem ipsum accusamus.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="14">
                                <span class="md-list-heading uk-text-truncate">Aut voluptas neque saepe illum nostrum.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="15">
                                <span class="md-list-heading uk-text-truncate">Temporibus corrupti sit fugit tenetur illum.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="16">
                                <span class="md-list-heading uk-text-truncate">Qui impedit laboriosam esse consequuntur.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="17">
                                <span class="md-list-heading uk-text-truncate">Illum totam veniam aut quia.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="18">
                                <span class="md-list-heading uk-text-truncate">Aut sed non aut nemo.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="19">
                                <span class="md-list-heading uk-text-truncate">Consectetur sed veniam.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="20">
                                <span class="md-list-heading uk-text-truncate">Sit illo neque repellendus tempora.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="21">
                                <span class="md-list-heading uk-text-truncate">Recusandae quasi et non.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="22">
                                <span class="md-list-heading uk-text-truncate">Non natus omnis necessitatibus praesentium.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="23">
                                <span class="md-list-heading uk-text-truncate">Minima dolor sed.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="24">
                                <span class="md-list-heading uk-text-truncate">Rerum et et ipsum autem laborum.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="25">
                                <span class="md-list-heading uk-text-truncate">Id officiis qui sit.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="md-list-content note_link" data-note-id="26">
                                <span class="md-list-heading uk-text-truncate">Suscipit fuga saepe ut qui.</span>
                                <span class="uk-text-small uk-text-muted">17 Aug 2016</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-large-7-10">
                <div class="md-card md-card-single">
                    <form action="">
                        <div class="md-card-toolbar hidden-print">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons">&#xE161;</i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons uk-margin-small-right">&#xE80D;</i> Share</a></li>
                                            <li><a href="#"><i class="material-icons uk-margin-small-right">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons uk-margin-small-right">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <input name="note_title" id="note_title" class="md-card-toolbar-input" type="text" value="" placeholder="Add title" />
                        </div>
                        <div class="md-card-content">
                            <textarea name="note_content" id="note_content" class="md-input" cols="30" rows="12" placeholder="Add content"></textarea>
                        </div>
                    </form>
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