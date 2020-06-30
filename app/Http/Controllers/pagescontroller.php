<?php

namespace App\Http\Controllers;

use App\caselaw;
use App\rfc;
use carbon\carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

DB::enableQueryLog();

class pagescontroller extends Controller {

    function search() {
        $datalegal = rfc::select('rfc')->distinct()->orderby('rfc')->get();

        return view('casesearch', compact('datalegal'));
    }

    function display(Request $request) {
        $dataview1 = caselaw::query();
        $dataview1->where('citation', '=', urldecode($request['citation']));
        $dataview = $dataview1->get();
//       dd(DB::getQueryLog()); 

        return view('caselawdisplay', compact('dataview'));
    }

    function searchresult(Request $request) {
        $freetext = $request['freetext'];
        $keywords = $request['keywords'];
        $areaoflaw = $request['arealaw'];
        $court = $request['court'];
        $bench = $request['bench'];
        $cit=$request['citation'];
        $today = carbon::now();
        $date = $today->subYears($request['period']);
//       DB::enableQueryLog();
//       $queries = DB::getQueryLog();
//       print_r($queries);
//        if (!empty($request['order'])) {
//            if ($request['order'] == "relevance") {
//                $data = caselaw::query()->orderby('citation', 'asc');
//            } else {
//                $data = caselaw::query()->orderby($request['order'], 'asc');
//            }
//        } else {
            $data = caselaw::query();
//        }
        if (!empty($request['casetitle']) && !empty($freetext) && !empty($keywords) && !empty($request['citation']) && !empty($request['date'] && !empty($request['legal']) && !empty($request['arealaw']) && !empty($request['court']) && !empty($request['bench']) && !empty($request['sourcescited']) && !empty($request['casescited']) && !empty($request['period']) && !empty($request['year']))) {
            $data->join('rfc', 'caselaw.citation', '=', 'rfc.citation')->where([[DB::raw('LOWER(title)'), '=', $request['casetitle']], [DB::raw('LOWER(text)'), 'LIKE', '%' . $freetext . '%'], [DB::raw('LOWER(keywords)'), 'LIKE', '%' . $keywords . '%'], [DB::raw('LOWER(citation)'), 'LIKE', '%' . $request['citation'] . '%'], ['rfc.rfc', '=', $request['legal']], [DB::raw('LOWER(areaoflaw)'), 'LIKE', '%' . $areaoflaw . '%'], [DB::raw('LOWER(court)'), 'LIKE', '%' . $request['court'] . '%'], [DB::raw('LOWER(bench)'), 'LIKE', '%' . $bench . '%'], [DB::raw('LOWER(sourcescited)'), 'LIKE', '%' . $request['sourcescited'] . '%'], [DB::raw('LOWER(casescited)'), 'LIKE', '%' . $request['casescited'] . '%'], ['date', '>=', Carbon::now()->subYears($request['period'])], ['date', '=', $request['year']]])->get();
        }if (!empty($request['casetitle'])) {
            $data->where([[DB::raw('LOWER(title)'), 'LIKE', '%' . strtolower($request['casetitle']) . '%']]);
        }if (!empty($freetext)) {


            $qry = "match(citation,journaltitle,title,court,bench,lawyers,areaoflaw,keywords,sourcescited,text,casescited) against('$freetext' IN BOOLEAN MODE)";

//            $data = caselaw::where([[DB::raw('LOWER(text)'), 'LIKE', '%' . $freetext . '%']])->get();
            $data->whereRaw($qry);
        }if (!empty($keywords)) {
            $data->where([[DB::raw('LOWER(keywords)'), 'LIKE', '%' . strtolower($keywords) . '%']]);
        }if (!empty($request['citation'])) {

            $citation = explode(" ", $request['citation']);
            foreach ($citation as $citations) {

                $qry = "LOWER(citation) like '%" . strtolower($citations) . "%'";
                $data->whereRaw($qry);
            }
//            $data=caselaw::whereRaw($qry)->get();
//            $data = caselaw::where([[DB::raw('LOWER(citation)'), 'LIKE', '%' . strtolower($citation) . '%']])->get();
        } if (!empty($request['period'])) {
            $data->where('date', '>=', Carbon::now()->subYears($request['period']));
        } if (!empty($request['legal'])) {
            $data->leftjoin('rfc', 'caselaw.citation', '=', 'rfc.citation')->where([['rfc.rfc', '=', $request['legal']]]);
        } if (!empty($request['arealaw'])) {
            $data->where([['areaoflaw', 'LIKE', '%' . $areaoflaw . '%']]);
        } if (!empty($request['court'])) {
            $data->where([[DB::raw('LOWER(court)'), '=', strtolower($request['court'])]]);
        } if (!empty($request['bench'])) {
            $bench = explode(" ", $request['bench']);
            foreach ($bench as $benches) {
                $qry = "LOWER(bench) like '%" . strtolower($benches) . "%'";
                $data->whereRaw($qry);
            }

//            $data = caselaw::where([[DB::raw('LOWER(bench)'), 'LIKE', '%' . $bench . '%']])->get();
        }if (!empty($request['sourcescited'])) {
            $data->where([[DB::raw('LOWER(sourcescited)'), 'LIKE', '%' . $request['sourcescited'] . '%']]);
        }if (!empty($request['casescited'])) {
            $data->where([[DB::raw('LOWER(casescited)'), 'LIKE', '%' . $request['casescited'] . '%']]);
        }if (!empty($request['year'])) {
            $data->where([['date', '=', $request['year']]]);
        }if (!empty($request['counsel'])) {
            $counsel = explode(" ", $request['counsel']);
            foreach ($counsel as $lawyers) {
                $qry = "LOWER(lawyers) like '%" . strtolower($lawyers) . "%'";
                $data->whereRaw($qry);
            }


//            $data = caselaw::where([[DB::raw('LOWER(bench)'), 'LIKE', '%' . $bench . '%']])->get();
        }
        

 if (!empty($request['order'])) {
            if ($request['order'] == "relevance") {
                $result = $data->orderby('citation','asc')->get();
            } else {
                $result = $data->orderby($request['order'],'asc')->get();
            }
        }
        else{
        $result = $data->get();
        
        }
//       dd(DB::getQueryLog());

        if (!empty($result)) {
            return view('casesearchresult', compact('result'));
        } else {
            return view('casesearchresulterror');
        }
    }

}
