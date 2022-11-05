
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('public/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('public/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('public/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('public/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('public/assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script async defer src="https://buttons.github.io/buttons.js')}}"></script> --}}
<script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('public/js/sweetalert.min.js')}}"></script>
<script>
  $(document).ready(function() {
      // data-tables
      $('#example1').DataTable();
      // counter-up
      $('.counter').counterUp({
          delay: 10,
          time: 600
      });
  } );
</script>
