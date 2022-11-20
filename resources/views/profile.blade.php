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
    $OrderDetails = DB::select("SELECT ProductCode,Description,PriceMRP,image1,
                    TB1.OrderID,CustomerID, PhoneNo, ShipingAddress, PaymentMethod, TransID,TB2.Quantity,
                    TotalPrice, Discount, DeliveryCharges,TB1.Status, TB1.CreateDate, TB1.UpdateBy, TB1.UpdateDate
                    FROM orderinfo_mst TB1,orderinfo_dtl TB2,productinfo TB3
                    WHERE TB1.OrderID = TB2.OrderID
                    AND TB3.ProductID =TB2.ProductCode
                    AND CustomerID = '$CustomerID';");
@endphp

<!-- ****** Popular Brands Area Start ****** -->
    <div class="col-12 col-md-12 col-lg-12 ml-lg-auto">
        <div class="order-details-confirmation">
            <div id="accordion" role="tablist" class="mb-4">

                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                               ria-controls="collapseOne">
                                <i class="fa fa-circle-o mr-3"></i>
                                Profile
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-12 col-md-12">
                                <div class="checkout_details_area clearfix">

                                    <form action="#" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Full Name </label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                       value="" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Phone No </label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                       value="" required>
                                            </div>
                                            <div class="col-md-12 mb-6">
                                                <label for="first_name">Email </label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                       value="" required>
                                            </div>
                                            <div class="col-md-12 mb-6">
                                                <label for="first_name">Address </label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                       value="" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Gender</label>
                                                <select class="custom-select d-block w-100" id="country">
                                                    <option value="usa" selected>Select Gender</option>
                                                    <option value="uk">Male</option>
                                                    <option value="ger">FeMale</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name">Date Of Birt</label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                       value="" required>
                                            </div>
                                            <div class="col-md-12 mb-6">

                                                <a href="#" onclick="checkData()" class="btn karl-checkout-btn">Save</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                               aria-controls="collapseTwo">
                                <i class="fa fa-circle-o mr-3"></i>
                                Order History
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                         data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Product Info</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($OrderDetails as $OrderDetails)
                                    <tr>
                                        <td>{{$OrderDetails->Description}}</td>
                                        <td>{{$OrderDetails->Quantity}}</td>
                                        <td>{{$OrderDetails->PriceMRP}}</td>
                                        <td>{{$OrderDetails->Status}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger">Cancel</button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                               aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>Shipping Addresses</a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                         data-parent="#accordion">
                        <div class="card-body text-center">
                            <p><button onclick="addShippingAddress()" class="btn btn-lg btn-info">Add New Address</button></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- ****** New Arrivals Area End ****** -->

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
    function deleteCard(ShopingCardID) {
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