<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>SM.| Change Password</title>

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
                          <a class="nav-item nav-link active" href="javascript:void(0)">Profile / <strong> Change Password</strong></a>
                        </div>
  
                        <form onsubmit="return false">
                          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add User Map</button>
                        </form>
                      </div>
                    </div>
                  </nav>
                  <hr class="" />
                  <!-- Hoverable Table rows -->
                  <div class="card chnagepassword">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="#" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">@</span>
                                <input
                                type="text"
                                class="form-control"
                                placeholder="Username"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                readonly
                                value="{{Session::get('user_name')}}"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="row g-2">
                                <div class="form-password-toggle col mb-0">
                                    <label class="form-label" for="basic-default-password12">Current Password</label>
                                    <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="inoldpassword"
                                        name="inoldpassword"
                                        id="basic-default-password12"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2"
                                    />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"
                                        ><i class="bx bx-hide"></i
                                    ></span>
                                    </div>
                                </div>
                                <div class="form-password-toggle col mb-0">
                                    <label class="form-label" for="basic-default-password12">New Password</label>
                                    <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="innewpassword"
                                        name="innewpassword"
                                        id="basic-default-password12"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2"
                                    />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"
                                        ><i class="bx bx-hide"></i
                                    ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </br>
                    
                    <div class="row">
                        <div class="col-sm-10">
                            <button type="button" onclick="chnagePassword()" class="btn btn-primary">Change Now</button>
                        </div>
                    </div>
                    
                    </form>
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
    
    
    @include('layout.footer_links')




    

    <script>

function chnagePassword() {
        url = "{{ url('ChangePasswordRe') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".chnagepassword form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {
                    swal("Success", dataResult.statusMsg).then((value) => {
                        window.location.href = 'UserLogin';
                    });;
                } else {
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

    </script>
  </body>
</html>
