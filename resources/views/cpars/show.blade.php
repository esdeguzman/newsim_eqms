@extends('layouts.main')

@section('page-title')
    Home | Cpar Show
@endsection

@section('nav-audit-findings') active @endsection

@section('page-content')
    <div class="page-content-wrap">
        @if(session('attention'))
            @include('layouts.attention')
        @endif
        <div class="page-title">
            <h2><span class="fa fa-pencil"></span> CORRECTIVE AND PREVENTIVE ACTION REPORT FORM</h2>
        </div>

        <div class="row">
            <div class="col-md-9">

                <form class="form-horizontal" role="form" id="form-cpar" action="/action-summary/{{ $cpar->id }}"
                      method="GET" target="_blank">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{--CPAR NUMBER--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label"></label>
                                <div class="col-md-4 col-xs-12">

                                </div>

                                <label class="col-md-2 col-xs-12 control-label">CPAR #</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $cpar->cpar_number }} &nbsp;</label>
                                </div>
                            </div>

                            {{--FULL NAME--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Person Reporting</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $reporting->first_name . ' ' . $reporting->last_name }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Person Responsible</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $responsible->first_name . ' ' . $responsible->last_name }}</label>
                                </div>
                            </div>

                            {{--BRANCH--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Branch</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $reporting->branch }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Branch</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $responsible->branch }}</label>
                                </div>
                            </div>

                            {{--DEPARTMENT--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Department</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $reporting->department }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Department</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $responsible->department }}</label>
                                </div>
                            </div>

                            {{--POSITION--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Position</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $reporting->position }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Position</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $responsible->position }}</label>
                                </div>
                            </div>

                            {{--DATE & SEVERITY--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Date Created</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->created_at)->toFormattedDateString() }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Severity</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{!! $cpar->severity !!}</label>
                                </div>
                            </div>

                            {{--DETAILS--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Details</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->details }}</label>
                                </div>
                            </div>

                            {{--SOURCE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Source</label>
                                <div class="col-md-8 col-xs-12">
                                    <label class="control-label">{{ $cpar->source }}</label>
                                </div>
                            </div>

                            {{--OTHER SOURCE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Other Source</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->other_source }}</label>
                                </div>
                            </div>
@if($cpar->cpar_number)
                            {{--CORRECTION--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Correction</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->correction }}</label>
                                </div>
                            </div>

                            {{--ROOT CAUSE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Root Cause</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->root_cause }}</label>
                                </div>
                            </div>

                            {{--CORRECTIVE/PREVENTIVE ACTION--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Corrective/Preventive Action</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->cp_action }}</label>
                                </div>
                            </div>

                            {{--CPAR ACCEPTANCE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">CPAR Acceptance</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->cpar_acceptance }}</label>
                                </div>
                            </div>

                            {{--PROPOSED/COMPLETED DATE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Proposed Date</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->proposed_date)->toFormattedDateString() }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Date Completed</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->date_completed)->toFormattedDateString() }}</label>
                                </div>
                            </div>

                            {{--CONFIRMED/ACCEPTED/VERIFIED DATE--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Date Confirmed</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->date_confirmed)->toFormattedDateString() }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Date Accepted</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->date_accepted)->toFormattedDateString() }}</label>
                                </div>
                            </div>

                            {{--RESULT--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Result</label>
                                <div class="col-md-8 col-xs-12">
                                    <label align="justify">{{ $cpar->result }}</label>
                                </div>
                            </div>

                            {{--DEPARTMENT HEAD--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Department Head</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ $chief->first_name . ' ' . $chief->last_name }}</label>
                                </div>

                                <label class="col-md-2 col-xs-12 control-label">Date Verified</label>
                                <div class="col-md-4 col-xs-12">
                                    <label class="control-label">{{ \Carbon\Carbon::parse($cpar->date_verified)->toFormattedDateString() }}</label>
                                </div>
                            </div>

                            {{--QMR--}}
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label"></label>
                                <div class="col-md-4 col-xs-12">

                                </div>

                                <label class="col-md-2 col-xs-12 control-label"></label>
                                <div class="col-md-4 col-xs-12">
                                    <img src="{{ asset('img/sample_signature.png') }}" height="40px" width="100px" /> <br>
                                    <label class="control-label">Jenny Ludovico</label><br>
                                    <label>&nbsp;&nbsp;&nbsp;Verified By</label>
                                </div>
                            </div>
@endif
                        </div>
                        <div class="panel-footer">
                            @yield('verify-button')
                            @if(request('user.role') == 'admin')
                                <button class="btn btn-primary btn-rounded pull-right">Print CPAR</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">

                <div class="panel panel-default form-horizontal">
                    <div class="panel-body">
                        <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                        <p>Some quick info about this user</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Role</label>
                            <div class="col-md-8 col-xs-7 line-height-30">{{ request('user.role') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Username</label>
                            <div class="col-md-8 col-xs-7 line-height-30">{{ request('user.username') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Department</label>
                            <div class="col-md-8 col-xs-7">{{ request('user.department') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Branch</label>
                            <div class="col-md-8 col-xs-7 line-height-30">{{ request('user.branch') }}</div>
                        </div>
                    </div>

                </div>

            </div>

            </div>

    </div>
@stop

@yield('modals')

@section('scripts')
    <script type="text/javascript" src="{{ url('js/plugins/summernote/summernote.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            var formBody = $('#form-cpar').html();

            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: true,
                uploadUrl: "{{ route('revision-requests.store') }}",
                browseClass: "btn btn-primary",
                browseLabel: "Browse Document",
                allowedFileExtensions : ['.jpg']
            });
        });

        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['misc', ['fullscreen']]
            ],
        });

        function printCpar() {
            $('#form-cpar').html(formBody);
            $('#form-cpar').submit();
        }
    </script>
@stop
