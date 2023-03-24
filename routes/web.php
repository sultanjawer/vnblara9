<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OurProductsController;
use App\Http\Controllers\NewsRoomController;
use Illuminate\Support\Facades\Route;

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

//default route
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index']);

// Route::get('/ourproducts', [OurProductsController::class, 'index'])->name('ourproducts.index');
// Route::get('/ourproducts/{$id}', [OurProductsController::class, 'show'])->name('ourproducts.show');

Route::resource('ourproducts', OurProductsController::class);
Route::resource('newsroom', NewsRoomController::class);

Route::get('/about', function () {
    return view('guess.about');
})->name('about');

Route::get('/contact', function () {
    return view('guess.contact');
})->name('contact');

Route::get('/sample', function () {
    return view('guess.sample');
})->name('sample');

Route::get('/home', function () {
    return view('guess.home');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    // 	return view('dashboard');
    // })->name('dashboard');

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('products', ProductsController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
