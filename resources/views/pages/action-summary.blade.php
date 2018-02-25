
<style type="text/css">
    body{
        font-size:9pt;
        font-family:Calibri;
    }

    .footer div{
        font-family:Arial;
        font-size:5pt;
    }

    .tbl-info tbody tr td{
        font-size:11pt;
        padding: 10px;
    }

    .tbl-terms tr td{
        font-size:9pt;
    }

    .tbl-addlinfo tr td{
        font-size:11pt;
        margin:0;
        line-height:1.0;
    }

    .footer div{
        font-family:Arial;
        font-size:5pt;
    }

    .footer, .header{
        display:none;
    }

    @media  print{
        body {
            height: 100%;
        }

        .header{
            display: block;
            position: fixed;
            height: 100px;
        }

        .footer{
            display: block;
            width:100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        label {
            font-weight: bold;
        }

        p {
            text-align: justify;
        }

        tr {
            page-break-inside:avoid;
            page-break-after:auto
        }

        table {
            page-break-inside:auto
        }

        @page  {
            margin-top: 70px;
            margin-left: 5mm;
            margin-right: 5mm;
            margin-bottom: 70px;
        }
    }
</style>

<body>
    {{--<div class="header">--}}
        {{--<img style="width:35%; float:left;" src="{{ url('img/newsim_logo.jpg') }}"/>--}}

        {{--<div style="float:right; width:65%; padding-top:5px;">--}}

        {{--<span style="font-size:14pt; font-family:Arial; font-weight:bold;">NEW SIMULATOR CENTER OF THE PHILIPPINES, INC.</span><br/>--}}

        {{--<span style="font-size:9pt; font-family:Arial; font-style:italic;">The Preferred Training and Assessment Center</span>--}}

        {{--</div>--}}

        {{--<img style="width:100%; height:10%; margin-top: 5px;" src="{{ url('img/newsim_line_bar.png') }}" />--}}
    {{--</div>--}}

    <div style="width:100%; padding: auto;">
        <div style="text-align:right; font-size:12pt; font-weight:normal; margin-bottom:7px; width: 97%;"><p style="font-size: 25px; margin: 0px; text-align: right;">CPAR # {{ $cpar->cpar_number }}</p></div>
        <table class="tbl-info" style="width:90%; margin: auto;">
            <tbody>
            <tr>
                <td style="width:50%;">
                    <div>
                        <label>Person Reporting</label> <br>
                        {{ $reporting->first_name . ' ' . $reporting->last_name }} <br>
                        {{ $reporting->branch }} <br>
                        {{ $reporting->department }} <br>
                        {{ $reporting->position }}
                    </div>
                </td>

                <td style="width:50%;">
                    <div>
                        <label>Person Reporting</label> <br>
                        {{ $responsible->first_name . ' ' . $responsible->last_name }} <br>
                        {{ $responsible->branch }} <br>
                        {{ $responsible->department }} <br>
                        {{ $responsible->position }}
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="tbl-info next-page" style="width:100%; margin-bottom: 10px;">
            <tbody>
            <tr>
                <td colspan="100%">
                    <div style="float: left">
                        <label>Date Created</label> : {{ \Carbon\Carbon::parse($cpar->created_at)->toFormattedDateString() }}
                    </div>
                    <div style="float: right">
                        <label>Severity</label> : {!! $cpar->severity !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Details</label> : <p>{{ $cpar->details }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Source</label> : {{ $cpar->source }} <br><br>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Other Source</label> : <p>{{ $cpar->other_source }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Correction</label> : <p>{{ $cpar->correction }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Root Cause</label> : <p>{{ $cpar->root_cause }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Corrective/Preventive Action</label> : <p>{{ $cpar->cp_action }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>CPAR Acceptance</label> : <p>{{ $cpar->cpar_acceptance }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <div style="float: left">
                        <label>Proposed Date</label> : {{ \Carbon\Carbon::parse($cpar->proposed_date)->toFormattedDateString() }}
                    </div>
                    <div style="float: right">
                        <label>Date Completed</label> : {{ \Carbon\Carbon::parse($cpar->date_completed)->toFormattedDateString() }}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <div style="float: left">
                        <label>Proposed Confirmed</label> : {{ \Carbon\Carbon::parse($cpar->date_confirmed)->toFormattedDateString() }}
                    </div>
                    <div style="float: right">
                        <label>Date Accepted</label> : {{ \Carbon\Carbon::parse($cpar->date_accepted)->toFormattedDateString() }}
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Result</label> : <p>{{ $cpar->result }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label>Department Head</label> : {{ $chief->first_name . ' ' . $chief->last_name }}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <div style="float: right">
                        <img src="{{ url('img/sample_signature.gif') }}" height="50" width="100" /> <br>
                        <u><label>{{ $cpar->verified_by }}</label></u> <br>
                        &nbsp;&nbsp;&nbsp;Verified By
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="" style="text-align:left;">
            NSCPi-QM-006-07/10July2015
        </div>
    </div>


    {{--<div class="footer" style="height:100px;">--}}
        {{--<img style="width:100%; height:10%;" src="{{ url('img/newsim_line_bar.png') }}"/>--}}
        {{--<div style="width:2.5%; float:left;">&nbsp;</div>--}}
        {{--<div style="width:80%; float:left;">--}}
            {{--<div style="width:100%; margin-top:7px;">--}}
            {{--<div style="width:21%; float:left;">--}}
            {{--<b>NEWSIM EDISON</b><br/>--}}
            {{--5F 2053 Bldg. Edison St.<br/>--}}
            {{--Brgy. San Isidro, Makati City 1234<br/>--}}
            {{--<b>Tel #:</b> (02) 8432864--}}
            {{--</div>--}}

            {{--<div style="width:22%; float:left;">--}}
            {{--<b>NEWSIM TRAINING ACADEMY</b><br/>--}}
            {{--Monte Vista Beach Resort<br/>--}}
            {{--Brgy.Bignay 2 Sariaya Quezon 4322<br/>--}}
            {{--<b>Tel #</b>: 2451195 or 8884544--}}
            {{--</div>--}}

            {{--<div style="width:22%; float:left;">--}}
            {{--<b>NEWSIM BACOLOD</b><br/>--}}
            {{--3F LKC Bldg. Locsin-Burgos St.<br/>--}}
            {{--Brgy. 11 Bacolod City 6100<br/>--}}
            {{--<b>Tel #:</b> (034) 4350701--}}
            {{--</div>--}}

            {{--<div style="width:35%; float:left;">--}}
            {{--<b>NEWSIM DAVAO</b><br/>--}}
            {{--3F Court View Hotel, Pink Walters Bldg, Quimpo Blvd.<br/>--}}
            {{--Matina Davao City 8000<br/>--}}
            {{--<b>Tel #:</b> (082) 2850224; +63 (915) 1084078--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<br/><br/><br/><br/>--}}

            {{--<div style="width:100%; margin-top:7px;">--}}
            {{--<div style="width:21%; float:left;">--}}
            {{--<b>NEWSIM MARCONI</b><br/>--}}
            {{--2323 NEWSIM Bldg. Marconi St.<br/>--}}
            {{--Brgy. San Isidro, Makati City 1234<br/>--}}
            {{--<b>Tel #:</b> (02) 8882764<br/>--}}
            {{--<b>Fax #:</b> (02) 8872759--}}
            {{--</div>--}}

            {{--<div style="width:22%; float:left;">--}}
            {{--<b>NEWSIM ILOILO</b><br/>--}}
            {{--2F 402 Arguelles Bldg. E. Lopez St.<br/>--}}
            {{--Jaro, Iloilo City 5000<br/>--}}
            {{--<b>Tel #:</b> (033) 3203776--}}
            {{--</div>--}}

            {{--<div style="width:22%; float:left;">--}}
            {{--<b>NEWSIM CEBU</b><br/>--}}
            {{--6F 731 Bldg. Escario St.<br/>--}}
            {{--Brgy. Capitol Site, Cebu City 6000<br/>--}}
            {{--<b>Tel #:</b> (032) 5203141 or 5203747<br/>--}}
            {{--+63 (917) 6294142--}}
            {{--</div>--}}

            {{--<div style="width:35%; float:left;">--}}
            {{--<b>NEWSIM CEBU Annex</b>             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Website:</b> www.newsim.ph<br/>--}}
            {{--3F Capitol Square, Escario St.       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>E-mail:</b> info@newsim.ph<br/>--}}
            {{--Brgy. Capitol Site, Cebu City 6000<br/>--}}
            {{--<b>Tel #:</b> (032) 5203141 or 5203747<br/>--}}
            {{--+63 (917) 6294142--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div style="width:15%; float:right;">--}}
            {{--<br/><br/>--}}
            {{--<img style="width:60%;"  src="{{ url('img/footer_logos.png') }}" />--}}
        {{--</div>--}}
    {{--</div>--}}

</body>
<script type="text/javascript" src="{{ url('js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(function(){window.print();});
</script>
