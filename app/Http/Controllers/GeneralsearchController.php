<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralsearchController extends Controller
{
    public function home(){
        return view('generalSearch');
    }

    public function searching(Request $request){
        $text = $request->freetext;

        $relevance = 'yes';
        $court = 'no';
        $year = 'no';
        $alphabetical = 'no';

        $filters = array(
            'text'  => $text,
            'relevance' => $relevance,
            'court' => $court,
            'year' => $year,
            'alphabetical' => $alphabetical,
        );

        $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? OR title LIKE ? OR court LIKE ? OR bench LIKE ? OR year LIKE ? OR lawyers LIKE ? OR areaoflaw LIKE ? OR keywords LIKE ? OR sourcescited LIKE ? OR text LIKE ? OR casescited LIKE ?',
            ["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);


        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? OR title LIKE ? OR year LIKE ? OR provisions LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? OR reference LIKE ? OR year LIKE ? OR title LIKE ? OR issuing_authority LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        return view('generalsearchresults',compact('caselaw','leg','sro'))->with($filters);
    }

    public function orderByRelevance($text){

        $relevance = 'yes';
        $court = 'no';
        $year = 'no';
        $alphabetical = 'no';

        $filters = array(
            'text'  => $text,
            'relevance' => $relevance,
            'court' => $court,
            'year' => $year,
            'alphabetical' => $alphabetical,
        );

        $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? OR title LIKE ? OR court LIKE ? OR bench LIKE ? OR year LIKE ? OR lawyers LIKE ? OR areaoflaw LIKE ? OR keywords LIKE ? OR sourcescited LIKE ? OR text LIKE ? OR casescited LIKE ?',
            ["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);


        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? OR title LIKE ? OR year LIKE ? OR provisions LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? OR reference LIKE ? OR year LIKE ? OR title LIKE ? OR issuing_authority LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        return view('generalsearchresults',compact('caselaw','leg','sro'))->with($filters);
    }

    public function orderByCourt($text){

        $relevance = 'no';
        $court = 'yes';
        $year = 'no';
        $alphabetical = 'no';

        $filters = array(
            'text'  => $text,
            'relevance' => $relevance,
            'court' => $court,
            'year' => $year,
            'alphabetical' => $alphabetical,
        );

        $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? OR title LIKE ? OR court LIKE ? OR bench LIKE ? OR year LIKE ? OR lawyers LIKE ? OR areaoflaw LIKE ? OR keywords LIKE ? OR sourcescited LIKE ? OR text LIKE ? OR casescited LIKE ?
            ORDER BY CASE
            WHEN court LIKE "%Supreme Court%" THEN 1
            WHEN court LIKE "%High Court%" THEN 2
            ELSE 3
            END',
            ["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);


        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? OR title LIKE ? OR year LIKE ? OR provisions LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? OR reference LIKE ? OR year LIKE ? OR title LIKE ? OR issuing_authority LIKE ?',["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        return view('generalsearchresults',compact('caselaw','leg','sro'))->with($filters);
    }

    public function orderByYear($text){

        $relevance = 'no';
        $court = 'no';
        $year = 'yes';
        $alphabetical = 'no';

        $filters = array(
            'text'  => $text,
            'relevance' => $relevance,
            'court' => $court,
            'year' => $year,
            'alphabetical' => $alphabetical,
        );

        $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? OR title LIKE ? OR court LIKE ? OR bench LIKE ? OR year LIKE ? OR lawyers LIKE ? OR areaoflaw LIKE ? OR keywords LIKE ? OR sourcescited LIKE ? OR text LIKE ? OR casescited LIKE ? ORDER BY year DESC ',
            ["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);


        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? OR title LIKE ? OR year LIKE ? OR provisions LIKE ? ORDER BY year DESC ',["%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? OR reference LIKE ? OR year LIKE ? OR title LIKE ? OR issuing_authority LIKE ? ORDER BY year DESC ',["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        return view('generalsearchresults',compact('caselaw','leg','sro'))->with($filters);
    }

    public function orderByAlphabets($text){

        $relevance = 'no';
        $court = 'no';
        $year = 'no';
        $alphabetical = 'yes';

        $filters = array(
            'text'  => $text,
            'relevance' => $relevance,
            'court' => $court,
            'year' => $year,
            'alphabetical' => $alphabetical,
        );

        $caselaw = DB::select('SELECT * FROM caselaws WHERE citation LIKE ? OR title LIKE ? OR court LIKE ? OR bench LIKE ? OR year LIKE ? OR lawyers LIKE ? OR areaoflaw LIKE ? OR keywords LIKE ? OR sourcescited LIKE ? OR text LIKE ? OR casescited LIKE ? ORDER BY title ASC ',
            ["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);


        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? OR title LIKE ? OR year LIKE ? OR provisions LIKE ? ORDER BY title ASC ',["%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? OR reference LIKE ? OR year LIKE ? OR title LIKE ? OR issuing_authority LIKE ? ORDER BY title ASC ',["%".$text."%","%".$text."%","%".$text."%","%".$text."%","%".$text."%"]);

        return view('generalsearchresults',compact('caselaw','leg','sro'))->with($filters);
    }

}
