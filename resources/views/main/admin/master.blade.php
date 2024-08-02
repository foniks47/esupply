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
                @if (session()->has('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible" style="width:80%; margin:auto;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('success') }}
                    </div>
                    <br>
                @endif
                <div class="card-body">
                    <button title="Add Item" type="button" class="btn btn-info btn-sm btn-cart" id="buttonAddItemModal"><i class="fas fa-cart-shopping"></i>&nbsp;Add Item</button>
                    {{-- <button title="Add to Cart" type="button" class="btn btn-info btn-sm btn-cart" id="aaaaaa"
                        data-url="{{ route('items.showdirectcart', auth()->user()->id_user_me) }}"><i
                            class="fas fa-cart-shopping"></i>&nbsp;View
                        cart</button> --}}
                    <table id="tb_default" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 150px">Picture</th>
                                <th>Code</th>
                                <th>Items</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                <th>Stock Reminder</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $items)
                                <tr @if ($items->item_stock < $items->item_stock_reminder) style="background-color: #ffb8c2" @endif>
                                    <td><a href="#" class="btn-showpicture" data-url="{{ asset('storage/item') }}/{{ $items->picture }}"><img src="{{ asset('storage/item') }}/{{ $items->picture }}" alt="" style="width: 130px;"></a></td>
                                    <td>{{ $items->item_code }}</td>
                                    <td>{{ $items->item_name }}</td>
                                    <td>{{ $items->item_unit }}</td>
                                    <td>{{ $items->item_stock }}</td>
                                    <td>{{ $items->item_stock_reminder }}</td>
                                    <td>{{ $items->price }}</td>
                                    <td>
                                        <button title="Edit Item" type="button" class="btn btn-info btn-sm btn-addcart" data-url="{{ route('admin.itemshow', $items->id) }}">
                                            <i class="fas fa-pencil"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Picture</th>
                                <th>Code</th>
                                <th>Items</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                <th>Stock Reminder</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @include('main.admin._edititem')
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
                <div class="modal fade" id="addItemModal" role="dialog" aria-labelledby="directAddCart" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.additem') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="directAddCartLabel">Add item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body overlay-wrapper">

                                    {{-- <div class="overlay">
                                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    </div> --}}

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



                                                /* .tablecart tr th {
                                                                                                                                                                                                                        border-bottom: 1px solid black;
                                                                                                                                                                                                                    } */
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
                                                            <option value="Box" id="Box">Box</option>
                                                            <option value="Tube" id="Tube">Tube</option>
                                                        </select>
                                                    </td>
                                                    <td>Category</td>
                                                    <td>:</td>
                                                    <td><select name="classification" id="classification">
                                                        <option value="" id="">-Pilih-</option>
                                                        <option value="Battery" id="Battery">Battery</option>
                                                        <option value="Clip" id="Clip">Clip</option>
                                                        <option value="Cutting" id="Cutting">Cutting</option>
                                                        <option value="Document File" id="Document File">Document File</option>
                                                        <option value="Drinking Water" id="Drinking Water">Drinking Water</option>
                                                        <option value="Envelope" id="Envelope">Envelope</option>
                                                        <option value="Office Supply" id="Office Supply">Office Supply</option>
                                                        <option value="Paper" id="Paper">Paper</option>
                                                        <option value="Pin" id="Pin">Pin</option>
                                                        <option value="Post it" id="Post it">Post it</option>
                                                        <option value="Stapler" id="Stapler">Stapler</option>
                                                        <option value="Sticker" id="Sticker">Sticker</option>
                                                        <option value="Tape" id="Tape">Tape</option>
                                                        <option value="Toner" id="Toner">Toner</option>
                                                        <option value="Water" id="Water">Water</option>
                                                    </select></td>
                                                </tr>
                                                <tr>
                                                    <td>Picture</td>
                                                    <td>:</td>
                                                    <td><input type="file" name="picture" id="picture" accept="image/png, image/gif, image/jpeg"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                //"order": [
                 //   [1, 'asc']
                //],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(document).on('click', '.btn-showpicture', function(e) {
            e.preventDefault();
            $(".overlay").removeClass('d-none');
            $('#picModal').modal('show');
            document.getElementById("showpic").src = $(this).data('url');
            // alert($(this).data('url'));

        });
    </script>
@endsection
