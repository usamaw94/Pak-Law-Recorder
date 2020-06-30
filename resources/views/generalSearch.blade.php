<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel='shortcut icon' href='../Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="../Assets/JS/jquerygen.js"></script>
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="../Assets/CSS/Shared.css" rel="stylesheet" type="text/css">
    <link href="../Assets/CSS/generalsearch.css" rel="stylesheet" type="text/css">
    <title>General Search</title>
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
                    <li><a class="sub-menu-link" href="/legislationSearch">Legislation</a></li>
                    <li><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li class="active"><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content">
            </div>
            <div class="right-content">
                <div class="right-inner-content container-fluid">
                    <form action="generalSearching" method="post">
                        {{ csrf_field() }}
                        <div class="form-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="right-content-heading">General Search</h3>
                                    <hr class="right-content-seperator">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Free Text Search</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control search-form" rows="4" name="freetext" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-3 col-md-10">
                                    Searches within all sources of Law. Might take slightly longer.
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