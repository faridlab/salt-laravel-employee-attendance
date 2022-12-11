<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use AttendancesController\Controllers\ApiSaltResourcesController;
use AttendancesController\Controllers\AttendancesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: ATTENDANCES
    Route::get("attendances", [AttendancesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("attendances", [AttendancesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("attendances/trash", [AttendancesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("attendances/import", [AttendancesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("attendances/export", [AttendancesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("attendances/report", [AttendancesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("attendances/{id}/trashed", [AttendancesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("attendances/{id}/restore", [AttendancesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendances/{id}/delete", [AttendancesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("attendances/{id}", [AttendancesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("attendances/{id}", [AttendancesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("attendances/{id}", [AttendancesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendances/{id}", [AttendancesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: ATTENDANCE CLOCKS
    Route::get("attendance_clocks", [ApiSaltResourcesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("attendance_clocks", [ApiSaltResourcesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("attendance_clocks/trash", [ApiSaltResourcesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("attendance_clocks/import", [ApiSaltResourcesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("attendance_clocks/export", [ApiSaltResourcesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("attendance_clocks/report", [ApiSaltResourcesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("attendance_clocks/{id}/trashed", [ApiSaltResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("attendance_clocks/{id}/restore", [ApiSaltResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}/delete", [ApiSaltResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("attendance_clocks/{id}", [ApiSaltResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("attendance_clocks/{id}", [ApiSaltResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("attendance_clocks/{id}", [ApiSaltResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}", [ApiSaltResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
