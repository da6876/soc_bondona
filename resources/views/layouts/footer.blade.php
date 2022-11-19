<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('public/home/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('public/home/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('public/home/js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('public/home/js/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('public/home/js/active.js')}}"></script>
<script src="{{asset('public/js/sweetalert.min.js')}}"></script>


<script>

    function showDetailsProduct(ID) {
        var url = "{{ url('product_views') }}" + '/' + ID;
        window.location.href = url;
    }

    function checkData() {
        if ($('#Primary1').is(":checked") && $('#Primary2').is(":checked")) {
            swal({
                title: "Oops",
                text: "Please Check Only One for Primary or Login ID",
                timer: '1500'
            });
        } else if ($('#Primary1').is(":checked")) {
            singUpCustomer();
        } else if ($('#Primary2').is(":checked")) {
            singUpCustomer();
        } else {
            swal({
                title: "Oops",
                text: "Please Check Only One for Primary or Login ID",
                timer: '1500'
            });
        }
    }

    function singUpCustomer() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = "{{ url('CustomerInfo') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($("#CustomerSignUp form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('#CustomerSignUp form')[0].reset();
                    $('#CustomerSignUp').modal('hide');
                    swal("Success", "Welcome To Bondona").then(function() {
                        //window.location = "redirectURL";
                        window.location.reload();
                    });
                } else if (dataResult.statusCode == 201) {
                    swal({
                        title: "Oops",
                        text: dataResult.statusMsg,
                        timer: '1500'
                    });
                }
            }, error: function (data) {
                console.log(data);
                swal({
                    title: "Oops",
                    text: "Error occured",
                    timer: '1500'
                });
            }
        });
        return false;
    };

    function customerLogin() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = "{{ url('CustLogin') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($("#CustomerSignIn form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    $('#CustomerSignIn form')[0].reset();
                    $('#CustomerSignIn').modal('hide');
                    swal("Success", "Welcome To Bondona").then(function() {
                        //window.location = "redirectURL";
                        window.location.reload();
                    });
                } else if (dataResult.statusCode == 201) {
                    swal({
                        title: "Oops",
                        text: "Login Failed",
                        timer: '1500'
                    });
                }
            }, error: function (data) {
                console.log(data);
                swal({
                    title: "Oops",
                    text: "Error occured",
                    timer: '1500'
                });
            }
        });
        return false;
    };

    function showalert(ViewType,ProductId, CustomerId, Quantity) {

        alert(ProductId);
        if (CustomerId != "") {
            addToCart();
        } else {
            if (CustomerID != "") {
                addProductToCart(ProductId, CustomerId, Quantity);
            } else {
                alert("Success !!" + CustomerID);
            }
        }
    }

    function addToCart() {
        var product_id = $("#product_id").val();
        var CustomerID = $("#CustomerID").val();
        var qty = $("#qty").val();
        if (product_id != "") {
            if (CustomerID != "") {
                addProductToCart(product_id,CustomerID,qty);
            } else {
                $('#quickview').modal('hide');
                $('#CustomerSignIn').modal('show');
            }
        } else {
            alert("No")
        }
    };

    function addProductToCart(ProductId, CustomerId, Quantity) {
        if (ProductId != "") {
            if (CustomerId != "") {
                var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
                url = "{{ url('AddToCart') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {'ViewType': 'AddToCard', "ProductID": ProductId,"CustomerID": CustomerId,"Quantity": Quantity, "_token": csrf_tokens},
                    datatype: 'JSON',
                    success: function (data) {
                        console.log(data);
                        swal({
                            title: "Success",
                            text: "Product Added To Cart Successfully",
                            timer: '1500'
                        }).then((result) => {
                            location.reload();
                        });
                    }, error: function (data) {
                        swal({
                            title: "Success",
                            text: "Product Added To Cart Failed",
                            timer: '1500'
                        });

                    }
                });
            } else {
                $('#quickview').modal('hide');
                $('#CustomerSignIn').modal('show');
            }
        } else {
            alert("Error")
        }


    }

    function showDetailsProduct(ID) {
        var url = "{{ url('product_views') }}" + '/' + ID;
        window.location.href = url;
    }
    function viewDetailsProduct() {
        var product_id = $("#product_id").val();
        var url = "{{ url('product_views') }}" + '/' + product_id;
        window.location.href = url;
    }

    function ShowLoginModal() {
        $('#CustomerSignUp').modal('hide');
        $('#CustomerSignIn').modal('show');
    }

    function ShowSignUpModal() {
        $('#CustomerSignIn').modal('hide');
        $('#CustomerSignUp').modal('show');
    }

    function showProductModel(product_id, Description, price, PriceDiscount, Details, Image) {
        $('#quickview').modal('show');
        $(".price").text('৳ ' + price);
        $(".discount").text('৳ ' + PriceDiscount);
        $('.title').text(Description);
        $('.details').text(Details);
        $('#product_id').val(product_id);
        document.getElementById("pro_img").src = "" + Image;
        $('#Status').val(data[0].Status);
    }


</script>