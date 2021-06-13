                                <aside class="menu-sidebar3 js-spe-sidebar">
                                    <nav class="navbar-sidebar2 navbar-sidebar3">
                                        <ul class="list-unstyled navbar__list">
                                            <li class="{!! $linkrole or '' !!}">
                                                <a href="{{ route('roles.index') }}">
                                                    <i class="fas fa-chart-bar"></i>Role
                                                </a>
                                                <span class="inbox-num">{!! $count_role !!}</span>
                                            </li>
                                            <li class="{!! $linkpermission or '' !!}">
                                                <a href="{{ route('permissions.index') }}">
                                                    <i class="fas fa-chart-bar"></i>Permission
                                                </a>
                                                <span class="inbox-num">{!! $count_permission !!}</span>
                                            </li>
                                            <li class="{!! $linkuser or '' !!}">
                                                <a href="{{ route('users.index') }}">
                                                    <i class="fas fa-users"></i>User
                                                </a>
                                                <span class="inbox-num">{!! $count_user !!}</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </aside>