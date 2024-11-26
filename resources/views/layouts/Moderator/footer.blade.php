 <!-- jQuery -->
 <script src="{{asset('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
 <!-- Bootstrap -->
 <script src="{{asset('public/backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{asset('public/backend/vendors/fastclick/lib/fastclick.js')}}"></script>
 <!-- NProgress -->
 <script src="{{asset('public/backend/vendors/nprogress/nprogress.js')}}"></script>
 <!-- Chart.js -->
 <script src="{{asset('public/backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
 <!-- gauge.js -->
 <script src="{{asset('public/backend/vendors/gauge.js/dist/gauge.min.js')}}"></script>
 <!-- bootstrap-progressbar -->
 <script src="{{asset('public/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
 <!-- iCheck -->
 <script src="{{asset('public/backend/vendors/iCheck/icheck.min.js')}}"></script>
 <!-- Skycons -->
 <script src="{{asset('public/backend/vendors/skycons/skycons.js')}}"></script>
 <!-- Flot -->
 <script src="{{asset('public/backend/vendors/Flot/jquery.flot.js')}}"></script>
 <script src="{{asset('public/backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
 <script src="{{asset('public/backend/vendors/Flot/jquery.flot.time.js')}}"></script>
 <script src="{{asset('public/backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
 <script src="{{asset('public/backend/vendors/Flot/jquery.flot.resize.js')}}"></script>
 <!-- Flot plugins -->
 <script src="{{asset('public/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
 <script src="{{asset('public/backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/flot.curvedlines/curvedLines.js')}}"></script>
 <!-- DateJS -->
 <script src="{{asset('public/backend/vendors/DateJS/build/date.js')}}"></script>
 <!-- JQVMap -->
 <script src="{{asset('public/backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
 <script src="{{asset('public/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
 <script src="{{asset('public/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
 <!-- bootstrap-daterangepicker -->
 <script src="{{asset('public/backend/vendors/moment/min/moment.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

 <!-- Datatables -->
 <script src="{{asset('public/backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
 <script src="{{asset('public/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

 
 <!-- Toaster & Sweetalert Style -->
 <script src="{{asset('public/backend/build/js/toastr.min.js')}}"></script>

 <!-- Custom Theme Scripts -->
 <script src="{{asset('public/backend/build/js/custom.min.js')}}"></script>



<script>
    function studentphoto(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#studentPhoto')
                  .attr('src', e.target.result)
                  .attr("class","img-thumbnail mb-2")
              };
              reader.readAsDataURL(input.files[0]);
          }
        }
        function studentphoto1(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#studentPhoto1')
                  .attr('src', e.target.result)
                  .attr("class","img-thumbnail mb-2")
              };
              reader.readAsDataURL(input.files[0]);
          }
        }
        </script>
     
 
   <script>
   @if(Session::has('message'))
     var type="{{Session::get('alert-type','info')}}"
     switch(type){
         case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;
         case 'success':
             toastr.success("{{ Session::get('message') }}");
             break;
         case 'warning':
             toastr.warning("{{ Session::get('message') }}");
             break;
         case 'error':
             toastr.error("{{ Session::get('message') }}");
             break;
     }
   @endif
 </script>
 
</body>
</html>
