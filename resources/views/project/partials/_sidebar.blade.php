<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('storage/app/public/image/default/profile.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                    <strong class="font-bold">David Williams</strong> <b class="caret"></b>
                            </span>
                            
                            <span class="text-muted text-xs block">
                                Art Director
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ Request::is('dashboard') ? 'active' : ''}}">
                <a href="{{ Route('dashboard') }}">
                    <i class="fa fa-th-large fa-fw"></i> <span class="nav-label">Dashboards</span>
                </a>
            </li>
            <li class="{{ (Request::is('data/manajemen-coa') || Request::is('data/manajemen-coa/*')) ? 'active' : ''}}">
                <a href="{{ Route('data.coa') }}"><i class="fa fa-list-alt fa-fw"></i> <span class="nav-label">Manajemen Coa</span></a>
            </li>
        </ul>

    </div>
</nav>