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

                {{-- @include('partials.content-script') --}}
                {{-- <div class="card-header">
                    <h3 class="card-title">Search Patient</h3>
                </div> --}}
                {{-- <div class="card-body">
                    
                </div> --}}
                <!-- /.card-header -->
                {{-- {{ $listemployee }} --}}
                <div class="card-header">
                    {{-- <h3 class="card-title">{{ $setting->name }}</h3> --}}
                </div>
                @if (session()->has('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible" style="width:80%; margin:auto;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('success') }}
                    </div>
                    <br>
                @endif
                @if (session()->has('registered'))
                    <br>
                    <div class="alert alert-warning alert-dismissible" style="width:80%; margin:auto;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('registered') }}
                    </div>
                    <br>
                @endif
                @if (session()->has('searcherror'))
                    <br>
                    <div class="alert alert-danger alert-dismissible" style="width:80%; margin:auto;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('searcherror') }}
                    </div>
                    <br>
                @endif
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    {{-- <label>Employee ID</label> --}}
                                    <input type="text" class="form-control" placeholder="Employee ID" name="idemp">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- {{ $employee }} --}}
                    @if (isset($employee))
                        <br>
                        <br>
                        <form action="{{ route('admin.storeuser') }}" method="post">
                            @csrf
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <input type="text" name="getidemp" class="form-control" placeholder="ID Employee"
                                        autofocus required value="{{ $employee->id_emp }}" readonly>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="getname" class="form-control" placeholder="ID Employee"
                                        required value="{{ $employee->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="getorgunit" class="form-control" placeholder="ID Employee"
                                        required value="{{ $employee->orgunit }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" name="getiduserme" value="{{ $employee->id_user }}">
                                    <input type="hidden" name="getidapprover" value="{{ $employee->appr1 }}">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>



                        </form>
                    @endif
                </div>
                {{-- @include('main.admin._edititem')
                <div class="modal fade" id="addItemModal" role="dialog" aria-labelledby="directAddCart" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.additem') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="directAddCartLabel">Add item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body overlay-wrapper">

                              
                                    <ul id="save_errorList" class="alert alert-warning d-none"></ul>


                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-10" style="align-content: center">
                                            <input type="hidden" name="item_id" id="item_id">
                                            <style>
                                                .tablecart {
                                                    width: 100%;
                                                    margin: 0 auto;
                                                    left: 0;
                                                    right: 0;
                                                    display: inline-block;
                                                }

                                                .tablecart tr td {
                                                    border: 0px dashed black;
                                                    padding: 15px;
                                                }



                                            </style>
                                            <table class="tablecart">
                                                <tr>
                                                    <td>Item Code</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="item_code" id="item_code" required></td>
                                                    <td>Stock</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="add_stock" id="add_stock" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Item</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="item_name" id="item_name" required></td>
                                                    <td>Price</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="price" id="price" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Unit</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="item_unit" id="item_unit">
                                                            <option value="Pcs" id="Pcs">Pcs</option>
                                                            <option value="Rim" id="Rim">Rim</option>
                                                            <option value="Ktk" id="Ktk">Ktk</option>
                                                            <option value="Duz" id="Duz">Duz</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}




                <!-- /.card-body -->

            </div>
            <!-- /.card -->


        </div>

    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '.btn-delete', function(e) {
            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        alert('Delete Failed');
                    } else {
                        document.getElementById("row" + response.uid).style.display = "none";
                    }
                }
            });
        });
        $(document).on('click', '#buttonAddItemModal', function(e) {
            $('#addItemModal').modal('show');
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
