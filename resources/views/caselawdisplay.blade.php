<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Case Law Results - Display</title>

    <link rel='shortcut icon' href='../Assets/icons/plr-favicon.png' type='image/x-icon'>
    <script src="../Assets/JS/jquerygen.js"></script>
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link href="../Assets/CSS/Shared.css" rel="stylesheet" type="text/css">
    <link href="../Assets/CSS/caselawdisplay.css" rel="stylesheet" type="text/css">

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
                    <li class="active"><a class="sub-menu-link" href="#">Cases</a></li>
                    <li><a class="sub-menu-link" href="#">Legislation</a></li>
                    <li><a class="sub-menu-link" href="#">SRO's</a></li>
                    <li><a class="sub-menu-link" href="#">General</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="left-content">
                <div class="list-container container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="left-heading">Sources Cited</h3>
                            <ul class="list-unstyled">
                             <?php foreach($dataview as $datasource){
                                   
                                    $sourcescited=  explode("|", $datasource['sourcescited']);
                                    $sources= explode(",", $sourcescited[0]);
                                    foreach($sources as $source){
                                    ?>   
                                
                                
                                <a href="#" class="left-link"><li class="left-list"><?php echo $source ?></li></a>
<!--                                <a href="#" class="left-link"><li class="left-list">Section 13 of the West Pakistan Urban Rent Restriction Ordinance 1959</li></a>
                                <a href="#" class="left-link"><li class="left-list">Section 10(2) of the Sindh Rented Premises Oridinance 1979</li></a>
                                <a href="#" class="left-link"><li class="left-list">Section 10(3) of the Sindh Rented Premises Oridinance 1979</li></a>
                                <a href="#" class="left-link"><li class="left-list">Setion 10(4) of the Sindh Rented Premises Ordinance 1979</li></a>-->
                                    <?php }
                                    
                                    }?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="left-heading">Cases Cited</h3>
                            <ul class="list-unstyled">
                                <?php foreach($dataview as $data){
                                   
                                    $casescited=  explode(",", $data['casescited']);
                                    
                                    foreach($casescited as $cited){
                                    ?>
                                <a href="/display?citation=<?php echo $cited; ?>" class="left-link"><li class="left-list"><?php echo $cited;?></li></a>
<!--                                <a href="#" class="left-link"><li class="left-list">1994 SCMR 1900</li></a>
                                <a href="#" class="left-link"><li class="left-list">1994 SCMR 1900</li></a>
                                <a href="#" class="left-link"><li class="left-list">1994 SCMR 1900</li></a>
                                <a href="#" class="left-link"><li class="left-list">PLD 1990 Supreme Court 681</li></a>
                                <a href="#" class="left-link"><li class="left-list">PLD 1990 Supreme Court 681</li></a>
                                <a href="#" class="left-link"><li class="left-list">PLD 1990 Supreme Court 681</li></a>
                                <a href="#" class="left-link"><li class="left-list">PLD 1990 Supreme Court 681</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>
                                <a href="#" class="left-link"><li class="left-list">1991 CLC 203</li></a>-->
                                    <?php }
                                    
                                    }?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="left-heading">Case Citings</h3>
                            <ul class="list-unstyled">
                                <a href="#" class="left-link"><li class="left-list">1992 SCMR 201</li></a>
                                <a href="#" class="left-link"><li class="left-list">1994 CLC 190</li></a>
                                <a href="#" class="left-link"><li class="left-list">PLD 1994 lAHORE 159</li></a>
                                <a href="#" class="left-link"><li class="left-list">1994 SCMR 1900</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-content">
                <div class="right-data-container container-fluid">
                    <div class="right-heading-content">
                        <div class="row">
                            <div class="col-md-offset-10 col-md-2">
                                <button class="btn btn-download"><span class="glyphicon glyphicon-download"></span>&nbsp;&nbsp;Download</button>
                            </div>
                        </div>
                        
                        <?php foreach($dataview as $view){?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="text-align: center"><?php echo $view['title'];?></h3>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p>COURT</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data"><?php echo $view['court'];?></p>
                            </div>
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">CITATION</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    <?php echo $view['citation'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">JUDGE(S)</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    <?php echo $view['bench'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">PRESENT</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    <?php $lawyers=explode("|",$view['lawyers']); 
                                    $j=1;
                                            for($i=0;$i<sizeof($lawyers);$i++){
                                                
                                                echo "<strong>Party $j</strong>".":".$lawyers[$i]."<br>";
                                                
                                                $j++;
                                            }
                                            
                                            ?>
<!--                                Party 1 : K.A. Wahab<br>
                                Party 2 : Hafeez Ahmed<br>
                                Party 3 : xyz-->
                                
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 right-heading">
                                <p class="right-heading">DATE</p>
                            </div>
                            <div class="col-md-5">
                                <p class="right-data">
                                    <?php echo $view['date'];?></p>
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
                                    <?php echo $view['keywords'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="right-main-content">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="right-data">
                                    <!--Civil Petition No.349-K of 2014-->
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    <strong>JUDGMENT</strong>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="right-data">
<!--                                    1. The petitioner seeks leave to assail the judgment dated 28th August 2014 whereby a learned Single Judge of the High Court of Sindh had set aside the judgment dated 31st May 2005 of the 1st Rent Controller, Karachi West and order in appeal dated 16th March 2007 of the IIIrd Additional District Judge, Karachi West.<br><br>
                                    2. The respondent No.1 is a family owned private limited company ("the Company") and had filed an ejectment application under section 15 of the Sindh Rented Premises Ordinance, 1979 ("the Ordinance") on the ground of default and personal need against the petitioner, who was a tenant of an area of 3,050 square yards or 0.63 acre of Plot No. E-13, Sindh Industrial Trade Estate, Karachi admeasuring 1.96 acre.<br><br>
                                    On the matter of default it was alleged that the petitioner without any cause filed a miscellaneous rent case and started depositing the monthly rent therein from January 1988 despite the fact that the Company did not decline to receive rent and had executed a rent receipt in respect of payment of rent up to December 1987 on 10th October, 1987. It was further contended that the petitioner belatedly deposited rent in respect of certain months and that the rent deposited by the petitioner fell considerably below the rent that was due to the Company.<br><br>
                                    3. On behalf of the Company its Chief Executive Mr. Hafeez Ahmed filed his affidavit-in-evidence and was cross-examined thereon. The petitioner filed his affidavit-in-evidence on behalf of the tenant/opponent and was cross-examined thereon. On the issue of depositing rent in court and default the following from the affidavit-in-¬evidence of the Company's Chief Executive is relevant:<br><br>
                                    "The Company/landlord did not refuse to accept the monthly rent from the opponent, on any occasion. The opponent did not tender monthly rent by money order, before filing of MRC No.1316/87, as such the opponent committed wilful default in payment of monthly rent, since January, 1988 to the landlord. The landlord suffered prejudice, by such unwarranted practice of the opponent, paying of monthly rent directly 'in MRC, which tender is against law and amounts to default on the part of the opponent."<br><br>
                                    "...the opponent also committed default in payment of monthly rent in Court. The opponent did not deposit the monthly rent of March 1992, March 1993 and April 1994. Monthly rent of January 1995 was not deposited within due time and also did not deposit monthly rent of May 1995. There is also default in depositing of monthly rent for other months, which was not deposited and from July 2003 to December 2003. There is also default in depositing of monthly rent for other months, therefore, the opponent is chronic defaulter, hence, liable to be ejected from the demised premises. Copy of the advance rent receipt, pertaining to payment of rent of the months of October, November and December 1987, issued on 10-10-1987, after accepting advance rent from October to December 1987 is exhibited as Exh.-A/3. Report from the COC of the Court of IIIrd Rent Controller West, Karachi may be perused, for ascertaining the facts of default in depositing monthly rent under Ledger No.71/87, MRC No.1316/87 (Muhammad Amin Lasania v. M/s. Ilyas Marine (Pvt.) Ltd.)."<br><br>
                                    And with regard to the plea of personal need the following paragraph is relevant:<br><br>
                                    "That the demised premises are required to the applicant for establishing its own business on whole plot No. E-13, SITE., West Karachi, as the Company has no other premises, for running its business, in full-fledge, so the demised premises are required to the applicant bonafidely, for its own business."<br><br>
                                    The cross-examination of Mr. Hafeez Ahmed mostly pertained to earlier litigation between the parties. With regard to the aforesaid matters the following is relevant:<br><br>
                                    "It is incorrect that opponent never defaulted in payment of rent neither had never sent me any cheque nor had never sent any money order. It is incorrect to suggest that I am not in personal need of case premises, in fact I am one [sic] old son, my son was married and I want to put him for some work. I have to put two of my sons in this case premises. My other son is not me director in the Company. But I make him director as soon as our premises back. I have not [sic] any efforts to install electricity and gas on the premises which is my possession because the foundation all the connection is lying in the rented premises to opponent and for getting the facility of rent of the plot. I have to start work for getting connection as new. Iron rolling mill will start in Rs. twenty lacs or twenty five lacs. I am in need of entire plot for starting my new work. It is incorrect that my present case is based on mala fide intention. At the moment I am doing no any work. It is incorrect to suggest that I do not have money to start my new business. It is incorrect to suggest that I am in need of only 3000 to 4000 land to start new rolling mills."<br><br>
                                    It is to be noted that on both the grounds on which ejectment was sought, i.e. default and personal need, the Company succeeded to sustain its version of facts. We, therefore, need to turn to the petitioner's evidence to examine whether it managed to dislodge the Company's contentions. In this regard the following cross-examination of the tenant is relevant:<br><br>
                                    "It is incorrect that Hafeez never refused to accept the rent. It is correct that I have not mentioned in my W/S nor affidavit the date on which applicant has refused to accept rent. Vol. says but it was 21st. It is correct that I have not mentioned in my affidavit nor in my W/S this date was 21st. It is correct that I have not tendered the rent through money order because at that time applicant has created such law and order situation that I had to take protection. It is correct that I have not mentioned about such situation neither in my W/S nor in my affidavit in evidence. It is incorrect to suggest that there never exist any .law and order situation on case plot because 151 cases were registered, against both the parties in police station site. It is correct I have not mentioned in my affidavit in evidence but I have produce (sic) in this evidence the time/date on which the rent was due. It is correct that we filed MRC 1316/87 on 19-12-1987. I am deposing because you have shown me MRC upon which the date is mentioned. There is no other MRC filed by me. It is incorrect that I have not deposited rent. regularly, March, 1992, July, 1992. It is incorrect that I have not deposited rent on court for the period of month of March, 1992, July, 1992, March, 1993, April, 1994, Jan., 1995, May, 1995 from July, 2003 to Dec., 2003. It is correct that I have not filed any rent receipt for this period."<br><br>
                                    4. The learned Rent Controller framed the following Issues:-<br><br>
                                    (1) Whether present ejectment application is not maintainable?<br><br>
                                    (2) Whether the opponent committed wilful default in payment of monthly rent w.e.f. January, 1988 onwards?<br><br>
                                    (3) Whether the applicant requires the demise premises for personal use in good faith?<br><br>
                                    (4) What should the order be?"<br><br>
                                    In deciding Issues Nos. 1 and 2 the learned Rent Controller held that the application was filed on 30th January 2003 whereas the default was stated to have occurred from January 1988, therefore, as the recovery of rent had become time barred the application was not maintainable and in coming to this conclusion reliance was placed upon the case reported as Asghari Begum v. BajiDubash (1991 CLC 203). On Issue No.3 the learned Rent Controller was persuaded by the fact that the Company had in its possession sufficient land and earlier an attempt was made to sell the said plot which indicated that there was no intention to utilize the same by the Company. The learned IIIrd Additional District Judge upheld the judgment in appeal. However, the High Court accepted the plea of the Company on both the grounds, i.e. default and personal need.<br><br>
                                    5. Mr. K. A. Wahab, learned counsel for the petitioner stated that the two concurrent findings did not call for any interference by the High Court in its constitutional jurisdiction. He further stated that neither the plea of default nor that of personal need had been established by the Company.<br><br>
                                    6. The first question for determination is, whether a tenant can straightaway deposit the rent in a miscellaneous rent case despite the fact that there has been no refusal or avoidance by the landlord to receive rent? The answer to this query is found in subsections (2) and (3) of section 10 of the Ordinance, which provisions are respectively reproduced hereunder:<br><br>
                                    "(2) The rent shall, as far as may be, be paid to the landlord, who shall acknowledge receipt thereof in writing.<br><br>
                                    (3) Where the landlord has refused or avoided to accept the rent, it may be sent to him by postal money order or, be deposited with the Controller within whose jurisdiction the premises is situated."<br><br>
                                    The rent therefore is required to be tendered to the landlord and only if he refuses or avoids to receive the same can it be sent to him by postal money order or be deposited with the Rent Controller within whose jurisdiction the premises are located. Admittedly, the rent for the months of October, November and December, 1987 was paid to the Company and the Chief Executive of the Company on the Company's, letter-head had executed the receipt dated 10th October, 1987, therefore, it is not understandable why the petitioner started to deposit rent with the Rent Controller for the month of January 1988 onwards. Significantly, it was not even urged by the tenant that the Company had refused to receive the rent or avoided to do so. A landlord who is willing to receive rent should not be made to suffer unnecessarily and suffer he would if he has to go to court, for withdrawal of rent which would undoubtedly take up his time.<br><br>
                                    7. That as regards the question of 'default' the learned Rent Controller and the Appellate Court misconstrued the law, that, as the period of limitation to recover rent had expired, therefore, an application on the ground of 'default' is not maintainable. In the case of PervaizAkhtar v. The Additional District Judge, Rawalpindi (PLD 1990 SC 681), which was decided on 17th March 1990, this court inter alia held, as under:<br><br>
                                    "The recovery of rent and eviction of tenant are two distinct cases. It is a different matter that a landlord cannot recover the amount due to lapse of time but the liability would not be extinguished. An action to recover rent in a Court of law may not be available but eviction of tenant on the ground of default will still be available to the landlord. The contention that an eviction application is not entertainable on the ground of default of time-barred rent cannot be accepted. A tenant is entitled to retain possession of a premises on certain conditions including the payment of rent. Once it is established that he has defaulted in the payment of rent, he loses his right to occupy the premises. The word "default" connotes an element of negligence and failure of the tenant to fulfil his obligation under the law."<br><br>
                                    The learned Rent Controller had relied upon the case of Asghari Begum (above), which was heard on 19th August 1990, wherein a learned single judge of the High Court of Sindh had held that if the rent for the period had become time barred it could not be ecovered and an application under section 15 of the Ordinance on the ground of default could not be maintained under the law. The learned judge of Sindh High Court in the case of Asghari Begum overlooked the principles enunciated by this Court in PervaizAkhtar's case (above) which was subsequently followed in the case of Badruddin v. Muhammad Yousuf (1994 SCMR 1900). The As bialin case was wrongly decided and does not accord with the Ordinance, which in respect of 'default' simply states that, "the tenant has failed to pay rent" and, it is important to note the distinction, whether or not the rent was legally recoverable. To hold otherwise would mean, that, if a tenant is a chronic defaultei who has not paid rent for years he cannot be evicted on the ground of failure to pay rent, but a tenant whose default is less than three years can be proceeded against. Moreover, the legislature had consciously envisaged the eviction of a tenant, despite the fact that recovery of rent may have become time ( barred, as the word "due" used in section 13 of the earlier law, i.e. section 13 of the West Pakistan Urban Rent Restriction Ordinance, 1959, was omitted from the Sindh Rented Premises Ordinance, 1979.<br><br>
                                    8. The Company had led evidence with regard to default and also mentioned the specific months in respect whereof default had occurred and was not confronted with any proof of timely tender of rent. The tenant was also put specific questions on failure to tender rent in respect of specific months, but he simply denied the allegation. The burden of establishing the timely payment of rent lay upon the tenant which he failed to discharge. The tenant could also have availed of the benefit of subsection (4) of section 10 of the Ordinance by producing receipts of the deposit of rent under the miscellaneous rent case, but this too was not done. Consequently, the case of default stood established against the tenant. In addition, in paragraph seven (7) of the constitution petition filed before the Hon'ble High Court.the Company had stated that the tenant had committed a default for 28 .months and had not paid the amount of eighty four thousand rupees which worked out to the rent for such period. The petition was filed on 21st May 2007 and the impugned order is dated 28th August 2014, but despite this interregnum no counter affidavit to the petition was filed, thereby the only presumption that can be drawn is that the said allegation was true.<br><br>
                                    9. That as regards the question of the requirement of the Company for use of the property for its own use, the Chief Executive had asserted the need of the Company which was not dislodged in his cross-examination. The mere fact that the Company had the remaining portion of the said plot in its possession was not sufficient to establish that it did not need the entire property. The earlier attempt to sell the property could also not in itself dislodge the plea of personal need, since the Company can decide not to sell it if it did not get reasonable price for it or for any other reason and decide to utilize the same for its own purpose. Consequently, the Company in our opinion had also established its case on the ground of personal need.<br><br>
                                    10. That since both the courts below had misapplied the law of 'default' and had either not read the evidence or misconstrued it and as both the grounds on which ejectment was sought (default and personal need) had been established the High Court had rightly invoked the constitutional jurisdiction by setting aside their judgments and allowing the constitutional petition. In the above circumstances no case for leave to appeal is made out. Consequently, this petition is dismissed and leave is refused.<br><br>-->
                                <?php echo $view['text'];?>   

                                </p>
                                <?php } ?>
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