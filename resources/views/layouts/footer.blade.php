<script>
    /* window.onscroll = function() {myFunction()};
    
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    } */
    
        
    function showDetailsProduct(ID) {
             var url = "{{ url('product_views') }}" + '/' + ID;
            window.location.href = url;
        }
    </script>
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
  function checkData(){
      if($('#Primary1').is(":checked") && $('#Primary2').is(":checked") ){
        swal({
            title: "Oops",
            text: "Please Check Only One for Primary or Login ID",
            timer: '1500'
        });
      }else if($('#Primary1').is(":checked")){
        addUserType();
      }else if($('#Primary2').is(":checked")){
        addUserType();
      }else{
        swal({
            title: "Oops",
            text: "Please Check Only One for Primary or Login ID",
            timer: '1500'
        });
      }
    }

  function addUserType() {
      url = "{{ url('CustomerInfo') }}";
      $.ajax({
          url: url,
          type: "POST",
          data: new FormData($(".userInfoDataAdd form")[0]),
          contentType: false,
          processData: false,
          success: function (data) {
              console.log(data);
              var dataResult = JSON.parse(data);
              if (dataResult.statusCode == 200) {
                  $('.userInfoDataAdd').modal('hide');
                  $('#userInfo-dataTabel').DataTable().ajax.reload();
                  swal("Success", dataResult.statusMsg);
                  $('.userInfoDataAdd form')[0].reset();
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



  </script>