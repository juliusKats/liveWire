<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Events\TwoFactorAuthenticationEnabled;
use Laravel\Fortify\RecoveryCode;


class UserProfileController extends Controller
{
    protected $provider;

    public function __construct(TwoFactorAuthenticationProvider $provider)
    {
        $this->provider = $provider;
    }
    //
   
    // Password Reset
    public function newPass(Request $request){
        $user=Auth::user()->id;
        $request->validate([
            'currentPass'=>'required',
            'newPass' =>'required','min:8',
            'confirmnewPass'=>'required','min:8',
        ]);
        $currentpass=$request->currentPass;
        $pass=$request->newPass;
        $confirmpass=$request->confirmnewPass;
        $existUser=DB::table('users')->where('id',$user)->where('confirmpassword',$currentpass)->get();
        $countuser=count($existUser);
        if($countuser < 1){
            return redirect(route('profile.user',Auth::user()->id))->with('error','Invalid Password Entered');
        }
        elseif($pass != $confirmpass){
            return redirect(route('profile.user',Auth::user()->id))->with('error','New Password and Confirmation Password Do not match');
        }
        else{
            $nextuser=User::find(Auth::user()->id);
            $nextuser->update([
                'password'=>Hash::make($request->newPass),
                'confirmpassword'=>$request->newPass
            ]);
            return redirect(route('profile.user',Auth::user()->id))->with('success','Password Successfully Update');
        }

    }
     // Enable Two Authentication
     public function enableAuth(Request $request,$force = false){
        $user=Auth::user()->id; //$2y$12$SXa.pbKLlogmEeEG1DnbFO1VsRm8BWYcLOh.3X6rV0BakAw6bIPri
        $userDBpass=$user->confirmpassword;
        $request->validate([
            'authPasswordVerify'=>'required'
        ]);
        $userInPass=$request->authPasswordVerify;

        if($userInPass != $userDBpass){
            return redirect(route('profile.user',$user->id))->with('error','Invalid Password Entered');
        }
        else {
            if (empty($user->two_factor_secret) || $force === true) {
                $secretLength = (int) config('fortify-options.two-factor-authentication.secret-length', 16);

                $user->forceFill([
                    'two_factor_secret' => encrypt($this->provider->generateSecretKey($secretLength)),
                    'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                        return(Str::random(10).'-'.Str::random(10));
                    })->all())),
                ])->save();
            }
        }
    }
       // Disable Auth
    public function disableAuth($id)
    {
        $authuser=Auth::user()->id;
        $user=User::find($authuser);
        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->two_factor_confirmed_at = null;
        $user->save();

        return app(TwoFactorDisabledResponse::class);
    }

    // generate new Recoverycode
    public function freshstore(){
        $authuser = Auth::user()->id;
        $user=User::find($authuser);
        $user->forceFill([
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                Str::random(10).'-'.Str::random(10);
            })->all())),
        ])->save();
    }

    public function ValidateCode(Request $request,$user, $code){
        $user=Auth::user();
        $request->validate([
            'verifyCode'=>'required'
        ]);
        $code=$request->verifyCode;
        if (empty($user->two_factor_secret) ||
            empty($code) ||
            ! $this->provider->verify(decrypt($user->two_factor_secret), $code)) {
            throw ValidationException::withMessages([
                'code' => [__('The provided two factor authentication code was invalid.')],
            ])->errorBag('confirmTwoFactorAuthentication');
        }

        $user->forceFill([
            'two_factor_confirmed_at' => now(),
        ])->save();
    }

    public function deleteAuthUser($id){
        $user=Auth::user()->id;
        $useremail = $user->email;
        // user sessions
        $sessions = DB::delete('delete sessions where user_id = ?', [$user->id]);
        // user group
        $group = DB::delete('delete groups where user_id = ?', [$user->id]);
        //group invite
       $groupinvite = DB::delete('delete group_invites where email = ?', [$useremail]);
       //group member
       $groupmembership = DB::delete('delete group_members where user_id = ?', [$user->id]);
       //user Team
       $teams = DB::delete('delete teams where user_id = ?', [$user->id]);
       //team invite
       $teaminvite = DB::delete('delete team_invitations where email = ?', [$useremail]);
       //team member
       $teammembership = DB::delete('delete team_user where user_id = ?', [$user->id]);
       $user->delete();

        return redirect('Authentication/user/register');
    }



}
