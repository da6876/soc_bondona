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

    @endphp

        <!-- ****** Popular Brands Area Start ****** -->
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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