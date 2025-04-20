<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">Manage Account</li>
    <li class="nav-item">
        <a href="{{ route('profile.user',Auth::user()->id) }}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>Profile</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>API Token</p>
        </a>
    </li>
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button class="btn btn-block btn-danger m-1"> <i class="nav-icon fas fa-columns"></i>Logout</button>
        </form>
    </li>
</ul>
