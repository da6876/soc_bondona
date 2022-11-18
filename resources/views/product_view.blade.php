<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        @foreach ($ProductsInfo as $Product)
            @php
              $ProductID = $Product->ProductID;
              $Description = $Product->Description;
              $Details = $Product->Details;
              $Material = $Product->Material;
              $ProductType = $Product->ProductType;
              $Care = $Product->Care;
              $PriceMRP = $Product->PriceMRP;
              $PriceDiscount = $Product->PriceDiscount;
              $image1 = $Product->image1;
              $image2 = $Product->image2;
              $image3 = $Product->image3;
              $image4 = $Product->image4;
              $ProductTypeName = $Product->ProductTypeName;
              $CategoryName = $Product->CategoryName;
              $SubCategoryName = $Product->SubCategoryName;
              $DisplayType = $Product->DisplayType;

              $ProductSize = DB::select("SELECT ProductSizeId, Name
								FROM productsize
								WHERE ProductTypeId = '$ProductType'
                                and Status != 'Delete'");
            @endphp
            
        @endforeach


        <!-- ****** Header Area Start ****** -->
        @include ('header_areas')
        <!-- ****** Header Area End ****** -->

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    @if($image1)
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(../{{$image1}});">
                                    </li>
                                    @endif
                                    @if($image2)
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(../{{$image2}});">
                                    </li>
                                    @endif
                                    @if($image3)
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(../{{$image3}});">
                                    </li>
                                    @endif
                                    @if($image4)
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(../{{$image4}});">
                                    </li>
                                    @endif
                                </ol>

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="../{{$image1}}">
                                        <img class="d-block w-100" src="../{{$image1}}" alt="First slide">
                                    </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="../{{$image2}}">
                                        <img class="d-block w-100" src="../{{$image2}}" alt="Second slide">
                                    </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="../{{$image3}}">
                                        <img class="d-block w-100" src="../{{$image3}}" alt="Third slide">
                                    </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="../{{$image4}}">
                                        <img class="d-block w-100" src="../{{$image4}}" alt="Fourth slide">
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">

                            <h4 class="title"><a href="#">{{$Description}}</a></h4>

                            <h4 class="price">৳ {{$PriceMRP}}</h4>

                            <p class="available">Available: <span class="text-muted">In Stock</span></p>

                            <div class="single_product_ratings mb-15">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>

                            <div class="widget size mb-50">
                                <h6 class="widget-title">Size</h6>
                                <div class="widget-desc">
                                    <ul>
                                        @foreach($ProductSize as $ProductSize)
                                        <li><a href="#" onclick="addSize('{{$ProductSize->ProductSizeId}}')">{{$ProductSize->Name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Add to Cart Form -->
                            <div class="addToCard">
                                <form class="cart clearfix mb-50 d-flex " enctype="multipart/form-data">
                                    <div class="quantity">
                                        {{csrf_field()}}
                                        <input type="hidden" name="CustomerID" id="CustomerID" value="{{Session::get('CustomerID')}}"/>
                                        <input type="hidden" name="ProductID" id="ProductID" value="{{$ProductID}}"/>
                                        <input type="hidden" name="ProductCode" id="ProductCode" value="{{$ProductID}}"/>
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="Quantity" step="1" min="1" max="12" name="Quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button type="button" onclick="showalert('{{$ProductID}}','{{Session::get('CustomerID')}}')" name="addtocart" value="5" class="btn cart-submit d-block">Add to cart</button>
                                </form>
                            </div>
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Details</a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Details : <span class="text-muted">{{$Details}}</span></p>
                                            <p>Product Type : <span class="text-muted">{{$ProductTypeName}}</span></p>
                                            <p>Category : <span class="text-muted">{{$CategoryName}}</span></p>
                                            <p>Sub-Category : <span class="text-muted">{{$SubCategoryName}}</span></p>
                                            <p>Display Type : <span class="text-muted">{{$DisplayType}}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Material Details</a>
                                        </h6>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{{$Material}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Care Details</a>
                                        </h6>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{{$Care}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
            $ProductsInfoByType = DB::select("SELECT TB1.ProductID,
                TB1.Category,TB1.Description,TB1.Details,TB1.PriceMRP,TB1.PriceDiscount, TB1.image1
                FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
                WHERE TB1.ProductType = TB2.ProductTypeId
                AND TB1.Color = TB4.ProductColorId
                AND TB1.Category = TB5.ProductCategoryId
                AND TB1.SubCategory = TB3.ProductSubCategoryId
                AND TB1.ProductType = '$ProductType';");
        @endphp

        <!-- ****** Popular Brands Area Start ****** -->
        <section class="you_may_like_area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">

                            
                            @foreach($ProductsInfoByType as $ProductsInfoByType)
                            <div class="single_gallery_item">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="../{{$ProductsInfoByType->image1}}" alt="">
                                    <div class="product-quicview">
                                        <a href="#" onclick="showProductModel('{{$ProductsInfoByType->Description}}','{{$ProductsInfoByType->PriceMRP}}',
                                        '{{$ProductsInfoByType->PriceDiscount}}','{{$ProductsInfoByType->Details}}','{{$ProductsInfoByType->image1}}')">
                                        <i class="ti-plus"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">৳ {{$ProductsInfoByType->PriceMRP}}</h4>
                                    <p>{{$ProductsInfoByType->Description}}</p>
                                    <!-- Add to Cart -->
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" onclick="showDetailsProduct('{{$ProductsInfoByType->ProductID}}')" class="view-to-product-btn">View Product</a>
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
    <script>

        function showalert(ProductId,CustomerId){
            if(CustomerId==""){
                $('#showAlertForLogin').modal('show');
            }else{
                if(CustomerID!=""){
                    url = "{{ url('AddToCart') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: new FormData($(".addToCard form")[0]),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);                
                        }, error: function (data) {
                            console.log(data);
                            
                        }
                    });
                }else{
                    alert("Success !!"+CustomerID );
                }
            }
        }

        function addToCart() {
            var CustomerID  = $("#CustomerID").val();
            if(CustomerID!=""){

                url = "{{ url('AddToCart') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($(".addToCard form")[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);  
                        alert(data.statusMsg);
                        swal({
                            title: "Success",
                            text: data.statusMsg,
                            timer: '1500'
                        });              
                    }, error: function (data) {
                        console.log(data); 
                        
                        swal({
                            title: "Success",
                            text: data.statusMsg,
                            timer: '1500'
                        });   
                        
                    }
                });
                

                alert("Success !!"+CustomerID );
                
            }else{
                var url = "{{ url('/') }}";
                swal("For Add To Card, Please Login or SingUp !!", 
                {
                    buttons: {
                        cancel: "SignUp",
                        catch: "Login",
                        defeat: "Continew",
                    },}).then((value) => {
                        switch (value) {
                            case "cancel":
                                signHere();
                                break;
                            case "catch":
                                loginHere();
                                break;
                            default:
                                swal("Continew As Gest !");
                        }
                    }
                );
            }
            
            
        };

        function showProductModel(Description,price,PriceDiscount,Details,Image) {
            $('#quickview').modal('show');
            $(".price").text('৳ '+price);
            $(".discount").text('৳ '+PriceDiscount);
            $('.title').text(Description);
            $('.details').text(Details);
            document.getElementById("pro_img").src = "../"+Image;
            $('#Status').val(data[0].Status);
        }
        
        function showDetailsProduct(ID) {
             var url = "{{ url('product_views') }}" + '/' + ID;
            window.location.href = url;
        }


    </script>
</body>

</html>