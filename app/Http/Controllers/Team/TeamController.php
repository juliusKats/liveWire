<?php

namespace App\Http\Controllers\Team;
use App\Models\TeamInvitation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use App\Models\Team;
use App\Models\Membership;

use Laravel\Jetstream\Actions\UpdateTeamMemberRole;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Laravel\Jetstream\Contracts\RemovesTeamMembers;
use Laravel\Jetstream\Features;

class TeamController extends Controller
{
    //
    public function create(){
        return view('Users.Teams.create');
    }
    public function store(Request $request,$id){
        $user=User::find($id);
        $request->validate([
            'teamName'=>'required','min:3','string'
        ]);
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());
        AddingTeam::dispatch($user);


        $user->switchTeam($team = $user->ownedTeams()->create([
            'name' =>  $request->teamName,
            'personal_team' => false,
        ]));
        $user->current_team_id=$team->id;
        $user->save();
        return redirect("Authentication/profile/user/$id");
    }
    public function teamSetting($id){
        $authuser=Auth::user()->email;
        $invitingteam =Auth::user()->currentTeam->id;
        $invitingteamowner=Auth::user()->currentTeam->user_id;
        $user=User::find($invitingteamowner);
        $invitees=DB::table('team_invitations')->where('team_id',$invitingteam)->get();
        $teamMember=DB::table('team_user')->where('team_id',$invitingteam)->get();
        $userinvitation=DB::select("select * from team_invitations where email =?", [$authuser]);
        // dd($team);
        return view('Users.Teams.setting',compact('user','userinvitation','invitees','teamMember'));
    }
    public function teamUpdate(Request $request,$id){
        $team=Team::find($id);
        $request->validate([
            'teamName'=>'required','min:3','string'
        ]);
        $team->update([
            'name' =>  $request->teamName,
            'personal_team' => false,
            'user_id'=>Auth::user()->id
        ]);
        return redirect("Teams/user/team/setting/$id");
    }
    // adding member to team
   public function inviteMember(Request $request, $teamId){
        $authemail=Auth::user()->email;
        $team=Team::find($teamId);
        $id=$team->id;
        $request->validate([
            'invitedMail'=>'required','email'
        ]);
       $existInvite=DB::table('team_invitations')->where('team_id',$team->id)->where('email',$request->invitedMail)->first();

       if(($authemail) == ($request->invitedMail)){
        return redirect("Teams/user/team/setting/$id")->with('emailError','You cannot invite yourself');
       }

       elseif($existInvite){
        return redirect("Teams/user/team/setting/$id")->with('emailError','The email has already been invited');
       }
       else{
        DB::table('team_invitations')->insert([
            'team_id'=>$team->id,
            'email'=>$request->invitedMail,
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect("Teams/user/team/setting/$id")->with('success','Invitation has been sent successful');
       }
   }

   public function cancelInvite($id){
        $invitee=TeamInvitation::find($id);
        $team=$invitee->team_id;
        $invitee->delete();
        return redirect("Teams/user/team/setting/$id")->with('success','Invitation has been cancelled');
   }

    public function acceptInvite($id){
        $authuser=Auth::user()->id;
        $invite=TeamInvitation::find($id);
        $email = $invite->email;
        $selected=DB::select('select * from users where email = ?', [$email]);

       //check if the email is Regester
       if(count($selected)>0){
            foreach($selected as $select)
         // make membership
            $member = Membership::create([
                'user_id'=>$select->id,
                'team_id'=>$invite->id,
                'role'=>$invite->role
            ]);
            //delete invite
            $delete=$invite->delete();
            return redirect("Users/profile/user/$authuser");
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
                'name' => explode('@',$email,2)[0]."'s Team",
                'personal_team' => true,
            ]);
            // make membership
            $member = Membership::create([
                'user_id'=>$user->id,
                'team_id'=>$invite->id,
                'role'=>$invite->role
            ]);
            //delete invite
            $delete=$invite->delete();
            return redirect("Authentication/profile/user/$authuser");
       }
    }

    public function deleteTeam($id){
        $team=Team::find($id);
        $authuser=Auth::user()->id;
        $newteam=DB::select("select * from teams where user_id = $authuser and personal_team = ? limit ?",[1,1]);
        foreach($newteam as $tm){
            $pp=$tm->id;
        }
        $user=DB::update("update users set current_team_id = $pp where id = $authuser");
        $team->delete();
        return redirect("Authentication/profile/user/$authuser");
    }

    public function changeTeam($id){
        $authuser=Auth::user()->id;
        $team=Team::find($id);
        $teamId=$team->id;
        $user=User::find($authuser);
        $user=DB::update("update users set current_team_id = $teamId where id = $authuser");
        return redirect("Authentication/profile/user/$authuser");
    }

    public function leaveTeam($id){
        $team=Membership::find($id);
        $authuser=Auth::user()->id;
        $team->delete();
        return redirect("Authentication/profile/user/$authuser");
    }

}
