<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchLegislation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegislationController extends Controller
{
    public function search(){
        return view('legislationsearch');
    }

    public function searching(SearchLegislation $request){
        $freeText = $request->free_text;
        $title = $request->title;
        $year = $request->year;
        $provisionNumber = $request->provision_number;

        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? AND title LIKE ? AND year LIKE ? AND provisions LIKE ?',["%".$freeText."%","%".$title."%","%".$year."%","%".$provisionNumber."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($provisionNumber == ''){
            $provisionNumber = 'e';
        }

        $relevance = 'yes';
        $orderYear = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'pV' => $provisionNumber,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('legislationsearchresults',compact('leg'))->with($filters);

    }

    public function lBTitle() {

        $sW = 'a';
        $cW = 'A';

        $active = array(
            'sW'  => $sW,
            'cW'   => $cW,
        );

        $leg = DB::select('SELECT * FROM legislations WHERE title LIKE ? OR title LIKE ?',['a%','A%']);

        return view('legislationbrowsetitle',compact('leg'))->with($active);
    }

    public function lBYear() {
        $leg = DB::select('SELECT * FROM legislations');

        return view('legislationbrowseyear',compact('leg'));
    }

    public function browseTitle($sW,$cW){
        $leg = DB::select('SELECT * FROM legislations WHERE title LIKE ? OR title LIKE ?',[$sW."%",$cW."%"]);

        //        class="active-alphabet"
        $active = array(
            'sW'  => $sW,
            'cW'   => $cW,
        );


        return view('legislationbrowsetitle',compact('leg'))->with($active);
    }

    public function browseYear(Request $request) {

        $result = substr($request->year, 1);

        $leg = DB::select('SELECT * FROM legislations WHERE year LIKE ?',["%".$result."%"]);

        return view('legislationbrowseyear',compact('leg'));
    }

    public function resultsByAlphabets($freeText,$title,$year,$pV){
        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($pV == 'e'){
            $pV = '';
        }

        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? AND title LIKE ? AND year LIKE ? AND provisions LIKE ? ORDER BY title ASC',["%".$freeText."%","%".$title."%","%".$year."%","%".$pV."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($pV == ''){
            $pV = 'e';
        }

        $relevance = 'no';
        $orderYear = 'no';
        $alphabetical = 'yes';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'pV' => $pV,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('legislationsearchresults',compact('leg'))->with($filters);

    }

    public function resultsByYear($freeText,$title,$year,$pV){
        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($pV == 'e'){
            $pV = '';
        }

        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? AND title LIKE ? AND year LIKE ? AND provisions LIKE ? ORDER BY year DESC',["%".$freeText."%","%".$title."%","%".$year."%","%".$pV."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($pV == ''){
            $pV = 'e';
        }

        $relevance = 'no';
        $orderYear = 'yes';
        $alphabetical = 'no';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'pV' => $pV,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('legislationsearchresults',compact('leg'))->with($filters);

    }

    public function resultsByRelevance($freeText,$title,$year,$pV){
        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($pV == 'e'){
            $pV = '';
        }

        $leg = DB::select('SELECT * FROM legislations WHERE free_text LIKE ? AND title LIKE ? AND year LIKE ? AND provisions LIKE ?',["%".$freeText."%","%".$title."%","%".$year."%","%".$pV."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($pV == ''){
            $pV = 'e';
        }

        $relevance = 'yes';
        $orderYear = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'pV' => $pV,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('legislationsearchresults',compact('leg'))->with($filters);

    }

}