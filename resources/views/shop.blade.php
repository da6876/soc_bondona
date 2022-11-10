<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Bondona | Product View</title>

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

        
        @php


          $ProductCategory = DB::select("SELECT ProductCategoryId, Name
                            FROM productcategory
                            WHERE Status != 'Delete'");
        @endphp


        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="shop_sidebar_area">
                           
                            <div class="widget catagory mb-50">
                                <!--  Side Nav  -->
                                <div class="nav-side-menu">
                                    <h6 class="mb-0">Catagories</h6>
                                    <div class="menu-list">
                                        <ul id="menu-content2" class="menu-content collapse out">
                                        @foreach($ProductCategory as $ProductCategory)                                        
                                        <li data-toggle="collapse" class="collapsed" data-target="#{{$ProductCategory->ProductCategoryId}}">
                                            <a href="#">{{$ProductCategory->Name}}</a>
                                            <ul class="sub-menu collapse" id="{{$ProductCategory->ProductCategoryId}}">
                                                @php
                                                    $ProductSubCategory = DB::select("SELECT ProductSubCategoryId, Name
                                                            FROM productsubcategory
                                                            WHERE Status != 'Delete'
                                                            and Category_Id= '$ProductCategory->ProductCategoryId'");
                                                @endphp 
                                                @foreach($ProductSubCategory as $ProductSubCategory) 
                                                    <li><a href="#" onclick="subcat('{{$ProductSubCategory->ProductSubCategoryId}}')">{{$ProductSubCategory->Name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="widget price mb-50">
                                <h6 class="widget-title mb-30">Filter by Price</h6>
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="1350" data-label-result="Price:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: 0 - 1350</div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget color mb-70">
                                <h6 class="widget-title mb-30">Filter by Color</h6>
                                <div class="widget-desc">
                                    <ul class="d-flex justify-content-between">
                                        <li class="gray"><a href="#"><span>(3)</span></a></li>
                                        <li class="red"><a href="#"><span>(25)</span></a></li>
                                        <li class="yellow"><a href="#"><span>(112)</span></a></li>
                                        <li class="green"><a href="#"><span>(72)</span></a></li>
                                        <li class="teal"><a href="#"><span>(9)</span></a></li>
                                        <li class="cyan"><a href="#"><span>(29)</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget size mb-50">
                                <h6 class="widget-title mb-30">Filter by Size</h6>
                                <div class="widget-desc">
                                    <ul class="d-flex justify-content-between">
                                        <li><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget recommended">
                                <h6 class="widget-title mb-30">Recommended</h6>

                                <div class="widget-desc">
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product-img/product-10.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Men’s T-shirt</h6>
                                            <p>$ 39.99</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="public/home/img/product-img/product-11.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Blue mini top</h6>
                                            <p>$ 19.99</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="public/home/img/product-img/product-12.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Women’s T-shirt</h6>
                                            <p>$ 39.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop_grid_product_area">
                            <div class="row">

                                <!-- Single gallery Item -->

                                @php
                                    $AllProducts = DB::select('SELECT TB1.ProductID, TB1.ProductType,
                                    TB2.Name as ProductTypeName,TB1.Color,TB4.Name as ColorName, TB1.Category,
                                    TB5.Name as CategoryName, TB1.SubCategory,TB3.Name as SubCategoryName,
                                    TB1.DisplayType, TB1.Description, TB1.Details, TB1.Material, TB1.Care,
                                    TB1.PriceMRP, TB1.PriceDiscount, TB1.image1, TB1.image2, TB1.image3,
                                    TB1.image4, TB1.Status, TB1.CreateBy, TB1.CreateDate, TB1.UpdateBy,
                                    TB1.UpdateDate 
                                    FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
                                    WHERE TB1.ProductType = TB2.ProductTypeId
                                    AND TB1.Color = TB4.ProductColorId
                                    AND TB1.Category = TB5.ProductCategoryId
                                    AND TB1.SubCategory = TB3.ProductSubCategoryId;');
                                    $delay=1;
                                @endphp

                                @foreach($AllProducts as $AllProducts)
                                @php
                                    $delay+4;
                                @endphp
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.{{2+$delay}}s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{$AllProducts->image1}}" alt="">
                                        <div class="product-quicview">
                                            <a href="#" onclick="showProductModel('{{$AllProducts->Description}}','{{$AllProducts->PriceMRP}}','{{$AllProducts->PriceDiscount}}','{{$AllProducts->Details}}','{{$AllProducts->image1}}')"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">৳ {{$AllProducts->PriceMRP}}</h4>
                                        <p>{{$AllProducts->Description}}</p>
                                        <!-- Add to Cart -->
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$AllProducts->ProductID}}')" class="view-to-product-btn">View Product</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.3s">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.4s">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.5s">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.6s">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.7s">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.8s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="public/home/img/product-img/product-7.jpg" alt="">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.9s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="public/home/img/product-img/product-8.jpg" alt="">
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

                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="1s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="public/home/img/product-img/product-9.jpg" alt="">
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
                                </div> --}}
                            </div>
                        </div>

                        <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- ****** Footer Area Start ****** -->
        @include('layouts.footer_bar')
        <!-- ****** Footer Area End ****** -->
        
        <!-- ****** Quick View Modal Area Start ****** -->
        @include('layouts.show_product_model')
        <!-- ****** Quick View Modal Area End ****** -->

    </div>
    <!-- /.wrapper end -->
    
    @include('layouts.footer')

    <script>
        function showProductModel(Description,price,PriceDiscount,Details,Image) {
            $('#quickview').modal('show');
            $(".price").text('৳ '+price);
            $(".discount").text('৳ '+PriceDiscount);
            $('.title').text(Description);
            $('.details').text(Details);
            document.getElementById("pro_img").src = Image;
            $('#Status').val(data[0].Status);


        /* $.ajax({
            url: "{{ url('ProductColor') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.userInfoDataAdd form')[0].reset();
                $('.userInfoDataAdd').modal('show');
                $('.modal-title').text(data[0].Name+' Information');
                $('#ProductColorId').val(data[0].ProductColorId);
                $('#Name').val(data[0].Name);
                $('#Status').val(data[0].Status);
            }, error: function () {
                swal({
                    title: "Oops",
                    text: "aa",
                    icon: "error",
                    timer: '1500'
                });
            }
        }); */
        }
    </script>

</body>

</html>