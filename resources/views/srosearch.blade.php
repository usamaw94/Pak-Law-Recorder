<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>SRO - Search</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/srosearch.css" rel="stylesheet" type="text/css">
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
                    <li class="active"><a class="sub-menu-link" href="/sroSearch">SRO's</a></li>
                    <li><a class="sub-menu-link" href="/generalSearch">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content"></div>

            <div class="right-content">
                <div class="right-inner-content container-fluid">
                    <form action="sroSearching" method="post">
                        {{ csrf_field() }}
                        <div class="sro-search-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="right-content-heading">SRO Search</h3>
                                    <hr class="right-content-seperator">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Free Text</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="freeText" class="form-control sro-search-form">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Issuing authority</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="issuingAuthority" class="form-control sro-search-form">
                                        <option value="FBR">FBR</option>
                                        <option value="SECP">SECP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Title</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="title" class="form-control sro-search-form" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Reference Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="refNo" class="form-control sro-search-form" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label">Year</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="year" class="form-control sro-search-form" type="number">
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