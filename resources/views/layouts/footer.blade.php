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