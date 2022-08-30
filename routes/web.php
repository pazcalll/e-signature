<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::middleware('guest')->group(function()
{
    Route::get('/login', [AuthController::class, 'loginPage']);
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/register', [AuthController::class, 'register']);
});
Route::middleware('auth')->group(function ()
{
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth', 'student'])->group(function()
{
    Route::post('/signature-req', [StudentController::class, 'signatureReq'])->name('signature-req');
    Route::get('/page-home', [StudentController::class, 'getHome'])->name('get-home');
    Route::get('/page-permohonan', [StudentController::class, 'getPermohonan'])->name('get-permohonan');
    Route::get('/list-permohonan', [StudentController::class, 'getListPermohonan'])->name('get-list-permohonan');
    Route::get('/get-lecturer', [StudentController::class, 'getLecturer'])->name('get-lecturer');
    Route::get('/get-img/{hash}', [StudentController::class, 'getImg'])->name('get-img');
});
Route::middleware(['auth', 'lecturer'])->group(function()
{
    Route::get('/unsigned', [LecturerController::class, 'unsigned'])->name('unsigned');
    Route::post('/sign', [LecturerController::class, 'sign'])->name('sign');
});