<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


                    <div class="col-12 col-md-12 col-lg-12">
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
                                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item wow fadeInUpBig" data-wow-delay="0.{{2+$delay}}s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{$AllProducts->image1}}" alt="">
                                        <div class="product-quicview">
                                            <a href="#" onclick="showProductModel('{{$AllProducts->ProductID}}','{{$AllProducts->Description}}','{{$AllProducts->PriceMRP}}','{{$AllProducts->PriceDiscount}}','{{$AllProducts->Details}}','{{$AllProducts->image1}}')"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">??? {{$AllProducts->PriceMRP}}</h4>
                                        <p>{{$AllProducts->Description}}</p>
                                        <!-- Add to Cart -->
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#"  onclick="addProductToCart('{{$AllProducts->ProductID}}','{{Session::get('CustomerID')}}','1')" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$AllProducts->ProductID}}')" class="view-to-product-btn">View Product</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach

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



</body>

</html>