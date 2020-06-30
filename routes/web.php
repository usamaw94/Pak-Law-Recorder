<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('display', 'pagescontroller@display');
//Route::get('/', 'pagescontroller@search');
//Route::get('searchresult', 'pagescontroller@searchresult');

Route::get('/',function() {
    return view('home');
});

Route::get('caseLaw', 'CaselawController@search');
Route::post('caseLawSearch', 'CaselawController@searching');
Route::get('caselawdisplay/{id}', 'CaselawController@display');
Route::get('caseOrderByDate/{freeText}/{casetitle}/{keywords}/{citation}/{period}/{legal}/{arealaw}/{court}/{bench}/{year}/{counsel}/{casescited}/{type}/{sourcescited}/{relevance}/{orderCourt}/{orderDate}/{alphabetical}', 'CaselawController@orderByDate');
Route::get('caseOrderByAlphabet/{freeText}/{casetitle}/{keywords}/{citation}/{period}/{legal}/{arealaw}/{court}/{bench}/{year}/{counsel}/{casescited}/{type}/{sourcescited}/{relevance}/{orderCourt}/{orderDate}/{alphabetical}', 'CaselawController@orderByAlphabet');
Route::get('caseOrderByCourt/{freeText}/{casetitle}/{keywords}/{citation}/{period}/{legal}/{arealaw}/{court}/{bench}/{year}/{counsel}/{casescited}/{type}/{sourcescited}/{relevance}/{orderCourt}/{orderDate}/{alphabetical}', 'CaselawController@orderByCourt');
Route::get('caseOrderByRelevance/{freeText}/{casetitle}/{keywords}/{citation}/{period}/{legal}/{arealaw}/{court}/{bench}/{year}/{counsel}/{casescited}/{type}/{sourcescited}/{relevance}/{orderCourt}/{orderDate}/{alphabetical}', 'CaselawController@orderByRelevance');
Route::get('caselawBrowse' ,'CaselawController@browse');
Route::get('sourceCited/{leg}', 'CaselawController@sourceCited');
Route::get('caseCited/{case}', 'CaselawController@caseCited');
Route::get('caseCiting/{case}', 'CaselawController@caseCiting');

Route::get('legislationSearch' , 'LegislationController@search');
Route::post('legislationSearching' , 'LegislationController@searching');

Route::get('legislationBrowseTitle' , 'LegislationController@lBTitle');
Route::get('legislationBrowseYear' , 'LegislationController@lBYear');

Route::get('legislationResultsByAlphabets/{freeText?}/{title?}/{year?}/{pV?}' , 'LegislationController@resultsByAlphabets');
Route::get('legislationResultsByYear/{freeText?}/{title?}/{year?}/{pV?}' , 'LegislationController@resultsByYear');
Route::get('legislationResultsByRelevance/{freeText?}/{title?}/{year?}/{pV?}' , 'LegislationController@resultsByRelevance');

Route::get('legislationSearchWithin/{freeText?}/{title?}/{year?}/{pV?}' , 'LegislationController@searchWithin');

Route::post('showFile/{filePath}' , 'LegislationController@showPDF');

Route::get('sroSearch' , 'SROController@search');
Route::post('sroSearching' , 'SROController@searching');

Route::get('sroResultsByAlphabets/{freeText?}/{title?}/{year?}/{ref?}/{iA?}' , 'SROController@resultsByAlphabets');
Route::get('sroResultsByYear/{freeText?}/{title?}/{year?}/{pV?}/{ref?}/{iA?}' , 'SROController@resultsByYear');
Route::get('sroResultsByRelevance/{freeText?}/{title?}/{year?}/{pV?}/{ref?}/{iA?}' , 'SROController@resultsByRelevance');

Route::get('browseTitle/{sW}/{cW}' , 'LegislationController@browseTitle');
Route::post('browseYear' , 'LegislationController@browseYear');


Route::get('generalSearch', 'GeneralsearchController@home');
Route::post('generalSearching', 'GeneralsearchController@searching');
Route::get('generalOrderByRelevance/{text}', 'GeneralsearchController@orderByRelevance');
Route::get('generalOrderByCourt/{text}', 'GeneralsearchController@orderByCourt');
Route::get('generalOrderByYear/{text}', 'GeneralsearchController@orderByYear');
Route::get('generalOrderByAlphabets/{text}', 'GeneralsearchController@orderByAlphabets');

//Route::get('legislationSearchResults', function () {
//    return view('legislationsearchresults');
//});

//Route::POST('/searchresult', 'pagescontroller@searchresult');