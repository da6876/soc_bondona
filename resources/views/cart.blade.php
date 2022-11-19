<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Bondona | Cart Details</title>

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

    $CustomerID = Session::get('CustomerID');


    $CardDetails = DB::select("SELECT ShopingCardID,TB1.ProductID, Quantity,PriceMRP,Description,image1
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
    @endphp

        <!-- ****** Popular Brands Area Start ****** -->
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($CardDetails as $CardDetails)
                                        <tr>
                                            <td class="cart_product_img d-flex align-items-center">
                                                <a href="#"><img src="{{$CardDetails->image1}}" alt="Product"></a>
                                                <h6>{{$CardDetails->Description}}</h6>
                                            </td>
                                            <td class="price"><span>{{$CardDetails->PriceMRP}} ৳</span></td>
                                            <td class="qty">
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="showDetatilsCardInfo('minus','{{$CardDetails->ShopingCardID}}')"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{$CardDetails->Quantity}}">
                                                    <span class="qty-plus" onclick=""><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </td>
                                            <td class="total_price"><span>{{$CardDetails->PriceMRP}} ৳</span></td>
                                            <td class="total_price"><span><button onclick="deleteCard('{{$CardDetails->ShopingCardID}}')" class="btn btn-danger btn-sm "><i class="fa fa-minus-square" aria-hidden="true"></i></button></span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-footer d-flex mt-30">
                            <div class="back-to-shop w-50">
                                <a href="{{url('shop')}}">Continue shooping</a>
                            </div>
                            <div class="update-checkout w-50 text-right">
                                <a href="#">clear cart</a>
                                <a href="#">Update cart</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="coupon-code-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cupon code</h5>
                                <p>Enter your cupone code</p>
                            </div>
                            <form action="#">
                                <input type="search" name="search" placeholder="#569ab15">
                                <button type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="shipping-method-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Shipping method</h5>
                                <p>Select the one you want</p>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>Next day delivery</span><span>$4.99</span></label>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio2"><span>Standard delivery</span><span>$1.99</span></label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-total-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cart total</h5>
                                <p>Final info</p>
                            </div>

                            <ul class="cart-total-chart">
                                <li><span>Subtotal</span> <span>{{$totalSumPriceCard}} ৳</span></li>
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span><strong>Total</strong></span> <span><strong>{{$totalSumPriceCard}} ৳</strong></span></li>
                            </ul>
                            <a href="{{url('checkout')}}" class="btn karl-checkout-btn">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
    function  deleteCard(ShopingCardID) {
        if (ShopingCardID != "") {
            var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
            url = "{{ url('AddToCart') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {'ViewType': 'DeleteToCard', "ShopingCardID": ShopingCardID, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log(data);
                    swal({
                        title: "Success",
                        text: "Product Remove from Cart Successfully !"
                    }).then((result) => {
                        location.reload();
                    });
                }, error: function (data) {
                    swal({
                        title: "Success",
                        text: "Product Remove from Cart Failed !",
                        timer: '1500'
                    });

                }
            });

        } else {
            alert("Error")
        }
    }
</script>

</html>