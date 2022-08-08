<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$version = config('app.API_VERSION', 'v1');

Route::namespace('SaltEmployeeAttendance\Controllers')
    ->middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: ATTENDANCES
    Route::get("attendances", 'ApiSaltResourcesController@index'); // get entire collection
    Route::post("attendances", 'ApiSaltResourcesController@store'); // create new collection

    Route::get("attendances/trash", 'ApiSaltResourcesController@trash'); // trash of collection

    Route::post("attendances/import", 'ApiSaltResourcesController@import'); // import collection from external
    Route::post("attendances/export", 'ApiSaltResourcesController@export'); // export entire collection
    Route::get("attendances/report", 'ApiSaltResourcesController@report'); // report collection

    Route::get("attendances/{id}/trashed", 'ApiSaltResourcesController@trashed')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("attendances/{id}/restore", 'ApiSaltResourcesController@restore')->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendances/{id}/delete", 'ApiSaltResourcesController@delete')->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("attendances/{id}", 'ApiSaltResourcesController@show')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("attendances/{id}", 'ApiSaltResourcesController@update')->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("attendances/{id}", 'ApiSaltResourcesController@patch')->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendances/{id}", 'ApiSaltResourcesController@destroy')->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID


    // API: ATTENDANCE CLOCKS
    Route::get("attendance_clocks", 'ApiSaltResourcesController@index'); // get entire collection
    Route::post("attendance_clocks", 'ApiSaltResourcesController@store'); // create new collection

    Route::get("attendance_clocks/trash", 'ApiSaltResourcesController@trash'); // trash of collection

    Route::post("attendance_clocks/import", 'ApiSaltResourcesController@import'); // import collection from external
    Route::post("attendance_clocks/export", 'ApiSaltResourcesController@export'); // export entire collection
    Route::get("attendance_clocks/report", 'ApiSaltResourcesController@report'); // report collection

    Route::get("attendance_clocks/{id}/trashed", 'ApiSaltResourcesController@trashed')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("attendance_clocks/{id}/restore", 'ApiSaltResourcesController@restore')->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}/delete", 'ApiSaltResourcesController@delete')->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("attendance_clocks/{id}", 'ApiSaltResourcesController@show')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("attendance_clocks/{id}", 'ApiSaltResourcesController@update')->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("attendance_clocks/{id}", 'ApiSaltResourcesController@patch')->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}", 'ApiSaltResourcesController@destroy')->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
