<aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
    <div class="sidebar-inner">
        <div class="sidebar-scrollarea">
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Profile</h5>
            </div>
            <div class="user-info clearfix">
                @if(Auth::user()->profile->avatar)
                    <img src="{{asset('images/users/' . Auth::user()->profile->avatar)}}" alt="avatar">
                @else
                    <img src="{{asset('backend/img/avatars/128.jpg')}}" alt="avatar">
                @endif
                <span class="name">{{Auth::user()->profile->name}}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs">
                        <i class="l-basic-gear"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        settings <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu right" role="menu">
                        <li>
                            <a href="{{route('admin.profile')}}"><i class="fa fa-lock"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Navigation</h5>
            </div>
            <div class="side-nav">
                <ul class="nav">
                    <li>
                        <a href="{{route('dashboard')}}" class="{{Request::is('admin') ? 'active' : ''}}">
                            <i class="l-basic-laptop"></i><span class="txt">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="{{Request::is(['admin/categories*', 'admin/products*']) ? 'active-state expand' : ''}}">
                            <i class="l-arrows-right sideNav-arrow {{Request::is(['admin/categories*', 'admin/products*']) ? 'rotate90' : ''}}"></i>
                            <i class="l-ecommerce-gift"></i> <span class="txt">Products</span>
                        </a>
                        <ul class="sub {{Request::is(['admin/categories*', 'admin/products*']) ? 'show' : ''}}"
                            style="{{Request::is(['admin/categories*', 'admin/products*']) ? 'display:block' : ''}}">
                            <li>
                                <a href="{{route('categories.index')}}"
                                    class="{{Request::is('admin/categories*') ? 'active' : ''}}">
                                    <span class="txt">Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index')}}"
                                    class="{{Request::is('admin/products*') ? 'active' : ''}}">
                                    <span class="txt">Products</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="l-ecommerce-cart"></i>
                            <span class="txt">Orders</span>
                        </a>
                        <ul class="sub">
                            <li><a href="forms-basic.html"><span class="txt">Basic forms</span></a>
                            </li>
                            <li><a href="forms-advanced.html"><span class="txt">Advanced forms</span></a>
                            </li>
                            <li><a href="forms-layouts.html"><span class="txt">Form layouts.partials</span></a>
                            </li>
                            <li><a href="forms-wizard.html"><span class="txt">Form wizard</span></a>
                            </li>
                            <li><a href="forms-validation.html"><span class="txt">Form validation</span></a>
                            </li>
                            <li><a href="code-editor.html"><span class="txt">Code editor</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('feedback.index')}}" class="{{Request::is('admin/feedback*') ? 'active' : ''}}">
                            <i class="fa fa-comments-o"></i>
                            <span class="txt">Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('customers.index')}}" class="{{Request::is('admin/customers*') ? 'active' : ''}}">
                            <i class="fa fa-users"></i>
                            <span class="txt">Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sliders.index')}}" class="{{Request::is('admin/sliders*') ? 'active' : ''}}">
                            <i class="l-basic-picture-multiple"></i>
                            <span class="txt">Sliders</span>
                        </a>
                    </li>
                    <li>
                        <a href="portlets.html">
                            <i class="fa fa-cogs"></i>
                            <span class="txt">Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
