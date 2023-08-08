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
                    '<td class=""><input type="hidden" id="quotation_detail_id" name="quotation_detail_id[]" />' +
                    '<select class="form-control js-example-basic-single product_id select"name="product_id[]" id="product_id' + i + '"required>' +
                    '<option value="" selected hidden class="text-muted">Select Product</option></select>' +
                    '</td>' +
                    '<td><input type="text" class="form-control quantity" id="quantity" name="quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control rateper_quantity" id="rateper_quantity" name="rateper_quantity[]"  value="" required /></td>' +
                    '<td><input type="text" class="form-control product_total" readonly id="product_total"style="background-color: #e9ecef;" name="product_total[]" placeholder="Total" /></td>' +
                    '<td><button style="width: 40px;" class="text-white py-1 font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >-</button></td>' +
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
            });

            $(document).on("blur", "input[name*=quantity]", function() {
                var quantity = $(this).val();
                var rateper_quantity = $(this).parents('tr').find('.rateper_quantity').val();
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
            });




            $(document).on('click', '.addextranotefields', function() {
                $(".extracost_tr").append(
                    '<tr>' +
                    '<td><input type="text" class="form-control"id="extracost_note" placeholder="Note" value=""name="extracost_note[]" /></td>' +
                    '<td><input type="hidden" name="extracost_id[]"/><input type="text" class="form-control extracost" id="extracost"placeholder="Extra Cost"  name="extracost[]"value="" /></td>' +
                    '<td><button style="width: 40px;"class="py-1 text-white remove-extratr font-medium rounded-lg text-sm  text-center btn btn-danger" type="button" id="" value="Add">-</button></td>' +
                    '</tr>'
                );
            });
            $(document).on('click', '.remove-extratr', function() {
                $(this).parents('tr').remove();
            });


    });

</script>
