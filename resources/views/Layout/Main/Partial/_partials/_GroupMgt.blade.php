<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Manage Groups</li>
    <li class="nav-item">
        <a href="{{ route('group.setting',Auth::user()->currentTeam->id) }}" class="nav-link">
            <i class="nav-icon ion-ios-cog"></i>
            Group Setting
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('create.groups',Auth::user()->id) }}" class="nav-link">
            <i class="nav-icon ion-person-add"></i>
            Create Group
        </a>
    </li>
    <!-- Team Switcher -->
    @if (Auth::user()->groups->count() > 1)

    <li class="nav-header">Switch Group</li>
    <li class="nav-item">
    @foreach (Auth::user()->groups as $group)
    <form  method="post" action="{{ route('switch.group', $group->id) }}">
        @csrf
        @method('PUT')
        <div class="m-1">
           @if(($group->id)==(Auth::user()->current_group_id))
                <i class="nav-icon  fa fa-check-circle" style="color: green; margin-left:15px;font-size:24px;"></i>
            @endif
            <button style="width:auto" class="btn btn-danger ml-2 mr-2" type="submit" >{{ $group->name }}</button>
        </div>
    </form>
    @endforeach

    @endif
    </li>


</ul>
