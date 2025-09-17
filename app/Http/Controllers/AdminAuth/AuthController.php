<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;



class AuthController extends Controller
{ 
    //admin login
    public function adminLogin(){

        
        if(Auth::check() == false ) {

            return view('admin.auth.login');

        }else{

            return redirect()->intended(route('dashboard'));
        }

        
    }

   // admin postlogin
    public function adminPostLogin(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $email=$credentials['email'];
        $password=$credentials['password'];
      //  dd( $credentials);

      if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
           return redirect()->intended(route('dashboard'));
           

        }else{

            return redirect()->back()->with(['error'=> 'Your email or password is incorrect. please try again']);
        }


        
    }


   // admin forgotPassword
   public function forgotPassword(Request $request)
   {

       return view('admin.auth.password.forgot_password');
       
   }


     // admin resetPassword

     public function resetPassword(Request $request)
     {


       
        $user_email = DB::table('users')->where('email', $request->email)->first();

        
  
         return view('admin.auth.login')->with(['success'=> 'Chack your email instructions will be sent to you!']);
         
     }

     



    public function adminLogout()
    {
        Auth::logout();
        return redirect(route('adminLogin'));
    }


}
