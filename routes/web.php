<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

//Route::get("/", function () {
//    return redirect()->to("/admin");
//});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name("dashboard");
    Route::get('/map-url', 'DashboardController@mapData')->name("mapData");
    Route::get('/browser-usage', 'DashboardController@browserUsage')->name("browserUsage");

    Route::get("/landing-page/{type}", "LandingPageDataController@index")->name("landing_page_data.index");
    Route::patch("/landing-page/{type}", "LandingPageDataController@update")->name("landing_page_data.update");

    Route::get("/landing-page-list/{type}", "LandingPageContactController@index")->name("landing_page_list.index");
    Route::delete("/landing-page-list/{type}/{id}", "LandingPageContactController@destroy")->name("landing_page_list.destroy");

    Route::resource("/industries", "IndustryController");

    Route::resource("/from-where-list", "FromWhereListController");

    Route::get("/settings", "SettingsController@index")->name("settings.index");
    Route::post("/settings", "SettingsController@update")->name("settings.update");
});

//Route::get("{reactRoutes}", function () {
//    return view("welcome");
//})->where("reactRoutes", "^((?|api).)*$");

Route::get('/', [
    'uses' => 'ReactController@show',
    'as' => 'react',
    'where' => ['path' => '.*']
]);

Route::get("/{page}", [\App\Http\Controllers\Frontend\LandingPageContactController::class, "index"])->name('get.page');
Route::get("/{page}/thanks", [\App\Http\Controllers\Frontend\LandingPageContactController::class, "thanks"])->name('get.thanks');
Route::post("/{page}", [\App\Http\Controllers\Frontend\LandingPageContactController::class, "send"])->name('post.page');
