@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Add Quotation</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                    <form autocomplete="off" method="POST" action="{{ route('quotation.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Quotation Number</label>
                                                        <input type="text" readonly class="form-control"
                                                            style="background-color: #e9ecef;" name="quotation_number"
                                                            id="quotation_number" value="{{ $quotation_no }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $today }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $timenow }}" name="time" id="time"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Customer <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select customer_id js-example-basic-single"
                                                            name="customer_id" id="customer_id" required>
                                                            <option value="" disabled selected hiddden>Select Customer
                                                            </option>
                                                            @foreach ($customer as $customers)
                                                                <option value="{{ $customers->id }}">{{ $customers->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Note <span class="text-danger">*</span></label>
                                                        <input type="text" class=" form-control"
                                                            placeholder="Enter Notes" name="add_on_note" id="add_on_note"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive no-pagination">
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width:8%">S.No</th>
                                                        <th style="width:23%">Product</th>
                                                        <th style="width:14%">Quantity</th>
                                                        <th style="width:14%">Cost Per Quantity</th>
                                                        <th style="width:14%"></th>
                                                        <th style="width:20%">Cost</th>
                                                        <th style="width:5%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="product_fields">
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="1"
                                                                readonly />
                                                        </td>
                                                        <td colspan="2"><input type="hidden" id="quotation_detail_id"
                                                                name="quotation_detail_id[]" />
                                                            <select
                                                                class="form-control  product_id select js-example-basic-single"
                                                                name="product_id[]" id="product_id1"required>
                                                                <option value="" selected hidden class="text-muted">
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product as $products)
                                                                    <option value="{{ $products->id }}">
                                                                        {{ $products->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control quantity"
                                                                id="quantity" name="quantity[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control rateper_quantity"
                                                                id="rateper_quantity" name="rateper_quantity[]"
                                                                value="" required /></td>
                                                        <td><input type="text" class="form-control product_total"
                                                                readonly id="product_total"
                                                                style="background-color: #e9ecef;" name="product_total[]"
                                                                placeholder="0.00" /></td>
                                                        <td><button
                                                                style="width: 40px;"class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-primary addproductfields"
                                                                type="button" id="" value="Add">+</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Total</td>
                                                        <td><input type="text" class="form-control sub_total"
                                                                style="background-color: #e9ecef;" name="sub_total"
                                                                required id="sub_total" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Discount Price</td>
                                                        <td><input type="text"
                                                                class="form-control discount_price"name="discount_price"
                                                                id="discount_price" placeholder="Discount Price">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Overall Amount</td>
                                                        <td><input type="text"
                                                                class="form-control overallamount"name="overallamount"
                                                                style="background-color: #e9ecef;" id="overallamount"
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end"
                                                            style="font-size:15px;color:black">Tax Costing</td>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control tax_percentage"name="tax_percentage"
                                                                id="tax_percentage" placeholder="Tax Per %">
                                                        </td>
                                                        <td><input type="text" class="form-control tax_amount"
                                                                name="tax_amount" id="tax_amount"
                                                                placeholder="Tax Amount"></td>
                                                        <td><input type="text" class="form-control tax_added_amunt"
                                                                name="tax_added_amunt" id="tax_added_amunt" readonly
                                                                style="background-color: #e9ecef;"></td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="extracost_tr">
                                                    <tr>
                                                        <td colspan="2" class="text-end"
                                                            style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3"><input type="text"
                                                                class="form-control"id="extracost_note"
                                                                placeholder="Note"
                                                                value=""name="extracost_note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="extracost_id[]" />
                                                            <input type="text" class="form-control extracost"
                                                                id="extracost"placeholder="Extra Cost"
                                                                name="extracost[]"value="" />
                                                        </td>
                                                        <td><button
                                                                style="width: 40px;"class="py-1 addextranotefields text-white font-medium rounded-lg text-sm text-center btn btn-primary"
                                                                type="button" id="" value="Add">+</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Total
                                                            Extracost Amount</td>
                                                        <td><input type="text" class="form-control extracost_amount"
                                                                name="extracost_amount" id="extracost_amount" readonly
                                                                style="background-color: #e9ecef;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Grand Total
                                                        </td>
                                                        <td><input type="text" class="form-control grand_total"
                                                                name="grand_total" readonly id="grand_total"
                                                                style="background-color: #e9ecef;"></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Paid Amount
                                                            <span class="text-danger">*</span>
                                                        </td>
                                                        <td><input type="text"
                                                                class="form-control paid_amount"
                                                                name="paid_amount" required
                                                                id="paid_amount"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Balance</td>
                                                        <td> <input type="text"
                                                                class="form-control balance_amount"
                                                                name="balance_amount"
                                                                style="background-color: #e9ecef;"
                                                                id="balance_amount" readonly></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="quotationubmitForm(this);" />
                                            <a href="{{ route('quotation.index') }}"
                                                class="btn btn-primary cancel">Cancel</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
