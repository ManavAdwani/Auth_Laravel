<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

Route::view('/signup','signup')->name('signup');

Route::post('/signingUp', [MainController::class, 'registration'])->name('signingUp');

Route::get('/login',function(){
    return view('login');
})->name('login');

// Mailabel Route
Route::get('laravel-send-email', [MainController::class, 'registration'])->name('Email');

// Login Url route
Route::post('/logingin', [MainController::class, 'login'])->name('logingin');

//Homepage
Route::get('homepage', function(){
    if (session('username')) {
        return view('homepage');
        # code...
    }
    else{
        return view('login');
    }
})->name('homepage');

// Admin page
Route::get('adminpage', function(){
    if (session('username')) {
     return view('adminpage');
    }

    else{
        return view('login');
    }
})->name('admin');

Route::get('/imageUpload', [MainController::class, 'imageUpload'])->name('uploadImage');
Route::post('/Uploading', [MainController::class, 'uploading'])->name('image-Upload');
Route::get('list',[MainController::class, 'showData'])->name('showData');
Route::get('userList',[MainController::class, 'showUser'])->name('showUser');

Route::get('showUserFiles',[MainController::class, 'userFiles'])->name('UserFiles');

Route::get('/terms&conditons', function(){
    return view('terms');
})->name('terms');

//Forget password
Route::get('forget_password', [MainController::class, 'forget_password'])->name('forget');

// FP form route
Route::post('checkEmail', [MainController::class, 'checkEmail'])->name('emailCheck');

//New pass Route
Route::get('newPass', [MainController::class, 'newPasses'])->name('newPass');
Route::post('PassUpdate', [MainController::class, 'UpdatePass'])->name('passUpdate');

// Logout page
Route::get('logout', [MainController::class, 'logout'])->name('logout');

// Pdf uploading route
Route::get('pdfUplad', [MainController::class, 'pdfupload'])->name('pdf');

// Pdf uploadin route
Route::post('uploading', [MainController::class, 'pdf_uploading'])->name('pdfUploading');

// Show Pdf
Route::get('/show', [MainController::class, 'showPdf'])->name('showpdf');

// Download Pdf
Route::get('/download/{filename}', [MainController::class, 'download'])->name('download');
// view Pdf
Route::get('/view/{id}', [MainController::class, 'view'])->name('view');

// Add User
Route::get('addUser', [MainController::class, 'addUser'])->name('addUser');
Route::post('addingUser', [MainController::class, 'addingUser'])->name('addingUser');

// Edit Image upload files
Route::get('/editImage/{id}', [MainController::class, 'editImage'])->name('editImage');
// Edit from route
Route::post('editing/{id}', [MainController::class, 'editing'])->name('image-editing');
// Delete
Route::get('delete/{id}', [MainController::class, 'deleteImg'])->name('delete');

// Edit user 
Route::get('editUser/{id}', [MainController::class, 'editUser'])->name('editUser');
// Editing route
Route::post('updateUser/{id}', [MainController::class, 'updatingUser'])->name('updateuser');
//Delete User
Route::get('delete/{id}', [MainController::class, 'deleteUser'])->name('deleteUser');

// Delete Files
Route::get('deleteFiles/{id}', [MainController::class, 'deleteFiles'])->name('deleteFiles');

// Admin File upload
Route::get('admin-upload',[MainController::class, 'adminUpload'])->name('adminUpload');