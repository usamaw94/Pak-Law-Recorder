<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Legislation Browse(title)</title>

    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="/Assets/CSS/legislationbrowse(title).css" rel="stylesheet" type="text/css">
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
                            <h4><a class="active-option" href="/legislationBrowseTitle">By Title</a></h4>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                            <h4><a href="/legislationBrowseYear">By Year</a></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 top-data">
                            <p id="titleLetter" style="display: none">{{ $sW }}</p>
                            <h5><b>
                                    <ul class="list-inline letter-list">
                                        <li><a class="a" href="/browseTitle/a/A">A</a></li>
                                        <li><a class="b" href="/browseTitle/b/B">B</a></li>
                                        <li><a class="c" href="/browseTitle/c/C">C</a></li>
                                        <li><a class="d" href="/browseTitle/d/D">D</a></li>
                                        <li><a class="e" href="/browseTitle/e/E">E</a></li>
                                        <li><a class="f" href="/browseTitle/f/F">F</a></li>
                                        <li><a class="g" href="/browseTitle/g/G">G</a></li>
                                        <li><a class="h" href="/browseTitle/h/H">H</a></li>
                                        <li><a class="i" href="/browseTitle/i/I">I</a></li>
                                        <li><a class="j" href="/browseTitle/j/J">J</a></li>
                                        <li><a class="k" href="/browseTitle/k/K">K</a></li>
                                        <li><a class="l" href="/browseTitle/l/L">L</a></li>
                                        <li><a class="m" href="/browseTitle/m/M">M</a></li>
                                        <li><a class="n" href="/browseTitle/n/N">N</a></li>
                                        <li><a class="o" href="/browseTitle/o/O">O</a></li>
                                        <li><a class="p" href="/browseTitle/p/P">P</a></li>
                                        <li><a class="q" href="/browseTitle/q/Q">Q</a></li>
                                        <li><a class="r" href="/browseTitle/r/R">R</a></li>
                                        <li><a class="s" href="/browseTitle/s/S">S</a></li>
                                        <li><a class="t" href="/browseTitle/t/T">T</a></li>
                                        <li><a class="u" href="/browseTitle/u/U">U</a></li>
                                        <li><a class="v" href="/browseTitle/v/V">V</a></li>
                                        <li><a class="w" href="/browseTitle/w/W">W</a></li>
                                        <li><a class="x" href="/browseTitle/x/X">X</a></li>
                                        <li><a class="y" href="/browseTitle/y/Y">Y</a></li>
                                        <li><a class="z" href="/browseTitle/z/Z">Z</a></li>
                                    </ul>
                                </b></h5>
                        </div>
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

<script>

    $(document).ready(function(){
        $letter =  $('#titleLetter').text();

        if($letter == 'a'){
            $('.a').addClass('active-alphabet');
        }
        else if($letter == 'b'){
            $('.b').addClass('active-alphabet');
        }
        else if($letter == 'c'){
            $('.c').addClass('active-alphabet');
        }
        else if($letter == 'd'){
            $('.d').addClass('active-alphabet');
        }
        else if($letter == 'e'){
            $('.e').addClass('active-alphabet');
        }
        else if($letter == 'f'){
            $('.f').addClass('active-alphabet');
        }
        else if($letter == 'g'){
            $('.g').addClass('active-alphabet');
        }
        else if($letter == 'h'){
            $('.h').addClass('active-alphabet');
        }
        else if($letter == 'i'){
            $('.i').addClass('active-alphabet');
        }
        else if($letter == 'j'){
            $('.j').addClass('active-alphabet');
        }
        else if($letter == 'k'){
            $('.k').addClass('active-alphabet');
        }
        else if($letter == 'l'){
            $('.l').addClass('active-alphabet');
        }
        else if($letter == 'm'){
            $('.m').addClass('active-alphabet');
        }
        else if($letter == 'n'){
            $('.n').addClass('active-alphabet');
        }
        else if($letter == 'o'){
            $('.o').addClass('active-alphabet');
        }
        else if($letter == 'p'){
            $('.p').addClass('active-alphabet');
        }
        else if($letter == 'q'){
            $('.r').addClass('active-alphabet');
        }
        else if($letter == 's'){
            $('.s').addClass('active-alphabet');
        }
        else if($letter == 't'){
            $('.t').addClass('active-alphabet');
        }
        else if($letter == 'u'){
            $('.u').addClass('active-alphabet');
        }
        else if($letter == 'w'){
            $('.w').addClass('active-alphabet');
        }
        else if($letter == 'x'){
            $('.x').addClass('active-alphabet');
        }
        else if($letter == 'y'){
            $('.y').addClass('active-alphabet');
        }
        else if($letter == 'z'){
            $('.z').addClass('active-alphabet');
        }
    })

</script>

</body>
</html>