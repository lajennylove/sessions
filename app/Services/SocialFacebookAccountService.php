<?php
namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use App\Profile;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
//        if (!$providerUser->has('code') || $providerUser->has('denied')) {
//            return redirect('/');
//        }
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
                'token' => $providerUser->token,
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                
                if( !empty($providerUser->getEmail()))
                {
                    $usr_prev = User::where('email', $providerUser->getEmail())->first();
                    if($usr_prev == null)
                    {
                        $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'password' => md5(rand(1,10000)),
                            'role'=>'user',
                        ]);
                    } else {
                        $uuid1 = Uuid::uuid1();
                        $uuid1 = $uuid1->toString();
                        $email = $uuid1."@mail.com";
                        $user = User::create([
                            'email' => $email,
                            'password' => md5(rand(1,10000)),
                            'role'=>'user',
                        ]);
                    }
                } else {
                    $uuid1 = Uuid::uuid1();
                    $uuid1 = $uuid1->toString();
                    $email = $uuid1."@mail.com";
                    $user = User::create([
                        'email' => $email,
                        'password' => md5(rand(1,10000)),
                        'role'=>'user',
                    ]);
                }
                $profile = Profile::create([
                    'name' => $providerUser->getName(),
                    'image_url' => $providerUser->getAvatar(),
                    'user_id'=>$user->id,
                ]);
            }
            $profile = Profile::where('user_id', $user->id)->first();
            $profile->image_url = $providerUser->getAvatar();
            $profile->update();
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}