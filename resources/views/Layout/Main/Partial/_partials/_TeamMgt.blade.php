<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Manage Teams</li>
    <li class="nav-item">
        <a href="{{ route('team.setting',Auth::user()->currentTeam->id) }}" class="nav-link">
            <i class="nav-icon ion-ios-cog"></i>
            Team Setting
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('create.teams',Auth::user()->id) }}" class="nav-link">
            <i class="nav-icon ion-person-add"></i>
            Create Team
        </a>
    </li>
    <!-- Team Switcher -->
    @if (Auth::user()->allTeams()->count() > 1)

    <li class="nav-header">Switch Teams</li>
    <li class="nav-item">
    @foreach (Auth::user()->allTeams() as $team)
    <form  method="post" action="{{ route('switch.team', $team->id) }}">
        @csrf
        @method('PUT')
        <div class="m-1">
            @if(($team->id)==(Auth::user()->current_team_id))
                <i class="nav-icon  fa fa-check-circle" style="color: green; margin-left:15px;font-size:24px;"></i>
            @endif
            <button style="width:auto" class="btn btn-danger ml-2 mr-2" type="submit" >{{ $team->name }}</button>
        </div>
    </form>
    @endforeach

    @endif
    </li>


</ul>
