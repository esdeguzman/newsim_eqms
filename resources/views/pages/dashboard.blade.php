@extends('layouts.main')

@section('page-title')
    Dashboard | eQMS
@endsection

@section('nav-home') active @endsection

@section('page-content')
    <div class="x-content-tabs">
        <ul>
            <li><a href="#main-tab" class="icon active"><span class="fa fa-desktop"></span></a></li>
        </ul>
    </div>
    <div class="x-content" style="margin-top:-10px; height: 90vh;">
        <div id="main-tab">
            <div class="x-content-title">
                <h1>Dashboard</h1>
            </div>
            <div class="row stacked">
                <div class="@if($newlyCreatedCpars->count() > 0) col-md-10 @else col-md-12 @endif">
                    <div class="x-chart-widget">
                        <div class="x-chart-widget-head">
                            <div class="x-chart-widget-title">
                                <h3>eQMS Activity</h3>
                            </div>
                            <div class="pull-right">
                                <strong>Legend: </strong> <span class="label label-danger">CPARS</span> <span class="label label-success">Revision Requests</span>
                            </div>
                        </div>
                        <div class="x-chart-widget-content">
                            <div class="x-chart-widget-content-head">
                                <h4>SUMMARY</h4>
                                <div class="pull-right">
                                    <form class="form-inline" role="form" action="{{ route('graph-data') }}" method="get">
                                        {{ csrf_field() }}
                                        <select class="form-control select" name="branch">
                                            <option value="Bacolod">Bacolod</option>
                                            <option value="Cebu">Cebu</option>
                                            <option value="Davao">Davao</option>
                                            <option value="Iloilo">Ilo-ilo</option>
                                            <option value="Makati" selected>Makati</option>
                                        </select>
                                        <div class="input-group" id="year">
                                            <select class="form-control select" name="start_year">
                                                @php
                                                    $start = 2018; $end = 2000;
                                                    for($i = $start; $start >= $end; $start--) {
                                                        echo "<option>$start</option>";
                                                    }
                                                @endphp
                                            </select>
                                            <span class="input-group-addon add-on"> to </span>
                                            <select class="form-control select" name="end_year">
                                                @php
                                                    $start = 2018; $end = 2000;
                                                    for($i = $start; $start >= $end; $start--) {
                                                        echo "<option>$start</option>";
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="input-group" id="month">
                                            <select class="form-control select" name="start_month">
                                                <option value="">Ignore Month</option>
                                                <option value="january" selected>January</option>
                                                <option value="february">February</option>
                                                <option value="march">March</option>
                                                <option value="april">April</option>
                                                <option value="may">May</option>
                                                <option value="june">June</option>
                                                <option value="july">July</option>
                                                <option value="august">August</option>
                                                <option value="september">September</option>
                                                <option value="october">October</option>
                                                <option value="november">November</option>
                                                <option value="december">December</option>
                                            </select>
                                            <span class="input-group-addon add-on"> to </span>
                                            <select class="form-control select" name="end_month">
                                                <option value="">Ignore Month</option>
                                                <option value="january" selected>January</option>
                                                <option value="february">February</option>
                                                <option value="march">March</option>
                                                <option value="april">April</option>
                                                <option value="may">May</option>
                                                <option value="june">June</option>
                                                <option value="july">July</option>
                                                <option value="august">August</option>
                                                <option value="september">September</option>
                                                <option value="october">October</option>
                                                <option value="november">November</option>
                                                <option value="december">December</option>
                                            </select>
                                        </div>
                                        <select class="form-control select" name="firstYear">
                                            <option value="december">December</option>
                                        </select>
                                        <div class="input-group" id="week">
                                            <select class="form-control select" name="week_start">
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                            </select>
                                            <span class="input-group-addon add-on"> to </span>
                                            <select class="form-control select" name="week_end">
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-warning">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="x-chart-widget-informer">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="x-chart-widget-informer-item">
                                                    <div class="count">{{ $cparsOld->count() }}</div>
                                                    <div class="title">Last year's CPAR count</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="x-chart-widget-informer-item">
                                                    <div class="count">{{ $cparsNew->count() }}<span>@if($cparsOld->count() != 0){{ $cparsNew->count() - $cparsOld->count() / $cparsOld->count() }}@else 0 @endif% <i class="fa fa-arrow-up"></i></span></div>
                                                    <div class="title">This year's CPAR count</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="x-chart-widget-informer-item">
                                                    <div class="count">{{ $revisionRequestsOld->count() }}</div>
                                                    <div class="title">Last year's revision requests count</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="x-chart-widget-informer-item last">
                                                    <div class="count">{{ $revisionRequestsNew->count() }}<span>@if($revisionRequestsOld->count() != 0){{ $revisionRequestsNew->count() - $revisionRequestsOld->count() / $revisionRequestsOld->count() }}@else 0 @endif% <i class="fa fa-arrow-up"></i></span></div>
                                                    <div class="title">This year's revision requests count</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="x-chart-holder">
                                <div id="x-dashboard-line" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($newlyCreatedCpars->count() > 0)
                    <div class="col-md-2">

                        <div class="x-widget-timeline">
                            <div class="x-widget-timelime-head">
                                <h3>NOTIFICATIONS</h3>
                            </div>
                            <div class="x-widget-timeline-content">
                               @if($newlyCreatedCpars->count() > 0 || $newlyCreatedRevisionRequests->count() > 0)
                                    @foreach($newlyCreatedCpars as $cpar)
                                        <div class="item item-blue">
                                            a new <a href="{{ route('cpars.review', $cpar->id) }}">CPAR</a> has been <strong>created</strong>
                                            <span>{{ \Carbon\Carbon::parse($cpar->created_at)->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                    {{--@foreach($newlyCreatedRevisionRequests as $revisionRequest)--}}
                                        {{--<div class="item item-blue">--}}
                                            {{--a new <a href="{{ route('revision-requests.show', $revisionRequest->id) }}">Revision Request--}}
                                            {{--{{ $revisionRequest->status == 'Appeal' ? 'Appeal' : '' }}</a> has been <strong>created</strong>--}}
                                            {{--<span>{{ \Carbon\Carbon::parse($revisionRequest->created_at)->diffForHumans() }}</span>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                               @else
                                   No new notifications available!
                               @endif
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="{{ url('js/plugins/morris/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/morris/morris.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            Morris.Bar({
                element: 'x-dashboard-line',
                data: [
                    { y: '2006', a: 100, b: 90, c:80 },
                    { y: '2007', a: 75,  b: 65, c:1 },
                    { y: '2008', a: 50,  b: 40, c:55 },
                    { y: '2009', a: 75,  b: 65, c:65 },
                    { y: '2010', a: 50,  b: 40, c:40 },
                    { y: '2011', a: 75,  b: 65, c:60 },
                    { y: '2012', a: 100, b: 90, c:95 },
                    { y: '2013', a: 100, b: 90, c:95 },
                    { y: '2014', a: 100, b: 90, c:95 },
                    { y: '2015', a: 100, b: 90, c:95 },
                    { y: '2016', a: 100, b: 90, c:95 },
                    { y: '2017', a: 100, b: 90, c:95 },
                    { y: '2018', a: 100, b: 90, c:95 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Series A', 'Series B', 'Series C'],
                resize: true,
                lineColors: ['#3FBAE4', '#FEA223', '#0277bd']
            });

            $('select[name="month"]').on('change', function(e) {
                var select = $(e.currentTarget)
                var week = $('#week')

                if(select.val() == '') {
                    week.hide()
                } else {
                    week.show()
                }
            })

            var selectFirstYear = $('select[name="firstYear"]')
            selectFirstYear.hide()
            $('select[name="start_year"]').on('change', function(e) {
                var year = $(e.currentTarget).val()
                var selectMonth = $('#month')


                if(year == 2000) {
                    selectMonth.hide()
                    selectFirstYear.show()
                } else {
                    selectMonth.show()
                    selectFirstYear.hide()
                }
            })
        });
    </script>
@endsection
