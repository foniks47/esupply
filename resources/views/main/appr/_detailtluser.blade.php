<div class="modal fade" id="detailModal" role="dialog" aria-labelledby="detailTransaction" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            {{-- <form action="" method="POST"> --}}
            {{-- @csrf --}}
            <div class="modal-header">
                <h5 class="modal-title" id="detailTransactionLabel"><span id="purchase_type"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body overlay-wrapper">

                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <img src="{{ asset('pic/') . '/logokp.png' }}" alt="Krakatau Posco"
                                            class="brand-image" style="height: 20px;">
                                        <small class="float-right">Date: <span id="datetransaction"></span> </small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Requester
                                    <address>
                                        <strong><span id="transactionname"></span></strong><br>
                                        <span id="transactionorgunit"></span>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Approver
                                    <address>
                                        <strong><span id="tl_approver_name">-</span></strong><br>
                                        <strong><span id="pic_approver_name">-</span></strong><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Transaction #<span id="transactionnumber"></span></b><br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" id="detailTable">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Product</th>
                                                <th>Unit</th>
                                                <th style="text-align: center">Qty</th>
                                                <th style="text-align: center">TL Adjustment</th>
                                                {{-- <th style="text-align: center">GAM PIC Adjustment</th> --}}
                                                <th style="text-align: center">GAM Adjustment</th>
                                                {{-- <th style="text-align: center">Apply Adjustment</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Request Purpose:</p>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        <span id="purpose"></span>
                                    </p>
                                    <p class="lead">Request Reason:</p>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        <span id="reason"></span>
                                    </p>
                                    <p class="lead">Note:</p>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        <span id="tlnote"></span>
                                    </p>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="modal-footer">

                    <form name="approve" method="POST" id="approve">
                        @csrf
                        <input type="hidden" name="transactionidappr" id="transactionidappr">
                        <input type="hidden" name="process" id="process" value="Approved">
                        <input type="hidden" name="hiddennote" id="hiddennoteapprove">
                        <input type="hidden" name="hiddenarray" id="hiddenarrayapprove">
                        <input type="hidden" name="hiddenvalue" id="hiddenvalueapprove">
                        <button type="button" class="btn btn-info btn-sm" id="b-approve">Approve</button>
                    </form>
                    <form name="reject" method="POST" id="reject">
                        @csrf
                        <input type="hidden" name="transactionidrej" id="transactionidrej">
                        <input type="hidden" name="process" id="process" value="Rejected">
                        <input type="hidden" name="hiddennote" id="hiddennotereject">
                        <button type="button" class="btn btn-danger btn-sm" id="b-reject">Reject</button>
                        {{-- <input type="submit" class="btn btn-danger btn-sm" value="Reject" id="b-reject"> --}}
                    </form>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    @push('child-scripts')
        <script>
            $(document).on('click', '#b-approve', function(e) {
                var getvaluefromtext = document.getElementById("inputnote").value;
                document.getElementById("hiddennoteapprove").value = getvaluefromtext;
                var notevalue = document.getElementById("hiddennoteapprove").value;
                var idget = document.getElementById("hiddenarrayapprove").value;
                var arrayiddetailget = idget.split(',');
                var arrayidgetlength = arrayiddetailget.length;
                const arrayvalue = [];
                for (var i = 0; i < arrayidgetlength; i++) {
                    arrayvalue[i] = arrayiddetailget[i].replace("col", "") + "|" + document.getElementById(
                        arrayiddetailget[i]).value;
                }
                document.getElementById("hiddenvalueapprove").value = arrayvalue;
                document.getElementById("approve").submit();
            });
            $(document).on('click', '#b-reject', function(e) {
                var getvaluefromtext = document.getElementById("inputnote").value;
                document.getElementById("hiddennotereject").value = getvaluefromtext;
                var notevalue = document.getElementById("hiddennotereject").value;
                document.getElementById("reject").submit();
            });
            $(document).on('click', '.btn-update', function(e) {
                e.preventDefault();
                var idcol = "col" + $(this).data('iddetail');
                var getvalue = document.getElementById(idcol).value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const formData = new FormData();
                formData.append(idcol, getvalue);
                var setdata = {
                    'id': idcol,
                    'val': getvalue
                };
                $.ajax({
                    type: "POST",
                    url: $(this).data('url'),
                    // dataType: "json",
                    data: setdata,
                    success: function(response) {
                        if (response.status == 404) {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                })

            })
            $(document).on('click', '.btn-detail', function(e) {
                e.preventDefault();
                $(".overlay").removeClass('d-none');
                $('#detailModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: $(this).data('url'),
                    dataType: "json",
                    success: function(response) {
                        // console.log(reponse.status);
                        if (response.status == 404) {
                            alert('Delete Failed');
                        } else {
                            // alert(response.transaction.id);
                            $("#detailTable tbody tr").remove();
                            // $("#detailTable:not(:first)").remove();
                            var tableheader = document.getElementById("detailTable")
                                .getElementsByTagName(
                                    'thead')[0];


                            var datetransaction = document.getElementById("datetransaction");

                            document.getElementById("transactionidappr").value = response.transaction
                                .id;
                            document.getElementById("transactionidrej").value = response.transaction.id;
                            document.getElementById("transactionnumber").innerHTML = response
                                .transaction
                                .transactionnumber;
                            document.getElementById("transactionname").innerHTML = response.transaction
                                .name;
                            document.getElementById("transactionorgunit").innerHTML = response
                                .transaction
                                .orgunit;
                            document.getElementById("purchase_type").innerHTML = response.transaction
                                .purchase_type;

                            document.getElementById("tl_approver_name").innerHTML = response.transaction
                                .tl_approver_name + ' (' + response.transaction
                                .tl_approval + ')';
                            document.getElementById("pic_approver_name").innerHTML = response
                                .transaction
                                .pic_approver_name + ' (' + response.transaction
                                .pic_approval + ')';
                            document.getElementById("purpose").innerHTML = response.transaction
                                .purpose;
                            document.getElementById("reason").innerHTML = response.transaction
                                .reason;

                            var inputnote = document.createElement("INPUT");
                            // inputnote = document.createElement("INPUT");
                            inputnote.setAttribute("type", "text");
                            inputnote.setAttribute("name", "inputnote");
                            inputnote.setAttribute("style", "width: 250px;");
                            inputnote.setAttribute("required", "required");
                            inputnote.setAttribute("id", "inputnote");
                            inputnote.setAttribute("value", response.transaction.tl_note);
                            // document.getElementById("inputnote").remove();
                            document.getElementById("tlnote").appendChild(inputnote);
                            var element = document.getElementById("inputnote");
                            element.parentNode.removeChild(element);
                            document.getElementById("tlnote").appendChild(inputnote);

                            datetransaction.innerHTML = response.formatted_date;

                            var arraydetail = response.transaction.detail;
                            var arraylength = arraydetail.length;
                            var table = document.getElementById("detailTable").getElementsByTagName(
                                'tbody')[0];
                            if (response.transaction.tl_approval == "Pending") {
                                document.getElementById("b-approve").disabled = false;
                                document.getElementById("b-reject").disabled = false;
                            } else {
                                document.getElementById("b-approve").disabled = true;
                                document.getElementById("b-reject").disabled = true;
                            }

                            const arrayiddetail = [];
                            for (var i = 0; i < arraylength; i++) {

                                var form = document.createElement("FORM");
                                form.setAttribute("name", "form" + i);
                                form.setAttribute("id", "form" + i);
                                var row = table.insertRow(0);

                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                var cell4 = row.insertCell(3);
                                var cell5 = row.insertCell(4);
                                var cell6 = row.insertCell(5);
                                var cell7 = row.insertCell(6);
                                var cell8 = row.insertCell(7);
                                if (
                                    response.transaction.detail[i].qty == response.transaction.detail[i]
                                    .pic_qty &&
                                    response.transaction.detail[i].qty == response
                                    .transaction.detail[i].tluser_qty && response.transaction.detail[i]
                                    .qty == response
                                    .transaction.detail[i].tlgam_qty) {} else {
                                    row.setAttribute("style", "background-color: #ffb8c2;")
                                }
                                cell4.setAttribute("style", "text-align: center;");
                                cell5.setAttribute("style", "text-align: center;");
                                cell6.setAttribute("style", "text-align: center;");
                                cell7.setAttribute("style", "text-align: center;");
                                cell8.setAttribute("style", "text-align: center;");

                                cell1.innerHTML = response.transaction.detail[i].items[0].item_code;
                                cell2.innerHTML = response.transaction.detail[i].items[0].item_name;
                                cell3.innerHTML = response.transaction.detail[i].items[0].item_unit;
                                cell4.innerHTML = response.transaction.detail[i].qty;
                                // cell5.innerHTML = response.transaction.detail[i].qty;
                                cell6.innerHTML = response.transaction.detail[i].pic_qty; //tl adjustment
                                // cell7.innerHTML = response.transaction.detail[i]
                                //     .tlgam_qty; //gam tl adjustment
                                // var hidden = document.createElement("INPUT");
                                var x = document.createElement("INPUT");
                                var iddetail = response.transaction.detail[i].id;
                                var newcolid = "col" + i;
                                x.setAttribute("type", "number");
                                x.setAttribute("name", "col" + iddetail);
                                x.setAttribute("style", "width: 50px;");
                                x.setAttribute("min", "1");
                                x.setAttribute("required", "required");
                                x.setAttribute("id", "col" + iddetail);
                                x.setAttribute("value", response.transaction.detail[i].tluser_qty);
                                cell5.appendChild(x);


                                var urlupdate = '{{ route('update.detailtluser') }}';
                                // urlupdate = urlupdate.replace(':iddetail', iddetail);
                                // urlupdate = urlupdate.replace(':newval', document.getElementById(newcolid)
                                //     .value);
                                var button = document.createElement("a");
                                if (response.transaction.tl_approval == "Pending") {
                                    button.setAttribute("style", "width: 50px;");
                                } else {
                                    button.setAttribute("style", "display: none;");
                                }
                                button.setAttribute("class", "btn btn-success btn-sm btn-update");
                                // button.setAttribute("data-newval", document.getElementById(newcolid).value);
                                button.setAttribute("data-url", urlupdate);
                                button.setAttribute("data-formname", "form" + i);
                                button.setAttribute("data-iddetail", response.transaction.detail[i].id);
                                button.innerHTML = "<i class=\"fas fa-rotate\"></i>";
                                // cell8.appendChild(button);
                                arrayiddetail[i] = "col" + iddetail;

                            }
                            document.getElementById("hiddenarrayapprove").value = arrayiddetail;

                            $(".overlay").addClass('d-none');
                        }
                    }
                });
            });

        </script>
    @endpush
