<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:sanctum'], function (){
    Route::get('article', [ArticleController::class, 'get']);
});

Route::get('articles', [ArticleController::class, 'getAll']);
//Route::get('article', [ArticleController::class, 'get']);
Route::get('article/autor', [ArticleController::class, 'getAutor']);
Route::get('article/tag', [ArticleController::class, 'getTag']);
Route::patch('article', [ArticleController::class, 'editArticle']);
Route::post('article', [ArticleController::class, 'createArticle']);
Route::delete('article/{id}', [ArticleController::class, 'delete']);

Route::get('users', [UserController::class, 'get']);
Route::patch('users', [UserController::class, 'edit']);
Route::delete('users/{id}', [UserController::class, 'delete']);
Route::post('users/search', [UserController::class, 'search']);

Route::get('tag/get', [TagController::class, 'get']);

Route::get('checktoken', [MyLoginController::class, 'checkToken' ]);

