<?php

use App\Http\Controllers\Admin\CompanyAccountsController;
use App\Http\Controllers\Admin\CustomerDetailsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentDetailsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectInfoController;
use App\Http\Controllers\Admin\PlotLevelIController;
use App\Http\Controllers\Admin\EPIController;



Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('admin.')->middleware('admin')->group(function () {
    Route::get('/panel', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::get('/assign-role', [RoleController::class, 'assignRolePage'])->name('assignPage');
    Route::post('/assign-role', [RoleController::class, 'assignRole'])->name('assignRole');
    Route::resource('permissions', PermissionController::class);
    Route::get('/assign-permissions', [PermissionController::class, 'assign'])->name('assign-permissions');
    Route::post('/assign-permission', [PermissionController::class, 'storeAssignment'])->name('storeAssign');

    //project management routes
    Route::resource('/project-info', ProjectInfoController::class);
    Route::resource('/plot-level-information', PlotLevelIController::class);
    Route::resource('/each-plot-information', EPIController::class);
    Route::resource('/customer-details', CustomerDetailsController::class);
    Route::resource('/customer-details.payment-details', PaymentDetailsController::class)
        ->shallow();
    Route::resource('/company-accounts', CompanyAccountsController::class);

    // web.php
    Route::get('/get-plot-area/{plot_no}', [CustomerDetailsController::class, 'getPlotArea'])->name('plot.getArea');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');
    Route::get('/print/{id}', [DashboardController::class, 'show'])->name('print');


});

require __DIR__ . '/auth.php';
