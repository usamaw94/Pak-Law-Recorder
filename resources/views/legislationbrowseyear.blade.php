<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Legislation Browse(year)</title>

    <link rel='shortcut icon' href='../Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="../Assets/JS/jquerygen.js"></script>
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../Assets/JS/datepicker.js"></script>
    <link href="../Assets/CSS/datepicker.css" rel="stylesheet"/>

    <link href="../Assets/CSS/legislationbrowse(year).css" rel="stylesheet" type="text/css">
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="list-unstyled">
                            <a class="left-link" href="/legislationSearch" ><li class="left-list"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search</li></a>
                            <a class="left-link" href="/legislationBrowseTitle" ><li class="left-list list-active"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Browse</li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right-content">
                <div class="source-container container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="right-content-heading">Legislation Browse</h3>
                            <hr class="right-content-seperator">
                        </div>
                    </div>
                    {{--<div class="row search-bar-container">--}}
                        {{--<div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10">--}}
                            {{--<input class="search-bar form-control" type="text" placeholder="Search within results">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="row">
                        <div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 col-md-3 col-sm-3 col-lg-3 col-xs-3">
                            <h4><a href="/legislationBrowseTitle">By Title</a></h4>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                            <h4><a class="active-option" href="/legislationBrowseYear">By Year</a></h4>
                        </div>
                    </div>
                    <div class="row year-search">
                        <div class="date-labl col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-md-2 col-sm-2 col-lg-2">
                            <label class="control-label date-label">Select Year:</label>
                        </div>
                        <form action="/browseYear" method="post">
                            {{ csrf_field() }}
                            <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                <div class="input-append date input-group">
                                    <input type="text" class="form-control search-bar" name="year" required>
                                <span class="add-on">
                                </span>
                                    <span class = "input-group-addon"><button type="submit" class="btn submit-search"><span class="glyphicon glyphicon-search"></span></button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled">
                                @foreach($leg as $d)

                                    <li><a href="{{ asset('/documents/Legislation/'.$d->file_name) }}" target="_blank">{{ $d->title }}, {{ $d->year }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    jQuery('.input-append.date').datepicker({
        orientation: "top auto",
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years",
        minViewMode: "years"
    });
</script>