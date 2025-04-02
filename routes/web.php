<?php


use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Http\Controllers\languageController;
use App\Http\Controllers\PageLinkController;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
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


Route::group(
    [
       
    ], function(){ 

        Route::get('/', function () {
            return view('welcome');
        })->name('home');

    Route::get('/lang/{locale}', [languageController::class, 'switchLang'])->name('switchLang');
    Route::get('/products/{slug}',[PageLinkController::class,'showProduct'])->name('showProduct');
    Route::get('/categories/{slug}',[PageLinkController::class,'showCategory'])->name('category.show');

  


    
    require __DIR__.'/auth.php';
    require __DIR__.'/admin.php';
    });




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
