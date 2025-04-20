<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupInvite;
use App\Models\GroupMember;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
     //
     public function create(){
        return view('Users.Groups.create');
    }

    public function store(Request $request,$id){
        $user=User::find($id);
        $request->validate([
            'groupName'=>'required','min:3','string'
        ]);
        $group=Group::create([
            'user_id'=>$user->id,
            'name' =>  $request->groupName,
            'personal_group' => true,
        ]);
        $user->current_group_id=$group->id;
        $user->save();
        return redirect("Users/profile/user/$id");
    }
    public function groupSetting($id){
        $authuser=Auth::user()->email;
        $invitinggroup =Auth::user()->current_group_id;
        $invitingdetails=Group::find($invitinggroup);


        $user=User::find($invitingdetails->user_id);
        $invitees=DB::table('group_invites')->where('group_id',$invitinggroup)->get();
        $groupMember=DB::table('group_members')->where('group_id',$invitingdetails->id)->get();
        $userinvitation=DB::select("select * from group_invites where email =?", [$authuser]);
        return view('Users.Groups.setting',compact('user','userinvitation','invitees','groupMember','invitingdetails'));
    }
    public function groupUpdate(Request $request,$id){
        $group=Group::find($id);
        $request->validate([
            'groupName'=>'required','min:3','string'
        ]);
        $group->update([
            'name' =>  $request->groupName,
            'personal_group' => true,
            'user_id'=>Auth::user()->id
        ]);
        return redirect("Teams/user/team/setting/$id");
    }
    // adding member to team
   public function inviteMember(Request $request, $groupId){
        $authemail=Auth::user()->email;
        $group=Group::find($groupId);
        $id=$group->id;
        $request->validate([
            'invitedMail'=>'required','email'
        ]);
       $existInvite=DB::table('group_invites')->where('group_id',$group->id)->where('email',$request->invitedMail)->first();

       if(($authemail) == ($request->invitedMail)){
        return redirect("Teams/user/team/setting/$id")->with('emailError','You cannot invite yourself');
       }

       elseif($existInvite){
        return redirect("Teams/user/team/setting/$id")->with('emailError','The email has already been invited');
       }
       else{
        DB::table('group_invites')->insert([
            'group_id'=>$group->id,
            'email'=>$request->invitedMail,
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect("Teams/user/team/setting/$id")->with('success','Invitation has been sent successful');
       }
   }

   public function cancelInvite($id){
        $invitee=GroupInvite::find($id);
        $team=$invitee->team_id;
        $invitee->delete();
        return redirect("Teams/user/team/setting/$id")->with('success','Invitation has been cancelled');
   }

   public function leaveGroup($id){
    $group=GroupMember::find($id);
    $authuser=Auth::user()->id;
    $group->delete();
    return redirect("Users/profile/user/$authuser");
}

    public function deleteGroup($id){
        $team=Group::find($id);
        $authuser=Auth::user()->id;
        $newteam=DB::select("select * from groups where user_id = $authuser and personal_group = ? limit ?",[1,1]);
        foreach($newteam as $tm){
            $pp=$tm->id;
        }
        $user=DB::update("update users set current_team_id = $pp where id = $authuser");
        $team->delete();
        return redirect("Users/profile/user/$authuser");
    }


    public function acceptInvite($id){
        $authuser=Auth::user()->id;
        $invite=GroupInvite::find($id);
        $email = $invite->email;
        $selected=DB::select('select * from users where email = ?', [$email]);

       //check if the email is Regester
       if(count($selected)>0){
            foreach($selected as $select)
         // make membership
            $member = GroupMember::create([
                'user_id'=>$select->id,
                'group_id'=>$invite->id,
                'role'=>$invite->role
            ]);
            //delete invite
            $delete=$invite->delete();
            return redirect("Authentication/profile/user/$authuser");
       }
       else
       {
         // Create user.
            $user=User::create([
                'name'=>explode('@',$email,2)[0],
                'email'=>$email,
                'password'=>Hash::make('12345'),
                'confirmpassword'=>'12345',

            ]);
            // Create a personal team for the user.
            $team=Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode('@',$email,2)[0]."'s Group",
                'personal_team' => true,
            ]);
            // make membership
            $member = GroupMember::create([
                'user_id'=>$user->id,
                'team_id'=>$invite->id,
                'role'=>$invite->role
            ]);
            //delete invite
            $delete=$invite->delete();
            return redirect("Authentication/profile/user/$authuser");
       }
    }


    public function changeGroup($id){
        $authuser=Auth::user()->id;
        $team=Group::find($id);
        $teamId=$team->id;
        $user=User::find($authuser);
        $user=DB::update("update users set current_group_id = $teamId where id = $authuser");
        return redirect("Authentication/profile/user/$authuser");
    }



}
