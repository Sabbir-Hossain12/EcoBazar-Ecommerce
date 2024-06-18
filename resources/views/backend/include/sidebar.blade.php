<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.categories')}}">
                                <span data-key="t-calendar">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.subcategories')}}">
                                <span data-key="t-calendar">Subcategories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.brands')}}">
                                <span data-key="t-calendar">Brands</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products')}}">
                                <span data-key="t-calendar">Products</span>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Basic</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.basic')}}">
                                <span data-key="t-calendar">Basic Info</span>
                            </a>
                        </li>

                     
                    </ul>
                </li>

                

                <li>
                    <a href="">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Horizontal</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.pages.index')}}">
                        <i class="fa-regular fa-file"></i>
                        <span data-key="t-dashboard">Pages</span>
                    </a>
                </li>

                

            </ul>

         
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->