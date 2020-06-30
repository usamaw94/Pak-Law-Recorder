<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel='shortcut icon' href='/Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="/Assets/JS/jquerygen.js"></script>
    <link href="/Assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Assets/JS/datepicker.js"></script>
    <link href="/Assets/CSS/datepicker.css" rel="stylesheet"/>
    <script src="/Assets/JS/caselawsearch.js" type="text/javascript"></script>
    <link href="/Assets/CSS/Shared.css" rel="stylesheet" type="text/css">
    <link href="/Assets/CSS/caselawsearch.css" rel="stylesheet" type="text/css">
    <link href="/css/select2.min.css" rel="stylesheet" type="text/css">
    <script src="/js/select2.full.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});

    
    </script>
    <title>Case Law Search</title>
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
        <nav class="container-fluid sub-menu">
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
        </nav>
        <div id="content">
            <div class="left-content">
                <div class="list-container container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="list-unstyled">
                                <a class="left-link" href="/caseLaw" ><li class="left-list list-active"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search</li></a>
                                <a class="left-link" href="/caselawBrowse" ><li class="left-list"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Browse</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-content">
                <div class="right-inner-content container-fluid">
                <form action="caseLawSearch" method="post">

                    {{ csrf_field() }}
                <div class="form-container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="right-content-heading">Case Law Search</h3>
                                <hr class="right-content-seperator">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Free Text</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control search-form" type="text" name="freetext">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-3">
                                <input type="checkbox" name="termscontext">
                                Terms in context
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Case Title</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control  search-form" type="text" name="casetitle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Keywords</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control  search-form" rows="3" name="keywords"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Citation</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control  search-form" type="text" name="citation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Period</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control search-form" name="period">
                                    <option value="">None</option>
                                    <option value="5">Last 5 years</option>
                                    <option value="10">Last 10 years</option>
                                    <option value="15">Last 15 years</option>
                                    <option value="20">Last 20 years</option>
                                    <option value="30">More than 20 years</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="btna col-md-offset-3 col-md-3">
                                <div id="adv-btn" class="advance-btn">Advance Search &nbsp;<span class="glyphicon glyphicon-chevron-down"></span></div>
                            </div>
                        </div>

                <div id="advance-form-cont">
                        <div class="row" style="padding-bottom: 50px">
                            <div class="col-md-3">
                                <label class="control-label"><strong>Legal Issues</strong></label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control search-form js-example-basic-single" name="legal" style="width: 555px">
                                    <option value=""> None</option>
                                        @foreach($li as $l)
                                            <option value="{{$l->rfc}}">{{$l->rfc}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Area of Law</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control search-form" name="arealaw">
                                <option value="">None</option>
                                <option value="Criminal">Criminal</option>
                                <option value="Civil">Civil</option>
                                <option value="Constitutional">Constitutional</option>
                                <option value="Corporate and Commercial">Corporate and Commercial</option>
                                <option value="Property">Property</option>
                                <option value="Family">Family</option>
                                <option value="Intellectual Property">Intellectual Property</option>
                                <option value="Cyber">Cyber</option>
                                <option value="Banking">Banking</option>
                                <option value="Labour and Services">Labour and Services</option>
                                <option value="Islamic">Islamic</option>
                                <option value="Elections and Politics">Elections and Politics</option>
                                <option value="Education">Education</option>
                                <option value="Consumer">Consumer</option>
                                <option value="International">International</option>
                                <option value="Taxation">Taxation</option>
                                <option value="Alternate dispute resolution">Alternate Dispute Resolution</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Court</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control search-form" name="court">
                                    <option value="">None</option>
                                    <option value="Supreme Court Pakistan">Supreme Court of Pakistan</option>
                                    <option value="Lahore high court">Lahore High Court</option>
                                    <option value="Sindh high court">Sindh High Court</option>
                                    <option value="Peshawar high court">Peshawar High Court</option>
                                    <option value="Quetta high court">Quetta High Court</option>
                                    <option value="Islamabad high court">Islamabad High Court</option>
                                    <option value="Supreme Court Azad Jammu and Kashmir">Supreme Court Azad Jammu and Kashmir</option>
                                    <option value="Federal shariat court">Federal Shariat Court</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Bench</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control search-form" type="text" name="bench">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Year</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-append date input-group" style="width: 100%">
                                    <input type="text" class="form-control search-bar" name="year">
                                    <span class="add-on"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Counsel</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control search-form" type="text" name="counsel">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Case Cited (Citation)</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control search-form" type="text" name="casescited">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Legislation Cited</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control search-form" type="text" name="sourcescited">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Provision Number</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control search-form">
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
                                <input class="form-control search-form" type="text">
                            </div>
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
<script>
    jQuery('.input-append.date').datepicker({
        orientation: "top auto",
        format: "yyyy", // Notice the Extra space at the beginning
        viewMode: "years",
        minViewMode: "years"
    });
</script>
