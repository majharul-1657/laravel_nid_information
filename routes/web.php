<?php
use App\Models\StudentClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Nid\ZillaController;
use App\Http\Controllers\Backend\Nid\AddressController;
use App\Http\Controllers\Backend\Nid\UpoZillaController;
use App\Http\Controllers\Backend\Nid\BloodGroupController;
use App\Http\Controllers\Frontend\Nid\NidSearchController;
use App\Http\Controllers\Backend\Nid\NidInformationController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentClassDeleteController;

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
Route::get('/hhhh', function () {
    return view('frontend.layouts.home');
    
});
Route::get('/', [NidSearchController::class, 'home'])->name('frontend.home');
Route::get('/nid/search', [NidSearchController::class, 'nidShow'])->name('nid.search');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [BackendController::class, 'home'])->name('backend.home');
//user route
Route::prefix('dashboard/')->name('backend.')->group(function(){
    Route::resource('user', UserController::class);
    Route::get('user/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
});
Route::prefix('dashboard/users/')->name('backend.')->group(function(){
    Route::resource('profile', ProfileController::class);
});
Route::prefix('dashboard/setup/student/')->name('backend.')->group(function(){
    Route::resource('class', StudentClassController::class)->except('show');
    Route::get('studentclass/delete/{id}', [StudentClassDeleteController::class, 'studentClassDelete'])->name('student.class.delete');
});
Route::prefix('dashboard/nid/')->name('backend.')->group(function(){
    Route::resource('zilla', ZillaController::class)->except('show');
    Route::get('zilla/delete/{id}', [ZillaController::class, 'zillaDelete'])->name('zilla.delete');
    Route::resource('upozilla', UpoZillaController::class)->except('show');
    Route::get('upozilla/delete/{id}', [UpoZillaController::class, 'upoZillaDelete'])->name('upozilla.delete');
    Route::resource('address', AddressController::class)->except('show');
    Route::get('address/delete/{id}', [AddressController::class, 'addressDelete'])->name('address.delete');
    Route::resource('bloodgroup', BloodGroupController::class)->except('show');
    Route::get('bloodgroup/delete/{id}', [BloodGroupController::class, 'bloodGroupDelete'])->name('bloodgroup.delete');
    Route::resource('information', NidInformationController::class);
    Route::get('information/delete/{id}', [NidInformationController::class, 'informationDelete'])->name('information.delete');
});



