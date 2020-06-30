<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Legislation - Search</title>

    <link rel='shortcut icon' href='../Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="../Assets/JS/jquerygen.js"></script>
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="../Assets/CSS/legislationsearch.css" rel="stylesheet" type="text/css">
    <link href="../Assets/CSS/Shared.css" rel="stylesheet" type="text/css">

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
                    <a class="navbar-brand header-link" href="/"><img class="logo" src="../Assets/Icons/new-logo-2-plr.png"></a>
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
                    <li class="active"><a class="sub-menu-link" href="/legislationSearch">Legislation</a></li>
                    <li><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content">
                <div class="list-container container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="list-unstyled">
                                <a class="left-link" href="/legislationSearch" ><li class="left-list list-active"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search</li></a>
                                <a class="left-link" href="/legislationBrowseTitle" ><li class="left-list"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Browse</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-content" style="overflow-x: hidden">
                <div class="right-inner-content container-fluid">
                    <form action="legislationSearching" method="post">
                        {{csrf_field()}}
                        <div class="leg-search-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="right-content-heading">Legislation Search</h3>
                                    <hr class="right-content-seperator">
                                </div>
                            </div>
                            {{--<div class="row">--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<label class="control-label">Version</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<input type="radio" name="version">Current--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<input type="radio" name="version">Historical--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Free Text</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="free_text" class="form-control leg-search-form">
                                </div>
                                <div class="col-md-offset-3 col-md-8">
                                    @if ($errors->has('free_text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('free_text') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Title</label>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control leg-search-form" type="text" name="title">
                                </div>
                                <div class="col-md-offset-3 col-md-12">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Year</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control leg-search-form" type="number" name="year">
                                </div>
                                <div class="col-md-offset-3 col-md-12">
                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Provision Number</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control leg-search-form">
                                        <option>Section</option>
                                        <option>Part</option>
                                        <option>Rule</option>
                                        <option>Article</option>
                                        <option>Schedule</option>
                                        <option>Regulation</option>
                                        <option>Chapter</option>
                                        <option>Order</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control leg-search-form" type="number" name="provision_number">
                                </div>
                                <div class="col-md-offset-3 col-md-12">
                                    @if ($errors->has('provision_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('provision_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-7 col-md-5">
                                    E.g., Enter 1 for Section 1
                                </div>
                            </div>
                        </div>
                        <div class="row search-cont">
                            <div class="col-md-offset-9 col-md-3">
                                <button type="submit" class="search-btn"><span class="glyphicon glyphicon-search"></span>&nbsp; Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>