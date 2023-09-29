<div class="modal fade" id="CartModal" role="dialog" aria-labelledby="directCart" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="directCartLabel">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overlay-wrapper">

                    <div class="overlay">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>

                    <ul id="save_errorList" class="alert alert-warning d-none"></ul>
                    <style>
                        .tablecart tr td {
                            border: 1px solid black;
                        }
                    </style>
                    <table id="tablecart" class="tablecart">


                    </table>
                    {{-- <div class="form-row mb-4">
                        <div class="form-group col-md-10">
                            <div class="row">
                                <div class="col-sm">
                                    <span id="item_name"></span>
                                </div>
                                <div class="col-sm">
                                    <span id="item_stock"></span>
                                </div>

                                <div class="col-sm">
                                    <input type="hidden" name="items_id" id="items_id">
                                    <input type="number" name="qty" id="qty" size="5" min="1">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</div>
@push('child-scripts')
    <script>
        //accident form
        $(document).on('click', '.btn-cart', function(e) {
            e.preventDefault();
            $(".overlay").removeClass('d-none');
            $('#CartModal').modal('show');
            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        //toastr.error(response.message);
                        alert(response.message);
                        $('#CartModal').modal('hide');
                    } else {
                        // console.log(response.cart.detail);
                        var arrrrr = response.cart.detail;
                        var arraylength = arrrrr.length;
                        // console.log(arraylength);
                        var table = document.getElementById("tablecart");
                        var rowtitle = table.insertRow(0);
                        var thcell1 = rowtitle.insertCell(0);
                        var thcell2 = rowtitle.insertCell(1);
                        var thcell3 = rowtitle.insertCell(2);
                        thcell1.innerHTML = "Item Code";
                        thcell2.innerHTML = "Item Name";
                        thcell3.innerHTML = "Qty";
                        for (var i = 0; i < arraylength; i++) {
                            var row = table.insertRow(0);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);

                            cell1.innerHTML = response.cart.detail[i].items[0].item_code;
                            cell2.innerHTML = response.cart.detail[i].items[0].item_name;
                            cell3.innerHTML = response.cart.detail[i].qty;
                            // console.log(response.cart.detail[i].items[0].item_name);
                            //Do something
                        }

                        $(".overlay").addClass('d-none');
                    }
                }
            })
        });
    </script>
@endpush
