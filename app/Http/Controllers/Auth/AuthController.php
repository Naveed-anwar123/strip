<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;
class AuthController extends Controller
{    

	public function redirectToFacebook()
{
    return Socialite::with('facebook')->redirect();
}
public function getFacebookCallback()
{
    $data = Socialite::with('facebook')->user();
//echo    $data->getName();
   // echo "<br>";
   var_dump($data);
  //echo  $data->getEmail();

    //echo '<img src="https://www.facebook.com/app_scoped_user_id/1901859750086767/">';
    //echo '<img src="1.jpg">';
    $user = User::where('email', $data->email)->first();
    if (!is_null($user)) {
         Auth::login($user);
         $user->name = $data->user['name'];
         $user->facebook_id = $data->user['id'];
         $user->save();
     }
    else {
         $user = User::where('facebook_id', $data->user['id'])->first();
        if (is_null($user)) {
            // // Create a new user
            
            $user = new User();

            $user->name = $data->user['name'];
            $user->facebook_id = $data->user['id'];
             $user->email = "abc";
            $user->password =md5("d");
             $user->save();
			 
         }
    //     Auth::login($user);
     }
    // return redirect('/')->with('success', 'Successfully logged in!');
}
}