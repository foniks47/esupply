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

                <div class="card-body">


                    <table id="tb_default" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 150px">Picture</th>
                                <th>Kode</th>
                                <th>Items</th>
                                <th>Unit</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $items)
                                <tr>
                                    <td><a href="#" class="btn-showpicture" data-url="{{ asset('storage/item') }}/{{ $items->picture }}"><img src="{{ asset('storage/item') }}/{{ $items->picture }}" alt="" style="width: 130px;"></a></td>
                                    <td>{{ $items->item_code }}</td>
                                    <td>{{ $items->item_name }}</td>
                                    <td>{{ $items->item_unit }}</td>
                                    <td>{{ $items->item_stock }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 150px">Picture</th>
                                <th>Kode</th>
                                <th>Items</th>
                                <th>Unit</th>
                                <th>Stock</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal fade" id="picModal" role="dialog" aria-labelledby="picModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="directAddCartLabel">Add item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <img src="" alt="" id="showpic">
                        </div>
                    </div>
                </div>
                {{-- {{ $cart }} --}}



                <!-- /.card-body -->

            </div>
            <!-- /.card -->


        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.btn-showpicture', function(e) {
            e.preventDefault();
            $(".overlay").removeClass('d-none');
            $('#picModal').modal('show');
            document.getElementById("showpic").src = $(this).data('url');
            // alert($(this).data('url'));

        });
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
        });
    </script>
@endsection
