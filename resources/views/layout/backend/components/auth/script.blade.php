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


                var totalAmount = 0;
                $("input[name='product_total[]']").each(
                                    function() {
                                        totalAmount = Number(totalAmount) + Number($(this).val());
                                        $('.sub_total').val(totalAmount);
                                        $('.sub_total').text('₹ ' + totalAmount);
                                    });


                var discount_type = $("#discount_type").val();

                if(discount_type == 'fixed'){

                    var discount = $('.discount').val();
                    $('.discount_price').val(discount);
                    $('.discount_price').text('₹ ' + discount);

                    var sub_total = $(".sub_total").val();
                    var total_amount = Number(sub_total) - Number(discount);
                    $('.total_amount').val(total_amount);
                    $('.total_amount').text('₹ ' + total_amount);

                }else if(discount_type == 'percentage'){

                    var discount = $('.discount').val();
                    var sub_total = $(".sub_total").val();
                    var discountPercentageAmount = (discount / 100) * sub_total;
                    $('.discount_price').val(discountPercentageAmount);
                    $('.discount_price').text('₹ ' + discountPercentageAmount);

                    var total_amount = Number(sub_total) - Number(discountPercentageAmount);
                    $('.total_amount').val(total_amount);
                    $('.total_amount').text('₹ ' + total_amount);

                }


                var tax_percentage = $( "#tax_percentage option:selected" ).val();
                var total_amount = $(".total_amount").val();
                var tax_amount = (tax_percentage / 100) * total_amount;
                $('.tax_amount').val(tax_amount);
                $('.tax_amount').text('₹ ' + tax_amount);

                var extracost_amount = $(".extracost_amount").val();
                var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
                $('.grand_total').val(grand_total);
                $('.grand_total').text('₹ ' + grand_total);

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

                var totalExtraAmount = 0;
                $("input[name='extracost[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalExtraAmount = Number(totalExtraAmount) +
                                            Number($(this).val());
                                        $('.extracost_amount').val(totalExtraAmount);
                                        $('.extracost_amount').text('₹ ' + totalExtraAmount);
                                    });



                var discount_type = $("#discount_type").val();

                if(discount_type == 'fixed'){

                    var discount = $('.discount').val();
                    $('.discount_price').val(discount);
                    $('.discount_price').text('₹ ' + discount);

                    var sub_total = $(".sub_total").val();
                    var total_amount = Number(sub_total) - Number(discount);
                    $('.total_amount').val(total_amount);
                    $('.total_amount').text('₹ ' + total_amount);

                }else if(discount_type == 'percentage'){

                    var discount = $('.discount').val();
                    var sub_total = $(".sub_total").val();
                    var discountPercentageAmount = (discount / 100) * sub_total;
                    $('.discount_price').val(discountPercentageAmount);
                    $('.discount_price').text('₹ ' + discountPercentageAmount);

                    var total_amount = Number(sub_total) - Number(discountPercentageAmount);
                    $('.total_amount').val(total_amount);
                    $('.total_amount').text('₹ ' + total_amount);

                }


                var tax_percentage = $("#tax_percentage").val();
                var total_amount = $(".total_amount").val();
                var tax_amount = (tax_percentage / 100) * total_amount;
                $('.tax_amount').val(tax_amount);
                $('.tax_amount').text('₹ ' + tax_amount);

                var extracost_amount = $(".extracost_amount").val();
                var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
                $('.grand_total').val(grand_total);
                $('.grand_total').text('₹ ' + grand_total);


            });

            $(document).on('click', '.addexpensenote', function() {
                $(".expensenote_tr").append(
                    '<tr>' +
                    '<td><input type="text" class="form-control" id="note" placeholder="Note" value="" name="note[]"/></td>' +
                    '<td><input type="hidden" name="expense_details_id[]"/><input type="text" class="form-control expense_price" id="expense_price" placeholder="Cost" name="expense_price[]" value=""/></td>' +
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
                                        $('.sub_total').text('₹ ' + totalAmount);
                                    });





            var discount_type = $("#discount_type").val();

            if(discount_type == 'fixed'){

                var discount = $('.discount').val();
                $('.discount_price').val(discount);
                $('.discount_price').text('₹ ' + discount);

                var sub_total = $(".sub_total").val();
                var total_amount = Number(sub_total) - Number(discount);
                $('.total_amount').val(total_amount);
                $('.total_amount').text('₹ ' + total_amount);

            }else if(discount_type == 'percentage'){

                var discount = $('.discount').val();
                var sub_total = $(".sub_total").val();
                var discountPercentageAmount = (discount / 100) * sub_total;
                $('.discount_price').val(discountPercentageAmount);
                $('.discount_price').text('₹ ' + discountPercentageAmount);

                var total_amount = Number(sub_total) - Number(discountPercentageAmount);
                $('.total_amount').val(total_amount);
                $('.total_amount').text('₹ ' + total_amount);

            }



        var tax_percentage = $( "#tax_percentage option:selected" ).val();
                var total_amount = $(".total_amount").val();
                var tax_amount = (tax_percentage / 100) * total_amount;
                $('.tax_amount').val(tax_amount);
                $('.tax_amount').text('₹ ' + tax_amount);
                var extracost_amount = $(".extracost_amount").val();

       
        var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
        $('.grand_total').val(grand_total);
        $('.grand_total').text('₹ ' + grand_total);
    });


    $("#discount_type").on('change', function() {
        var discount_type = this.value;
        if(discount_type == 'fixed'){
            $('#discount').val('');
            $('.discount_price').val(0);
            $('.discount_price').text('₹ ' + 0);
        }else if(discount_type == 'percentage'){
            $('#discount').val('');
            $('.discount_price').val(0);
            $('.discount_price').text('₹ ' + 0);
        }
    });



    $(document).on("keyup", 'input.discount', function() {
        var discount = $(this).val();
        var discount_type = $("#discount_type").val();

        if(discount_type == 'fixed'){

            $('.discount_price').val(discount);
            $('.discount_price').text('₹ ' + discount);

            var sub_total = $(".sub_total").val();
            var total_amount = Number(sub_total) - Number(discount);
            $('.total_amount').val(total_amount);
            $('.total_amount').text('₹ ' + total_amount);

            var tax_amount = $('.tax_amount').val();
            var extracost_amount = $(".extracost_amount").val();
            var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
            $('.grand_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);

        }else if(discount_type == 'percentage'){

            var sub_total = $(".sub_total").val();
            var discountPercentageAmount = (discount / 100) * sub_total;
            $('.discount_price').val(discountPercentageAmount);
            $('.discount_price').text('₹ ' + discountPercentageAmount);

            var total_amount = Number(sub_total) - Number(discountPercentageAmount);
            $('.total_amount').val(total_amount);
            $('.total_amount').text('₹ ' + total_amount);


            var tax_amount = $('.tax_amount').val();
            var extracost_amount = $(".extracost_amount").val();
            var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
            $('.grand_total').val(grand_total);
            $('.grand_total').text('₹ ' + grand_total);
        }
    });



    $("#tax_percentage").on('change', function() {
        var tax_percentage = $(this).val();
        var total_amount = $(".total_amount").val();
        var tax_amount = (tax_percentage / 100) * total_amount;
        $('.tax_amount').val(tax_amount);
        $('.tax_amount').text('₹ ' + tax_amount);


        var extracost_amount = $(".extracost_amount").val();
        var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
        $('.grand_total').val(grand_total);
        $('.grand_total').text('₹ ' + grand_total);
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
                                    $('.sub_total').val(totalAmount);
                                    $('.sub_total').text('₹ ' + totalAmount);
                            });
        


            var discount_type = $("#discount_type").val();

            if(discount_type == 'fixed'){

                var discount = $('.discount').val();
                $('.discount_price').val(discount);
                $('.discount_price').text('₹ ' + discount);

                var sub_total = $(".sub_total").val();
                var total_amount = Number(sub_total) - Number(discount);
                $('.total_amount').val(total_amount);
                $('.total_amount').text('₹ ' + total_amount);

            }else if(discount_type == 'percentage'){

                var discount = $('.discount').val();
                var sub_total = $(".sub_total").val();
                var discountPercentageAmount = (discount / 100) * sub_total;
                $('.discount_price').val(discountPercentageAmount);
                $('.discount_price').text('₹ ' + discountPercentageAmount);

                var total_amount = Number(sub_total) - Number(discountPercentageAmount);
                $('.total_amount').val(total_amount);
                $('.total_amount').text('₹ ' + total_amount);

            }

        var total_amount = $('.total_amount').val();
        var tax_percentage = $( "#tax_percentage option:selected" ).val();
                var total_amount = $(".total_amount").val();
                var tax_amount = (tax_percentage / 100) * total_amount;
                $('.tax_amount').val(tax_amount);
                $('.tax_amount').text('₹ ' + tax_amount);
        var extracost_amount = $(".extracost_amount").val();

       
        var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
        $('.grand_total').val(grand_total);
        $('.grand_total').text('₹ ' + grand_total);
    });




    $(document).on("blur", "input[name*=extracost]", function() {
        var extracost = $(this).val();
        var totalExtraAmount = 0;
        $("input[name='extracost[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalExtraAmount = Number(totalExtraAmount) +
                                            Number($(this).val());
                                        $('.extracost_amount').val(totalExtraAmount);
                                        $('.extracost_amount').text('₹ ' + totalExtraAmount);
                                    });

        var total_amount = $('.total_amount').val();
        var tax_amount = $('.tax_amount').val();
        var extracost_amount = $(".extracost_amount").val();

       
        var grand_total = Number(total_amount) + Number(tax_amount) + Number(extracost_amount);
        $('.grand_total').val(grand_total);
        $('.grand_total').text('₹ ' + grand_total);
    });


    var k = 1;
    var l = 1;
        $(document).ready(function() {
            $(document).on('click', '.addbillproductfields', function() {
                ++k;

                let  rowIndex = $('.auto_num').length+1;
                let  rowIndexx = $('.auto_num').length+1;

                $(".billproduct_fields").append(
                    '<tr>' +
                    '<td><input class="auto_num form-control"  type="text" readonly value="'+rowIndexx+'"/></td>' +
                    '<td colspan="2" class=""><input type="hidden" id="bill_detail_id" name="bill_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single bill_product_id select"name="bill_product_id[]" id="bill_product_id' + k + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control bill_quantity" id="bill_quantity" name="bill_quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_rateper_quantity" id="bill_rateper_quantity" name="bill_rateper_quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control bill_product_total" readonly id="bill_product_total"style="background-color: #e9ecef;" name="bill_product_total[]" placeholder="Total" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn billremove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
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
                        ++l;
                        $('#bill_product_id' + l).append(selectedValues);
                        //add_count.push(Object.keys(selectedValues).length);
                    }
                });


            });


            $(document).on('click', '.addbillextranotefields', function() {
                $(".billextracost_tr").append(
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td colspan="3"><input type="text" class="form-control"id="bill_extracost_note" placeholder="Note" value=""name="bill_extracost_note[]" /></td>' +
                    '<td><input type="hidden" name="billextracost_detail_id[]"/><input type="text" class="form-control bill_extracost" id="bill_extracost"placeholder="Extra Cost"  name="bill_extracost[]"value="" /></td>' +
                    '<td><button class="btn btn-danger form-plus-btn remove-billextratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            });
        



            $(document).on('click', '.billremove-tr', function() {
                $(this).parents('tr').remove();
                billregenerate_auto_num();


                var totalAmount = 0;
                $("input[name='bill_product_total[]']").each(
                                    function() {
                                        totalAmount = Number(totalAmount) + Number($(this).val());
                                        $('.bill_sub_total').val(totalAmount);
                                        $('.billsub_total').text('₹ ' + totalAmount);
                                    });


                var bill_discount_type = $("#bill_discount_type").val();

                if(bill_discount_type == 'fixed'){

                    var bill_discount = $('.bill_discount').val();
                    $('.bill_discount_price').val(bill_discount);
                    $('.billdiscount_price').text('₹ ' + bill_discount);

                    var bill_sub_total = $(".bill_sub_total").val();
                    var bill_total_amount = Number(bill_sub_total) - Number(bill_discount);
                    $('.bill_total_amount').val(bill_total_amount);
                    $('.billtotal_amount').text('₹ ' + bill_total_amount);

                }else if(bill_discount_type == 'percentage'){

                    var bill_discount = $('.bill_discount').val();
                    var bill_sub_total = $(".bill_sub_total").val();
                    var discountPercentageAmount = (bill_discount / 100) * bill_sub_total;
                    $('.bill_discount_price').val(discountPercentageAmount);
                    $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                    var bill_total_amount = Number(bill_sub_total) - Number(discountPercentageAmount);
                    $('.bill_total_amount').val(bill_total_amount);
                    $('.billtotal_amount').text('₹ ' + bill_total_amount);

                }


                var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                var bill_total_amount = $(".bill_total_amount").val();
                var bill_tax_amount = (bill_tax_percentage / 100) * bill_total_amount;
                $('.bill_tax_amount').val(bill_tax_amount);
                $('.billtax_amount').text('₹ ' + bill_tax_amount);

                var bill_extracost_amount = $(".bill_extracost_amount").val();
                var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
                $('.bill_grand_total').val(bill_grand_total);
                $('.billgrand_total').text('₹ ' + bill_grand_total);


                var bill_paid_amount = $('.bill_paid_amount').val();
                //alert(bill_paid_amount);
                var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
                $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                $('.billbalance_amount').text('₹ ' + bill_balance_amount);

            });

            function billregenerate_auto_num(){
                let count  = 1;
                $(".auto_num").each(function(i,v){
                $(this).val(count);
                count++;
              })
            }

            $(document).on('click', '.remove-billextratr', function() {
                $(this).parents('tr').remove();

                var totalExtraAmount = 0;
                $("input[name='bill_extracost[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalExtraAmount = Number(totalExtraAmount) +
                                            Number($(this).val());
                                        $('.bill_extracost_amount').val(totalExtraAmount);
                                        $('.billextracost_amount').text('₹ ' + totalExtraAmount);
                                    });



                                    var bill_discount_type = $("#bill_discount_type").val();

                                    if(bill_discount_type == 'fixed'){

                                        var bill_discount = $('.bill_discount').val();
                                        $('.bill_discount_price').val(bill_discount);
                                        $('.billdiscount_price').text('₹ ' + bill_discount);

                                        var bill_sub_total = $(".bill_sub_total").val();
                                        var bill_total_amount = Number(bill_sub_total) - Number(bill_discount);
                                        $('.bill_total_amount').val(bill_total_amount);
                                        $('.billtotal_amount').text('₹ ' + bill_total_amount);

                                    }else if(bill_discount_type == 'percentage'){

                                        var bill_discount = $('.bill_discount').val();
                                        var bill_sub_total = $(".bill_sub_total").val();
                                        var discountPercentageAmount = (bill_discount / 100) * bill_sub_total;
                                        $('.bill_discount_price').val(discountPercentageAmount);
                                        $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                                        var bill_total_amount = Number(bill_sub_total) - Number(discountPercentageAmount);
                                        $('.bill_total_amount').val(bill_total_amount);
                                        $('.billtotal_amount').text('₹ ' + bill_total_amount);

                                    }



                var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                var bill_total_amount = $(".bill_total_amount").val();
                var bill_tax_amount = (bill_tax_percentage / 100) * bill_total_amount;
                $('.bill_tax_amount').val(bill_tax_amount);
                $('.billtax_amount').text('₹ ' + bill_tax_amount);

                var bill_extracost_amount = $(".bill_extracost_amount").val();
                var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
                $('.bill_grand_total').val(bill_grand_total);
                $('.billgrand_total').text('₹ ' + bill_grand_total);

                var bill_paid_amount = $('.bill_paid_amount').val();
                //alert(bill_paid_amount);
                var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
                $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
                $('.billbalance_amount').text('₹ ' + bill_balance_amount);


            });


        });


            
    $(document).on("blur", "input[name*=bill_quantity]", function() {
        var bill_quantity = $(this).val();
        var bill_rateper_quantity = $(this).parents('tr').find('.bill_rateper_quantity').val();
        var total = bill_quantity * bill_rateper_quantity;
        $(this).parents('tr').find('.bill_product_total').val(total);

                var totalAmount = 0;
                $("input[name='bill_product_total[]']").each(
                                    function() {
                                        totalAmount = Number(totalAmount) + Number($(this).val());
                                        $('.bill_sub_total').val(totalAmount);
                                        $('.billsub_total').text('₹ ' + totalAmount);
                                    });





            var bill_discount_type = $("#bill_discount_type").val();

            if(bill_discount_type == 'fixed'){

                var bill_discount = $('.bill_discount').val();
                $('.bill_discount_price').val(bill_discount);
                $('.billdiscount_price').text('₹ ' + bill_discount);

                var bill_sub_total = $(".bill_sub_total").val();
                var bill_total_amount = Number(bill_sub_total) - Number(bill_discount);
                $('.bill_total_amount').val(bill_total_amount);
                $('.billtotal_amount').text('₹ ' + bill_total_amount);

            }else if(bill_discount_type == 'percentage'){

                var bill_discount = $('.bill_discount').val();
                var bill_sub_total = $(".bill_sub_total").val();
                var billdiscountPercentageAmount = (bill_discount / 100) * bill_sub_total;
                $('.bill_discount_price').val(billdiscountPercentageAmount);
                $('.billdiscount_price').text('₹ ' + billdiscountPercentageAmount);

                var bill_total_amount = Number(bill_sub_total) - Number(billdiscountPercentageAmount);
                $('.bill_total_amount').val(bill_total_amount);
                $('.billtotal_amount').text('₹ ' + bill_total_amount);

            }



        var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                var bill_total_amount = $(".bill_total_amount").val();
                var bill_tax_amount = (bill_tax_percentage / 100) * bill_total_amount;
                $('.bill_tax_amount').val(bill_tax_amount);
                $('.billtax_amount').text('₹ ' + bill_tax_amount);
                var bill_extracost_amount = $(".bill_extracost_amount").val();

       
        var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
        $('.bill_grand_total').val(bill_grand_total);
        $('.billgrand_total').text('₹ ' + bill_grand_total);

        var bill_paid_amount = $('.bill_paid_amount').val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });


    $("#bill_discount_type").on('change', function() {
        var bill_discount_type = this.value;
        if(bill_discount_type == 'fixed'){
            $('#bill_discount').val('');
            $('.bill_discount_price').val(0);
            $('.billdiscount_price').text('₹ ' + 0);
        }else if(bill_discount_type == 'percentage'){
            $('#bill_discount').val('');
            $('.bill_discount_price').val(0);
            $('.billdiscount_price').text('₹ ' + 0);
        }
    });



    $(document).on("keyup", 'input.bill_discount', function() {
        var bill_discount = $(this).val();
        var bill_discount_type = $("#bill_discount_type").val();

        if(bill_discount_type == 'fixed'){

            $('.bill_discount_price').val(bill_discount);
            $('.billdiscount_price').text('₹ ' + bill_discount);

            var bill_sub_total = $(".bill_sub_total").val();
            var bill_total_amount = Number(bill_sub_total) - Number(bill_discount);
            $('.bill_total_amount').val(bill_total_amount);
            $('.billtotal_amount').text('₹ ' + bill_total_amount);

            var bill_tax_amount = $('.bill_tax_amount').val();
            var bill_extracost_amount = $(".bill_extracost_amount").val();
            var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
            $('.bill_grand_total').val(bill_grand_total);
            $('.billgrand_total').text('₹ ' + bill_grand_total);


            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);

        }else if(bill_discount_type == 'percentage'){

            var bill_sub_total = $(".bill_sub_total").val();
            var discountPercentageAmount = (bill_discount / 100) * bill_sub_total;
            $('.bill_discount_price').val(discountPercentageAmount);
            $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

            var bill_total_amount = Number(bill_sub_total) - Number(discountPercentageAmount);
            $('.bill_total_amount').val(bill_total_amount);
            $('.billtotal_amount').text('₹ ' + bill_total_amount);


            var bill_tax_amount = $('.bill_tax_amount').val();
            var bill_extracost_amount = $(".bill_extracost_amount").val();
            var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
            $('.bill_grand_total').val(bill_grand_total);
            $('.billgrand_total').text('₹ ' + bill_grand_total);

            var bill_paid_amount = $('.bill_paid_amount').val();
            //alert(bill_paid_amount);
            var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
            $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
            $('.billbalance_amount').text('₹ ' + bill_balance_amount);
        }
    });



    $("#bill_tax_percentage").on('change', function() {
        var bill_tax_percentage = $(this).val();
        var bill_total_amount = $(".bill_total_amount").val();
        var bill_tax_amount = (bill_tax_percentage / 100) * bill_total_amount;
        $('.bill_tax_amount').val(bill_tax_amount);
        $('.billtax_amount').text('₹ ' + bill_tax_amount);

        console.log(bill_total_amount);


        var bill_extracost_amount = $(".bill_extracost_amount").val();
        var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
        $('.bill_grand_total').val(bill_grand_total);
        $('.billgrand_total').text('₹ ' + bill_grand_total);


        var bill_paid_amount = $('.bill_paid_amount').val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });



    $(document).on("blur", "input[name*=bill_rateper_quantity]", function() {
        var bill_rateper_quantity = $(this).val();
        var bill_quantity = $(this).parents('tr').find('.bill_quantity').val();
        var total = bill_quantity * bill_rateper_quantity;
        $(this).parents('tr').find('.bill_product_total').val(total);

        var totalAmount = 0;
        $("input[name='bill_product_total[]']").each(
                            function() {
                                //alert($(this).val());
                                totalAmount = Number(totalAmount) +
                                    Number($(this).val());
                                    $('.bill_sub_total').val(totalAmount);
                                    $('.billsub_total').text('₹ ' + totalAmount);
                            });
        


            var bill_discount_type = $("#bill_discount_type").val();

            if(bill_discount_type == 'fixed'){

                var bill_discount = $('.bill_discount').val();
                $('.bill_discount_price').val(bill_discount);
                $('.billdiscount_price').text('₹ ' + bill_discount);

                var bill_sub_total = $(".bill_sub_total").val();
                var bill_total_amount = Number(bill_sub_total) - Number(bill_discount);
                $('.bill_total_amount').val(bill_total_amount);
                $('.billtotal_amount').text('₹ ' + bill_total_amount);

            }else if(bill_discount_type == 'percentage'){

                var bill_discount = $('.bill_discount').val();
                var bill_sub_total = $(".bill_sub_total").val();
                var discountPercentageAmount = (bill_discount / 100) * bill_sub_total;
                $('.bill_discount_price').val(discountPercentageAmount);
                $('.billdiscount_price').text('₹ ' + discountPercentageAmount);

                var bill_total_amount = Number(bill_sub_total) - Number(discountPercentageAmount);
                $('.bill_total_amount').val(bill_total_amount);
                $('.billtotal_amount').text('₹ ' + bill_total_amount);

            }

       
        var bill_tax_percentage = $( "#bill_tax_percentage option:selected" ).val();
                var bill_total_amount = $(".bill_total_amount").val();
                var bill_tax_amount = (bill_tax_percentage / 100) * bill_total_amount;
                $('.bill_tax_amount').val(bill_tax_amount);
                $('.billtax_amount').text('₹ ' + bill_tax_amount);
        var bill_extracost_amount = $(".bill_extracost_amount").val();

       
        var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
        $('.bill_grand_total').val(bill_grand_total);
        $('.billgrand_total').text('₹ ' + bill_grand_total);

        var bill_paid_amount = $('.bill_paid_amount').val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });



    $(document).on("blur", "input[name*=bill_extracost]", function() {
        var bill_extracost = $(this).val();
        var totalExtraAmount = 0;
        $("input[name='bill_extracost[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalExtraAmount = Number(totalExtraAmount) +
                                            Number($(this).val());
                                        $('.bill_extracost_amount').val(totalExtraAmount);
                                        $('.billextracost_amount').text('₹ ' + totalExtraAmount);
                                    });

        var bill_total_amount = $('.bill_total_amount').val();
        var bill_tax_amount = $('.bill_tax_amount').val();
        var bill_extracost_amount = $(".bill_extracost_amount").val();

       
        var bill_grand_total = Number(bill_total_amount) + Number(bill_tax_amount) + Number(bill_extracost_amount);
        $('.bill_grand_total').val(bill_grand_total);
        $('.billgrand_total').text('₹ ' + bill_grand_total);


        var bill_paid_amount = $('.bill_paid_amount').val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });



    $(document).on("blur", 'input.bill_paid_amount', function() {
        var bill_paid_amount = $(this).val();
        var bill_grand_total = $(".bill_grand_total").val();
        //alert(bill_paid_amount);
        var bill_balance_amount = Number(bill_grand_total) - Number(bill_paid_amount);
        $('.bill_balance_amount').val(bill_balance_amount.toFixed(2));
        $('.billbalance_amount').text('₹ ' + bill_balance_amount);
    });


    function quotationubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }

    function billubmitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }




    $(document).on("keyup", "input[name*=expense_price]", function() {
        var tota_expense = 0;
        $("input[name='expense_price[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        tota_expense = Number(tota_expense) +
                                            Number($(this).val());
                                        $('.total_expense_amount').val(tota_expense);
                                        $('.total_expense').text('₹ ' + tota_expense);
                                    });
    });


</script>
