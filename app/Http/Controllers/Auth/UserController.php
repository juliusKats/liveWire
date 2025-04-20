<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Contracts\TwoFactorEnabledResponse;
use Laravel\Fortify\Events\TwoFactorAuthenticationConfirmed;
use Laravel\Fortify\Events\TwoFactorAuthenticationDisabled;
use Laravel\Fortify\Events\TwoFactorAuthenticationEnabled;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\RecoveryCode;
use Spatie\Permission\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\Session;
use App\Models\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facade;


use Throwable;


class UserController extends Controller
{
protected $provider;
    public function __construct(TwoFactorAuthenticationProvider $provider)
    {
        $this->provider = $provider;
    }


  public function index(){
    $users =User::all();
      return view("Users.Profile.index",compact('users'));
  }


  public function addUser(){
    $roles=Role::all();
    return view("Users.Profile.create",compact('roles'));
  }

  public function storeUser(Request $request){
    $validate_data=$request->validate([
      'fullname'=>'required','string','min:3',
      'avatar'=>'image','mimes:jpeg,png,jpg','max:5120',
      'email'=>'required','min:3','email','unique:users,email',
      'password'=>'required','min:8','max:20',
      'roles'=>'required','exists:roles,name',
    ]);

    // dd($validate_data);
    if (!empty($request->avatar)){
      $imageName=time().'.'.$request->avatar->extension();
      $request->avatar->move(public_path('profile.images'),$imageName);

      // Create user.
       $user=User::create([
        'name'=>$request->fullname,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
           'confirmpassword'=>$request->password,
        'userimage'=>$imageName,
        ]);

         // Create a personal team for the user.
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
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
          ]);
          // add user to group
          $groupmember = GroupMember::create([
            'user_id'=>$user->id,
            'group_id'=>$group->id,
            'role'=>'admin'
        ]);
        //roles
        $user->syncRoles($request->roles);
    }
    else
    {
        // Create user.
       $user=User::create([
        'name'=>$request->fullname,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
           'confirmpassword'=>$request->password,

        ]);

         // Create a personal team for the user.
        $team=Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
          ]);
        $member = Membership::create([
            'user_id'=>$user->id,
            'team_id'=>$team->id,
            'role'=>'admin'
        ]);
         // Create a personal team for the user.
         $group=Group::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
          ]);
          // add user to group
          $groupmember = GroupMember::create([
            'user_id'=>$user->id,
            'group_id'=>$group->id,
            'role'=>'admin'
        ]);
        $user->syncRoles($request->roles);

    }


    return redirect('Users/index')->with('status','User successfully created');

  }

  public function editUser($id){
    $roles=Role::pluck('name','name')->all();
    $user=User::findorFail($id);
    $userRoles=$user->roles->pluck('name','name')->all();

    return view("Users.Profile.edit",compact('user','roles','userRoles'));
  }

  public function updateUser(Request $request,$id){
    $user=User::findorFail($id);
    $request->validate([
      'fullname'=>'required','string','min:3',
      'password'=>'nullable','min:8','max:20',
      'roles'=>'required','exists:roles,name',
    ]);
    $data=[
      'name'=>$request->fullname,
      'email'=>$request->email,
    ];

    if(!empty($request->password)){
      $data += [
        'password'=>Hash::make($request->password),
          'confirmpassword'=>$request->password,
        ];
      }
      $user->update($data);
      $user->syncRoles($request->roles);
      return redirect('Users/index')->with('status',"$user->name's information successfully updates");

  }

  public function deleteUser($id){
    $user=User::find($id);
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
   return redirect ('Users/index')->with('succes','User Successfully Delete');

  }


  public function genPDF(){
        $users = User::get();
        $data =[
            'title'=>'Welcome to Live wire',
            'date'=>date('d/m/Y'),
            'users'=>$users,
        ];
        $pdf = PDF::loadView("Users.Profile.userlist",$data);
        return $pdf->download('userlist.pdf');
  }


}
