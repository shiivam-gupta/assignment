<?php

use App\Events\SendNotificationUser;
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

Route::group(['middleware' => 'prevent-back-history'],function(){
    // Login Routes
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/', 'LoginController@loginAdminCheck')->name('admin.login.post');
    });

    Route::get('/home', function () {
        return redirect(route('admin.dashboard'));
    });

    Route::middleware(['auth'])->group(function () {
        Route::group(['namespace' => 'BackEnd\Admin', 'prefix' => ''], function () {

            //After Login Routes
            Route::get('/dashboard', 'AdminController@adminDashboard')->name('admin.dashboard');
            Route::post('/logout', 'AdminController@logout')->name('admin.logout');

            //Team Routes
            Route::resource('teams', 'TeamController', ['except' => ['show']]);
            Route::post('teams-data', 'TeamController@teamData')->name('teams-data');

            //Players Routes
            Route::resource('players', 'PlayerController', ['except' => ['show']]);
            Route::post('players-data', 'PlayerController@playerData')->name('players-data');

            //Match Routes
            Route::resource('matches', 'MatchController', ['except' => ['show']]);
            Route::post('matches-data', 'MatchController@matchData')->name('matches-data');

            //Points Routes
            Route::resource('points', 'PointsController', ['except' => ['show','edit','update','create','store']]);
            Route::post('points-data', 'PointsController@pointsData')->name('points-data');

        });
    });
});

Auth::routes();
