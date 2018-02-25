@extends('layouts.main')

@section('page-title')New Audit Summary | eQMS @endsection

@section('nav-view') active @endsection

@section('page-content')
    <div class="page-content-wrap">
        <div class="page-title">
            <h2><span class="fa fa-exclamation-circle"></span> New Audit Summary</h2>
        </div>

        <div class="row">
            <div class="col-md-9">

                <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('audits.store') }}" method="POST" role="form" id="revision-form">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-body form-group-separated" id="main-panel">
                            <div class="form-group">
                                <label class="col-md-2 col-xs-12 control-label">Type *</label>
                                <div class="col-md-10 col-xs-12">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="check"><input type="radio" class="iradio" name="audit_type" value="internal" checked="checked" /> Internal</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="check"><input type="radio" class="iradio" name="audit_type" value="dnv" /> DNV</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="check"><input type="radio" class="iradio" name="audit_type" value="marina" /> Marina</label>
                                        </div>
                                    </div>
                                    <span class="help-block">Type of audit to be uploaded</span>
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('attachments')) has-error @endif">
                                <label class="col-md-2 col-xs-5 control-label">Responsible Persons *</label>
                                <div class="col-md-10 col-xs-7">
                                    <select multiple class="form-control select" name="responsibles[]" data-live-search="true">
                                       @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                       @endforeach
                                    </select>
                                    <span class="help-block">All employees that appears to the audit summary</span>
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('attachments')) has-error @endif">
                                <label class="col-md-2 col-xs-5 control-label">Attachments *</label>
                                <div class="col-md-10 col-xs-7">
                                    <input type="file" multiple id="file-simple" name="attachments[]"/>
                                    <span class="help-block">Audit summary must </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-5">
                                    <button class="btn btn-primary btn-rounded pull-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-3" style="position: fixed; top: 12em; right: 1em;">

                <div class="panel panel-default form-horizontal">
                    <div class="panel-body">
                        <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                        <p>Some quick info about this user</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Full name</label>
                            <div class="col-md-8 col-xs-7 line-height-30">{{ request('user.first_name') }} {{ request('user.last_name') }}</div>
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
@endsection

@section('scripts')
    <script type='text/javascript' src={{ url('js/plugins/icheck/icheck.min.js') }}></script>
    <script type="text/javascript" src="{{ url('js/plugins/summernote/summernote.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/fileinput/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
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
                ['misc', ['fullscreen']],
            ]
        });

        @if(isset($revisionRequest))
            @include('revisionrequests.appeal-elements.denied-request-link', ['revisionRequest'])
        @endif
    </script>
@endsection
