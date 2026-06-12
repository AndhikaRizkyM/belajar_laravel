<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('user.index') }}">User</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('role.index') }}">Role</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('major.index') }}">Major</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('key.index') }}">Key</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('student.index') }}">Student</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('instructor.index') }}">Instructor</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('menu.index') }}">Menu</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Management</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('user-role.index') }}">User Role</a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Major Management</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('major.index') }}">Major</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('major.create') }}">Create Major</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Student Management</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('student.index') }}">Student</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('student.create') }}">Create Student</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-key"></i>
                        <span>Key Management</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('key.index') }}">Key</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('key.create') }}">Create Key</a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-title">Management</li>

                <li class="sidebar-item">
                    <a href="{{ route('locker.index') }}" class='sidebar-link'>
                        <i class="bi bi-key"></i>
                        <span>Locker Management</span>
                    </a>
                </li> <br>

                <li class="sidebar-item">
                    <form action="{{ route('action-logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                </li>
            </ul>


        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
