<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Bondona | Product Sub-Category</title>


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
                          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> Product Sub-Category</strong></a>
                        </div>
  
                        <form onsubmit="return false">
                          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add Product Sub-Category</button>
                        </form>
                      </div>
                    </div>
                  </nav>
                  <hr class="" />
                  <!-- Hoverable Table rows -->
                  <div class="card">
                    <h5 class="card-header">Product Sub-Category</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover" id="userInfo-dataTabel">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Sub-Category Name</th>
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
                    <div class="row g-3">
                        <div class="col mb-1">
                          <input type="hidden" id="ProductSubCategoryId" name="ProductSubCategoryId"/>
                          <label for="FullName" class="form-label">Sub-Category Name</label>
                          <input type="text" id="Name" name="Name" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                        
                        <div class="col mb-1">
                          <label for="Category" class="form-label">Category</label>
                          <select class="form-select" id="Category" name="Category" aria-label="Default select example">
                              <option selected="">Select Category</option>
                          </select>
                        </div>
                        
                        <div class="col mb-1">
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
              <button type="button" onclick="addUserType()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    
    @include('layout.footer_links')
    <div class="buy-now">
        <a href="#" onclick="showModal()" class="btn btn-success btn-buy-now">Add Product Sub-Category</a>
    </div>



    

    <script>

        var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
        url = "{{ url('ShowCategory') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {'ViewType': 'Categorie', "_token": csrf_tokens},
            datatype: 'JSON',
            success: function (data) {
                console.log(data);
                var category = $.parseJSON(data);
                if (category != '') {
                    var markup = "<option value=''>Select Category</option>";
                    for (var x = 0; x < category.length; x++) {
                        markup += "<option value=" + category[x].ProductCategoryId + ">" + category[x].Name + "</option>";
                    }
                    $("#Category").html(markup).show();
                } else {
                    var markup = "<option value=''>Select Categorie</option>";
                    $("#Category").html(markup).show();
                }


            }
            
        });
  

      function showModal(){
          $('.userInfoDataAdd form')[0].reset();
          $('#ProductSubCategoryId').val("");
          $('.userInfoDataAdd').modal('show');
      }


      var table1 = $('#userInfo-dataTabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.ProductSubCategory') !!}',
        columns: [
            {data: 'ProductSubCategoryId', name: 'ProductSubCategoryId'},
            {data: 'Name', name: 'Name'},
            {data: 'Status', name: 'Status'},
            {data: 'CreateDate', name: 'CreateDate'},
            {data: 'UpdateDate', name: 'UpdateDate'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      });

    function addUserType() {
        url = "{{ url('ProductSubCategory') }}";
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
            url: "{{ url('ProductSubCategory') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.userInfoDataAdd form')[0].reset();
                $('.userInfoDataAdd').modal('show');
                $('.modal-title').text(data[0].Name+' Information');
                $('#ProductSubCategoryId').val(data[0].ProductSubCategoryId);
                $('#Name').val(data[0].Name);
                $('#Category').val(data[0].Category_Id);
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
                        url: "{{ url('ProductSubCategory') }}" + '/' + id,
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
