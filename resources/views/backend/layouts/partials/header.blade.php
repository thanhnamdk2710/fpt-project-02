<div id="header" class="page-navbar">
    <a href="{{route('dashboard')}}" class="navbar-brand hidden-xs hidden-sm">
        <img src="{{asset('images/logo.png')}}" class="logo hidden-xs" alt="TN Fashion logo">
        <img src="{{asset('images/icon.png')}}" class="logo-sm hidden-lg hidden-md" alt="TN Fashion logo">
    </a>
    <div id="navbar-no-collapse" class="navbar-no-collapse">
        <ul class="nav navbar-nav">
            <li class="toggle-sidebar">
                <a>
                    <i class="fa fa-reorder"></i>
                    <span class="sr-only">Collapse sidebar</span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{route('admin.logout')}}">
                    <i class="fa fa-power-off"></i>
                    <span class="sr-only">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
