<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use App\Models\file;
use App\Models\pdf;
use App\Http\Controllers\Auth;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\stroage;
class MainController extends Controller
{
    // Registration Input function
    function registration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:registrations,email',
            'pass'=>'required',
            'cpass'=>'required'
        ]);
        // Taking all input of the user and then saving it in the database
        $reg = new registration; // This indicating new recored should be inserted
        $reg->name=$request->input('name');
        $reg->email=$request->input('email');
        $reg->password=$request->input('pass');
        $reg->confirm_password=$request->input('cpass');
        // Checking that both the passwords are same or not 
        if ($reg->password==$reg->confirm_password) {
            // If yes then saving all the records in DB and ...
            $reg->save();
            // and sending mail to the users email with their password and Email
            $mailData = [
                'title' => 'Mail From Dweek Studios',
                'body' => 'Your Email is : '.$reg->email.' And your Password is : '.$reg->password,

            ];
            Mail::to($reg->email)->send(new MailNotify($mailData));
            return back()->with('status','User Registered Successfully...Please check your mail');
        }
        // And if the passwords are not same it will alert the user
        else{
            return back()->with('failed','Password should be Same...');
        }
    }

    // This is the function to send the user email after registration

    // function index(){
    //     $mailData = [
    //         'title' => 'Mail From Dweek Studios',
    //         'body' => 'This is for testing Email using smtp',
    //     ];

    //     Mail::to('manav3608@gmail.com')->send(new MailNotify($mailData));

    //     dd('Email sent');
    // }

    // Now after registration user needs to login so we have to check the data in the DB that its present or not
        // This is Login function
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'pass'=>'required',
        ]);
        // Taking all the input from the user and saving into variable
        $email = $request->input('email');
        $password = $request->input('pass');

        // Assigning role to the user ( BY DEFAULT IT WILL BE 1 means USER ) Only admin can change the user to the Admin or anyother role x
            // Here we are checking the role of the user from the DB/
        $role = registration::where('email',$email)->select('role')->first();
        // dd($role);
            // And after that we are checking that email is present in the DB or Not
        if(registration::where('email', '=', $email)->exists()){
            // if yes then we are checking the password with that email
            if(registration::where('password', '=', $password)->where('email','=',$email)->exists()){
                // and if both are correct then we are checking their role
                if(registration::where('role','=',1)->where('email','=',$email)->exists()){
                    // If its 1 then we are sending them to the Admin page with session and all
                    $request->session()->put('username', $email);
                    $request->session()->put('role', $role);
                    // dd(session('username'));
			// return redirect('/demo/welcome');
                    return redirect('userList');
                }
                // And if not then we are sending them to the normal user page with session
                $request->session()->put('username', $email);
                if($request->session()->has('username')){
                    return redirect('showUserFiles');
                }
                else{
                    return view('login');
                }
            
            }
            // If password doesnt match with email then it will alert
            else{
                return back()->with('failed','Wrong Password');
            }
        }
        // if the email is not in the DB then it is not registered then it will alert the user
        else{
            return back()->with('failed','User is not registered');
        }
    }

    function homepage(Request $request){
        if($request->session()->has('username')){
         return view('homepage');
        }
        else{
            return view('login');
        }
    }
    
    // Now normal user can upload their image to the server
        // below function is for that only
    function imageUpload(){
        return view('imageupload', ['images'=>file::orderBy('id','DESC')->first()]);
    }

    // This will upload user image to the server

    function uploading(Request $req){
        $req->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $email = Session::get('username');
        $getName = registration::where('email','=',$email)->select('name')->first();
        $name=$getName->name;
        $ldate = date('Y-m-d H:i:s');
        // dd($name);
        $image = $req->file('file')->storeAs('public/images',$name.$ldate);
        $image;
        $file = new file;
        $file->name=$name;
        $file->file_path=$image;
        $file->save();
        return back()->with('status', 'File Uploaded');
    }

    // The following function is to show the data to the Admin (All files that are uploaded)
    function showData(Request $request){
        if($request->session()->has('username')){
        // return "GEKUU";
        $data = file::all();
        return view('showData', compact('data'));
        }
        else{
            return view('login');
        }
    }

    // The following function is to show the data to the admin (All User that are loggedin)
    function showUser(Request $request){
        if($request->session()->has('username')){
        $data = registration::all();
        return view('showUser', compact('data'));
        }
        else{
            return view('login');
        }
    }

    // The following function is to show the data to the user (Only their files)
    function userFiles(Request $request){
        if($request->session()->has('username')){
            $email = Session::get('username');
            $getName = registration::where('email','=',$email)->select('name')->first();
            $name=$getName->name;
            $data = file::where('name','=',$name)->get();
            // print_r($data);
            return view('userFiles', compact('data'));
        }
        else{
            return view('login');
        }
        
    }

    // If someone forget their password 
    function forget_password(){
        return view('forget_pass');
    }

    // it will check email first if it exists then only it can change the password
    function checkEmail(Request $req){
       $email = $req->input('email');
       if(registration::where('email', '=', $email)->exists()){
        $req->session()->put('email', $email);
        return redirect('newPass');
    }
    else{
        return back()->with('status','Email Not registered');
    }
}

    // New password page
    function newPasses(){
        return view('newPass');
    }

    // After inserting the password (new one) it will check if both passwords are same or not 
    function UpdatePass(Request $req){
        $email = Session::get('email');
        // dd($email);
       $pass = $req->input('pass');
       $cpass = $req->input('cpass');
       if ($pass == $cpass) {
        // if yes then it will see which email is this
           $getId = registration::where('email','=',$email)->select('id')->first();
           $Id=$getId->id;
           $user = registration::find($Id);
           $user->password = $req->input('pass');
           $user->confirm_password=$req->input('cpass');
           $user->update(); // then it will update that users password with alert
        return redirect('login')->with('status','Password changed successfully...Please login with new password');
       }
       else{
        return back()->with('status','Password Not Matched');
       }
    }

    // Logout page
    function logout(Request $request){
        $request->session()->forget('username');
        return view('login');
    }

    // Pdf uploading File
    function pdfupload(Request $request){
        if($request->session()->has('username')){
            $email = Session::get('username');
            // print_r($email);
        //     dd($email);
            $getName =  registration::where('email','=',$email)->select('name')->first();
            $name = $getName->name;
            // print_r($name);
            // dd($name);
            $request->session()->put('name', $name);
        return view('pdfupload',['pdfs'=>pdf::orderBy('id','DESC')->first()]);
        }
        else{
            return view('login');
        }
    }


    function pdf_uploading(Request $request){
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048'
        ]);
        $email = Session::get('username');
        $name = Session::get('name');
        $ldate = date('Y-m-d H:i:s');
        // dd($name);
        $pp = public_path();
        $file_name = $name.$ldate;
        $pdf_path = $request->file('pdf')->storeAs(public_path($name.$ldate));
        $pdf = new pdf;
        $pdf->name=$name;
        $pdf->file_name=$file_name;
        $pdf->file_path=$pdf_path;
        $pdf->save();
        return back()->with('status','File uploaded');

    }

    function showPdf(){
        $name = Session::get('name');
        // dd($name);
        $data = pdf::where('name',$name)->get();
       return view('showPdf',compact('data'));
    }

    function download(Request $request, $file){
        $file_path = public_path($file);
        // dd($file);
        $headers = array(
            'Content-Type: application/pdf',
          );
    return response()->download('storage'.$file_path, $file, $headers);
    }

    function view(Request $request, $id){
        $data = pdf::find($id);
        return view('viewpdfs', compact('data'));
    }

    function addUser(){
        return view('addUser');
    }

    function addinguser(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required|unique:registrations,email',
                'role'=>'required',
                'pass'=>'required',
                'cpass'=>'required'
            ]);
            // Taking all input of the user and then saving it in the database
            $reg = new registration; // This indicating new recored should be inserted
            $reg->name=$request->input('name');
            $reg->email=$request->input('email');
            $reg->role =$request->input('role');
            // dd($reg->role);
            $reg->password=$request->input('pass');
            $reg->confirm_password=$request->input('cpass');
            // Checking that both the passwords are same or not 
            if ($reg->password==$reg->confirm_password) {
                // If yes then saving all the records in DB and ...
                $reg->save();
                // and sending mail to the users email with their password and Email
                $mailData = [
                    'title' => 'Mail From Dweek Studios',
                    'body' => 'Your Email is : '.$reg->email.' And your Password is : '.$reg->password,
    
                ];
                Mail::to($reg->email)->send(new MailNotify($mailData));
                return back()->with('status','User Registered Successfully and Email sent');
            }
            // And if the passwords are not same it will alert the user
            else{
                return back()->with('failed','Password should be Same...');
            }
        }
    
        function editImage(Request $request, $id){
            $post = file::where('id', $id)->firstOrFail();
            return view('image_edit',compact('id'));
        }

        function editing(Request $req, $id){
            // dd($id);
            $req->validate([
                'file' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);
            $email = Session::get('username');
            $name = Session::get('name');
            $ldate = date('Y-m-d H:i:s');
            // dd($name);
            $image = $req->file('file')->storeAs('public/images',$name.$ldate);
            $image;
            $file = file::find($id);
            // $file = new file;
            $file->name=$name;
            $file->file_path=$image;
            $file->update();
            return back()->with('status', 'File Edited');
        }

        function deleteImg(Request $request , $id){
            $file = file::find($id);
            if( $file->delete()){
                return back()->with('status', 'Deleted');
            }else{
                return back()->with('failed', 'Error try again letter');
            }
        }

        function editUser(Request $request, $id){
            $registration = registration::find($id);
            return view('editUser',compact('registration'));
        }

        function updatingUser(Request $request, $id){
            $registration=registration::find($id);
            $registration -> name =$request['name'];
            $registration -> email =$request['email'];
            $registration->role=$request['role'];
            $registration->password = $request['pass'];
            $registration->confirm_password=$request['cpass'];
            $registration->save();
            return redirect('userList')->with('status', 'User Update Successfully');
        }

        function deleteUser(Request $request, $id){
            $registration = Registration :: find ($id)->delete ();
            return redirect('userList')->with('status', 'User Deleted Successfully');
        }

        function deleteFiles(Request $request, $id){
            $file = file::find($id)->delete();
            return redirect('list')->with('status', 'User File Deleted Successfully');
        }

        function adminUpload(){
            return view('admin_file');
        }


}

