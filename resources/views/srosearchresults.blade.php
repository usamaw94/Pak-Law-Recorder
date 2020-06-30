<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>SRO - Search Results</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/srosearchresults.css" rel="stylesheet" type="text/css">
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
                    <li class="active"><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="list-unstyled">
                            <a class="left-link" href="/sroResultsByRelevance/{{$freeText}}/{{$title}}/{{$year}}/{{$ref}}/{{$iA}}" >
                                @if($relevance == 'yes')
                                    <li class="left-list list-active">Relevance</li>
                                @else
                                    <li class="left-list">Relevance</li>
                                @endif
                            </a>
                            <a class="left-link" href="/sroResultsByAlphabets/{{$freeText}}/{{$title}}/{{$year}}/{{$ref}}/{{$iA}}" >
                                @if($alphabetical == 'yes')
                                    <li class="left-list list-active">Alphabetical</li>
                                @else
                                    <li class="left-list">Alphabetical</li>
                                @endif
                            </a>
                            <a class="left-link" href="/sroResultsByYear/{{$freeText}}/{{$title}}/{{$year}}/{{$ref}}/{{$iA}}" >
                                @if($orderYear == 'yes')
                                    <li class="left-list list-active">Year</li>
                                @else
                                    <li class="left-list">Year</li>
                                @endif
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right-content">
                <div class="sro-searchresult container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="right-content-heading">SRO Search Results</h3>
                            <hr class="right-content-seperator">
                        </div>
                    </div>
                    {{--<div class="row search-bar-container">--}}
                        {{--<div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10">--}}
                            {{--<input class="search-bar form-control" type="text" placeholder="Search within results">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<p>{{ $alphabetical }}</p>--}}
                    {{--<p>{{ $orderYear }}</p>--}}

                    {{--<p>{{$freeText}}</p>--}}
                    {{--<p>{{$title}}</p>--}}
                    {{--<p>{{$year}}</p>--}}
                    {{--<p>{{$ref}}</p>--}}
                    {{--<p>{{$iA}}</p>--}}

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

</body>
</html>