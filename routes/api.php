<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('config',function (){
    phpinfo();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/******************************************************************************

Little
 *
 ******************************************************************************/
Route::group([
    'prefix' => '/v1/',
    'namespace'     => 'Little',
    'middleware' => [],
], function () {
//    init
    Route::any('little', ['uses'=>'LittleController@index',                 'middleware' => []]);
});



