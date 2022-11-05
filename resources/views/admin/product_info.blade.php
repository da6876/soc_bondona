<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Bondona | Product Info</title>


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
                          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> Product Info</strong></a>
                        </div>
  
                        <form onsubmit="return false">
                          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add New Product</button>
                        </form>
                      </div>
                    </div>
                  </nav>
                  <hr class="" />
                  <!-- Hoverable Table rows -->
                  <div class="card">
                    <h5 class="card-header">Product Info</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover" id="userInfo-dataTabel">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product Type</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Display Type</th>
                            <th>Description</th>
                            <th>Details</th>
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
                    <input type="hidden" name="ProductID" id="ProductID"/>

                    <div class="row g-2">
                        <div class="col mb-6">
                          <label for="ProductType" class="form-label">Product Type</label>
                          <select class="form-select" id="ProductType" name="ProductType" aria-label="Default select example">
                            <option selected="">Select Product Type</option>
                          </select>
                        </div>
                        <div class="col mb-6">
                          <label for="Color" class="form-label">Color</label>
                          <select class="form-select" id="Color" name="Color" aria-label="Default select example">
                            <option selected="">Select Product Color</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="row g-2">
                        <div class="col mb-6">
                          <label for="ProductSize" class="form-label">Product Size</label>
                          <select class="form-select" id="ProductSize" name="ProductSize" aria-label="Default select example">
                            <option selected="">Select Product Size</option>
                          </select>
                        </div>
                        <div class="col mb-6">
                          <label for="Category" class="form-label">Category</label>
                          <select class="form-select" id="Category" name="Category" aria-label="Default select example">
                            <option selected="">Select Product Category</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="row g-2">
                        <div class="col mb-6">
                          <label for="SubCategory" class="form-label">Product Sub-Category</label>
                          <select class="form-select" id="SubCategory" name="SubCategory" aria-label="Default select example">
                            <option selected="">Select Product Sub-Category</option>
                          </select>
                        </div>
                        <div class="col mb-6">
                          <label for="DisplayType" class="form-label">Display Type</label>
                          <select class="form-select" id="DisplayType" name="DisplayType" aria-label="Default select example">
                            <option selected="">Select Product Display Type</option>
                            <option value="Top">Top</option>
                            <option value="New">New</option>
                            <option value="Features">Features</option>
                          </select>
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="col mb-0">
                          <label for="FullName" class="form-label">Description</label>
                          <input type="text" id="Description" name="Description" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="col mb-0">
                          <label for="Details" class="form-label">Details</label>
                          <input type="text" id="Details" name="Details" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="col mb-0">
                          <label for="Material" class="form-label">Material</label>
                          <input type="text" id="Material" name="Material" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>

                    <div class="row g-1">
                        <div class="col mb-0">
                          <label for="Care" class="form-label">Care</label>
                          <input type="text" id="Care" name="Care" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>
                                        
                    <div class="row g-3">
                      <div class="col mb-1">
                        <label for="PriceMRP" class="form-label">Price MRP</label>
                        <input type="text" id="PriceMRP" name="PriceMRP" class="form-control" placeholder="xxxx@xxx.xx" />
                      </div>
                      <div class="col mb-1">
                        <label for="PriceDiscount" class="form-label">PriceDiscount</label>
                        <input type="text" id="PriceDiscount" name="PriceDiscount" class="form-control" placeholder="xxxx@xxx.xx" />
                      </div>
                      <div class="col mb-1">
                        <label for="Status" class="form-label">Status</label>
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
              <button type="button" onclick="addProduct()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    
    @include('layout.footer_links')
    <div class="buy-now">
        <a href="#" onclick="showModal()" class="btn btn-success btn-buy-now">Add New Product</a>
    </div>


    <script>

    ShowCategory();
    ShowColor();
    ShowType();

    function showModal(){
        $('.userInfoDataAdd form')[0].reset();
        $('#UserID').val("");
        $('.userInfoDataAdd').modal('show');
    }

    var table1 = $('#userInfo-dataTabel').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('all.ProductInfo') !!}',
      columns: [
          {data: 'ProductID', name: 'ProductID'},
          {data: 'ProductType', name: 'ProductType'},
          {data: 'Color', name: 'Color'},
          {data: 'Size', name: 'Size'},
          {data: 'Category', name: 'Category'},
          {data: 'SubCategory', name: 'SubCategory'},
          {data: 'DisplayType', name: 'DisplayType'},
          {data: 'Description', name: 'Description'},
          {data: 'Details', name: 'Details'},
          {data: 'Status', name: 'Status'},
          {data: 'CreateDate', name: 'CreateDate'},
          {data: 'UpdateDate', name: 'UpdateDate'},
          {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });

    function addProduct() {
        url = "{{ url('ProductInfo') }}";
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

    function showProduct(id) {
        $.ajax({
            url: "{{ url('ProductInfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('.userInfoDataAdd form')[0].reset();
                $('.userInfoDataAdd').modal('show');
                $('.modal-title').text(data[0].FullName+' Information');
                $('#ProductID').val(data[0].ProductID);
                ShowSize(data[0].ProductType)
                $('#ProductType').val(data[0].ProductType);
                $('#Color').val(data[0].Color);
                $('#Size').val(data[0].Size);
                $('#Category').val(data[0].Category);
                ShowSubCategory(data[0].Category)
                $('#SubCategory').val(data[0].SubCategory);
                $('#DisplayType').val(data[0].DisplayType);
                $('#Description').val(data[0].Description);
                $('#Details').val(data[0].Details);
                $('#Material').val(data[0].Material);
                $('#Care').val(data[0].Care);
                $('#PriceMRP').val(data[0].PriceMRP);
                $('#PriceDiscount').val(data[0].PriceDiscount);
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

    function  deleteProduct(id) {
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
                        url: "{{ url('ProductInfo') }}" + '/' + id,
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

    function ShowCategory(){
      var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
        url = "{{ url('ShowSubList') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {'ViewType': 'Categorie', "_token": csrf_tokens},
            datatype: 'JSON',
            success: function (data) {
                console.log("Category Get Successfully");
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
    }

    $("#Category").change(function () {
      var CatID = this.value;
        ShowSubCategory(CatID)
    });

    function ShowSubCategory(CatID){
      var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
      url = "{{ url('ShowSubList') }}";
      $.ajax({
          url: url,
          type: 'POST',
          data: {'ViewType': 'SubCategorie', 'CatId': CatID,"_token": csrf_tokens},
          datatype: 'JSON',
          success: function (data) {
              console.log("Sub Categorie Get Successfully");
              var category = $.parseJSON(data);
              if (category != '') {
                  var markup = "<option value=''>Select Sub Category</option>";
                  for (var x = 0; x < category.length; x++) {
                      markup += "<option value=" + category[x].ProductSubCategoryId + ">" + category[x].Name + "</option>";
                  }
                  $("#SubCategory").html(markup).show();
              } else {
                  var markup = "<option value=''>Select Sub Categorie</option>";
                  $("#SubCategory").html(markup).show();
              }


          }
          
      });
    }

    function ShowColor(){
      var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
      url = "{{ url('ShowSubList') }}";
      $.ajax({
          url: url,
          type: 'POST',
          data: {'ViewType': 'Color', "_token": csrf_tokens},
          datatype: 'JSON',
          success: function (data) {
              console.log("Color Get Successfully");
              var category = $.parseJSON(data);
              if (category != '') {
                  var markup = "<option value=''>Select Color</option>";
                  for (var x = 0; x < category.length; x++) {
                      markup += "<option value=" + category[x].ProductColorId + ">" + category[x].Name + "</option>";
                  }
                  $("#Color").html(markup).show();
              } else {
                  var markup = "<option value=''>Select Color</option>";
                  $("#Color").html(markup).show();
              }


          }
          
      });
    }

    function ShowType(){
      var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
      url = "{{ url('ShowSubList') }}";
      $.ajax({
          url: url,
          type: 'POST',
          data: {'ViewType': 'Type', "_token": csrf_tokens},
          datatype: 'JSON',
          success: function (data) {
              console.log("Product Type Get Successfully");
              var category = $.parseJSON(data);
              if (category != '') {
                  var markup = "<option value=''>Select Product Type</option>";
                  for (var x = 0; x < category.length; x++) {
                      markup += "<option value=" + category[x].ProductTypeId + ">" + category[x].Name + "</option>";
                  }
                  $("#ProductType").html(markup).show();
              } else {
                  var markup = "<option value=''>Select Product Type</option>";
                  $("#ProductType").html(markup).show();
              }


          }
          
      });
    }
    
    $("#ProductType").change(function () {
      var ProductID = this.value;
      ShowSize(ProductID)
    });

    function ShowSize(ProductID){
      var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
      url = "{{ url('ShowSubList') }}";
      $.ajax({
          url: url,
          type: 'POST',
          data: {'ViewType': 'Size', 'ProductID': ProductID,"_token": csrf_tokens},
          datatype: 'JSON',
          success: function (data) {
              console.log("Size Get Successfully");
              var category = $.parseJSON(data);
              if (category != '') {
                  var markup = "<option value=''>Select Size</option>";
                  for (var x = 0; x < category.length; x++) {
                      markup += "<option value=" + category[x].ProductSizeId + ">" + category[x].Name + "</option>";
                  }
                  $("#ProductSize").html(markup).show();
              } else {
                  var markup = "<option value=''>Select Size</option>";
                  $("#ProductSize").html(markup).show();
              }


          }
          
      });
    }
    </script>
  </body>
</html>
