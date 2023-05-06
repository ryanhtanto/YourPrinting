<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\RegisterControllers;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\PrintingController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SizeControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrintingController::class, 'index']);

Route::get('/detail/{printing:id}', [PrintingController::class, 'show']);

Route::get('/recommendation', [RecommendationController::class, 'index']);
Route::post('/recommendation', [RecommendationController::class, 'submitForm']);

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/hasil', function () {
    return view('user.hasil');
});

Route::get('/admin/home', [PrintingController::class, 'indexAdmin'])->middleware('auth');

Route::get('/admin/detail/{printing:id}', [PrintingController::class, 'showAdmin'])->middleware('auth');
Route::get('/admin/edit-detail/{printing:id}', [PrintingController::class, 'indexEditPrinting'])->middleware('auth');
Route::put('/admin/edit-detail/{printing:id}', [PrintingController::class, 'updateDetail']);

Route::get('/admin/layanan', [ServiceController::class, 'indexAdmin'])->middleware('auth');
Route::post('/admin/layanan', [ServiceController::class, 'store']);
Route::get('/admin/delete-layanan/{service:id}', [ServiceController::class, 'destroy'])->middleware('auth');
Route::get('/admin/edit-layanan/{service:id}', [ServiceController::class, 'findUpdate'])->middleware('auth');
Route::put('/admin/layanan/{service:id}', [ServiceController::class, 'update']);

Route::get('/admin/bahan', [BahanController::class, 'indexAdmin'])->middleware('auth');
Route::post('/admin/bahan', [BahanController::class, 'store']);
Route::get('/admin/delete-bahan/{material:id}', [BahanController::class, 'destroy'])->middleware('auth');
Route::get('/admin/edit-bahan/{material:id}', [BahanController::class, 'findUpdate'])->middleware('auth');
Route::put('/admin/bahan/{material:id}', [BahanController::class, 'update']);

Route::get('/admin/add-printing', [PrintingController::class, 'indexAddPrinting'])->middleware('auth');
Route::post('/admin/add-printing', [PrintingController::class, 'storePrinting']);

Route::get('/admin/add-service', [PrintingController::class, 'viewService'])->middleware('auth');
Route::get('/admin/edit-service/{daftarService:id}', [PrintingController::class, 'viewEditService'])->middleware('auth');
Route::put('/admin/edit-service/{daftarService:id}', [PrintingController::class, 'editDaftarService']);
Route::post('/admin/add-service', [PrintingController::class, 'addService']);
Route::get('/admin/delete-service/{daftarService:id}', [PrintingController::class, 'destroy'])->middleware('auth');

Route::get('/admin/ukuran', [SizeControllers::class, 'indexAdmin'])->middleware('auth');
Route::get('/admin/delete-ukuran/{size:id}', [SizeControllers::class, 'destroy'])->middleware('auth');
Route::post('/admin/ukuran', [SizeControllers::class, 'store']);
Route::get('/admin/edit-ukuran/{size:id}', [SizeControllers::class, 'findUpdate'])->middleware('auth');
Route::put('/admin/edit-ukuran/{size:id}', [SizeControllers::class, 'update']);

Route::get('/admin/login', [LoginControllers::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginControllers::class, 'authenticate']);
Route::post('/admin/logout', [LoginControllers::class, 'logout']);

Route::get('/admin/register', [RegisterControllers::class, 'index'])->middleware('guest');
Route::post('/admin/register', [RegisterControllers::class, 'store']);