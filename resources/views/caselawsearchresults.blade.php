<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Case Law - Search Results</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/caselawsearchresults.css" rel="stylesheet" type="text/css">
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
                    <li class="active"><a class="sub-menu-link" href="/caseLaw">Cases</a></li>
                    <li><a class="sub-menu-link" href="/legislationSearch">Legislation</a></li>
                    <li><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        {{--<p><br><br><br><br><br>{{$freetext}},{{$casetitle}},{{$keywords}},{{$citation}},{{$period}}--}}
        {{--,{{$legal}},{{$arealaw}},{{$court}},{{$bench}},{{$year}},{{$counsel}},{{$casescited}},{{$type}},--}}

        {{--,{{$sourcescited}},{{$relevance}},{{$orderCourt}},{{$orderDate}},{{$alphabetical}}</p>--}}

        <div id="content">
            <div class="left-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="list-unstyled">
                            <a class="left-link" href="/caseOrderByRelevance/{{$freetext}}/{{$casetitle}}/{{$keywords}}/{{$citation}}/{{$period}}/{{$legal}}/{{$arealaw}}/{{$court}}/{{$bench}}/{{$year}}/{{$counsel}}/{{$casescited}}/{{$type}}/{{$sourcescited}}/{{$relevance}}/{{$orderCourt}}/{{$orderDate}}/{{$alphabetical}}" >
                                @if($relevance == "yes")
                                    <li class="left-list list-active">Relevance</li>
                                @elseif($relevance == "no")
                                    <li class="left-list">Relevance</li>
                                @endif
                            </a>
                            <a class="left-link" href="/caseOrderByCourt/{{$freetext}}/{{$casetitle}}/{{$keywords}}/{{$citation}}/{{$period}}/{{$legal}}/{{$arealaw}}/{{$court}}/{{$bench}}/{{$year}}/{{$counsel}}/{{$casescited}}/{{$type}}/{{$sourcescited}}/{{$relevance}}/{{$orderCourt}}/{{$orderDate}}/{{$alphabetical}}" >
                                @if($orderCourt == "yes")
                                    <li class="left-list list-active">Court</li>
                                @elseif($orderCourt == "no")
                                    <li class="left-list">Court</li>
                                @endif
                            </a>
                            <a class="left-link" href="/caseOrderByDate/{{$freetext}}/{{$casetitle}}/{{$keywords}}/{{$citation}}/{{$period}}/{{$legal}}/{{$arealaw}}/{{$court}}/{{$bench}}/{{$year}}/{{$counsel}}/{{$casescited}}/{{$type}}/{{$sourcescited}}/{{$relevance}}/{{$orderCourt}}/{{$orderDate}}/{{$alphabetical}}" >
                                @if($orderDate == "yes")
                                    <li class="left-list list-active">Date</li>
                                @elseif($orderDate == "no")
                                    <li class="left-list">Date</li>
                                @endif
                            </a>
                            <a class="left-link" href="/caseOrderByAlphabet/{{$freetext}}/{{$casetitle}}/{{$keywords}}/{{$citation}}/{{$period}}/{{$legal}}/{{$arealaw}}/{{$court}}/{{$bench}}/{{$year}}/{{$counsel}}/{{$casescited}}/{{$type}}/{{$sourcescited}}/{{$relevance}}/{{$orderCourt}}/{{$orderDate}}/{{$alphabetical}}" >
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
        </div>
        <div class="right-content">
            <div class="details-container container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="right-content-heading">Case Law Search Results</h3>
                        <hr class="right-content-seperator">
                    </div>
                </div>

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
                        {{--<p> {{ $cl->file_name }}</p>--}}
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <p><b>Date:</b> {{ $cl->date }}<br>
                                <a href="/caselawdisplay/{{ $cl->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="{{ asset('/documents/Caselaw/'.$cl->file_name) }}" download="{{ $cl->title }}.pdf">Download</a></p>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>