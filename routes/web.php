<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\PrintController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PrescriptionController;

// controller ngay sau khi login vao
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepage', function(){
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();



// Appointment All Route
Route::controller(FrontendController::class)->group(function () {
    Route::get('/','index')->name('find.doctor');
    Route::get('/findDoctor',function(){
        return view('finddoctor');
    })->name('find_doctor');
    Route::get('/new/appointment/{doctorId}/{date}', 'show')->name('create.appointment');

    Route::post('/book/appointment', 'store')->name('book.appointment')->middleware(['auth', 'patient']);

    Route::get('/my-booking', 'myBooking')->name('my.booking')->middleware(['auth', 'patient']);

     // my prescription
    Route::get('/my-prescription', 'myPresciption')->name('my.prescription')->middleware(['auth', 'patient']);
});



Route::group(['middleware' => ['auth', 'patient']], function() {
    // Profile All Route
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');

        Route::post('/profile/store', 'store')->name('profile.store');
        Route::post('/profile/image/store', 'storeImage')->name('profile.image.store');
    });
});


// resource: index/create/store/show/edit/update/destroy
// middleware admin vua tao ra trong kernel -> only admin moi duoc access
Route::group(['middleware' => ['auth', 'admin']], function() {

       Route::resource('/doctor', DoctorController::class);
    Route::resource('/admins', AdminsController::class);

    Route::get('/today/booking', [PatientListController::class, 'todayBooking'])->name('today.booking');
    Route::get('/status/booking/update/{id}', [PatientListController::class, 'updateBookingStatus'])->name('update.booking.status');

    Route::get('/all/booking', [PatientListController::class, 'allBooking'])->name('all.booking');

    // department
    Route::resource('/department', DepartmentController::class);
});


// middleware doctor -> only doctor moi duoc access
Route::group(['middleware' => ['auth', 'doctor']], function() {
    // Appointment All Route
        Route::get('create-pdf-file/{id}', [PDFController::class, 'index'])->name('create.pdf.file');
        Route::controller(AppointmentController::class)->group(function () {
        Route::resource('/appointment', AppointmentController::class);
        Route::post('/appointment/check', 'check')->name('appointment.check');
        Route::post('/appointment/update', 'updateTime')->name('appointment.update.time');

    });

    // Prescription All Route
    Route::controller(PrescriptionController::class)->group(function () {
        Route::get('/patients/visited/today', 'patientsVisitedToday')->name('patients.visited.today');
        Route::post('/store/prescription', 'storePrescription')->name('store.prescription');
        Route::get('/prescription//{userId}/{date}', 'showPrescription')->name('prescription.show');

        Route::get('/prescribed-patients}', 'patientsFromPrescription')->name('patients.from.prescription');
    });
});

