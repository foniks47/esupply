<div class="modal fade" id="proposeaddCartModal" role="dialog" aria-labelledby="proposeAddCart" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <form action="{{ route('purchase.proposeadd') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="proposeAddCartLabel">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overlay-wrapper">

                    <div class="overlay">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>

                    <ul id="save_errorList" class="alert alert-warning d-none"></ul>


                    <div class="form-row mb-4">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@push('child-scripts')
    <script>
        //accident form
        $(document).on('click', '.btn-addcart', function(e) {
            e.preventDefault();
            $(".overlay").removeClass('d-none');
            $('#proposeaddCartModal').modal('show');
            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                dataType: "json",
                success: function(response) {
                    if (response.status == 404) {
                        //toastr.error(response.message);
                        alert(response.message);
                        $('#proposeaddCartModal').modal('hide');
                    } else {
                        // console.log(response);
                        // document.getElementById("qty").setAttribute("max", response.items[0]
                        //     .item_stock);
                        document.getElementById("items_id").value = response.items[0].id;
                        document.getElementById("item_name").innerHTML = response.items[0].item_name;
                        var myloginid = document.getElementById("myloginid").innerHTML;
                        // document.getElementById("item_stock").innerHTML = response.items[0].item_stock;
                        $.ajax({
                            type: "GET",
                            url: "http://localhost/esupply/public/cart/propose/" + response
                                .items[0].id + "/" + myloginid,
                            dataType: "json",
                            success: function(resp) {
                                // alert(resp.status);
                                document.getElementById("qty").value = resp.qty;
                                // if (resp.status == 404) {
                                //     document.getElementById("qty").value = resp.qty;
                                // } else {
                                //     document.getElementById("qty").value = resp.qty;
                                // }
                            }
                        });
                        $(".overlay").addClass('d-none');
                    }
                }
            })
        });
    </script>
@endpush
