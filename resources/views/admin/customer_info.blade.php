<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Bondona | Customer Info</title>


    @include('layout.header_links')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layout.nav_slide_bar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layout.top_bar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">


            <!-- Content -->
            <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                  <nav class="navbar navbar-example navbar-expand-lg bg-light">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="javascript:void(0)"></a>
                      <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbar-ex-3"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>
  
                      <div class="collapse navbar-collapse" id="navbar-ex-3">
                        <div class="navbar-nav me-auto">
                          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> Customer Info</strong></a>
                        </div>
  
                        <form onsubmit="return false">
                          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add Customer Info</button>
                        </form>
                      </div>
                    </div>
                  </nav>
                  <hr class="" />
                  <!-- Hoverable Table rows -->
                  <div class="card">
                    <h5 class="card-header">Customer Info</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover" id="userInfo-dataTabel">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>LoginID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Picture</th>
                            <th>MobileNo</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <!--/ Hoverable Table rows -->

                </div>
                <!-- / Content -->
    
                <div class="content-backdrop fade"></div>
              </div>

            <!-- / Content -->

            <!-- Footer -->
            @include('layout.footer_bar')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <div class="modal fade userInfoDataAdd" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
              <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form id="userInfoDataAdd" action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row g-1">
                        <div class="col mb-0">
                          <input type="hidden" id="UserID" name="UserID"/>
                          <label for="FirstName" class="form-label">First Name</label>
                          <input type="text" id="FirstName" name="FirstName" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                        <div class="col mb-0">
                          <label for="LastName" class="form-label">Last Name</label>
                          <input type="text" id="LastName" name="LastName" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-6">
                          <label for="MobileNo" class="form-label">Mobile No</label>
                          <input type="text" id="MobileNo" name="MobileNo" class="form-control" placeholder="xxxx@xxx.xx" />
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="Primary1" name="Primary1">
                            <label class="form-check-label" for="Primary1">
                              Set As Primary ID
                            </label>
                          </div>
                        </div>
                        <div class="col mb-6">
                          <label for="Email" class="form-label">Email</label>
                          <input type="email" id="Email" name="Email" class="form-control" placeholder="xxxx@xxx.xx" />
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="Primary2" name="Primary2">
                            <label class="form-check-label" for="Primary2">
                              Set As Primary ID
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col mb-12">
                          <label for="Address" class="form-label">Address</label>
                          <input type="text" id="Address" class="form-control" placeholder="xxxx@xxx.xx" name="Address" />
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col mb-12">
                          <label for="picture" class="form-label">Picture</label>
                          <input type="file" id="picture" class="form-control" name="picture" />
                        </div>
                    </div>
                    
                    <div class="row g-1">
                        <div class="col mb-12">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" id="Password" class="form-control" placeholder="xxxx@xxx.xx" name="Password" />
                          </div>
                        <div class="col mb-0">
                          <label for="Status" class="form-label">User Status</label>
                          <select class="form-select" id="Status" name="Status" aria-label="Default select example">
                              <option selected="">Select Status</option>
                              <option value="Active">Active</option>
                              <option value="InActive">InActive</option>
                          </select>
                          </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" onclick="checkData()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    
    @include('layout.footer_links')
    <div class="buy-now">
        <a href="#" onclick="showModal()" class="btn btn-success btn-buy-now">Add Customer Info</a>
    </div>



    

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
      function showModal(){
          $('.userInfoDataAdd form')[0].reset();
          $('#ProductCategoryId').val("");
          $('.userInfoDataAdd').modal('show');
      }


      var table1 = $('#userInfo-dataTabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.CustomerInfo') !!}',
        columns: [
            {data: 'CustomerID', name: 'CustomerID'},
            {data: 'LoginID', name: 'LoginID'},
            {data: 'FirstName', name: 'FirstName'},
            {data: 'LastName', name: 'LastName'},
            {data: 'picture', name: 'picture'},
            {data: 'MobileNo', name: 'MobileNo'},
            {data: 'Email', name: 'Email'},
            {data: 'Address', name: 'Address'},
            {data: 'Status', name: 'Status'},
            {data: 'CreateDate', name: 'CreateDate'},
            {data: 'UpdateDate', name: 'UpdateDate'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      });

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

    //Delete User Type Data By Ajax
    function  deleteUserInfoData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('CustomerInfo') }}" + '/' + id,
                        type: "POST",
                        data: {'_method': 'DELETE', '_token': csrf_token},
                        success: function (data) {
                            console.log(data);
                            var dataResult = JSON.parse(data);
                            if (dataResult.statusCode == 200) {
                                $('#userInfo-dataTabel').DataTable().ajax.reload();
                                swal({
                                    title: "Delete Done",
                                    text: "Poof! Your data file has been deleted!",
                                    icon: "success",
                                    button: "Done"
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        }, error: function (data) {
                            console.log(data);
                            swal({
                                title: "Opps...",
                                text: "Error occured !",
                                icon: "error",
                                button: 'Ok ',
                            });
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    }

    </script>
  </body>
</html>
