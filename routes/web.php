<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'GameCongSo\GameBocPhotCongSoController@index')->name('home');
Route::group([
    'prefix' => 'game-boc-phot-cong-so',
    'namespace' => 'GameCongSo',
    'as' => 'game-cong-so.'
], function (){
    Route::get('/', 'GameBocPhotCongSoController@index')->name('home');
    Route::get('/game', 'GameBocPhotCongSoController@game')->name('game');
    Route::get('/frame-2', 'GameBocPhotCongSoController@loadFrame2')->name('frame2');
    Route::post('/frame-5', 'GameBocPhotCongSoController@loadFrame5')->name('frame5');
    Route::post('/detail', 'GameBocPhotCongSoController@detail')->name('detail');
});
