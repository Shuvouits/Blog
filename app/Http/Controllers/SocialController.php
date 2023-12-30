<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use File;
use Stateless;
use Exception;
use Socialize;



class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();



        if (!empty($googleUser->getAvatar()) && $googleUser->getAvatar() != '' && $googleUser->getAvatar() != null) {
            $fileContents = file_get_contents($googleUser->getAvatar());
            File::put(public_path() . '/images/' . $googleUser->getId() . ".jpg", $fileContents);
            $avatar_file_name =  $googleUser->getId() . ".jpg";
        }



        $email = $googleUser->email;
        $name = $googleUser->name;


        if ($user) {
            $user->update([
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token,
                'image' => $avatar_file_name,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);


            //$image = $googleUser->image;
        }

        Auth::login($user);

        Session()->put('email', $email);
        Session()->put('name', $name);
        Session()->put('image', $avatar_file_name);


        //image upload

        $check_data = User::where('email', $email)->first();
        $user_id = $check_data->id;

        $find_data = User::find($user_id);
        $find_data->image = $avatar_file_name;
        $find_data->save();

        return redirect('/admin/dashboard');
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(User $user)
    {

        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        $user = User::where('facebook_id', $facebookUser->id)->first();

        if (!empty($facebookUser->getAvatar()) && $facebookUser->getAvatar() != '' && $facebookUser->getAvatar() != null) {
            $fileContents = file_get_contents($facebookUser->getAvatar());
            File::put(public_path() . '/images/' . $facebookUser->getId() . ".jpg", $fileContents);
            $avatar_file_name =  $facebookUser->getId() . ".jpg";
        }



        $email = $facebookUser->email;
        $name = $facebookUser->name;


        if ($user) {
            $user->update([
                'google_token' => $facebookUser->token,
                'google_refresh_token' => $facebookUser->refreshToken,
            ]);
        } else {
            $count = User::where('email', $facebookUser->email)->count();

            if ($count == 0) {

                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'google_token' => $facebookUser->token,
                    //'image' => $avatar_file_name,
                    'google_refresh_token' => $facebookUser->refreshToken,
                ]);


                Session()->put('email', $email);
                Session()->put('name', $name);
                Session()->put('image', $avatar_file_name);

                //upload image

                $check_data = User::where('email', $email)->first();
                $user_id = $check_data->id;

                $find_data = User::find($user_id);
                $find_data->image = $avatar_file_name;
                $find_data->save();
                return redirect('/admin/dashboard');
            } else {

                Session()->put('email', $email);
                Session()->put('name', $name);
                Session()->put('image', $avatar_file_name);
                return redirect('/admin/dashboard');
            }



            //$image = $googleUser->image;
        }
    }
}
