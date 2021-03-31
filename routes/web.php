<?php

use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('category/all', [CategoryController::class, 'getAllCategories'])->name('all.category');
Route::post('category/add', [CategoryController::class, 'addCategory'])->name('store.category');
Route::patch('category/edit', [CategoryController::class, 'edit'])->name('store.edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', ['users' => $users]);
})->name('dashboard');
