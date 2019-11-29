<div class="sidebar ba">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('student_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.students.index") }}" class="nav-link {{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-graduate nav-icon">

                                    </i>
                                    {{ trans('cruds.student.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('spoc_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.spocs.index") }}" class="nav-link {{ request()->is('admin/spocs') || request()->is('admin/spocs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-at nav-icon">

                                    </i>
                                    {{ trans('cruds.spoc.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('coach_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.coaches.index") }}" class="nav-link {{ request()->is('admin/coaches') || request()->is('admin/coaches/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.coach.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('project_access')
                <li class="nav-item">
                    <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.project.title') }}
                    </a>
                </li>
            @endcan
            @can('college_access')
                <li class="nav-item">
                    <a href="{{ route("admin.colleges.index") }}" class="nav-link {{ request()->is('admin/colleges') || request()->is('admin/colleges/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-asterisk nav-icon">

                        </i>
                        {{ trans('cruds.college.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
