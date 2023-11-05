<?php

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

Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\BoletasContoller;
use App\Http\Controllers\ChatDialogFlowController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\RoleController;


Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/docente-managment', [DocenteController::class, 'index'])->name('docentes');
	Route::post('/docente-managment', [DocenteController::class,'create'])->name('docentes.register');	
	Route::put('/docente-managment/{id}', [DocenteController::class,'update'])->name('docentes.update');
	Route::delete('/docente-managment/{id}', [DocenteController::class,'destroy'])->name('docentes.destroy');		
	Route::get('/estudiante-managment', [EstudianteController::class, 'index'])->name('estudiantes');
	Route::post('/estudiante-managment', [EstudianteController::class, 'create'])->name('estudiantes.register');
	Route::put('/estudiante-managment/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
	Route::delete('/estudiante-managment/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::put('/profile/{id}', [UserProfileController::class, 'perfilUpdate'])->name('profile.update');//actualizar datos de sesion
	Route::put('/profile', [UserProfileController::class, 'updateInfo'])->name('datos.update'); //actualizar los datos personales
	Route::get('/user-managment', [UserManagmentController::class,'index'])->name('user-managment');
	Route::get('/bloques', [BoletasContoller::class, 'index'])->name('user-boletas');
	Route::post('/bloques', [BoletasContoller::class, 'store'])->name('registrar-boletas');
	Route::get('/user-boletas', [BoletasContoller::class, 'verBoleta'])->name('my-boleta');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::get('/chat-bot', [ChatDialogFlowController::class, 'index'])->name('chat-bot');
	Route::post('/chatbot-interact', [ChatDialogFlowController::class,'interactWithChatbot'])->name('chatbot-interact'); // Interactuar con el chatbot

});