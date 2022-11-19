
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


function forShowAlertCustomerSignUp() {
    $('#CustomerSignIn').modal('show');
}

function checkData(){
    if($('#Primary1').is(":checked") && $('#Primary2').is(":checked") ){
        swal({
            title: "Oops",
            text: "Please Check Only One for Primary or Login ID",
            timer: '1500'
        });
    }else if($('#Primary1').is(":checked")){
        singUpCustomer();
    }else if($('#Primary2').is(":checked")){
        singUpCustomer();
    }else{
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
          data: new FormData($(".CustomerSignUp form")[0]),
          contentType: false,
          processData: false,
          success: function (data) {
              console.log(data);
              var dataResult = JSON.parse(data);
              if (dataResult.statusCode == 200) {
                  $('.CustomerSignUp form')[0].reset();
                  $('.CustomerSignUp').modal('hide');
                  swal("Success", "Welcome To Bondona");
                  location.reload();
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

  function showUserInfoData(id) {
      $.ajax({
          url: "{{ url('CustomerInfo') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
              $('.userInfoDataAdd form')[0].reset();
              $('.userInfoDataAdd').modal('show');
              $('.modal-title').text(data[0].Name+' Information');
              $('#CustomerID').val(data[0].CustomerID);
              if(data[0].LoginID==data[0].MobileNo){
                $('#Primary1').attr('checked', 'checked');
                $('#Primary2').removeAttr('checked');
              }else if(data[0].LoginID==data[0].Email){
                $('#Primary2').attr('checked', 'checked');  
                $('#Primary1').removeAttr('checked');              
              }else{
                $('#Primary2').removeAttr('checked');  
                $('#Primary1').removeAttr('checked');  
              }
              $('#LastName').val(data[0].LastName);
              $('#UserType').val(data[0].UserType);
              $('#Password').val(data[0].Password);
              $('#FirstName').val(data[0].FirstName);
              $('#MobileNo').val(data[0].MobileNo);
              $('#Email').val(data[0].Email);
              $('#Address').val(data[0].Address);
              $('#Status').val(data[0].Status);
          }, error: function () {
              swal({
                  title: "Oops",
                  text: "aa",
                  icon: "error",
                  timer: '1500'
              });
          }
      });
  }

  function showalert(ShowType,ProductId,CustomerId){
    if()
      if(CustomerId==""){
          forShowAlertCustomerSignUp();
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
                      swal({
                          title: "Success",
                          text: "Product Added To Cart Successfully",
                          timer: '1500'
                      });
                  }, error: function (data) {
                      swal({
                          title: "Success",
                          text: "Product Added To Cart Failed",
                          timer: '1500'
                      });

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


function showProductModel(product_id,Description,price,PriceDiscount,Details,Image) {
    $('#quickview').modal('show');
    $(".price").text('৳ '+price);
    $(".discount").text('৳ '+PriceDiscount);
    $('.title').text(Description);
    $('.details').text(Details);
    $('#product_id').val(Image);
    document.getElementById("pro_img").src = ""+Image;
    $('#Status').val(data[0].Status);
} 


  function showDetailsProduct(ID) {
      var url = "{{ url('product_views') }}" + '/' + ID;
      window.location.href = url;
  }


  function ShowLoginModal(){
    $('#CustomerSignUp').modal('hide');
    $('#CustomerSignIn').modal('show');
  }

  function ShowSignUpModal(){
    $('#CustomerSignIn').modal('hide');
    $('#CustomerSignUp').modal('show');
  }



  </script>