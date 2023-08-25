<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncedPuResultsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::name('web.')->group(function () {
    // Route for displaying the results for any individual polling units
    Route::get('/', [AnnouncedPuResultsController::class, 'showResults'])->name('individual_polling_units');
    // Route for summing total result by local government
    Route::get('summed_total_results', [AnnouncedPuResultsController::class, 'showSummedTotal'])->name('summed_total_results');
    // Route for storing results for new polling unit
    Route::match(['get', 'post'], 'store_results', [AnnouncedPuResultsController::class, 'storeResults'])->name('store_results');
});


