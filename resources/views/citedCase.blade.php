<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Cited Case</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/Shared.css" rel="stylesheet" type="text/css">
    <link href="/Assets/CSS/caselawdisplay.css" rel="stylesheet" type="text/css">

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
        <div id="content">
            <div class="left-content">
                <div class="list-container container-fluid">
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--<h3 class="left-heading">Sources Cited</h3>--}}
                            {{--<ul class="list-unstyled">--}}
                                {{--@foreach($sources as $s)--}}
                                    {{--<a href="/sourceCited/{{ $s->legislation }}" target="_blank" class="left-link"><li class="left-list">{{ $s->soucecited }}</li></a>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--<h3 class="left-heading">Cases Cited</h3>--}}
                            {{--<ul class="list-unstyled">--}}
                                {{--@foreach($casesCited as $cc)--}}
                                    {{--<a href="/caseCited/{{ $cc->casecited }}" target="_blank" class="left-link"><li class="left-list">{{ $cc->casecited }}</li></a>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--<h3 class="left-heading">Case Citings</h3>--}}
                            {{--<ul class="list-unstyled">--}}
                                {{--<a href="#" class="left-link"><li class="left-list">1992 SCMR 201</li></a>--}}
                                {{--<a href="#" class="left-link"><li class="left-list">1994 CLC 190</li></a>--}}
                                {{--<a href="#" class="left-link"><li class="left-list">PLD 1994 lAHORE 159</li></a>--}}
                                {{--<a href="#" class="left-link"><li class="left-list">1994 SCMR 1900</li></a>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="right-content">
                <div class="right-data-container container-fluid">
                    <div class="right-heading-content">
                        <div class="row">
                            <div class="col-md-offset-10 col-md-2">
                                <a href="{{ asset('/documents/Caselaw/'.$citedCase[0]->file_name) }}" download="{{ $citedCase[0]->title }}.pdf"><button class="btn btn-download"><span class="glyphicon glyphicon-download"></span>&nbsp;&nbsp;Download</button></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="text-align: center">{{ $citedCase[0]->title }}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p>COURT</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">{{ $citedCase[0]->court }}</p>
                            </div>
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">CITATION</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    {{ $citedCase[0]->citation }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">JUDGE(S)</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    {{ $citedCase[0]->bench }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">COUNSEL</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    {{ $citedCase[0]->lawyers }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">DATE</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    {{ $citedCase[0]->date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Keywords and Issues</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="right-data">
                                    {{ $citedCase[0]->keywords }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="right-main-content">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="right-data">
                                    <pre style="font-family: Arial;
                                     font-size : 16px;
                                     white-space: pre-wrap;
                                     white-space: -moz-pre-wrap;
                                     white-space: -o-pre-wrap;
                                     word-wrap: break-word;">
                                    {{ $citedCase[0]->text }}</pre>
                                </p>
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