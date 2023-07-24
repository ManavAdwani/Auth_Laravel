<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ZipController;

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
Route::group(['middleware'=>"web"], function(){

    Route::get('/', function () {
        return view('welcome');
    });
    
    // Image upload route
    // Route::get('/imgupload', function(){
    //     return view('imageUpload');
    // })->name('imgupload');
    
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
            return redirect('login');
        }
    })->name('homepage');
    
    // Admin page
    Route::get('adminpage', function(){
        if (session('username')) {
         return view('adminpage');
        }
    
        else{
            return redirect('login');
        }
    })->name('admin');
    
    // Route::get('/imageUpload', [MainController::class, 'imageUpload'])->name('uploadImage');
    // Route::post('/Uploading', [MainController::class, 'uploading'])->name('image-Upload');
    Route::get('list',[MainController::class, 'showData'])->name('showData');
    Route::get('userList',[MainController::class, 'showUser'])->name('showUser');
    
    Route::get('showUserFiles',[MainController::class, 'userFiles'])->name('UserFiles');
    
    //Forget password
    Route::get('forget_password', [MainController::class, 'forget_password'])->name('forget');
    
    // FP form route
    Route::post('checkEmail', [MainController::class, 'checkEmail'])->name('emailCheck');
    
    //New pass Route
    Route::get('newPass', [MainController::class, 'newPasses'])->name('newPass');
    Route::post('PassUpdate', [MainController::class, 'UpdatePass'])->name('passUpdate');
    
    // Logout page
    Route::get('logout', [MainController::class, 'logout'])->name('logout');

    // Add User
    Route::get('addUser', [MainController::class, 'addUser'])->name('addUser');
    Route::post('addingUser', [MainController::class, 'addingUser'])->name('addingUser');
    
      
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
    
    
    //All pdfs showing to admin
    Route::get('allPdf', [MainController::class, 'allPdfs'])->name('allPdfs');
    Route::get('deletePdfs/{id}', [MainController::class, 'deletePdfs'])->name('deletePdfs');

    // Zip File Route
    Route::get('zip_upload', function(){
        return view('zipUpload');
    })->name('zipupload');

    // Zip uploading Route
    Route::post('zip_uploading', [MainController::class,'zipupload'])->name('zipUploading');
     // Show Zip
     Route::get('/showZip', [MainController::class, 'showZip'])->name('showZip');

     // Download zip
    Route::get('/downloadzip/{filename}', [MainController::class, 'downloadzip'])->name('downloadzip');

    // Download img
    Route::get('/downloadimg/{filename}', [MainController::class, 'downloadIMG'])->name('downloadimg');

    // File(ALll FILES) upload route

    Route::get('/FileUpload', function(){
        return view('uploadFiles');
    })->name('fileupload');

    Route::post('/FileUploading', [MainController::class, 'fileuploading'])->name('file-Upload');

     // Download FILE
     Route::get('/fileDownload/{filename}', [MainController::class, 'fileDownload'])->name('fileDownload');

      // Delete FILE
    Route::get('deletefile/{id}', [MainController::class, 'deleteFile'])->name('deletefile');

    // Testing Tag input
    Route::get('tags', function(){
        return view('tags');
    })->name('TAGS');

    // Tags
    Route::get('FileUpload', [MainController::class, 'tags'])->name('tag');

    // EDIT FILE\
     Route::get('editFile/{id}', [MainController::class, 'editFile'])->name('editFile');
     // Editing route
     Route::post('updateFile/{id}', [MainController::class, 'updatingFile'])->name('updateFile');

     // View Screenshot
     Route::get('seeFile/{filename}', [MainController::class, 'viewFile'])->name('viewFile');
     Route::get('/checkSS', [MainController::class, 'checking'])->name('checking');

     Route::get('/downloadZip/{filename}', [ZipController::class , "downloadFile"])->name('downloadzipss');
    // Route::get('/downloadZip/{filename}/{username}', function(){
    //     return "HELO";
    // })->name('downloadzipss');
  
});