
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('index')}}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
@include('Layout.Main.Partial._partials._searchbar')
    <!-- Messages Dropdown Menu -->
    @include('Layout.Main.Partial._partials._msgSection')
    <!-- Notifications Dropdown Menu -->
      @include('Layout.Main.Partial._partials._notifySection')
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
    <li class="nav-item m-1 ">
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                @foreach (Auth::user()->groups as $group)
                    @if($group->id == Auth::user()->current_group_id)
                    {{ $group->name}}
                    @endif
                @endforeach

            </button>
            <div class="dropdown-menu">
                @include('Layout.Main.Partial._partials._GroupMgt')
            </div>
        </div>
    </li>
      <li class="nav-item m-1">
          <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">{{ Auth::user()->currentTeam->name }}</button>
              <div class="dropdown-menu">
                  @include('Layout.Main.Partial._partials._TeamMgt')
              </div>
          </div>
      </li>
      <li class="nav-item m-1">
          <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">{{Auth::user()->name}}</button>
              <div class="dropdown-menu">
                  @include('Layout.Main.Partial._partials._minUserMenu')
              </div>
          </div>
      </li>
  </ul>
</nav>
