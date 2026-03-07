<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;

Route::get('/', function () {
    return view('welcome');
});

//////// only for user route

Route::middleware(['auth', IsUser::class])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

////// end route for user 


//////// only for user route

Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
     Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
     Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
     Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
     Route::post('/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    //  plan controller is start

    Route::controller(PlanController::class)->group(function() {
        Route::get('all/plan' , 'AllPlan')->name('all.plan');
        Route::get('add/plan' , 'AddPlan')->name('add.plan');
        Route::post('/store/plan', 'StorePlan')->name('store.plan');
        Route::get('edit/plan/{id}' , 'EditPlan')->name('edit.plan');
        Route::post('/update/plan', 'UpdatePlan')->name('update.plan');
        Route::get('/delete/plan/{id}', 'DeletePlan')->name('delete.plan');

    });

    Route::controller(ProjectController::class)->group(function(){
    Route::get('/all/projects', 'AllProjects')->name('all.projects');
    Route::get('/projects/create', 'CreateProject')->name('projects.create');
    

  });


});

////// end route for user 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
