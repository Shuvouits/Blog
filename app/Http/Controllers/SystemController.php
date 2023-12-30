<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Agent;
use App\Mail\BlogMail;
use App\Models\Browser;
use Illuminate\Support\Facades\Mail;

class SystemController extends Controller
{
    public function login(){
        return view('system.login');
    }

    public function login_post(Request $request){

       
        $email = $request->input('email');
        $password = $request->input('password');

        $data = Agent::browser();

        $count_session_browser = Browser::where('name', $data)->count();

        if($count_session_browser == 0){
            $count_session_browser = $count_session_browser + 1;
            $session_browser =New Browser();
            $session_browser->name = $data;
            $session_browser->count = $count_session_browser;
            $session_browser->save();

        }else{

            $search_data = Browser::where('name',$data)->first();
            $id = $search_data->id;
            $count = $search_data->count;

            $find_data = Browser::find($id);
            $find_data->count = $count+1;
            $find_data->save();

        }

        $password = md5($password);
       
        
        
        $count_data = User::where('email',$email)->where('password',$password)->count();
       

        if($count_data == 1){
            $user_details = User::where('email',$email)->first();
            $name = $user_details->name;
            $image = $user_details->image;
            Session()->put('email',$email);
            Session()->put('name',$name);
            Session()->put('image',$image);
            return redirect('/admin/dashboard')->with('success', "welcome $name !");
        }else{
            return redirect()->back()->with('error', 'Error your Email or Password');
        }

        

    }

    public function register(){
        return view('system.register');
    }

    public function register_post(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $rpassword = $request->input('rpassword');
        $terms = $request->input('terms');
        

        $email_count = User::where('email',$email)->count();

        if($email_count == 0){

            $password_length = strlen($password);
            if($password_length > 7){

                

                if($password == $rpassword){

                    if($terms == 'agree'){
                        $password = md5($password);
                        
                        $user = new User();
                        $user->name = $name;
                        $user->email = $email;
                        $user->password = $password;
                        $user->save();
                        return redirect('/login')->with('success', " welcome $name You Registration Successfully ");

                    }else{
                        return redirect()->back()->with('error', 'Please Follow Our Terms and Condition');
                    }
                    
                    
                }else{
                    return redirect()->back()->with('error', "Retype Password didn't matched");
                }
               
            }else{
                return redirect()->back()->with('error', 'password Must Be 8 Character');

            }

        }else{
            return redirect()->back()->with('error', 'This email are already used');
        }
        

        
       
    }

    public function forgot_password(){
        return view('system.forgotpassword');
    }

    public function recover_manage(){
        return view('system.recoverpassword');
    }

    public function recover_password(Request $request){

        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->input('email');
        $count = User::where('email',$email)->count();

        if($count==0){
           return redirect()->back()->with('error','This Email is Not Valid Try Different One !!');
        }else{

            $password = rand(100000000, 999999999);

            $user_data = User::where('email',$email)->first();
            $id = $user_data->id;

            $find_user = User::find($id);
            $find_user->password = md5($password);
            $find_user->save();
           
            $details = [
                'password' => $password,

            ];

            Mail::to($email)->send(new BlogMail($details));
            return redirect('/login')->with('success', 'Your Password is Send By Your Email');

        }
    }

    public function test(){
        return view('system.gmail');
    }

    
}
