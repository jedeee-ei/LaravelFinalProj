<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return view('login');
});

//Register
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

//LogIn
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

//LogOut
Route::middleware('auth')->post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Dashboard
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-stats', [DashboardController::class, 'getStats']);
});

//Students
Route::middleware(['auth'])->group(function () {
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/create', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::delete('/students/{id}', [StudentController::class, 'delete'])->name('students.delete');
});

//Class
Route::middleware(['auth'])->group(function () {
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('/classes/create', [ClassController::class, 'store'])->name('classes.store');
Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
// Route::get('/classes/edit', [ClassController::class, 'edit'])->name('classes.edit');
// Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
});

//Attendance
Route::middleware(['auth'])->group(function () {
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/{class}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{class}', [AttendanceController::class, 'store'])->name('attendance.store');
});

//Reports
Route::middleware(['auth'])->group(function () {
Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');
});


