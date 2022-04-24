<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jobs\JobController;
use App\Http\Controllers\occupations\OccupationController;
use App\Http\Controllers\workers\WorkerController;
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

// Main Page
Route::get('/', function () { 
    return redirect()->route('admin.home');
});


Route::group(['prefix'=>'admin'] , function(){

    /* [ GUEST ROUTES] */
    Route::middleware('guest')->group(function(){
        Route::get('/login' , [AuthController::class , 'login'])->name('admin.login');
        Route::post('/login' , [AuthController::class , 'postLogin'])->name('login.post');    
    });


    /* =======> ALL PROTECTED ROUTES <======= */
    Route::middleware('auth')->group(function(){

        /* [ MAIN ROUTES] */
        Route::get('/profile' , [AuthController::class , 'profile'])->name('admin.profile');
        Route::get('/update-info' , [AuthController::class , 'editProfile'])->name('admin.edit');
        Route::post('/update-info' , [AuthController::class , 'updateProfile'])->name('admin.update');
        Route::get('/home' , [HomeController::class , 'home'])->name('admin.home');
        Route::get('/logout' , [AuthController::class , 'logout'])->name('admin.logout');

        /* [ WORKERS ROUTES] */
        Route::get('/workers/index' , [WorkerController::class , 'index'])->name('workers.index');
        Route::get('/workers/create' , [WorkerController::class , 'create'])->name('workers.create');
        Route::post('/workers/create' , [WorkerController::class , 'store'])->name('workers.store');
        Route::get('/worker/{id}' , [WorkerController::class , 'show'])->name('workers.show');
        Route::get('/worker/edit/{id}' , [WorkerController::class , 'edit'])->name('workers.edit');
        Route::post('/worker/update/{id}' , [WorkerController::class , 'update'])->name('workers.update');
        Route::post('/worker/delete/{id}' , [WorkerController::class , 'delete'])->name('workers.delete');
        Route::get('/workers/search/' , [WorkerController::class , 'search'])->name('workers.search');

        /* [ OCCUPATIONS ROUTES] */
        Route::get('/occupations/index' , [OccupationController::class , 'index'])->name('occupations.index');
        Route::post('/occupations/create' , [OccupationController::class , 'store'])->name('occupations.store');
        Route::get('/occupations/edit/{id}' , [OccupationController::class , 'edit'])->name('occupations.edit');
        Route::post('/occupations/update/{id}' , [OccupationController::class , 'update'])->name('occupations.update');
        Route::post('/occupations/delete/{id}' , [OccupationController::class , 'delete'])->name('occupations.delete');

        /* [ JOBS ROUTES] */
        Route::get('/jobs/index' , [JobController::class , 'index'])->name('jobs.index');
        Route::get('/jobs/archive' , [JobController::class , 'archive'])->name('jobs.archive');
        Route::get('/jobs/in-progress' , [JobController::class , 'inProgress'])->name('jobs.in_progress');
        Route::get('/jobs/completed' , [JobController::class , 'completed'])->name('jobs.completed');
        Route::get('/jobs/create' , [JobController::class , 'create'])->name('jobs.create');
        Route::get('/jobs/start/{id}' , [JobController::class , 'start'])->name('jobs.start');
        Route::post('/jobs/start' , [JobController::class , 'startJob'])->name('jobs.store');
        Route::get('/jobs/completed-mark/{id}' , [JobController::class , 'markAsCompleted'])->name('jobs.mark');
        Route::post('/jobs/stop/{id}' , [JobController::class , 'stop'])->name('jobs.stop');
        Route::post('/jobs/delete/{id}' , [JobController::class , 'delete'])->name('jobs.delete');

        /* [ CARD GENERATEUR ROUTES] */
        Route::get('/workers/card/{id}' , [WorkerController::class , 'card'])->name('workers.card');
        Route::get('/generateur' , [WorkerController::class , 'generateur'])->name('workers.generateur');
        Route::post('/generateur' , [WorkerController::class , 'getidcard'])->name('workers.getidcard');


    });

});

Route::get('users/export/', [WorkerController::class, 'export']);




/* [ CALENDER ROUTES] */
Route::get('full-calender', [HomeController::class, 'getCalendarData']);

Route::post('full-calender/action', [HomeController::class, 'action']);
         


