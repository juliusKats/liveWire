<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">SCHOOL MANAGEMENT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SMS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">DASHBOARD</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('school.index') }}">General Dashboard</a></li>
                    <li><a class="nav-link" href="{{ route('school.index') }}">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">SETTING</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>General</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route ('general.settings.index') }}">Regions</a></li>
                    <li><a class="nav-link" href="#">Sub Regions</a></li>
                    <li><a class="nav-link" href="#">Countries</a></li>
                    <li><a class="nav-link" href="#">States</a></li>
                    <li><a class="nav-link" href="#">Cities</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>School</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('year.term.list') }}">Year and Terms</a></li>
                    <li><a class="nav-link" href="#">Academic Year</a></li>
                    <li><a class="nav-link" href="#">Sections Levels </a></li>
                    <li><a class="nav-link" href="#">Classes Stream </a></li>
                    <li><a class="nav-link" href="#">Subject </a></li>
                    <li><a class="nav-link" href="#">Houses</a></li>
                    <li><a class="nav-link" href="#">Co-Curriculum</a></li>
                    <li><a class="nav-link" href="#">Exam Sets</a></li>
                    <li><a class="nav-link" href="{{ route('terms.and.conditions.index') }}">Terms and Conditions</a></li>
                </ul>
            </li>
            <li class="menu-header">CLASS DETAILS</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Class Detail</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Level Class</a></li>
                    <li><a class="nav-link" href="{{route('class.streams.index')}}">Class Stream</a></li>
                    <li><a class="nav-link" href="#">Class Subject</a></li>
                </ul>
            </li>
            <li class="menu-header">SUBJECTS</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Subjects</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Papers and Subjects</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="#">Subject Class</a></li>
                    <li><a class="nav-link" href="#">Subject Level</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="#">Subject Modules</a></li>
                    <li><a class="nav-link" href="#">Module Class</a></li>
                </ul>
            </li>
            <li class="menu-header">STUDENTS</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Students</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('student.bio.data') }}">Registration</a></li>
                    <li><a href="{{route('student.index')}}">Student Emergency</a></li>
                    <li><a href="#">Student Father</a></li>
                    <li><a href="#">Student Mother</a></li>
                    <li><a href="#">Student Guardian</a></li>
                    <li><a href="#">Student Profile</a></li>

                </ul>
            </li>

            <li class="menu-header">ENROLLMENT</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Enrollment</span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">Student Class</a></li>
                    <li><a href="#">Student Activity</a></li>
                    <li><a href="#">Student House</a></li>
                </ul>
            </li>
            <li class="menu-header">SCORES</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Scores</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Year Score</a></li>
                    <li><a class="nav-link" href="#">Term Score</a></li>
                    <li><a class="nav-link" href="#">SetScore Score</a></li>
                    <li><a class="nav-link" href="#">Subject Score</a></li>
                    <li><a class="nav-link" href="{{ route('scores.list') }}">Score</a></li>
                </ul>
            </li>
        </ul>


        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
