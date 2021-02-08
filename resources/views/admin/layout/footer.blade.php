<footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="#">KIOSK</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>CBTECH</b>
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>

<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- <script src="{{asset('dist/js/adminlte.js')}}"></script> -->
<!-- select 2  -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function() {
    // Summernote
    $('.customEditor').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });
  })
</script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })



    var selectVal = $("#role_id option:selected").text();
    if (selectVal == 'local') {
      $('#locuserfield').show();
    } else {
      $('#locuserfield').hide();
    }
    $('#role_id').on('change', function() {
      var selectVal = $("#role_id option:selected").text();
      if (selectVal == 'local') {
        $('#locuserfield').show();
      } else {
        $('#locuserfield').hide();
      }
    });



  });

  var base_url = getBaseURL();

  function getBaseURL() {
    var getURL = window.location;

    var _return = getURL.protocol + '//' + getURL.hostname + (location.port.length ? ':' + location.port : '');
    var tmp_pathname = getURL.pathname.split('/');

    if (getURL.pathname.search(/kiosk/i) > -1) {
      _return += '/' + tmp_pathname[1] + '/public';
    }
    return _return;
  }
  $(".btntrash").click(function() {
    // console.log('hjbh');
    var id = $(this).attr("id");
    // console.log(id);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this  file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = base_url + '/admin/slide/image/remove/' + id;
        } else {
          swal("Your file is safe!", {
            icon: "success",
          });
        }
      });
  });
</script>

<script src="{{asset('js/custom.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function() {
    setTimeout(function() {
      $("#flashMessage").slideUp(1000);
    }, 3000);
  });
</script>