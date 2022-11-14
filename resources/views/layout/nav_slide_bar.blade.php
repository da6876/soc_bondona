@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    $userType = Session::get('Admin_UserType');
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('DashBord')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="public/home/img/core-img/bondonalogo.png" height="40px" alt="">
        </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @if ($route=="DashBord.index")
            <li class="menu-item active">
        @else
            <li class="menu-item">
                @endif
                <a href="{{url('DashBord')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- Layouts -->

            <!-- User interface -->
            @if($userType=="ROOT" || $userType=="ADMIN" || $userType=="Manager" || $userType=="SalesMan")
                
            @endif
            @if($userType=="ROOT" || $userType=="ADMIN" || $userType=="Manager" || $userType=="SalesMan")
                
            @endif

            @if($userType=="ROOT" || $userType=="ADMIN" || $userType=="Manager")
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">User Setup or Config</span>
                </li>
                @if ($route=="UserTypeInfo.index" || $route=="UserInfo.index" || $route=="UserMap.index" )
                    <li class="menu-item active open">
                @else
                    <li class="menu-item">
                        @endif
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">User Settings</div>
                        </a>
                        <ul class="menu-sub">
                            
                            @if ($route=="UserInfo.index")
                                <li class="menu-item active">
                            @else
                                <li class="menu-item">
                                    @endif
                                    <a href="{{url('UserInfo')}}" class="menu-link">
                                        <div data-i18n="Account">User Info</div>
                                    </a>
                                </li>
                        </ul>
                    </li>

                    @if ($route=="ProductType.index" || $route=="ProductColor.index" || $route=="ProductInfo.index" || $route=="ProductCategory.index" || $route=="ProductSubCategory.index" || $route=="ProductSize.index")
                        <li class="menu-item active open">
                    @else
                        <li class="menu-item">
                            @endif
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                                <div data-i18n="Authentications">Product Setup</div>
                            </a>
                            <ul class="menu-sub">
                                @if ($route=="ProductType.index")
                                    <li class="menu-item active">
                                @else
                                    <li class="menu-item">
                                        @endif
                                        <a href="{{url('ProductType')}}" class="menu-link">
                                            <div data-i18n="Basic">Product Type</div>
                                        </a>
                                    </li>
                                    @if ($route=="ProductColor.index")
                                        <li class="menu-item active">
                                    @else
                                        <li class="menu-item">
                                            @endif
                                            <a href="{{url('ProductColor')}}" class="menu-link">
                                                <div data-i18n="Basic">Product Color</div>
                                            </a>
                                        </li>
                                        @if ($route=="ProductSize.index")
                                            <li class="menu-item active">
                                        @else
                                            <li class="menu-item">
                                                @endif
                                                <a href="{{url('ProductSize')}}" class="menu-link">
                                                    <div data-i18n="Basic">Product Size</div>
                                                </a>
                                            </li>
                                        @if ($route=="ProductCategory.index")
                                            <li class="menu-item active">
                                        @else
                                            <li class="menu-item">
                                                @endif
                                                <a href="{{url('ProductCategory')}}" class="menu-link">
                                                    <div data-i18n="Basic">Product Category</div>
                                                </a>
                                            </li>
                                            @if ($route=="ProductSubCategory.index")
                                                <li class="menu-item active">
                                            @else
                                                <li class="menu-item">
                                                    @endif
                                                    <a href="{{url('ProductSubCategory')}}" class="menu-link">
                                                        <div data-i18n="Basic">Product Sub-Category</div>
                                                    </a>
                                                </li>
                                                @if ($route=="ProductInfo.index")
                                                    <li class="menu-item active">
                                                @else
                                                    <li class="menu-item">
                                                        @endif
                                                        <a href="{{url('ProductInfo')}}" class="menu-link">
                                                            <div data-i18n="Basic">Product Info</div>
                                                        </a>
                                                    </li>
                            </ul>
                        </li>

                    @endif
                <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Stock</span>
                    </li>

                    @if ($route=="AddStock.index" || $route=="ViewStock.index")
                        <li class="menu-item active open">
                    @else
                        <li class="menu-item">
                            @endif
                            <a href="javascript:void(0)" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-box"></i>
                                <div data-i18n="User interface">Stock Manage</div>
                            </a>
                            <ul class="menu-sub">
                                @if ($route=="AddStock.index")
                                    <li class="menu-item active">
                                @else
                                    <li class="menu-item">
                                        @endif
                                    <a href="{{url('AddStock')}}" class="menu-link">
                                        <div data-i18n="Accordion">Add Stock</div>
                                    </a>
                                </li>
                                    @if ($route=="ViewStock.index")
                                        <li class="menu-item active">
                                    @else
                                        <li class="menu-item">
                                            @endif
                                    <a href="{{url('ViewStock')}}" class="menu-link">
                                        <div data-i18n="Alerts">View Stock</div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Misc -->
                        <li class="menu-header small text-uppercase"><span
                                    class="menu-header-text">Support Contact</span></li>
                        <li class="menu-item">
                            <a
                                    href="https://sourceofcapacity.com"
                                    target="_blank"
                                    class="menu-link"
                            >
                                <i class="menu-icon tf-icons bx bx-support"></i>
                                <div data-i18n="Support">Support</div>
                            </a>
                        </li>
    </ul>
</aside>
<!-- / Menu -->