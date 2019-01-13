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
//  计算生成token 计算离线奖励 生成登录记录
    Route::any('connect', ['uses'=>'LittleController@connect',                 'middleware' => []]);
//  获取等级怪物列表
    Route::any('get_master', ['uses'=>'LittleController@getMaster',                 'middleware' => []]);
//  杀死怪物
    Route::any('kill_master', ['uses'=>'LittleController@killMaster',                 'middleware' => []]);

//    Route::any('send_message', ['uses'=>'LittleController@sendMessage',                 'middleware' => []]);




});



