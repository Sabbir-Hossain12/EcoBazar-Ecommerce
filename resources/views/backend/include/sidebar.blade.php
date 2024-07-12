<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard.index')}}">
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
                            <a href="{{route('admin.role.index')}}">
                                <span data-key="t-calendar">Roles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.permission.index')}}">
                                <span data-key="t-calendar">Permissions</span>
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
                            <a href="{{route('admin.user.index')}}">
                                <span data-key="t-calendar">Users List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.category.index')}}">
                                <span data-key="t-calendar">Roles and Permission</span>
                            </a>
                        </li>


                    </ul>
                </li>
                
{{--Banners and Sliders--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-images"></i>
                        <span data-key="t-apps">Sliders and Banners</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.slider.index')}}">
                                <span data-key="t-calendar">Sliders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.banner.index')}}">
                                <span data-key="t-calendar">Banners</span>
                            </a>
                        </li>
                    


                    </ul>
                </li>
{{-- Attributes  --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-heart"></i>
                        <span data-key="t-apps">Attributes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.attribute.index')}}">
                                <span data-key="t-calendar">Attributes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.attribute-value.index')}}">
                                <span data-key="t-calendar">Values</span>
                            </a>
                        </li>



                    </ul>
                </li>

{{--Products--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa-solid fa-shop"></i>
                        <span data-key="t-apps">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.category.index')}}">
                                <span data-key="t-calendar">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.subcategory.index')}}">
                                <span data-key="t-calendar">Subcategories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.brand.index')}}">
                                <span data-key="t-calendar">Brands</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.product.index')}}">
                                <span data-key="t-calendar">Products</span>
                            </a>
                        </li>


                    </ul>
                </li>

{{--Order Panel--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow">--}}
{{--                        <i class="fa-solid fa-cart-shopping"></i>--}}
{{--                        <span data-key="t-apps">Order Panel</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Orders</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Invoiced</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Delivered</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                     --}}


{{--                    </ul>--}}
{{--                </li>--}}
{{--                --}}{{--Courier Panel--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow">--}}
{{--                        <i class="fa-solid fa-truck"></i>--}}
{{--                        <span data-key="t-apps">Courier Panel</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Couriers List</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">City</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Zone</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}



{{--                    </ul>--}}
{{--                </li>--}}
{{--                --}}
{{--                --}}{{--Wholesale Panel--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow">--}}
{{--                        <i class="fa-solid fa-basket-shopping"></i>--}}
{{--                        <span data-key="t-apps">Wholesale Panel</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Customer List</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Wholesale</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('admin.admins.index')}}">--}}
{{--                                <span data-key="t-calendar">Payments</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}



{{--                    </ul>--}}
{{--                </li>--}}
                
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
                        <i class="fa-solid fa-file"></i>
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