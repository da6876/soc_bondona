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
                                    <a href="#" onclick="showDetailsProduct()">View Full Product Details</a>
                                </div>
                                <!-- Add to Cart Form -->
                                <form class="cart" method="post">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
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


<div class="modal fade" id="CustomerLogin" tabindex="-1" role="dialog" aria-labelledby="CustomerLogin" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        
                            
                            <!-- Pills content -->
                            <div class="tab-content" id="CustomerInfoDataAdd">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                
                                <form  action="#" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="text-center mb-3">
                                        
                                    <div class="top_logo">
                                        <a href="#"><img src="../public/home/img/core-img/bondonalogo.png" alt=""></a>
                                    </div>
                                    <br>
                                    <h5>Sign in Here</h5>
                                    </div>
                                                    
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginName">Email or username</label>
                                        <input type="email" id="loginName" class="form-control" />
                                    </div>
                            
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginPassword">Password</label>
                                        <input type="password" id="loginPassword" class="form-control" />
                                    </div>
                            
                                    <div class="row mb-4">
                                        <div class="col-md-6 d-flex justify-content-center">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-3 mb-md-0">
                                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                                            </div>
                                        </div>
                                
                                        <div class="col-md-6 d-flex justify-content-center">
                                            <!-- Simple link -->
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                    </div>
                            
                                    <!-- Submit button -->
                                    <button type="button" onclick="checkData()" class="btn btn-primary btn-block mb-4">Sign in</button>
                            
                                    <!-- Register buttons -->
                                    <div class="text-center">
                                    <p>Not a member? <a href="#!">Register</a></p>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- Pills content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade CustomerSignUp" id="CustomerSignUp" tabindex="-1" role="dialog" aria-labelledby="CustomerLogin" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        
                            
                            <!-- Pills content -->
                            <div class="tab-content" id="CustomerInfoDataAdd">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                
                                        
                                <div class="top_logo text-center">
                                    <a href="#"><img src="../public/home/img/core-img/bondonalogo.png" alt=""></a>
                                </div>
                                <hr>
                                <form  action="#" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="ViewType" id="ViewType"/>
                                    <div class="row g-1">
                                        <div class="col mb-0">
                                          <input type="hidden" id="UserID" name="UserID"/>
                                          <label for="FirstName" class="form-label">First Name</label>
                                          <input type="text" id="FirstName" name="FirstName" class="form-control" placeholder="xxxx@xxx.xx" />
                                        </div>
                                        <div class="col mb-0">
                                          <label for="LastName" class="form-label">Last Name</label>
                                          <input type="text" id="LastName" name="LastName" class="form-control" placeholder="xxxx@xxx.xx" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-6">
                                          <label for="MobileNo" class="form-label">Mobile No</label>
                                          <input type="text" id="MobileNo" name="MobileNo" class="form-control" placeholder="xxxx@xxx.xx" />
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="Primary1" name="Primary1">
                                            <label class="form-check-label" for="Primary1">
                                              Set As Primary ID
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col mb-6">
                                          <label for="Email" class="form-label">Email</label>
                                          <input type="email" id="Email" name="Email" class="form-control" placeholder="xxxx@xxx.xx" />
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="Primary2" name="Primary2">
                                            <label class="form-check-label" for="Primary2">
                                              Set As Primary ID
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col mb-12">
                                          <label for="Address" class="form-label">Address</label>
                                          <input type="text" id="Address" class="form-control" placeholder="xxxx@xxx.xx" name="Address" />
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col mb-0">
                                          <label for="picture" class="form-label">Picture</label>
                                          <input type="file" id="picture" class="form-control" name="picture" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="Password" class="form-label">Password</label>
                                            <input type="password" id="Password" class="form-control" placeholder="xxxx@xxx.xx" name="Password" />
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" onclick="checkData()" class="btn btn-primary btn-block mb-4">Sign in</button>
                                    <div class="text-center">
                                        <p>Already a Member? <a href="#!">LogIn</a></p>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- Pills content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="showAlertForLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sorry !!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="top_logo">
                <a href="#"><img src="../public/home/img/core-img/bondonalogo.png" alt=""></a>
            </div>
          <h5>Please Login Here. Or Sign Up</h5>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="signHere()" class="btn btn-primary">Sign Up</button>
          <button type="button" onclick="loginHere()" class="btn btn-info">Login</button>
        </div>
      </div>
    </div>
  </div>


  <script>

    function loginHere(){
        $('#showAlertForLogin').modal('hide');
        $('#CustomerLogin').modal('show');
    }

    function signHere(){
        $('#showAlertForLogin').modal('hide');
        $('#CustomerSignUp').modal('show');
    }

</script>