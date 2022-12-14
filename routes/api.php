<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use AttendancesController\Controllers\AttendancesController;
use AttendancesController\Controllers\AttendanceClocksController;

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
    Route::get("attendance_clocks", [AttendanceClocksController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("attendance_clocks", [AttendanceClocksController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("attendance_clocks/trash", [AttendanceClocksController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("attendance_clocks/import", [AttendanceClocksController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("attendance_clocks/export", [AttendanceClocksController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("attendance_clocks/report", [AttendanceClocksController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("attendance_clocks/{id}/trashed", [AttendanceClocksController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("attendance_clocks/{id}/restore", [AttendanceClocksController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}/delete", [AttendanceClocksController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("attendance_clocks/{id}", [AttendanceClocksController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("attendance_clocks/{id}", [AttendanceClocksController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("attendance_clocks/{id}", [AttendanceClocksController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("attendance_clocks/{id}", [AttendanceClocksController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
