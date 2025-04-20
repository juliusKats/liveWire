<?php

namespace App\Http\Controllers\Auth;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Membership;
use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;


class UserAuthController extends Controller
{
    #authentication views

  public function loginUser(){
        return view("Layout.Auth.login");
  }

  public function  validateUser(Request $request) {
      $emailExist ="Email does not exists";
      $passInvalid = "Inavlid Password Entered. Try again";
      $mail = $request->email;
      $passInput=$request->password;

    $existsemail=$existUser=DB::table('users')->where('email','=',$mail)->get();
    foreach ($existsemail as $user){
      $existspass=$user->confirmpassword;

    }

    if (count($existsemail)<1){
      return redirect('Authentication/user/register')->with($mail,$emailExist);
    }
    else
    {
      $existUser=DB::table('users')->where('email','=',$mail)->where('confirmpassword','=',$passInput)->get();
      if (count($existUser)<1){
          return redirect('Authentication/user/login')->with($mail,$passInvalid);
        }
        else{
          $existingUser = User::where('email',$request->email)->first();

          Auth::login($existingUser);
          return redirect('/index');
        }
    }

  }

  public function  registerUser(){
    return view("Layout.Auth.register");
  }

  public function saveRegister(Request $request){
    // return ("hello");
    $validate_data= $request->validate([
         'fullname'=>'required','string','min:3',
        'avatar'=>'image','mimes:jpeg,png,jpg',
        'email'=>'required','min:3','email','unique:users,email',
        'password'=>'required','min:8','max:20',

      ]);
      $ip = request()->ip();
      $data=[
         'name'=>$request->fullname,
          'email'=>$request->email,
          'password'=>Hash::make($request->password),
          'confirmpassword'=>$request->password,

       ];

      if(!empty($request->avatar)){

          $imageName=time().'.'.$request->avatar->extension();
          $request->avatar->move(public_path('profile/images'),$imageName);
              $data +=[
                'userimage'=>$imageName,
              ];
        }
              $user=User::create($data);

               /**
               * Create a personal team for the user.
               */
              $team=Team::forceCreate([
                  'user_id' => $user->id,
                  'name' => explode(' ', $user->name, 2)[0]."'s Team",
                  'personal_team' => true,
                ]);
              //  adding user to Members
              $member = Membership::create([
                  'user_id'=>$user->id,
                  'team_id'=>$team->id,
                  'role'=>'admin'
              ]);
               // create Group
         // Create a personal team for the user.
         $group=Group::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Group",
            'personal_group' => true,
          ]);
          // add user to group
          $groupmember = GroupMember::create([
            'user_id'=>$user->id,
            'group_id'=>$group->id,
            'role'=>'admin'
        ]);
      Auth::login($user);
      return redirect('/dashboard');
  }

  public function VerifyEmail(){
    $user=Auth::user()->email;
    return view("Layout.Auth.verifyEmail");
  }
  public function PasswordResetLink(Request $request){
    $request->validate([
        'email' => 'required','email'
    ]);

    $existUser = User::where('email',$request->email)->get();
    if(count($existUser)<1){
        return redirect("{{ route('password.request') }}")->with('error','The email address does not exists. Register and Login');
    }
    else {
        return back()->with('success','A password reset link has been sent to your email');
    }
    // password.resend.link
    // dd($existUser);
  }
  public function userProfile($id){
    $user=User::find($id);
    $teams=DB::table('teams')->where('user_id','=',Auth::user()->id)->get();
    $userssesions= DB::table('sessions')->where('user_id','=',$id)->get();
    if($user->two_factor_recovery_codes){
         $codes =json_decode(decrypt($user->two_factor_recovery_codes), true);
     }
     $codes ="";
     return view('Users.Profile.profile',compact('user','userssesions','codes','teams'));

}
  public function ResendVerify(){
    dd('mail send');
  }

  // Google Authentication
  public function redirect(){
    // redirect user to google auth
    return Socialite::driver('google')->redirect();
  }
  public function callback(){
    try {
      // getting user information from Google
      $user = Socialite::driver('google')->user();
    }
    catch(Throwable $e){
      return redirect('/')->with('error','Google Authentication Failed');
    }
    // Check if user exists in database
    $existingUser = User::where('email',$user->email)->first();

    if($existingUser){
      // Login User if existingUser
      Auth::login($existingUser);
    }
    else{
      // create user and login
      $newUser=User::updateOrCreate([
        'email'=>$user->email,
      ],[
        'name'=>$user->name,
        'google_id'=>$user->id,
        'password'=>bcrypt(Str::random(16)),
        'email_verified_at'=>now()
      ]);
      Auth::login($newUser);
    }
  }
}
