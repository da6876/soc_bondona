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

<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>

    var firebaseConfig = {
        apiKey: "AIzaSyAdQ3TZl1f-itnUFDT2Q_kVgp3WVQTiRBE",
        authDomain: "webotp-4d32f.firebaseapp.com",
        projectId: "webotp-4d32f",
        storageBucket: "webotp-4d32f.appspot.com",
        messagingSenderId: "30929219919",
        appId: "1:30929219919:web:231527e02c328d479fd53a",
        measurementId: "G-43QVL1R8SD"
    };

    firebase.initializeApp(firebaseConfig);
</script>
<script>

    function showDetailsProduct(ID) {
        var url = "{{ url('product_views') }}" + '/' + ID;
        window.location.href = url;
    }

    function checkData() {

        var mobileCheck = $("#mobileCheck").val();
        var otpCheck = $("#otpCheck").val();
        var validation = $("#validation").val();
        if (mobileCheck!="Success" && otpCheck!="Success" && validation!="Success") {
            swal({
                title: "Oops",
                text: "Please Verify The Mobile Number",
                timer: '1500'
            });
        } else {
            singUpCustomer();
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

    function productViewByFilter(ViewType, ProductSubCategoryId) {
        var url = "{{ url('ProductByCategories') }}" + '/' + ProductSubCategoryId;
        window.location.href = url;
        /*if (ProductSubCategoryId != "") {
            var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
            url = "{{ url('ProductByCatSubCat') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {'ViewType': ViewType, "ProductSubCategoryId": ProductSubCategoryId, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log(data);

                }, error: function (data) {
                    swal({
                        title: "Success",
                        text: "Product Added To Cart Failed",
                        timer: '1500'
                    });

                }
            });

        } else {
            alert("Error")
        }*/


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

    function ShowForgetModal() {
        $('#CustomerForgetPass').modal('show');
    }

    function addShippingAddress() {
        $('#AddShippingAddress').modal('show');
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


    window.onload=function () {
        render();
    };

    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function SendCode(type) {
        if (type=='SignUp'){
            var number = $("#MobileNo").val();
            firebase.auth().signInWithPhoneNumber("+880"+number,window.recaptchaVerifier).then(function (confirmationResult) {

                window.confirmationResult=confirmationResult;
                coderesult=confirmationResult;

                $("#sentSuccessR").text("Message Sent Successfully.");
                $("#sentSuccessR").show();
                $("#OTPCodeSectionR").show();
                $("#mobileCheck").val("Success");

            }).catch(function (error) {
                $("#errorR").text(error.message);
                $("#errorR").show();
                $("#mobileCheck").val("Failed");
            });
        }

        /*var number = $("#mobileno").val();

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;

            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });*/

    }


    function VerifyCode(type) {
        if (type=='SignUp') {
            var code = $("#OTPCode").val();

            coderesult.confirm(code).then(function (result) {
                var user = result.user;

                $("#successRegsiter").text("OTP Verify Successfully.");
                $("#successRegsiter").show();
                $("#sentSuccessR").hide();
                $("#otpCheck").val("Success");
                $("#validation").val("Success");

            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
                $("#sentSuccessR").hide();
                $("#otpCheck").val("Failed");
                $("#validation").val("Failed");
            });
        }
    }
</script>

