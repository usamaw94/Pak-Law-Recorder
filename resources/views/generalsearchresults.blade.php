<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>General Search Results</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/generalsearchresults.css" rel="stylesheet" type="text/css">
    <link href="/Assets/CSS/Shared.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="wrapper">
    <div id="head">
        <nav class="navbar-head-style">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#headerLinks">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand header-link" href="/"><img class="logo" src="/Assets/Icons/new-logo-2-plr.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="headerLinks">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="header-link" href="#">About Us</a></li>
                        <li><a class="header-link" href="#">Get In Touch</a></li>
                        <li><a class="header-link" href="#">User Guide</a></li>
                        <li><a class="header-link" href="#">Login/Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="main-content">
        <div class="container-fluid sub-menu">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle sub-menu-toggle" data-toggle="collapse" data-target="#subMenu">
                    <span class="sub-menu-bar"></span>
                    <span class="sub-menu-bar"></span>
                    <span class="sub-menu-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="subMenu">
                <ul class="nav nav-tabs nav-justified">
                    <li><a class="sub-menu-link" href="/caseLaw">Cases</a></li>
                    <li><a class="sub-menu-link" href="/legislationSearch">Legislation</a></li>
                    <li><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li class="active"><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="list-unstyled">
                            <a class="left-link" href="/generalOrderByRelevance/{{$text}}" >
                                @if($relevance == "yes")
                                    <li class="left-list list-active">Relevance</li>
                                @elseif($relevance == "no")
                                    <li class="left-list">Relevance</li>
                                @endif
                            </a>
                            <a class="left-link" href="/generalOrderByCourt/{{$text}}" >
                                @if($court == "yes")
                                    <li class="left-list list-active">Court <sub>(for caselaws)</sub></li>
                                @elseif($court == "no")
                                    <li class="left-list">Court <sub>(for caselaws)</sub></li>
                                @endif
                            </a>
                            <a class="left-link" href="/generalOrderByYear/{{$text}}" >
                                @if($year == "yes")
                                    <li class="left-list list-active">Year</li>
                                @elseif($year == "no")
                                    <li class="left-list">Year</li>
                                @endif
                            </a>
                            <a class="left-link" href="/generalOrderByAlphabets/{{$text}}" >
                                @if($alphabetical == "yes")
                                    <li class="left-list list-active">Alphabetical</li>
                                @elseif($alphabetical == "no")
                                    <li class="left-list">Alphabetical</li>
                                @endif
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right-content container-fluid">
                <div class="details-container">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#legislation">Legislation</a></li>
                        <li><a data-toggle="pill" href="#caselaw">Case Law</a></li>
                        <li><a data-toggle="pill" href="#sros">SRO's</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="legislation" class="tab-pane fade in active">
                            <div class="leg-searchresult container-fluid">
                                @foreach($leg as  $l)
                                <div class="results">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <h4>{{$l->title}}, {{ $l->year }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <a href="{{ asset('/documents/Legislation/'.$l->file_name) }}" target="_blank">View</a>&nbsp;&nbsp;&nbsp;<a href="{{ asset('/documents/Legislation/'.$l->file_name) }}" download="{{$l->title}}">Download</a></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="caselaw" class="tab-pane fade">
                            <div class="case-details container-fluid">
                                @foreach($caselaw as $cl)

                                    <div class="case">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                                <h4>{{ $cl->title }}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <p><b>Court:</b> {{ $cl->court }}<br>
                                                    <b>Equivalent Citation:</b> {{ $cl->citation }}</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <p><b>Date:</b> {{ $cl->date }}<br>
                                                    <a href="/caselawdisplay/{{ $cl->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="{{ asset('/documents/Caselaw/'.$cl->file_name) }}" download="{{ $cl->title }}.pdf">Download</a></p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div id="sros" class="tab-pane fade">
                            <div class="sro-searchresult container-fluid">
                                @foreach($sro as $s)
                                    <div class="results">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                                                <h4>{{ $s->title }}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <p><b>Issuing Authority :</b> {{ $s->issuing_authority }}<br>
                                                    <b>Reference No : </b> {{ $s->reference }}</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <p><b>Year : </b> {{ $s->year }}<br>
                                                    {{--{{ $s->id }}--}}
                                                    <a href="{{ asset('/documents/SRO/'.$s->file_name) }}" target="_blank">View</a>&nbsp;&nbsp;&nbsp;<a href="{{ asset('/documents/SRO/'.$s->file_name) }}" download="{{ $s->title }}">Download</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>