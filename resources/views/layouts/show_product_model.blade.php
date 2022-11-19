<div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="quickview_pro_img">
                                    <img id="pro_img" class="pro_img" src="public/home/img/product-img/product-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="title">Boutique Silk Dress</h4>
                                    <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <h5 class="price">$120.99 <span class="discount">$130</span></h5>
                                    <p class="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                    <a href="#" onclick="viewDetailsProduct()">View Full Product Details</a>
                                </div>
                                <!-- Add to Cart Form -->
                                <form class="cart" method="post">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="hidden" id="product_id"/>
                                        <input type="hidden" id="CustomerID" value="{{Session::get('CustomerID')}}"/>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>

                                    <button type="button" name="addtocart" value="5" class="cart-submit" onclick="addToCart()">Add to cart</button>
                                    <!-- Wishlist -->
                                    <div class="modal_pro_wishlist">
                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                    </div>
                                    <!-- Compare -->
                                    {{--<div class="modal_pro_compare">
                                        <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                    </div>--}}
                                </form>

                                <div class="share_wf mt-30">
                                    <p>Share With Friend</p>
                                    <div class="_icon">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg " id="CustomerSignUp"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="container">
                    <div class="col-md mb-md-0 mb-5">
                        <div class="modal-body p-0">
                            <div class="col-12 col-md-12">

                                <div class="checkout_details_area mt-50 clearfix">

                                    <div class="cart-page-heading">
                                        <h3 class="mb-4">Sign UP</h3>
                                        <p>Enter your Information Here</p>
                                    </div>

                                    <form action="#" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Full Name <span>*</span></label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" value="" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Password <span>*</span></label>
                                                <input type="password" class="form-control" id="Password" name="Password" value="" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Phone No <span>*</span></label>
                                                <input type="number" class="form-control" id="MobileNo" name="MobileNo" value="" required>
                                                <div class="custom-control custom-checkbox d-block mb-2">
                                                    <input type="checkbox" class="custom-control-input" value="1" id="Primary1" name="Primary1">
                                                    <label class="custom-control-label" for="Primary1">Set As Primary Key For Login</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="last_name">Email Address <span>*</span></label>
                                                <input type="email" class="form-control" id="Email"  name="Email" value="" required>
                                                <div class="custom-control custom-checkbox d-block mb-2">
                                                    <input type="checkbox" class="custom-control-input"  value="1" id="Primary2" name="Primary2">
                                                    <label class="custom-control-label" for="Primary2">Set As Primary Key For Login</label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox d-block mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                                </div>
                                                <div class="custom-control custom-checkbox d-block mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <a href="#" onclick="checkData()" class="btn karl-checkout-btn">Create Account</a>
                                            </div>

                                            <div class="col-12 mb-4 text-center">
                                                <a href="#"  onclick="ShowLoginModal()" class="text-success">Already Have Account? Click Here To Login</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="CustomerSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="container">
                    <div class="col-md mb-md-0 mb-5">
                        <div class="modal-body p-0">
                            <div class="checkout_details_area mt-50 clearfix">

                                    <div class="cart-page-heading">
                                        <h3 class="mb-4">LogIn Here</h3>
                                        <p>Enter your Information Here</p>
                                    </div>

                                    <form action="#" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="phone_number">Phone/Email <span>*</span></label>
                                                <input type="text" class="form-control" id="LoginID" name="LoginID" min="0" value="">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="phone_number">Password <span>*</span></label>
                                                <input type="password" class="form-control" id="Password" name="Password" value="">
                                            </div>

                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox d-block mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Remember Me</label>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <a href="#" onclick="customerLogin()" class="btn karl-checkout-btn">Login</a>
                                            </div>

                                            <div class="col-12 mb-4 text-center">
                                                <a href="#" onclick="ShowSignUpModal()" class="text-success">Don't Have Account? Sign Up</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script>

</script>