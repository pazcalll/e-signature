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
    Route::post('/get-img', [AuthController::class, 'getImg'])->name('get-img');
});

Route::middleware(['auth', 'student'])->group(function()
{
    Route::prefix('/student-page')->group(function(){
        Route::get('/page-home', [StudentController::class, 'getHome'])->name('get-home-student');
        Route::get('/page-permohonan', [StudentController::class, 'getPermohonan'])->name('get-permohonan-student');
    });
    Route::post('/signature-req', [StudentController::class, 'signatureReq'])->name('signature-req');
    Route::get('/list-permohonan', [StudentController::class, 'getListPermohonan'])->name('get-list-permohonan');
    Route::get('/get-lecturer', [StudentController::class, 'getLecturer'])->name('get-lecturer');
    Route::get('/get-validity/{hash}', [StudentController::class, 'getValidity'])->name('get-validity');
});

Route::middleware(['auth', 'lecturer'])->group(function()
{
    Route::prefix('/lecturer-page')->group(function(){
        Route::get('/page-home', [LecturerController::class, 'getHome'])->name('get-home-lecturer');
        Route::get('/page-history', [LecturerController::class, 'getHistory'])->name('get-history-lecturer');
        Route::get('/signature-history', [LecturerController::class, 'signatureHistory'])->name('signature-history-lecturer');
    });
    Route::get('/unsigned', [LecturerController::class, 'unsigned'])->name('unsigned');
    Route::post('/sign', [LecturerController::class, 'sign'])->name('sign');
    Route::delete('/sign/delete', [LecturerController::class, 'signDelete'])->name('sign-delete');
});

Route::prefix('/verification')->group(function()
{
    Route::get('/qrcode/{hash}', [AuthController::class, 'getVerificationQrcode']);
});