<?php
use Fibd\Front\FibdServiceProvider;
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

$okControl = FibdServiceProvider::controlRedirection($request);

Route::get('/error404', 'Fibd\Front\App\Http\Controllers\ErrorController@index')->name('404');
Route::post('/banniere', 'Fibd\Front\App\Http\Controllers\HeaderController@displayBanniere')->name('banniere');
Route::post('/cookie/set','Fibd\Front\App\Http\Controllers\CookieController@setCookie');
Route::get('/cookie/get','Fibd\Front\App\Http\Controllers\CookieController@getCookie');
Route::post('/infos-pratiques/contact', 'Fibd\Front\App\Http\Controllers\InfosPratiqueController@contact')->name('contact');
Route::post('/newsletters', 'Fibd\Front\App\Http\Controllers\NewslettersController@index')->name('newsletters');
Route::post('/contact', 'Fibd\Front\App\Http\Controllers\NewslettersController@contact')->name('contact');
Route::get('/page_recherche', 'Fibd\Front\App\Http\Controllers\PageRechercheController@index')->name('page_recherche');
Route::post('/autocomplete', 'Fibd\Front\App\Http\Controllers\PageRechercheController@complete')->name('complete');
Route::group(['middleware' => ['web']], function(){
Route::post('/language', 'Fibd\Front\App\Http\Controllers\HomeController@language')->name('language');

});

if(!$okControl){

  // Route::prefix('{lang?}')->middleware('web')->middleware('locale')->group(function() {
  Route::group(['middleware' => ['redirect']], function(){
      Route::get('/', 'Fibd\Front\App\Http\Controllers\HomeController@index')->name('home');
      Route::get('/actualites-fibd/actualites', 'Fibd\Front\App\Http\Controllers\ActualitesController@index')->name('actualites');
      Route::get('/actualites-fibd/actualites/{savoir}', 'Fibd\Front\App\Http\Controllers\ActualitesController@savoir')->name('savoir');
      Route::get('/mentions-legales', 'Fibd\Front\App\Http\Controllers\MentionsController@index')->name('mentions_legales');
      Route::get('/politique-confidentialite', 'Fibd\Front\App\Http\Controllers\MentionsController@index')->name('confidentialite');
      Route::get('/cookies', 'Fibd\Front\App\Http\Controllers\MentionsController@index')->name('cookie');
      Route::get('/heure-par-heure/{detail}', 'Fibd\Front\App\Http\Controllers\GestionMenuController@detailHeure')->name('detailHeure');
      //view pour la galerie en source archives.bdangouleme.com
      Route::get('/galeries-photos/{num_edition?}/{galerie?}/{theme?}', function($num_edition=0,$galerie=0,$theme=0){
        return view('front::galerie-photos')->with('num_edition',$num_edition)->with('galerie',$galerie)->with('theme',$theme);
      });
      Route::get('/actualites-fibd/galeries-photos/{num_edition?}/{galerie?}/{theme?}', function($num_edition=0,$galerie=0,$theme=0){
        return view('front::galerie-photos')->with('num_edition',$num_edition)->with('galerie',$galerie)->with('theme',$theme);
      });
      Route::get('/actualites-fibd/live-videos', 'Fibd\Front\App\Http\Controllers\LiveVideosController@index')->name('LiveVideos');
      Route::get('/live-videos', 'Fibd\Front\App\Http\Controllers\LiveVideosController@index')->name('LiveVideos');
      Route::get('/{menu}/{sousMenu?}/{detail?}', 'Fibd\Front\App\Http\Controllers\GestionMenuController@index')->name('menu');
});
}
