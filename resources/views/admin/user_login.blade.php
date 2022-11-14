<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>Shop Manage | Login</title>



    @include('layout.header_links')
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body UserLogin">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{url('DashBord')}}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <img src="public/home/img/core-img/bondonalogo.png" height="60px" alt="">
                  </span>
                  </a>
              </div>
              <!-- /Logo -->
              <h5 class="mb-2">Welcome to <strong>"BONDONA"</strong> Admin! 👋</h5>

              <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input type="text" class="form-control" id="inemail" name="inemail" placeholder="Enter your email or username" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="idpassword" class="form-control" name="idpassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" id="myButton" type="button" onclick="checkLogin()">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->



    @include('layout.footer_links')

    <script>

        document.getElementById("user_password")
            .addEventListener("keyup", function(event) {
                event.preventDefault();
                if (event.keyCode === 13) {
                    document.getElementById("myButton").click();
                }
            });

    </script>
    <script>
    
        function checkLogin() {
            var UseId  = $("#inemail").val();
            var UseUser  = $("#idpassword").val();
    
            if (UseId!=''){
                if (UseUser!=''){
                    loginNow();
                } else{
                    swal({
                        text: "Enter Your Password Here !!",
                        icon: "error",
                        timer: '3000'
                    });
                }
            } else{
                swal({
                    text: "Enter Your User ID Here !!",
                    icon: "error",
                    timer: '3000'
                });
            }
    
        }
    
        function loginNow() {
            url = "{{ url('UserLoginRe') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($(".UserLogin form")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    var dataResult = JSON.parse(data);
                    if (dataResult.statusCode == 200) {
    
                        window.location.href = 'DashBord';
                        $('.UserLogin form')[0].reset();
                    } else if (dataResult.statusCode == 201) {
                        swal({
                            text: "Login Failed",
                            icon: "error",
                            timer: '1500'
                        });
                    }
                }, error: function (data) {
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
    </script>
  </body>
</html>
