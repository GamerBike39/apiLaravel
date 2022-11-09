<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/public', [LivreController::class, 'indexPublic'])->name('livre.indexPublic');
// Route::get('/livres', [LivreController::class, 'indexApi']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// USER DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

// ADMIN DASHBOARD
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->middleware(['auth', 'admin'])->name('admin_dashboard');


require __DIR__.'/auth.php';



Route::controller(LivreController::class)->group(function () {
    Route::get('/livre', 'index')->name('livre.index');
    Route::get('/livre/create', 'create')->name('livre.create');
    Route::get('/livre/{id}', 'show')->name('livre.show');
    Route::get('/livre/{id}/edit', 'edit')->name('livre.edit');
    Route::post('/livre', 'store');
    Route::patch('/livre/{id}', 'update');
    Route::delete('/livre/{id}', 'destroy');
   });


   // user protected routes
Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::controller(LivreController::class)->group(function () {
        Route::get('/livre', 'index')->name('livre.index');
        Route::get('/livre/create', 'create')->name('livre.create');
        Route::get('/livre/{id}', 'show')->name('livre.show');
        Route::get('/livre/{id}/edit', 'edit')->name('livre.edit');
        Route::post('/livre', 'store');
        Route::patch('/livre/{id}', 'update');
        Route::delete('/livre/{id}', 'destroy');
       });
});


// public routes
Route::group(['prefix' => 'public'], function () {
    Route::controller(LivreController::class)->group(function () {
        Route::get('/livre', 'indexPublic')->name('livre.indexPublic');
        Route::get('/livre/{id}', 'showPublic')->name('livre.showPublic');
       });
});
