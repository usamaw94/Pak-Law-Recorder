<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaselawController extends Controller
{
    public function search(){
        $li = DB::select('SELECT DISTINCT rfc FROM rfcs');

        return view('casesearch',compact('li'));
    }

    public function searching(Request $request){

        $freetext =  $request->freetext;
        $casetitle =  $request->casetitle;
        $keywords =  $request->keywords;
        $citation =  $request->citation;
        $period =  $request->period;
        $legal =  $request->legal;
        $arealaw =  $request->arealaw;
        $court =  $request->court;
        $bench =  $request->bench;
        $year =  $request->year;
        $counsel =  $request->counsel;
        $casescited =  $request->casescited;
        $sourcescited =  $request->sourcescited;

        $year = ltrim($year, ' ');

        if($period != ''){
            $currentYear = date("Y");

            $prevYear = $currentYear - $period;
        }

        if($period != '' && $legal == ''){

            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? AND (year BETWEEN ? AND ?)',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '1';


        } elseif($period == '' && $legal != ''){

//            $caselaw = DB::select('SELECT caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited
//            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ?',[$legal]);

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND caselaws.sourcescited LIKE ?',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$freetext."%","%".$casescited."%","%".$sourcescited."%"]);

            $type = '2';

        }elseif($period != '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.sourcescited LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND (caselaws.year BETWEEN ? AND ?)',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '3';

        } else{
            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ?',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%"]);

            $type = '4';
        }

        if($freetext == ''){
            $freetext = 'e';
        }
        if($casetitle == ''){
            $casetitle = 'e';
        }
        if($keywords == ''){
            $keywords = 'e';
        }
        if($citation == ''){
            $citation = 'e';
        }
        if($period == ''){
            $period = 'e';
        }
        if($legal == ''){
            $legal = 'e';
        }
        if($arealaw == ''){
            $arealaw = 'e';
        }
        if($court == ''){
            $court = 'e';
        }
        if($bench == ''){
            $bench = 'e';
        }
        if($year == ''){
            $year = 'e';
        }
        if($counsel == ''){
            $counsel = 'e';
        }
        if($casescited == ''){
            $casescited = 'e';
        }
        if($sourcescited == ''){
           $sourcescited = 'e';
        }

        $relevance = 'yes';
        $orderCourt = 'no';
        $orderDate = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freetext'  => $freetext,
            'casetitle'  => $casetitle,
            'keywords'  => $keywords,
            'citation'  => $citation,
            'period'  => $period,
            'legal'  => $legal,
            'arealaw'  => $arealaw,
            'court'  => $court,
            'bench'  => $bench,
            'year'  => $year,
            'counsel'  => $counsel,
            'casescited'  => $casescited,
            'sourcescited'  => $sourcescited,
            'type' => $type,

            'relevance'  => $relevance,
            'orderCourt'  => $orderCourt,
            'orderDate' => $orderDate,
            'alphabetical' => $alphabetical,
        );

        return view('caselawsearchresults',compact('caselaw'))->with($filters);

    }

    public function display($id){
        $caselaw = DB::select('SELECT * FROM caselaws WHERE id = ?', [$id]);

        $citation = $caselaw[0]->citation;

        $sources = DB::select('SELECT * FROM source_citeds WHERE citations = ?',[$citation]);

        $casesCited = DB::select('SELECT * FROM cases_citeds WHERE citation = ?',[$citation]);

        $caseCitings = DB::select('SELECT * FROM cases_citeds WHERE casecited = ?',[$citation]);

        $data = array(
            'caselaw'  => $caselaw,
            'sources'  => $sources,
            'casesCited' => $casesCited,
            'caseCitings' => $caseCitings,
        );

        return view('caselawsdisplay')->with($data);
    }

    public function orderByRelevance($freetext,$casetitle,$keywords,$citation,$period,$legal,$arealaw,$court,$bench,$year,$counsel,$casescited,$type,$sourcescited,$relevance,$orderCourt,$orderDate,$alphabetical){

        if($freetext == 'e'){
            $freetext = "";
        }
        if($casetitle == 'e'){
            $casetitle = "";
        }
        if($keywords == 'e'){
            $keywords = "";
        }
        if($citation == 'e'){
            $citation = "";
        }
        if($period == 'e'){
            $period = "";
        }
        if($legal == 'e'){
            $legal = "";
        }
        if($arealaw == 'e'){
            $arealaw = "";
        }
        if($court == 'e'){
            $court = "";
        }
        if($bench == 'e'){
            $bench = "";
        }
        if($year == 'e'){
            $year = "";
        }
        if($counsel == 'e'){
            $counsel = "";
        }
        if($casescited == 'e'){
            $casescited = "";
        }
        if($sourcescited == 'e'){
            $sourcescited = "";
        }

        $year = ltrim($year, ' ');

        if($period != ''){
            $currentYear = date("Y");

            $prevYear = $currentYear - $period;
        }

        if($period != '' && $legal == ''){

            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? AND (year BETWEEN ? AND ?)',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '1';


        } elseif($period == '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND caselaws.sourcescited LIKE ?',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$freetext."%","%".$casescited."%","%".$sourcescited."%"]);

            $type = '2';

        }elseif($period != '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.sourcescited LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND (caselaws.year BETWEEN ? AND ?)',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '3';

        } else{
            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ?',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%"]);

            $type = '4';
        }

        if($freetext == ''){
            $freetext = 'e';
        }
        if($casetitle == ''){
            $casetitle = 'e';
        }
        if($keywords == ''){
            $keywords = 'e';
        }
        if($citation == ''){
            $citation = 'e';
        }
        if($period == ''){
            $period = 'e';
        }
        if($legal == ''){
            $legal = 'e';
        }
        if($arealaw == ''){
            $arealaw = 'e';
        }
        if($court == ''){
            $court = 'e';
        }
        if($bench == ''){
            $bench = 'e';
        }
        if($year == ''){
            $year = 'e';
        }
        if($counsel == ''){
            $counsel = 'e';
        }
        if($casescited == ''){
            $casescited = 'e';
        }
        if($sourcescited == ''){
            $sourcescited = 'e';
        }

        $relevance = 'yes';
        $orderCourt = 'no';
        $orderDate = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freetext'  => $freetext,
            'casetitle'  => $casetitle,
            'keywords'  => $keywords,
            'citation'  => $citation,
            'period'  => $period,
            'legal'  => $legal,
            'arealaw'  => $arealaw,
            'court'  => $court,
            'bench'  => $bench,
            'year'  => $year,
            'counsel'  => $counsel,
            'casescited'  => $casescited,
            'sourcescited'  => $sourcescited,
            'type' => $type,

            'relevance'  => $relevance,
            'orderCourt'  => $orderCourt,
            'orderDate' => $orderDate,
            'alphabetical' => $alphabetical,
        );

        return  view('caselawsearchresults',compact('caselaw'))->with($filters);

    }

    public function orderByDate($freetext,$casetitle,$keywords,$citation,$period,$legal,$arealaw,$court,$bench,$year,$counsel,$casescited,$type,$sourcescited,$relevance,$orderCourt,$orderDate,$alphabetical){

        if($freetext == 'e'){
            $freetext = "";
        }
        if($casetitle == 'e'){
            $casetitle = "";
        }
        if($keywords == 'e'){
            $keywords = "";
        }
        if($citation == 'e'){
            $citation = "";
        }
        if($period == 'e'){
            $period = "";
        }
        if($legal == 'e'){
            $legal = "";
        }
        if($arealaw == 'e'){
            $arealaw = "";
        }
        if($court == 'e'){
            $court = "";
        }
        if($bench == 'e'){
            $bench = "";
        }
        if($year == 'e'){
            $year = "";
        }
        if($counsel == 'e'){
            $counsel = "";
        }
        if($casescited == 'e'){
            $casescited = "";
        }
        if($sourcescited == 'e'){
            $sourcescited = "";
        }

        $year = ltrim($year, ' ');

        if($period != ''){
            $currentYear = date("Y");

            $prevYear = $currentYear - $period;
        }

        if($period != '' && $legal == ''){

            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? AND (year BETWEEN ? AND ?) ORDER BY year DESC',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '1';


        } elseif($period == '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND caselaws.sourcescited LIKE ?  ORDER BY caselaws.year DESC',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$freetext."%","%".$casescited."%","%".$sourcescited."%"]);

            $type = '2';

        }elseif($period != '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.sourcescited LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND (caselaws.year BETWEEN ? AND ?) ORDER BY caselaws.year DESC',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '3';

        } else{
            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? ORDER BY year DESC',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%"]);

            $type = '4';
        }

        if($freetext == ''){
            $freetext = 'e';
        }
        if($casetitle == ''){
            $casetitle = 'e';
        }
        if($keywords == ''){
            $keywords = 'e';
        }
        if($citation == ''){
            $citation = 'e';
        }
        if($period == ''){
            $period = 'e';
        }
        if($legal == ''){
            $legal = 'e';
        }
        if($arealaw == ''){
            $arealaw = 'e';
        }
        if($court == ''){
            $court = 'e';
        }
        if($bench == ''){
            $bench = 'e';
        }
        if($year == ''){
            $year = 'e';
        }
        if($counsel == ''){
            $counsel = 'e';
        }
        if($casescited == ''){
            $casescited = 'e';
        }
        if($sourcescited == ''){
            $sourcescited = 'e';
        }

        $relevance = 'no';
        $orderCourt = 'no';
        $orderDate = 'yes';
        $alphabetical = 'no';

        $filters = array(
            'freetext'  => $freetext,
            'casetitle'  => $casetitle,
            'keywords'  => $keywords,
            'citation'  => $citation,
            'period'  => $period,
            'legal'  => $legal,
            'arealaw'  => $arealaw,
            'court'  => $court,
            'bench'  => $bench,
            'year'  => $year,
            'counsel'  => $counsel,
            'casescited'  => $casescited,
            'sourcescited'  => $sourcescited,
            'type' => $type,

            'relevance'  => $relevance,
            'orderCourt'  => $orderCourt,
            'orderDate' => $orderDate,
            'alphabetical' => $alphabetical,
        );

        return  view('caselawsearchresults',compact('caselaw'))->with($filters);

    }

    public function orderByAlphabet($freetext,$casetitle,$keywords,$citation,$period,$legal,$arealaw,$court,$bench,$year,$counsel,$casescited,$type,$sourcescited,$relevance,$orderCourt,$orderDate,$alphabetical){


        if($freetext == 'e'){
            $freetext = "";
        }
        if($casetitle == 'e'){
            $casetitle = "";
        }
        if($keywords == 'e'){
            $keywords = "";
        }
        if($citation == 'e'){
            $citation = "";
        }
        if($period == 'e'){
            $period = "";
        }
        if($legal == 'e'){
            $legal = "";
        }
        if($arealaw == 'e'){
            $arealaw = "";
        }
        if($court == 'e'){
            $court = "";
        }
        if($bench == 'e'){
            $bench = "";
        }
        if($year == 'e'){
            $year = "";
        }
        if($counsel == 'e'){
            $counsel = "";
        }
        if($casescited == 'e'){
            $casescited = "";
        }
        if($sourcescited == 'e'){
            $sourcescited = "";
        }

        $year = ltrim($year, ' ');

        if($period != ''){
            $currentYear = date("Y");

            $prevYear = $currentYear - $period;
        }

        if($period != '' && $legal == ''){

            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? AND (year BETWEEN ? AND ?) ORDER BY title ASC',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '1';


        } elseif($period == '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND caselaws.sourcescited LIKE ?  ORDER BY caselaws.title ASC',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$freetext."%","%".$casescited."%","%".$sourcescited."%"]);

            $type = '2';

        }elseif($period != '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.sourcescited LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND (caselaws.year BETWEEN ? AND ?) ORDER BY caselaws.title ASC',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '3';

        } else{
            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? ORDER BY title ASC',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%"]);

            $type = '4';
        }

        if($freetext == ''){
            $freetext = 'e';
        }
        if($casetitle == ''){
            $casetitle = 'e';
        }
        if($keywords == ''){
            $keywords = 'e';
        }
        if($citation == ''){
            $citation = 'e';
        }
        if($period == ''){
            $period = 'e';
        }
        if($legal == ''){
            $legal = 'e';
        }
        if($arealaw == ''){
            $arealaw = 'e';
        }
        if($court == ''){
            $court = 'e';
        }
        if($bench == ''){
            $bench = 'e';
        }
        if($year == ''){
            $year = 'e';
        }
        if($counsel == ''){
            $counsel = 'e';
        }
        if($casescited == ''){
            $casescited = 'e';
        }
        if($sourcescited == ''){
            $sourcescited = 'e';
        }

        $relevance = 'no';
        $orderCourt = 'no';
        $orderDate = 'no';
        $alphabetical = 'yes';

        $filters = array(
            'freetext'  => $freetext,
            'casetitle'  => $casetitle,
            'keywords'  => $keywords,
            'citation'  => $citation,
            'period'  => $period,
            'legal'  => $legal,
            'arealaw'  => $arealaw,
            'court'  => $court,
            'bench'  => $bench,
            'year'  => $year,
            'counsel'  => $counsel,
            'casescited'  => $casescited,
            'sourcescited'  => $sourcescited,
            'type' => $type,

            'relevance'  => $relevance,
            'orderCourt'  => $orderCourt,
            'orderDate' => $orderDate,
            'alphabetical' => $alphabetical,
        );

        return  view('caselawsearchresults',compact('caselaw'))->with($filters);

    }

    public function orderByCourt($freetext,$casetitle,$keywords,$citation,$period,$legal,$arealaw,$court,$bench,$year,$counsel,$casescited,$type,$sourcescited,$relevance,$orderCourt,$orderDate,$alphabetical){


        if($freetext == 'e'){
            $freetext = "";
        }
        if($casetitle == 'e'){
            $casetitle = "";
        }
        if($keywords == 'e'){
            $keywords = "";
        }
        if($citation == 'e'){
            $citation = "";
        }
        if($period == 'e'){
            $period = "";
        }
        if($legal == 'e'){
            $legal = "";
        }
        if($arealaw == 'e'){
            $arealaw = "";
        }
        if($court == 'e'){
            $court = "";
        }
        if($bench == 'e'){
            $bench = "";
        }
        if($year == 'e'){
            $year = "";
        }
        if($counsel == 'e'){
            $counsel = "";
        }
        if($casescited == 'e'){
            $casescited = "";
        }
        if($sourcescited == 'e'){
            $sourcescited = "";
        }

        $year = ltrim($year, ' ');

        if($period != ''){
            $currentYear = date("Y");

            $prevYear = $currentYear - $period;
        }

        if($period != '' && $legal == ''){

            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ? AND (year BETWEEN ? AND ?)
            ORDER BY CASE
            WHEN court LIKE "%Supreme Court%" THEN 1
            WHEN court LIKE "%High Court%" THEN 2
            ELSE 3
            END',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '1';


        } elseif($period == '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND caselaws.sourcescited LIKE ?
            ORDER BY CASE
            WHEN court LIKE "%Supreme Court" THEN 1
            WHEN court LIKE "%Lahore High Court%" THEN 2
            WHEN court LIKE "%Islamabad High Court%" THEN 3
            WHEN court LIKE "%Sindh High Court%" THEN 4
            WHEN court LIKE "%Karachi High Court%" THEN 5
            WHEN court LIKE "%Balochistan High Court%" THEN 6
            WHEN court LIKE "%Quetta High Court%" THEN 7
            WHEN court LIKE "%Peshawar High Court%" THEN 8
            WHEN court LIKE "%Supreme Court Azad Jammu and Kashmir%" THEN 9
            WHEN court LIKE "%High Court Azad Jammu and Kashmir%" THEN 10
            ELSE 11
            END',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$freetext."%","%".$casescited."%","%".$sourcescited."%"]);

            $type = '2';

        }elseif($period != '' && $legal != ''){

            $caselaw = DB::select('SELECT caselaws.id , caselaws.citation , caselaws.title , caselaws.court , caselaws.bench , caselaws.date , caselaws.year , caselaws.lawyers , caselaws.areaoflaw , caselaws.keywords , caselaws.sourcescited , caselaws.text , caselaws.casescited , caselaws.file_name
            FROM caselaws INNER JOIN rfcs ON rfcs.citation LIKE caselaws.citation AND rfcs.rfc = ? AND caselaws.citation LIKE ? AND caselaws.title LIKE ? AND caselaws.court LIKE ? AND caselaws.bench LIKE ? AND caselaws.year LIKE ? AND caselaws.lawyers LIKE ? AND caselaws.areaoflaw LIKE ? AND caselaws.keywords LIKE ? AND caselaws.sourcescited LIKE ? AND caselaws.text LIKE ? AND caselaws.casescited LIKE ? AND (caselaws.year BETWEEN ? AND ?)
            ORDER BY CASE
            WHEN court LIKE "%Supreme Court%" THEN 1
            WHEN court LIKE "%High Court%" THEN 2
            ELSE 3
            END',
                [$legal,"%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%",$prevYear,$currentYear]);

            $type = '3';

        } else{
            $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? AND title LIKE ? AND court LIKE ? AND bench LIKE ? AND year LIKE ? AND lawyers LIKE ? AND areaoflaw LIKE ? AND keywords LIKE ? AND sourcescited LIKE ? AND text LIKE ? AND casescited LIKE ?
            ORDER BY CASE
            WHEN court LIKE "%Supreme Court%" THEN 1
            WHEN court LIKE "%High Court%" THEN 2
            ELSE 3
            END',
                ["%".$citation."%","%".$casetitle."%","%".$court."%","%".$bench."%","%".$year."%","%".$counsel."%","%".$arealaw."%","%".$keywords."%","%".$sourcescited."%","%".$freetext."%","%".$casescited."%"]);

            $type = '4';
        }

        if($freetext == ''){
            $freetext = 'e';
        }
        if($casetitle == ''){
            $casetitle = 'e';
        }
        if($keywords == ''){
            $keywords = 'e';
        }
        if($citation == ''){
            $citation = 'e';
        }
        if($period == ''){
            $period = 'e';
        }
        if($legal == ''){
            $legal = 'e';
        }
        if($arealaw == ''){
            $arealaw = 'e';
        }
        if($court == ''){
            $court = 'e';
        }
        if($bench == ''){
            $bench = 'e';
        }
        if($year == ''){
            $year = 'e';
        }
        if($counsel == ''){
            $counsel = 'e';
        }
        if($casescited == ''){
            $casescited = 'e';
        }
        if($sourcescited == ''){
            $sourcescited = 'e';
        }

        $relevance = 'no';
        $orderCourt = 'yes';
        $orderDate = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freetext'  => $freetext,
            'casetitle'  => $casetitle,
            'keywords'  => $keywords,
            'citation'  => $citation,
            'period'  => $period,
            'legal'  => $legal,
            'arealaw'  => $arealaw,
            'court'  => $court,
            'bench'  => $bench,
            'year'  => $year,
            'counsel'  => $counsel,
            'casescited'  => $casescited,
            'sourcescited'  => $sourcescited,
            'type' => $type,

            'relevance'  => $relevance,
            'orderCourt'  => $orderCourt,
            'orderDate' => $orderDate,
            'alphabetical' => $alphabetical,
        );

        return  view('caselawsearchresults',compact('caselaw'))->with($filters);

    }

    public function browse(){
        $caselaw = DB::select('SELECT * FROM caselaws ORDER BY title ASC');

        return view('caselawbrowse',compact('caselaw'));
    }

    public function sourceCited($leg){


        $legFile = DB::select('SELECT * FROM legislations WHERE title LIKE ?',["%".$leg."%"]);

        if(!$legFile){
            dd('file not found');
        }

        $path = public_path().'/documents/Legislation/'.$legFile[0]->file_name;

        return response()->file($path);
    }

    public function caseCited($case){

        $citedCase = DB::select('SELECT * FROM caselaws WHERE citation LIKE ?',["%".$case."%"]);

        if(!$citedCase){
            dd('Case not found');
        }

        $data = array(
            'citedCase' => $citedCase,
        );

        return view('citedCase')->with($data);
    }

    public function caseCiting($case){

        $citingCase = DB::select('SELECT * FROM caselaws WHERE citation LIKE ?',["%".$case."%"]);

        if(!$citingCase){
            dd('Case not found');
        }

        $data = array(
            'citedCase' => $citingCase,
        );

        return view('citedCase')->with($data);
    }
}
