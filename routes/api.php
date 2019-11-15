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

Route::get('data/manajemen-coa/resource', [
    'uses'  => 'Project\api\data\coa\coa_controller@resource'
])->name('api.data.coa.resource');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
