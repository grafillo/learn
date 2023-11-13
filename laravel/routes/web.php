<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MyLoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/vue/{route}', function () {
    return view('welcome');
})->where('route','.*');


Route::get('articles', [ArticleController::class, 'getAll' ]);
Route::get('article/{id}', [ArticleController::class, 'get' ]);
Route::put('article', [ArticleController::class, 'edit' ]);
Route::post('article', [ArticleController::class, 'add' ]);
Route::delete('article', [ArticleController::class, 'delete' ]);


Route::get('articleforma', [ArticleController::class, 'article' ]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
