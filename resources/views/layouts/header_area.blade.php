
@php

    $LoginID = Session::get('Customer_LoginID');
    $CustomerID = Session::get('CustomerID');
    $MenuItem = DB::select("SELECT Name, Link,Other
    FROM menu_item
    WHERE Status = 'Active'");

    $CardDetails = DB::select("SELECT TB1.ProductID, Quantity,PriceMRP,Description,image1
                FROM shopingcard TB1,productinfo TB2
                WHERE TB1.ProductID = TB2.ProductID
                AND CustomerID = '$CustomerID'
                AND TB1.Status!= 'Delete';");


    $CardTotalPrice = DB::select("SELECT ROUND(Sum(PriceMRP), 2) as Total
                FROM shopingcard TB1,productinfo TB2
                WHERE TB1.ProductID = TB2.ProductID
                AND CustomerID = '$CustomerID'
                AND TB1.Status!= 'Delete';");
    $totalSumPriceCard = $CardTotalPrice[0]->Total;


    $CardTotalCount = DB::select("SELECT Count(Quantity) as totalQuantity
                FROM shopingcard TB1,productinfo TB2
                WHERE TB1.ProductID = TB2.ProductID
                AND CustomerID = '$CustomerID'
                AND TB1.Status!= 'Delete';");
    $totalQuantity= $CardTotalCount[0]->totalQuantity;

@endphp

<header class="header_area">
    <!-- Top Header Area Start -->
    <div class="top_header_area" id="myElement">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-end">

                <div class="col-12 col-lg-7">
                    <div class="top_single_area d-flex align-items-center">
                        <!-- Logo Area -->
                        <div class="top_logo">
                            <a href="#"><img src="public/home/img/core-img/bondonalogo.png" alt=""></a>
                        </div>
                        <!-- Cart & Menu Area -->
                        <div class="header-cart-menu d-flex align-items-center ml-auto">
                            <!-- Cart Area -->
                            <div class="cart">
                                <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity">{{$totalQuantity}}</span> <i class="ti-bag"></i> Your Bag {{$totalSumPriceCard}} ৳</a>
                                <!-- Cart List Area Start -->
                                <ul class="cart-list">
                                    @foreach($CardDetails as $CardDetails)
                                    <li>
                                        <a href="#" class="image"><img src="{{$CardDetails->image1}}" class="cart-thumb" alt=""></a>
                                        <div class="cart-item-desc">
                                            <h6><a href="#">{{$CardDetails->Description}}</a></h6>
                                            <p>{{$CardDetails->Quantity}} - <span class="price">{{$CardDetails->PriceMRP}} ৳</span></p>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                    </li>
                                    @endforeach
                                    <li class="total">
                                        <span class="pull-right">Total: {{$totalSumPriceCard}} ৳</span>
                                        <a href="{{url('cart')}}" class="btn btn-sm btn-cart">Cart</a>
                                        <a href="{{url('checkout')}}" class="btn btn-sm btn-checkout">Checkout</a>
                                    </li>


                                </ul>
                            </div>

                            <div class="header-right-side-menu ml-15">
                                <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Top Header Area End -->
    <div class="main_header_area" id="navbar">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 d-md-flex justify-content-between">
                    <!-- Header Social Area -->
                    <div class="header-social-area">
                        <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Menu Area -->
                    <div class="main-menu-area">
                        <nav class="navbar navbar-expand-lg align-items-start">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                            <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                <ul class="navbar-nav animated" id="nav">

                                    @foreach($MenuItem as $MenuItem)
                                        @php
                                            $linkName = $MenuItem->Link;
                                        @endphp
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{url($linkName)}}">
                                                @if($MenuItem->Other=="Hot")
                                                    <span class="karl-level">New</span>
                                                @endif
                                                {{$MenuItem->Name}}
                                            </a>
                                        </li>
                                    @endforeach


                                    @if($LoginID)

                                        <li class="dropdown">

                                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                                Welcome, {{Session::get('Customer_FirstName')}} <b class="caret"></b>
                                            </a>

                                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <!-- ADDED CLASS -->
                                                <a class="dropdown-item" href="#">Profile</a>
                                                <a class="dropdown-item" href="#">Orders</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{url('LogoutCus')}}">Logout</a>
                                            </div>

                                        </li>
                                    @else
                                        <li class="dropdown">

                                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                                Profile <b class="caret"></b>
                                            </a>

                                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <!-- ADDED CLASS -->
                                                <a class="dropdown-item" href="#" onclick="ShowLoginModal()">Login</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" onclick="ShowSignUpModal()">SignUp</a>
                                            </div>

                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </nav>
                    </div>
                    <!-- Help Line -->
                    <div class="help-line">
{{--
                        <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> +34 657 3556 778</a>
--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>