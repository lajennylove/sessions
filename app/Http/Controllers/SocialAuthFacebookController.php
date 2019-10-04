<?php
// SocialAuthFacebookController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Profile;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
//        dd("algo");
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {

        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user()); 
        $profile = Profile::where('user_id', $user->id)->first();
//        auth()->login($user);
        \Auth::login($user);
        return redirect('/bandas');
    }
}