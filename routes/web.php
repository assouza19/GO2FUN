<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('images/{folder}/{image}', function($folder, $image) {
    $file = \Storage::drive('uploads')->get( $folder . DIRECTORY_SEPARATOR . $image );
    $response = \Response::make( $file );
    $contentType = \Storage::drive('uploads')->mimeType($folder . DIRECTORY_SEPARATOR . $image);
    $response->header('Content-Type', $contentType);
    return $response;
});

//Rotas Gerais
Route::get('/user', function(){
    return view('usuario');
});
Route::get('/anunc', 'Auth\RegisterController@getRegisterAd');
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});

Route::get('teste', function() {
   dd( storage_path('app/uploads/teste') );
});

/*// Rotas usuario
Route::group(['middleware' => ['guest']], function () {
Route::get('user/login', 'Users@UserLogin');
Route::get('user/register', 'Users@UserRegister');
Route::post('user/login', 'Users@login');
Route::post('user/register', 'Users@register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('user/home', 'Users@index');
    Route::get('user/home/filter/{type}', 'Eventos@filters'); // ROTA DOS FILTROS
    Route::get('user/confirmed', 'Users@confirmed');
    Route::get('user/details/{idevento}', 'Users@details');
    Route::get('user/profile', 'Users@profile');
    Route::get('user/logout', 'Users@logout');
    Route::get('user/confirm/{id}&{idevento}&{idanunciante}', 'Users@confirmPresence');
});

// Rotas anunciante
Route::group(['middleware' => ['guest']], function () {
Route::get('anunciante/login', 'AnuncianteController@AnuncianteLogin');
Route::get('anunciante/register', 'AnuncianteController@AnuncianteRegister');
Route::post('anunciante/home', 'AnuncianteController@login');
Route::post('anunciante/register', 'AnuncianteController@register');
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('anunciante/home', 'AnuncianteController@index');
  Route::get('anunciante/new/event', 'AnuncianteController@PagEvento');
  Route::get('anunciante/manager/event', 'AnuncianteController@ManagerEvent');
  Route::get('anunciante/chart/users', 'AnuncianteController@ChartUsers');
  Route::get('anunciante/chart/event', 'AnuncianteController@ChartEvents');
  Route::post('anunciante/new/event', 'AnuncianteController@RegisterEvent');
  Route::get('anunciante/logout', 'AnuncianteController@logout');
  Route::get('anunciante/details/{idanunciante}/{idevento}', 'AnuncianteController@details');
});*/


/*
|--------------------------------------------------------------------------
| Novas rotas
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'panel',
    'middleware' => ['auth']
], function() {
    Route::get('', 'Dashboard@index');

    /*
    |--------------------------------------------------------------------------
    | Rotas de eventos
    |--------------------------------------------------------------------------
    */
    Route::group([
        'prefix' => 'events'
    ], function() {
        /*
        |--------------------------------------------------------------------------
        | Lista de todos os eventos
        |--------------------------------------------------------------------------
        */

        Route::get('', 'Events@index');

        /*
        |--------------------------------------------------------------------------
        | Novo evento
        |--------------------------------------------------------------------------
        */
        Route::get('new', 'Events@create'); // Rota que visualiza o form
        Route::post('new', 'Events@store'); // Rota que salva o evento

        /*
        |--------------------------------------------------------------------------
        | Confirmados
        |--------------------------------------------------------------------------
        */
        Route::get('confirmeds', 'Events@confirmeds');
        Route::get('confirmeds/{id}', 'Events@confirmedsEvent');

        /*
        |--------------------------------------------------------------------------
        | Atualizar evento
        |--------------------------------------------------------------------------
        */
        Route::get('update/{id}', 'Events@edit');
        Route::post('update/{id}', 'Events@update');

        /*
        |--------------------------------------------------------------------------
        | Visualizar evento (detalhes)
        |--------------------------------------------------------------------------
        */
        Route::get('details/{id}', 'Events@details');

    });
});

Auth::routes();

Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});