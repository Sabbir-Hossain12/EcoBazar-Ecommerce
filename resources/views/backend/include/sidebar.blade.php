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
                        <i class="fa-solid fa-home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-user-secret"></i>
                        <span data-key="t-apps">Admins</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.admins.index')}}">
                                <span data-key="t-calendar">Admin List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.categories')}}">
                                <span data-key="t-calendar">Roles and Permission</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-users"></i>
                        <span data-key="t-apps">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.categories')}}">
                                <span data-key="t-calendar">Users List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.categories')}}">
                                <span data-key="t-calendar">Roles and Permission</span>
                            </a>
                        </li>


                    </ul>
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
                        <i class="fa-solid fa-gear"></i>
                        <span data-key="t-apps">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.basic.index')}}">
                                <span data-key="t-calendar">Basic Info</span>
                            </a>
                        </li>


                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-regular fa-file"></i>
                        <span data-key="t-dashboard">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.pages.create')}}">
                                <span data-key="t-calendar">Create Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.pages.index')}}">
                                <span data-key="t-calendar">Pages List</span>
                            </a>
                        </li>


                    </ul>

                </li>


            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->