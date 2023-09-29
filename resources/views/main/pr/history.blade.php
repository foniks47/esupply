@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
                        <li class="breadcrumb-item">Purchase Request</li>
                        <li class="breadcrumb-item active"><a href="#" class="text-success">{{ $title }}</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                @include('partials.content-script')
                {{-- <div class="card-header">
                    <h3 class="card-title">Search Patient</h3>
                </div> --}}
                {{-- <div class="card-body">
                    
                </div> --}}
                <!-- /.card-header -->
                {{-- {{ $listemployee }} --}}
                {{-- @if (session()->has('cancel'))
                    <div class="alert alert-warning alert-dismissible" style="width:80%; margin:auto;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('cancel') }}
                    </div>
                    <br>
                @endif --}}
                <div class="card-body">


                    <table id="tb_default" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Purchase Type</th>
                                <th>No Transaction</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->purchase_type }}</td>
                                    <td>
                                        <a href="#" class="btn-detail"
                                            data-url="{{ route('transaction.detail', $transaction->id) }}"
                                            uid="row{{ $transaction->id }}"> {{ $transaction->transactionnumber }}</a>

                                    </td>
                                    <td>{{ $transaction->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kode</th>
                                <th>Items</th>
                                <th>Unit</th>
                                <th>Stock</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>




                <!-- /.card-body -->

            </div>
            <!-- /.card -->

            @include('main.pr._detail')

        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            $("#tb_default").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [1, 'asc']
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
@endsection
