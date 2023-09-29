@php
    $adminlte_min = asset('AdminLTE/dist/css/adminlte.min.css');
    $font_awesome = asset('AdminLTE/plugins/fontawesome-free/css/all.min.css');
    $daterangepicker_css = asset('AdminLTE/plugins/daterangepicker/daterangepicker.css');
    $tempusdominus_bootstrap = asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');
    $select2 = asset('AdminLTE/plugins/select2/css/select2.min.css');
    $select2_bootstrap = asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');
    $bootstrap_duallistbox = asset('AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css');
    $source_sans_pro = 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback';
    
    // $jquery_datatable = asset('/css/jquery.dataTables.min.css');
    // $datatable_bootstrap = asset('/css/dataTables.bootstrap5.min.css');
    
@endphp

<!-- Google Font: Source Sans Pro -->
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
<link rel="stylesheet" href={{ $source_sans_pro }}>
<!-- Font Awesome -->
<link rel="stylesheet" href={{ $font_awesome }}>
<!-- Theme style -->
<link rel="stylesheet" href={{ $adminlte_min }}>
<!-- daterange picker -->
<link rel="stylesheet" href={{ $daterangepicker_css }}>
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href={{ $tempusdominus_bootstrap }}>
<!-- Select2 -->
<link rel="stylesheet" href={{ $select2 }}>
<link rel="stylesheet" href={{ $select2_bootstrap }}>
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href={{ $bootstrap_duallistbox }}>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
{{-- Datatable --}}
{{-- <link rel="stylesheet" href={{ $jquery_datatable }}> --}}
{{-- Datatable Bootstrap --}}
{{-- <link rel="stylesheet" href={{ $datatable_bootstrap }}> --}}

{{-- Custom Style --}}
{{-- <style>
    .container, .container-lg, .container-md, .container-sm, .container-xl {
        max-width: 1240px;
    }

    .form-check-label {
        margin-right: 32px;
    }
</style> --}}
