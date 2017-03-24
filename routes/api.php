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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'services'], function(){

	Route::get('offices/{office}/spends', function(App\Office $office){
		return $office->spends()->paginate();
	});

	Route::get('projects/{project}/spends', function(App\Project $project){
		return $project->spends()->paginate();
	});

	Route::get('users/{user}/spends', function(App\User $user){
		return $user->spends()->paginate();
	});

	Route::get('users/{user}/projects', function(App\User $user){
		return $user->projects()->paginate();
	});

	Route::get('users/{user}/offices', function(App\User $user){
		return $user->offices()->paginate();
	});

	Route::get('spends/{spend}/spendForType', function(App\Spend $spend){
		return $spend->spendForType()->paginate();
	});

	Route::get('spends/{spend}/user', function(App\Spend $spend){
		return $spend->user()->paginate();
	});

	Route::get('offices/{office}/user', function(App\Office $office){
		return $office->user()->paginate();
	});

	Route::get('projects/{project}/user', function(App\Project $project){
		return $project->user()->paginate();
	});
});
	
Route::group(['prefix'=>'users/{user}'], function(){
	Route::put('spend', function(App\User $user, Request $request) {
		return $user->spends()->create($request->input());
	});
	Route::put('office', function(App\User $user, Request $request) {
		return $user->offices()->create($request->input());
	});
	Route::put('project', function(App\User $user, Request $request) {
		return $user->projects()->create($request->input());
	});

	Route::post('spends/{spend}', function(App\User $user, App\Spend $spend, Request $request) {
		return [$user->spends()->find($spend->id)->update($request->input())];
	});
	Route::post('offices/{office}', function(App\User $user, App\Office $office, Request $request) {
		return [$user->offices()->find($office->id)->update($request->input())];
	});
	Route::post('projects/{project}', function(App\User $user, App\Project $project, Request $request) {
		return [$user->projects()->find($project->id)->update($request->input())];
	});
});
