<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bondonaa">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title  -->
    <title>Bondona | Home</title>

    @include('layouts.header_link_files')
        
      
</head>

<body>
    <div class="catagories-side-menu">
        @include ('layouts.catagories_side_menu')
    </div>

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        @include ('layouts.header_area')
        <!-- ****** Header Area End ****** -->


        <!-- ****** Welcome Slides Area Start ****** -->
        @include ('layouts.welcome_area')
        <!-- ****** Welcome Slides Area End ****** -->

        
        <!-- ****** Top Discount Area Start ****** -->
        @include ('layouts.discount_area')
        <!-- ****** Top Discount Area End ****** -->

        @php
        $ProductsInfoByDisplayType = DB::select("SELECT TB1.ProductID,
            TB1.Category,TB1.Description,TB1.Details,TB1.PriceMRP,TB1.PriceDiscount, TB1.image1
            FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
            WHERE TB1.ProductType = TB2.ProductTypeId
            AND TB1.Color = TB4.ProductColorId
            AND TB1.Category = TB5.ProductCategoryId
            AND TB1.SubCategory = TB3.ProductSubCategoryId
            AND TB1.DisplayType = 'New';");
        @endphp
        <!-- ****** New Arrivals Area ****** -->
        <section class="you_may_like_area clearfix">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-left">
                            <h3>New Arrivals</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">
                            @foreach($ProductsInfoByDisplayType as $DisplayTypeSData)
                            <div class="single_gallery_item">
                                <div class="product-img">
                                    <img src="{{$DisplayTypeSData->image1}}" height="100px" alt="{{$DisplayTypeSData->Description}}">
                                    <div class="product-quicview">
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <div class="product-description">
                                    <h4 class="product-price">৳ {{$DisplayTypeSData->PriceMRP}}</h4>
                                    <p>{{$DisplayTypeSData->Description}}</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$DisplayTypeSData->ProductID}}')" class="view-to-product-btn">View Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** New Arrivals Area End ****** -->

        @php
        $TopDisplayType = DB::select("SELECT TB1.ProductID,
            TB1.Category,TB1.Description,TB1.Details,TB1.PriceMRP,TB1.PriceDiscount, TB1.image1
            FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
            WHERE TB1.ProductType = TB2.ProductTypeId
            AND TB1.Color = TB4.ProductColorId
            AND TB1.Category = TB5.ProductCategoryId
            AND TB1.SubCategory = TB3.ProductSubCategoryId
            AND TB1.DisplayType = 'Top';");
        @endphp
        <!-- ****** Hot Product Area ****** -->
        <section class="you_may_like_area clearfix">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-left">
                            <h3>Hot Product</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">
                            @foreach($TopDisplayType as $TopDisplayType)
                            <div class="single_gallery_item">
                                <div class="product-img">
                                    <img src="{{$TopDisplayType->image1}}" alt="">
                                    <div class="product-quicview">
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">৳ {{$TopDisplayType->PriceMRP}}</h4>
                                    <p>{{$TopDisplayType->Description}}</p>
                                    <!-- Add to Cart -->
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$TopDisplayType->ProductID}}')" class="view-to-product-btn">View Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Hot Product Area End ****** -->

        <!-- ****** Top Catagory Area Start ****** -->
        <section class="top_catagory_area d-md-flex clearfix">
            <!-- Single Catagory -->
            <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url(public/home/img/bg-img/bg-2.jpg);">
                <div class="catagory-content">
                    <h6>On Accesories</h6>
                    <h2>Sale 30%</h2>
                    <a href="#" class="btn karl-btn">SHOP NOW</a>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url(public/home/img/bg-img/bg-3.jpg);">
                <div class="catagory-content">
                    <h6>in Bags excepting the new collection</h6>
                    <h2>Designer bags</h2>
                    <a href="#" class="btn karl-btn">SHOP NOW</a>
                </div>
            </div>
        </section>
        <!-- ****** Top Catagory Area End ****** -->



        @php
        $FeaturesDisplayType = DB::select("SELECT TB1.ProductID,
            TB1.Category,TB1.Description,TB1.Details,TB1.PriceMRP,TB1.PriceDiscount, TB1.image1
            FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
            WHERE TB1.ProductType = TB2.ProductTypeId
            AND TB1.Color = TB4.ProductColorId
            AND TB1.Category = TB5.ProductCategoryId
            AND TB1.SubCategory = TB3.ProductSubCategoryId
            AND TB1.DisplayType = 'Features';");
        @endphp
        <!-- ****** Hot Product Area ****** -->
        <section class="you_may_like_area clearfix">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-left">
                            <h3>Hot Product</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">

                            @foreach($FeaturesDisplayType as $FeaturesDisplayType)
                            <div class="single_gallery_item">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{$FeaturesDisplayType->image1}}" alt="">
                                    <div class="product-quicview">
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">৳ {{$FeaturesDisplayType->PriceMRP}}</h4>
                                    <p>{{$FeaturesDisplayType->Description}}</p>
                                    <!-- Add to Cart -->
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$FeaturesDisplayType->ProductID}}')" class="view-to-product-btn">View Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Hot Product Area End ****** -->


        <!-- ****** New Arrivals Area Start ****** -->
        {{-- <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="karl-projects-menu mb-100">
                <div class="text-center portfolio-menu">
                    <button class="btn active" data-filter="*">ALL</button>
                    <button class="btn" data-filter=".women">WOMAN</button>
                    <button class="btn" data-filter=".man">MAN</button>
                    <button class="btn" data-filter=".access">ACCESSORIES</button>
                    <button class="btn" data-filter=".shoes">shoes</button>
                    <button class="btn" data-filter=".kids">KIDS</button>
                </div>
            </div>

            <div class="container">
                <div class="row karl-new-arrivals">

                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-1.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>

                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.3s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-2.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>

                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item access wow fadeInUpBig" data-wow-delay="0.4s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-3.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>

                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item shoes wow fadeInUpBig" data-wow-delay="0.5s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-4.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>

                    <!-- Single gallery Item Start -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.6s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-5.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>

                    <!-- Single gallery Item -->
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item kids man wow fadeInUpBig" data-wow-delay="0.7s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="public/home/img/product-img/product-6.jpg" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">$39.90</h4>
                            <p>Jeans midi cocktail dress</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ****** New Arrivals Area End ****** -->

        <!-- ****** Offer Area Start ****** -->
        <section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url(public/home/img/bg-img/bg-5.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-end justify-content-end">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                            <h2>White t-shirt <span class="karl-level">Hot</span></h2>
                            <p>* Free shipping until 25 Dec 2017</p>
                            <div class="offer-product-price">
                                <h3><span class="regular-price">$25.90</span> $15.90</h3>
                            </div>
                            <a href="#" class="btn karl-btn mt-30">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Offer Area End ****** -->

        <!-- ****** Popular Brands Area Start ****** -->
        {{-- <section class="karl-testimonials-area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Testimonials</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="karl-testimonials-slides owl-carousel">

                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial-area text-center">
                                <span class="quote">"</span>
                                <h6>Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. Aliquam finibus nulla quam, a iaculis justo finibus non. Suspendisse in fermentum nunc.Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. </h6>
                                <div class="testimonial-info d-flex align-items-center justify-content-center">
                                    <div class="tes-thumbnail">
                                        <img src="public/home/img/bg-img/tes-1.jpg" alt="">
                                    </div>
                                    <div class="testi-data">
                                        <p>Michelle Williams</p>
                                        <span>Client, Los Angeles</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial-area text-center">
                                <span class="quote">"</span>
                                <h6>Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. Aliquam finibus nulla quam, a iaculis justo finibus non. Suspendisse in fermentum nunc.Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. </h6>
                                <div class="testimonial-info d-flex align-items-center justify-content-center">
                                    <div class="tes-thumbnail">
                                        <img src="public/home/img/bg-img/tes-1.jpg" alt="">
                                    </div>
                                    <div class="testi-data">
                                        <p>Michelle Williams</p>
                                        <span>Client, Los Angeles</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial-area text-center">
                                <span class="quote">"</span>
                                <h6>Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. Aliquam finibus nulla quam, a iaculis justo finibus non. Suspendisse in fermentum nunc.Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. </h6>
                                <div class="testimonial-info d-flex align-items-center justify-content-center">
                                    <div class="tes-thumbnail">
                                        <img src="public/home/img/bg-img/tes-1.jpg" alt="">
                                    </div>
                                    <div class="testi-data">
                                        <p>Michelle Williams</p>
                                        <span>Client, Los Angeles</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section> --}}
        <!-- ****** Popular Brands Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        @include('layouts.footer_bar')
        <!-- ****** Footer Area End ****** -->
        
        <!-- ****** Quick View Modal Area Start ****** -->
        @include('layouts.show_product_model')
        <!-- ****** Quick View Modal Area End ****** -->

    </div>
    <!-- /.wrapper end -->

    @include('layouts.footer')

    
</body>

</html>