<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SROController extends Controller
{
    public function search(){
        return view('srosearch');
    }

    public function searching(Request $request) {
        $freeText = $request->freeText;
        $iA = $request->issuingAuthority;
        $title = $request->title;
        $ref = $request->refNo;
        $year = $request->year;


        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? AND reference LIKE ? AND year LIKE ? AND title LIKE ? AND issuing_authority LIKE ?',["%".$freeText."%","%".$ref."%","%".$year."%","%".$title."%","%".$iA."%"]);

        $relevance = 'yes';
        $orderYear = 'no';
        $alphabetical = 'no';

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($ref == ''){
            $ref = 'e';
        }

        if($iA == ''){
            $iA = 'e';
        }

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'iA' => $iA,
            'ref' => $ref,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('srosearchresults',compact('sro'))->with($filters);
    }

    public function resultsByAlphabets($freeText,$title,$year,$ref,$iA){

        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($ref == 'e'){
            $ref = '';
        }
        if($iA == 'e'){
            $iA = '';
        }

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? AND reference LIKE ? AND year LIKE ? AND title LIKE ? AND issuing_authority LIKE ?  ORDER BY title ASC',["%".$freeText."%","%".$ref."%","%".$year."%","%".$title."%","%".$iA."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($ref == ''){
            $ref = 'e';
        }

        if($iA == ''){
            $iA = 'e';
        }

        $relevance = 'no';
        $orderYear = 'no';
        $alphabetical = 'yes';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'iA' => $iA,
            'ref' => $ref,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('srosearchresults',compact('sro'))->with($filters);

    }

    public function resultsByYear($freeText,$title,$year,$ref,$iA){
        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($ref == 'e'){
            $ref = '';
        }
        if($iA == 'e'){
            $iA = '';
        }

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? AND reference LIKE ? AND year LIKE ? AND title LIKE ? AND issuing_authority LIKE ? ORDER BY year DESC',["%".$freeText."%","%".$ref."%","%".$year."%","%".$title."%","%".$iA."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($ref == ''){
            $ref = 'e';
        }

        if($iA == ''){
            $iA = 'e';
        }

        $relevance = 'no';
        $orderYear = 'yes';
        $alphabetical = 'no';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'iA' => $iA,
            'ref' => $ref,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('srosearchresults',compact('sro'))->with($filters);
    }

    public function resultsByRelevance($freeText,$title,$year,$ref,$iA){
        if($freeText == 'e'){
            $freeText = '';
        }
        if($title == 'e'){
            $title = '';
        }
        if($year == 'e'){
            $year = '';
        }
        if($ref == 'e'){
            $ref = '';
        }
        if($iA == 'e'){
            $iA = '';
        }

        $sro = DB::select('SELECT * FROM s_r_os WHERE free_text LIKE ? AND reference LIKE ? AND year LIKE ? AND title LIKE ? AND issuing_authority LIKE ?',["%".$freeText."%","%".$ref."%","%".$year."%","%".$title."%","%".$iA."%"]);

        if($freeText == ''){
            $freeText = 'e';
        }

        if($title == ''){
            $title = 'e';
        }

        if($year == ''){
            $year = 'e';
        }

        if($ref == ''){
            $ref = 'e';
        }

        if($iA == ''){
            $iA = 'e';
        }

        $relevance = 'yes';
        $orderYear = 'no';
        $alphabetical = 'no';

        $filters = array(
            'freeText'  => $freeText,
            'title'   => $title,
            'year' => $year,
            'iA' => $iA,
            'ref' => $ref,
            'relevance' => $relevance,
            'orderYear' => $orderYear,
            'alphabetical' => $alphabetical,
        );

        return view('srosearchresults',compact('sro'))->with($filters);
    }
}
