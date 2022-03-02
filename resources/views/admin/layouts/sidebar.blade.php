<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("dashboard")}}" class="brand-link" style="height:60px ;padding-top: 15px; text-align: center">
        <img src="/styles/admin/dist/img/logo2.png" alt="Mail" class="brand-image"
             style="width: 110px; float: none; max-height: none !important; margin: -4px 0 0 0 !important;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 20px;">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route("dashboard")}}" class="nav-link {{areActiveRoutes(['dashboard'])}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @foreach(landingPageTypes() as $type)
                    <li class="nav-item{{currentRouteWithParams(['landing_page_data.*', "landing_page_list.*"], ['type'=>$type]) ? " menu-is-opening menu-open" : ""}}"
                        style="cursor: pointer">
                        <a class="nav-link {{currentRouteWithParams(['landing_page_data.*', "landing_page_list.*"], ['type'=>$type]) ? "active" : ""}}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                {{ucfirst($type)}} Landing page
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{currentRouteWithParams(['landing_page_data.*'], ['type'=>$type]) ? "display:block" : ""}}">
                            <li class="nav-item">
                                <a href="{{route('landing_page_data.index', ['type'=> $type])}}"
                                   class="nav-link {{currentRouteWithParams(['landing_page_data.*'], ['type'=>$type]) ? "active" : ""}}">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>{{ucfirst($type)}} Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('landing_page_list.index', ['type'=>$type])}}"
                                   class="nav-link {{currentRouteWithParams(['landing_page_list.*'], ['type'=>$type]) ? "active" : ""}}">
                                    <i class="fas fa-box nav-icon"></i>
                                    <p>{{ucfirst($type)}} Form</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{route("industries.index")}}" class="nav-link {{areActiveRoutes(['industries'])}}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>Industries</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route("from-where-list.index")}}"
                       class="nav-link {{areActiveRoutes(['from-where-list'])}}">
                        <i class="nav-icon fas fa-head-side-cough"></i>
                        <p>From Where List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link {{areActiveRoutes(['settings.*'])}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
