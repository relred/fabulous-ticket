<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupervisorsController;
use App\Http\Controllers\CashiersController;
use App\Http\Controllers\WithdrawsController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\SessionsController;
use App\Models\Withdraw;

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
    if (auth()->check()) {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.users');
        }
    
        if (auth()->user()->role == 'supervisor') {
            return redirect()->route('supervisor.users');
        }

        if (auth()->user()->role == 'cashier') {
            return redirect()->route('dashboard');
        }
    }

    return view('welcome');
})->name('home');

Route::get('/scanner/{id}', [ScannerController::class, 'view'])->name('scanner');
Route::post('/scanner/{id}', [ScannerController::class, 'scan'])->name('scanner');

Route::get('/emergency-scanner/{id}', [ScannerController::class, 'viewEmergency'])->name('scanner.emergency');
Route::post('/emergency-scanner/{id}', [ScannerController::class, 'scanEmergency'])->name('scanner.emergency');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('role:cashier', 'cashier.session');
Route::get('/birthday', [CashiersController::class, 'birthdayView'])->name('birthday')->middleware('role:cashier', 'cashier.session');
Route::post('/birthday', [CashiersController::class, 'birthdayStore'])->name('birthday.store')->middleware('role:cashier');

Route::get('/vip', [CashiersController::class, 'vipView'])->name('vip')->middleware('role:cashier', 'cashier.session');

Route::get('/history', [CashiersController::class, 'history'])->name('history')->middleware('role:cashier', 'cashier.session');
Route::get('/validate', [CashiersController::class, 'validateCashier'])->name('validate')->middleware('role:cashier');
Route::post('/validate', [CashiersController::class, 'generateSession'])->name('session.generate')->middleware('role:cashier');

Route::get('/cashier/enter-supervisor', [CashiersController::class, 'supervisorValidateView'])->name('supervisor.cashier.validate.view')->middleware('role:cashier');
Route::post('/cashier/enter-supervisor', [CashiersController::class, 'supervisorValidate'])->name('supervisor.cashier.validate')->middleware('role:cashier');

Route::get('/cashier/supervisor', [CashiersController::class, 'supervisorView'])->name('supervisor.cashier')->middleware('role:cashier');
Route::get('/cashier/supervisor/cash-withdraw', [CashiersController::class, 'withdrawCashView'])->name('supervisor.cashier.withdraw.cash')->middleware('role:cashier');
Route::post('/cashier/supervisor/cash-withdraw', [WithdrawsController::class, 'store'])->name('withdraw.store')->middleware('role:cashier');
Route::get('/cashier/supervisor/dollar-withdraw', [CashiersController::class, 'withdrawDollarView'])->name('supervisor.cashier.withdraw.dollar')->middleware('role:cashier');
Route::post('/cashier/supervisor/dollar-withdraw', [WithdrawsController::class, 'store'])->name('withdraw.store')->middleware('role:cashier');

Route::get('/cashier/supervisor/card-audit', [CashiersController::class, 'cardAuditView'])->name('supervisor.cashier.card-audit')->middleware('role:cashier');
Route::post('/cashier/supervisor/card-audit', [WithdrawsController::class, 'store'])->name('withdraw.store')->middleware('role:cashier');

Route::get('/cashier/supervisor/audit', [CashiersController::class, 'auditView'])->name('supervisor.cashier.audit')->middleware('role:cashier');
Route::post('/cashier/supervisor/audit', [WithdrawsController::class, 'store'])->name('withdraw.store')->middleware('role:cashier');
Route::get('/cashier/supervisor/final-cut', [CashiersController::class, 'finalView'])->name('supervisor.cashier.final-cut')->middleware('role:cashier');
Route::post('/cashier/supervisor/final-cut', [WithdrawsController::class, 'final'])->name('withdraw.final')->middleware('role:cashier');

Route::get('/cashier/supervisor/print/{id}', [WithdrawsController::class, 'print'])->name('print.withdraw');
Route::get('/cashier/supervisor/print-audit/{id}', [WithdrawsController::class, 'printAudit'])->name('print.audit');
Route::get('/cashier/supervisor/print-card-audit/{id}', [WithdrawsController::class, 'printCardAudit'])->name('print.card-audit');
Route::get('/cashier/supervisor/print-final/{id}', [WithdrawsController::class, 'printfinal'])->name('print.final');
Route::get('/cashier/supervisor/withdraw-success', fn() => view('supervisor.cashier.success') )->name('withdraw.success')->middleware('role:cashier');

Route::get('/print/{id}', [SalesController::class, 'print'])->name('print');

// ADMINISTRADOR
Route::get('/admin', [AdminsController::class, 'index'])->name('admin.users')->middleware('role:admin');
Route::get('/admin/monitoring', [AdminsController::class, 'monitoring'])->name('admin.monitoring')->middleware('role:admin');
Route::get('/admin/add-user', [AdminsController::class, 'addUserView'])->name('admin.adduser')->middleware('role:admin');
Route::post('/admin/add-user', [AdminsController::class, 'addUserStore'])->name('admin.adduser.store')->middleware('role:admin');

Route::get('/admin/history', [AdminsController::class, 'sessionHistory'])->name('admin.session.index')->middleware('role:admin');
Route::get('/admin/history/{session}', [SessionsController::class, 'history'])->name('admin.session.history')->middleware('role:admin');

Route::get('/admin/session', [AdminsController::class, 'sessionView'])->name('admin.session.controls')->middleware('role:admin');
Route::get('/admin/session/control', [SessionsController::class, 'close'])->name('admin.session.close')->middleware('role:admin');
Route::post('/admin/session/control', [SessionsController::class, 'store'])->name('admin.session.store')->middleware('role:admin');

// SUPERVISOR
Route::get('/supervisor', [SupervisorsController::class, 'index'])->name('supervisor.users')->middleware('role:supervisor');
Route::get('/supervisor/add-user', [SupervisorsController::class, 'addUserView'])->name('supervisor.adduser')->middleware('role:supervisor');
Route::post('/supervisor/add-user', [SupervisorsController::class, 'addUserStore'])->name('supervisor.adduser.store')->middleware('role:supervisor');

Route::get('/supervisor/find-ticket', [SupervisorsController::class, 'findTicket'])->name('supervisor.find')->middleware('role:supervisor');
Route::post('/supervisor/find-ticket', [SupervisorsController::class, 'findTicketPost'])->name('supervisor.find.post')->middleware('role:supervisor');
Route::get('/supervisor/find-ticket/{id}', [SupervisorsController::class, 'viewTicket'])->name('supervisor.find.view')->middleware('role:supervisor');
Route::get('/supervisor/cancel-ticket/{id}', [SupervisorsController::class, 'cancelSale'])->name('supervisor.find.cancel')->middleware('role:supervisor');

Route::get('/supervisor/cancel-ticket-print/{id}', [SupervisorsController::class, 'cancelSalePrint'])->name('supervisor.find.cancel.print')->middleware('role:supervisor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
