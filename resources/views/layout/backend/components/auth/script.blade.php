<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/feather.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap-datetimepicker.min.js') }}"></script>


<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/backend/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets/backend/js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var i = 1;
    var j = 1;
    $(document).ready(function() {
            $('.js-example-basic-single').select2();


            $(".vendor_phoneno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('vendor.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Vendor Already Existed');
                                $('.vendor_phoneno').val('');
                            }
                        }
                    });
                }

            });



            $(".customer_phoneno").keyup(function() {
                var query = $(this).val();

                if (query != '') {

                    $.ajax({
                        url: "{{ route('customer.checkduplicate') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            query: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response['data']);
                            if(response['data'] != null){
                                alert('Customer Already Existed');
                                $('.customer_phoneno').val('');
                            }
                        }
                    });
                }

            });



            $(document).on('click', '.addproductfields', function() {
                ++i;

                let  rowIndex = $('.auto_num').length+1;
                let  rowIndexx = $('.auto_num').length+1;

                $(".product_fields").append(
                    '<tr>' +
                    '<td><input class="auto_num form-control"  type="text" readonly value="'+rowIndexx+'"/></td>' +
                    '<td colspan="2" class=""><input type="hidden" id="quotation_detail_id" name="quotation_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single product_id select"name="product_id[]" id="product_id' + i + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control quantity" id="quantity" name="quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control rateper_quantity" id="rateper_quantity" name="rateper_quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control product_total" readonly id="product_total"style="background-color: #e9ecef;" name="product_total[]" placeholder="Total" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );


                $.ajax({
                    url: '/getProducts/',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response['data']);
                        var len = response['data'].length;

                        var selectedValues = new Array();

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {

                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var option = "<option value='" + id + "'>" + name +
                                        "</option>";
                                    selectedValues.push(option);
                            }
                        }
                        ++j;
                        $('#product_id' + j).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });
            });


            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
                regenerate_auto_num();
            });
            function regenerate_auto_num(){
                let count  = 1;
                $(".auto_num").each(function(i,v){
                $(this).val(count);
                count++;
              })
            }


            $(document).on('click', '.addextranotefields', function() {
                $(".extracost_tr").append(
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td colspan="3"><input type="text" class="form-control"id="extracost_note" placeholder="Note" value=""name="extracost_note[]" /></td>' +
                    '<td><input type="hidden" name="extracost_id[]"/><input type="text" class="form-control extracost" id="extracost"placeholder="Extra Cost"  name="extracost[]"value="" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-extratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });
            $(document).on('click', '.remove-extratr', function() {
                $(this).parents('tr').remove();
            });

            $(document).on('click', '.addexpensenote', function() {
                $(".expensenote_tr").append(
                    '<tr>' +
                    '<td><input type="text" class="form-control" id="note" placeholder="Note" value="" name="note[]"/></td>' +
                    '<td><input type="hidden" name="expenses_id[]"/><input type="text" class="form-control price" id="price" placeholder="Extra Cost" name="price[]" value=""/></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-expensenote" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });
            $(document).on('click', '.remove-expensenote', function() {
                $(this).parents('tr').remove();
            });


    });

    $(document).on("blur", "input[name*=quantity]", function() {
        var quantity = $(this).val();
        var rateper_quantity = $(this).parents('tr').find('.rateper_quantity').val();
        var total = quantity * rateper_quantity;
        $(this).parents('tr').find('.product_total').val(total);

                var totalAmount = 0;
                $("input[name='product_total[]']").each(
                                    function() {
                                        totalAmount = Number(totalAmount) + Number($(this).val());
                                        $('.sub_total').val(totalAmount);
                                    });
        var discount_price = $(".discount_price").val();
        var sub_total = $(".sub_total").val();
        var overallamount = Number(sub_total) - Number(discount_price);
        $('.overallamount').val(overallamount.toFixed(2));


        var tax_percentage = $(".tax_percentage").val();
        var overallamount = $(".overallamount").val();
        var tax_amount = (tax_percentage / 100) * overallamount;
        $('.tax_amount').val(tax_amount);
        var tax_added_amunt = Number(overallamount) + Number(tax_amount);
        $('.tax_added_amunt').val(tax_added_amunt);


        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) + Number(extracost_amount);
        $('.grand_total').val(grand_total);


        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });



    $(document).on("keyup", 'input.discount_price', function() {
        var discount_price = $(this).val();
        var sub_total = $(".sub_total").val();
        var overallamount = Number(sub_total) - Number(discount_price);
        $('.overallamount').val(overallamount);

        var tax_percentage = $(".tax_percentage").val();
        var overallamount = $(".overallamount").val();
        var tax_amount = (tax_percentage / 100) * overallamount;
        $('.tax_amount').val(tax_amount);
        var tax_added_amunt = Number(overallamount) + Number(tax_amount);
        $('.tax_added_amunt').val(tax_added_amunt);

        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) + Number(extracost_amount);
        $('.grand_total').val(grand_total);

        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });




    $(document).on("keyup", 'input.tax_percentage', function() {
        var tax_percentage = $(this).val();
        var overallamount = $(".overallamount").val();
        var tax_amount = (tax_percentage / 100) * overallamount;
        $('.tax_amount').val(tax_amount);

        var tax_added_amunt = Number(overallamount) + Number(tax_amount);
        $('.tax_added_amunt').val(tax_added_amunt);

        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) + Number(extracost_amount);
        $('.grand_total').val(grand_total);

        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });



    $(document).on("keyup", 'input.tax_amount', function() {
        var tax_amount = $(this).val();
        var overallamount = $(".overallamount").val();
        var taxpercentage = (tax_amount * 100) / overallamount;
        $('.tax_percentage').val(taxpercentage.toFixed(2));

        var tax_added_amunt = Number(overallamount) + Number(tax_amount);
        $('.tax_added_amunt').val(tax_added_amunt);

        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) + Number(extracost_amount);
        $('.grand_total').val(grand_total);

        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });




    $(document).on("blur", "input[name*=rateper_quantity]", function() {
        var rateper_quantity = $(this).val();
        var quantity = $(this).parents('tr').find('.quantity').val();
        var total = quantity * rateper_quantity;
        $(this).parents('tr').find('.product_total').val(total);

        var totalAmount = 0;
        $("input[name='product_total[]']").each(
                            function() {
                                //alert($(this).val());
                                totalAmount = Number(totalAmount) +
                                    Number($(this).val());
                                    $('.sub_total').val(
                                        totalAmount);
                            });

        var discount_price = $(".discount_price").val();
        var sub_total = $(".sub_total").val();
        var overallamount = Number(sub_total) - Number(discount_price);
        $('.overallamount').val(overallamount.toFixed(2));

        var tax_percentage = $(".tax_percentage").val();
        var overallamount = $(".overallamount").val();
        var tax_amount = (tax_percentage / 100) * overallamount;
        $('.tax_amount').val(tax_amount);
        var tax_added_amunt = Number(overallamount) + Number(tax_amount);
        $('.tax_added_amunt').val(tax_added_amunt);


        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) + Number(extracost_amount);
        $('.grand_total').val(grand_total);

        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });




    $(document).on("blur", "input[name*=extracost]", function() {
        var extracost = $(this).val();
        var totalExtraAmount = 0;
        $("input[name='extracost[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalExtraAmount = Number(totalExtraAmount) +
                                            Number($(this).val());
                                        $('.extracost_amount').val(
                                            totalExtraAmount);
                                    });
        var tax_added_amunt = $(".tax_added_amunt").val();
        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(tax_added_amunt) - Number(extracost_amount);
        $('.grand_total').val(grand_total);

        var paid_amount = $(".paid_amount").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });


    $(document).on("keyup", 'input.paid_amount', function() {
        var paid_amount = $(this).val();
        var grand_total = $(".grand_total").val();
        var balance_amount = Number(grand_total) - Number(paid_amount);
        $('.balance_amount').val(balance_amount.toFixed(2));
    });


    function quotationubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }


</script>
