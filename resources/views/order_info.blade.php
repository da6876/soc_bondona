<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Bondona | Order Info</title>

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


    $OrderDetails = DB::select("SELECT ProductCode,Description,PriceMRP,image1,
                    TB1.OrderID,CustomerID, PhoneNo, ShipingAddress, PaymentMethod, TransID,TB2.Quantity,
                    TotalPrice, Discount, DeliveryCharges,TB1.Status, TB1.CreateDate, TB1.UpdateBy, TB1.UpdateDate
                    FROM orderinfo_mst TB1,orderinfo_dtl TB2,productinfo TB3
                    WHERE TB1.OrderID = TB2.OrderID
                    AND TB3.ProductID =TB2.ProductCode
                    AND CustomerID = '$CustomerID';");



    @endphp

        <!-- ****** Popular Brands Area Start ****** -->
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col-md-2">Image</th>
                                    <th scope="col-md-4">Description</th>
                                    <th scope="col-md-2">Quantity</th>
                                    <th scope="-md-2">Price</th>
                                    <th scope="col-md-2">Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($OrderDetails as $OrderDetails)
                                <tr>
                                    <td><a href="#"><img src="{{$OrderDetails->image1}}" alt="Product" width="20%"></a></td>
                                    <td>{{$OrderDetails->Description}}</td>
                                    <td>{{$OrderDetails->Quantity}}</td>
                                    <td>{{$OrderDetails->PriceMRP}}</td>
                                    <td>{{$OrderDetails->Status}}</td>
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

                            </div>
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