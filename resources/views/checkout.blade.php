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
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Billing Address</h5>
                            <p>Enter your cupone code</p>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Name <span>*</span></label>
                                    <input type="hidden" id="CustomerID" name="CustomerID"
                                           value="{{Session::get('CustomerID')}}">
                                    <input type="text" class="form-control" id="CustomerName" name="CustomerName"
                                           value="{{Session::get('Customer_FirstName')}}" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="custom-select d-block w-100" id="country">
                                        <option value="usa">Bangladesh</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Shipping Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="ShipingAddress"
                                           name="ShipingAddress" value="{{Session::get('Customer_Address')}}">
                                </div>
                                {{-- <div class="col-6 mb-3">
                                     <label for="postcode">Postcode <span>*</span></label>
                                     <input type="text" class="form-control" id="postcode" value="">
                                 </div>
                                 <div class="col-6 mb-3">
                                     <label for="city">Town/City <span>*</span></label>
                                     <input type="text" class="form-control" id="city" value="">
                                 </div>--}}
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="PhoneNo" name="PhoneNo" min="0"
                                           max="15" maxlength="15" value="{{Session::get('Customer_MobileNo')}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" readonly class="form-control" id="email_address"
                                           name="email_address" value="{{Session::get('Customer_Email')}}">
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Terms and
                                            conitions</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our
                                            newsletter</label>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            @foreach($CardDetails as $CardDetails)
                                <li><span class="text-success">{{$CardDetails->Description}}</span> <span
                                            class="text-success">{{$CardDetails->PriceMRP}} ৳</span></li>
                            @endforeach
                            <input type="hidden" id="TotalPrice" name="TotalPrice" value="{{$totalSumPriceCard}}">
                            <input type="hidden" id="Discount" name="Discount" value="0">
                            <input type="hidden" id="DeliveryCharges" name="DeliveryCharges" value="0">
                            <li><span>Subtotal</span> <span>{{$totalSumPriceCard}} ৳</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>{{$totalSumPriceCard}} ৳</span></li>
                        </ul>

                        <div class="shipping-method-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Payment method</h5>
                                <p>Select the one you want</p>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between"
                                       for="customRadio1"><span>Cash On Delivery</span></label>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between"
                                       for="customRadio2"><span>Credit Card</span></label>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between"
                                       for="customRadio3"><span>Direct Bank Transfer</span></label>
                            </div>

                            <div class="custom-control custom-radio mb-30">
                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label d-flex align-items-center justify-content-between"
                                       for="customRadio4"><span>Mobile Banking</span></label>
                            </div>
                        </div>

                        <a href="#" onclick="checkDataForPlaceOrder()" class="btn karl-checkout-btn">Place Order</a>
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

    function checkDataForPlaceOrder() {

        var CustomerID = $("#CustomerID").val();
        var PhoneNo = $("#PhoneNo").val();
        var TotalPrice = $("#TotalPrice").val();
        var Discount = $("#Discount").val();
        var DeliveryCharges = $("#DeliveryCharges").val();
        var ShipingAddress = $("#ShipingAddress").val();
        var PaymentType = "Cash On Delivery";

        if (PhoneNo != "") {
            if (ShipingAddress != "") {
                addUserType(CustomerID, PhoneNo, TotalPrice, Discount, DeliveryCharges, ShipingAddress, PaymentType)
            } else {
                swal({
                    text: "Please Enter Your Shipping Address",
                    timer: '1500'
                });
            }
        } else {
            swal({
                text: "Please Enter Your Phone Number",
                timer: '1500'
            });
        }

    }

    function addUserType(CustomerID, PhoneNo, TotalPrice, Discount, DeliveryCharges, ShipingAddress, PaymentType) {
        url = "{{ url('PlaceOrder') }}";
        var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;

        $.ajax({
            url: url,
            type: "POST",
            data: {
                'ViewType': 'PlaceOrder',
                "CustomerID": CustomerID,
                "PhoneNo": PhoneNo,
                "TotalPrice": TotalPrice,
                "Discount": Discount,
                "DeliveryCharges": DeliveryCharges,
                "ShipingAddress": ShipingAddress,
                "PaymentType": PaymentType,
                "_token": csrf_tokens
            },
            datatype: 'JSON',
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('.checkout_details_area form')[0].reset();
                    swal("Success", dataResult.statusMsg).then((result) => {
                        loc = "{{url("OrderInfo")}}";
                        window.location.href = loc;
                    });

                } else if (dataResult.statusCode == 201) {
                    swal({
                        title: "Oops",
                        text: dataResult.statusMsg,
                        icon: "error",
                        timer: '1500'
                    });
                }
            }, error: function (data) {
                console.log(data);
                swal({
                    title: "Oops",
                    text: "Error occured",
                    icon: "error",
                    timer: '1500'
                });
            }
        });
        return false;
    };
</script>
</html>