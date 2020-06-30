<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Pak Law Recorder - Home</title>
    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <script type="text/javascript" src="/jquery.backstretch.min.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="/Assets/CSS/style.css" rel="stylesheet" type="text/css">
    <link href="/Assets/CSS/home.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>

</head>
<body>
<div id="wrapper">
    <div id="head">
        <nav class="navbar-head-style">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand header-link" href="/"><img class="logo" src="/Assets/Icons/new-logo-2-plr.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
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
        <center>
            <form class="form-group" action="generalSearching" method="post">
                {{ csrf_field() }}
                <ul class="container-fluid list-inline">
                    <div class="row">
                        <div class="search-panel">
                            <div class="search-panel-data">
                                <p class="search-inst">Search across primary and secondary sources of law for the Legal System of Pakistan</p>
                                <div class="input-group">
                                    <input type="text" class="form-control search" aria-describedby="basic-addon2" name="freetext" required>
                                    <span class="input-group-btn"><button type="submit" class="btn btn-search"><span class="glyphicon glyphicon-search"></span>&nbsp;</button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </form>
        </center>
    </div>
    <div id="footer">
        <div class="footer-note">
            <h4 style="color: #36454F; line-height: 30px">Pak Law Recorder is a semantic legal research engine that aims to redefine the way legal research is done in Pakistan by shortening research times drastically<br></h4>
        </div>
        <div class="footer-links">
            <div class="row">
                <table class="footer-table-left table table-condensed">
                    <tr>
                        <td><a class="footer-link" href="#">Get in Touch &nbsp;</a> &bull;
                            <a class="footer-link" href="#">&nbsp; Get a Subscription &nbsp;</a>  &bull;
                            <a class="footer-link" href="#">&nbsp; Careers &nbsp;</a>  &bull;
                            <a class="footer-link" href="#">&nbsp; About Us &nbsp;</a>  &bull;
                            <a class="footer-link" href="#">&nbsp; User Guide</a></td>
                    </tr>
                    <tr><td><br><br></td></tr>
                    <tr>
                        <td>
                            Copyright Pak Law Recorder 2016. All rights reserved. &copy;
                        </td>
                    </tr>
                </table>
                <table class="footer-table-right table table-condensed">
                    <tr>
                        <td><a class="footer-link2" href="#"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="footer-link2" href="#"><i class="fa fa-linkedin"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="footer-link2" href="#"><i class="fa fa-twitter"></i></a></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>

                        <td><img src="../Assets/Icons/p9logo.png" class="footer-logo"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>