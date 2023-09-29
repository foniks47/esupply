<!-- REQUIRED SCRIPTS -->
@php
    $url_jquery = asset('AdminLTE/plugins/jquery/jquery.min.js');
    $url_jquery_ui = asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js');
    $url_adminlte = asset('AdminLTE/dist/js/adminlte.min.js');
    $url_chart = asset('AdminLTE/plugins/chart.js/Chart.min.js');
    $url_jquery_vmap_min = asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js');
    $url_jquery_vmap_usa = asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js');
    $url_moment = asset('/AdminLTE/plugins/moment/moment.min.js');
    $url_daterangepicker = asset('AdminLTE/plugins/daterangepicker/daterangepicker.js');
    $url_summernote = asset('AdminLTE/plugins/summernote/summernote-bs4.min.js');
    $url_tempus_dominus = asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
    $url_bs_custom_file_input = asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js');
    $url_select2_full = asset('AdminLTE/plugins/select2/js/select2.full.min.js');
    $url_bootstrap_bundle_min = asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');
    $url_popper = asset('AdminLTE/plugins/popper/popper.min.js');
    $url_datatable = asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js');
    $url_datatable2 = asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
    $url_datatable3 = asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js');
    $url_datatable4 = asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
    $url_datatable5 = asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js');
    $url_datatable6 = asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');
    //$url_jquery_321_slim_min = asset('/js/jquery-3.2.1.slim.min.js');
    //$url_highchart = asset('/js/highcharts.js');
    //$url_datatable = asset('js/jquery.dataTables.min.js');
    //$url_jquery_351 = asset('js/jquery-3.5.1.js');
@endphp
{{-- <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}

<!-- jQuery -->
<script src={{ $url_jquery }}></script>
<!-- jQuery 3.2.1 slim -->
{{-- <script src={{ $url_jquery_321_slim_min }}></script> --}}
{{-- jQuery 3.5.1 --}}
{{-- <script src={{ $url_jquery_351 }}></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src={{ $url_jquery_ui }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- AdminLTE App -->
<script src={{ $url_adminlte }}></script>
<!-- ChartJS -->
{{-- <script src={{ $url_chart }}></script> --}}
<!-- JQVMap -->
{{-- <script src={{ $url_jquery_vmap_min }}></script>
<script src={{ $url_jquery_vmap_usa }}></script> --}}
<!-- daterangepicker -->
<script src={{ $url_moment }}></script>
<script src={{ $url_daterangepicker }}></script>
<!-- Summernote -->
{{-- <script src={{ $url_summernote }}></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ $url_tempus_dominus }}></script>
<!-- bs-custom-file-input -->
<script src={{ $url_bs_custom_file_input }}></script>
<!-- Select2 -->
<script src={{ $url_select2_full }}></script>
<!-- Bootstrap 4 -->
<script src={{ $url_bootstrap_bundle_min }}></script>
<script src={{ $url_datatable }}></script>
<script src={{ $url_datatable2 }}></script>
<script src="https://kit.fontawesome.com/8cef1ae6b7.js" crossorigin="anonymous"></script>
{{-- <script src={{ $url_datatable3 }}></script> --}}
{{-- <script src={{ $url_datatable4 }}></script> --}}
{{-- <script src={{ $url_datatable5 }}></script> --}}
{{-- <script src={{ $url_datatable6 }}></script> --}}
<!-- popper -->
{{-- <script src={{ $url_popper }}></script> --}}
<!-- Highchart JS -->
{{-- <script src={{ $url_highchart }}></script> --}}
{{-- jQuery datatable --}}
{{-- <script src={{ $url_datatable }}></script> --}}
