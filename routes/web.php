<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeClientGroupController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.home');
    Route::get('/adminAddCustomer', [AdminController::class, 'adminAddCustomer'])->name('admin.AddCustomer');
    Route::get('/adminAddEmployee', [AdminController::class, 'adminAddEmployee'])->name('admin.AddEmployee');
    Route::post('/adminStoreEmployee', [AdminController::class, 'adminStoreEmployee'])->name('admin.StoreEmployee');
    Route::post('/adminStoreCustomer', [AdminController::class, 'adminStoreCustomer'])->name('admin.StoreCustomer');
    Route::get('/adminShowCustomers', [AdminController::class, 'adminShowCustomers'])->name('admin.ShowCustomers');
    Route::get('/adminShowEmployees', [AdminController::class, 'adminShowEmployees'])->name('admin.ShowEmployees');
    Route::get('/adminEditEmployee/{id}', [AdminController::class, 'adminEditEmployee'])->name('admin.EditEmployee');
    Route::get('/adminEditCustomer/{id}', [AdminController::class, 'adminEditCustomer'])->name('admin.EditCustomer');
    Route::put('/adminUpdateEmployee/{id}', [AdminController::class, 'adminUpdateEmployee'])->name('admin.UpdateEmployee');
    Route::put('/adminUpdateCustomer/{id}', [AdminController::class, 'adminUpdateCustomer'])->name('admin.UpdateCustomer');
    Route::delete('/adminDeleteEmployee', [AdminController::class, 'adminDeleteEmployee'])->name('admin.DeleteEmployee');
    Route::delete('/adminDeleteCustomer', [AdminController::class, 'adminDeleteCustomer'])->name('admin.DeleteCustomer');
    Route::get('/adminAssignCustomersToEmployee', [AdminController::class, 'adminAssignCustomersToEmployee'])->name('admin.AssignCustomersToEmployee');
    Route::get('/adminShowStatusTransactions', [AdminController::class, 'adminShowStatusTransactions'])->name('admin.ShowStatusTransactions');
    Route::delete('/adminDeleteStatusTransaction', [AdminController::class, 'adminDeleteStatusTransaction'])->name('admin.DeleteStatusTransaction');
    Route::post('/adminStoreAssignCustomersToEmployee', [AdminController::class, 'adminStoreAssignCustomersToEmployee'])->name('admin.StoreAssignCustomersToEmployee');

});
Route::middleware(['auth', 'employee'])->group(function () {
    Route::put('/employeeUpdateCustomer/{id}', [EmployeeController::class, 'employeeUpdateCustomer'])->name('Employee.UpdateCustomer');
    Route::get('/customerAssignedToMe', [EmployeeController::class, 'customerAssignedToMe'])->name('Employee.customerAssignedToMe');
    Route::resource('/Employee', EmployeeController::class);
    Route::get('/employeeEditCustomerstatus/{status}/{id}', [EmployeeController::class, 'employeeEditCustomerstatus'])->name('Employee.EditCustomerstatus');
});
Route::get('/customerInfoPage', [HomeController::class, 'customerInfoPage'])->name('customer.InfoPage')->middleware('customer');
