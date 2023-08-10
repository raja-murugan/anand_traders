@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Update Quotation</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <form autocomplete="off" method="POST"
                        action="{{ route('quotation.update', ['unique_key' => $QuotationData->unique_key]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="quotation-card">
                                    <div class="card-body">


                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Quotation Number</label>
                                                        <input type="text" readonly class="form-control"
                                                            name="quotation_number" id="quotation_number"
                                                            value="{{ $QuotationData->quotation_number }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            placeholder="Select Date" value="{{ $QuotationData->date }}"
                                                            name="date" id="date" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            placeholder="Select Date" value="{{ $QuotationData->time }}"
                                                            name="time" id="time" required>
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
                                                                <option
                                                                    value="{{ $customers->id }}"@if ($customers->id === $QuotationData->customer_id) selected='selected' @endif>
                                                                    {{ $customers->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11 col-md-11 col-sm-11">
                                                    <div class="form-group">
                                                        <label>Note <span class="text-danger">*</span></label>
                                                        <input type="text" class=" form-control"
                                                            placeholder="Enter Notes" name="add_on_note" id="add_on_note"
                                                            required value="{{ $QuotationData->add_on_note }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="form-group">
                                                        <label style="opacity: 0%;">Note</label>
                                                        <button
                                                            style="width: 100px;"class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-primary addproductfields"
                                                            type="button" id="" value="Add">Add</button>
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
                                                        <th style="width:14%">Rate / Quantity</th>
                                                        <th style="width:14%"></th>
                                                        <th style="width:20%">Total</th>
                                                        <th style="width:6%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="product_fields">
                                                    @foreach ($QuotationProducts as $index => $QuotationProduct)
                                                        <tr>
                                                            <td><input id="#" name="#"
                                                                    class="auto_num form-control" type="text"
                                                                    value="{{ $index + 1 }}" readonly /></td>
                                                            <td colspan="2"><input type="hidden"
                                                                    id="quotation_detail_id" name="quotation_detail_id[]"
                                                                    value="{{ $QuotationProduct->id }}" />
                                                                <select
                                                                    class="form-control  product_id select js-example-basic-single"
                                                                    name="product_id[]"id="product_id1"required>
                                                                    <option value="" selected hidden
                                                                        class="text-muted">Select Product</option>
                                                                    @foreach ($product as $products)
                                                                        <option
                                                                            value="{{ $products->id }}"@if ($products->id === $QuotationProduct->product_id) selected='selected' @endif>
                                                                            {{ $products->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control quantity"
                                                                    id="quantity" name="quantity[]" required
                                                                    value="{{ $QuotationProduct->quantity }}" />
                                                            </td>
                                                            <td><input type="text" class="form-control rateper_quantity"
                                                                    id="rateper_quantity" name="rateper_quantity[]"
                                                                    required
                                                                    value="{{ $QuotationProduct->rateper_quantity }}" />
                                                            </td>
                                                            <td><input type="text" class="form-control product_total"
                                                                    readonly
                                                                    id="product_total"style="background-color: #e9ecef;"
                                                                    name="product_total[]" placeholder="Total"
                                                                    value="{{ $QuotationProduct->product_total }}" />
                                                            </td>
                                                            <td><button style="width: 40px;"
                                                                    class="text-white py-1 font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr"
                                                                    type="button">-</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Total</td>
                                                        <td><input type="text" class="form-control sub_total"
                                                                style="background-color: #e9ecef;" name="sub_total"
                                                                required id="sub_total" readonly
                                                                value="{{ $QuotationData->sub_total }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Discount Price</td>
                                                        <td><input type="text"
                                                                class="form-control discount_price"name="discount_price"
                                                                value="{{ $QuotationData->discount_price }}"
                                                                id="discount_price" placeholder="Discount Price">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">
                                                            Overall Amount</td>
                                                        <td><input type="text"
                                                                class="form-control overallamount"name="overallamount"
                                                                value="{{ $QuotationData->overallamount }}"
                                                                style="background-color: #e9ecef;" id="overallamount"
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end"
                                                            style="font-size:15px;color:black">Tax Costing</td>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control tax_percentage"name="tax_percentage"
                                                                value="{{ $QuotationData->tax_percentage }}"
                                                                id="tax_percentage" placeholder="Tax Per %">
                                                        </td>
                                                        <td><input type="text" class="form-control tax_amount"
                                                                name="tax_amount" id="tax_amount"
                                                                value="{{ $QuotationData->tax_amount }}"
                                                                placeholder="Tax Amount"></td>
                                                        <td><input type="text" class="form-control tax_added_amunt"
                                                                name="tax_added_amunt"
                                                                value="{{ $QuotationData->tax_added_amunt }}"
                                                                id="tax_added_amunt" readonly
                                                                style="background-color: #e9ecef;"></td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="extracost_tr">
                                                    @foreach ($QuotationExtracosts as $index => $QuotationExtracosts_arr)
                                                        <tr>

                                                            <td>
                                                                <button
                                                                    class="py-1 addextranotefields text-white font-medium rounded-lg text-sm
                                                               text-center btn btn-primary"
                                                                    type="button" id="" value="Add">Add
                                                                    Extracost</button>
                                                            </td>
                                                            <td class="text-end" style="font-size:15px;color:black">Extra
                                                                Costing</td>
                                                            <td colspan="3">
                                                                <input type="hidden" id="extracost_detail_id"
                                                                    name="extracost_detail_id[]"
                                                                    value="{{ $QuotationExtracosts_arr->id }}" />
                                                                <input type="text"
                                                                    class="form-control"id="extracost_note"
                                                                    placeholder="Note"
                                                                    value="{{ $QuotationExtracosts_arr->extracost_note }}"name="extracost_note[]" />
                                                            </td>
                                                            <td><input type="hidden" name="extracost_id[]" />
                                                                <input type="text" class="form-control extracost"
                                                                    id="extracost"placeholder="Extra Cost"
                                                                    name="extracost[]"value="{{ $QuotationExtracosts_arr->extracost }}" />
                                                            </td>
                                                            <td><button
                                                                    style="width: 40px;"class="py-1 text-white remove-extratr font-medium rounded-lg text-sm  text-center btn btn-danger"
                                                                    type="button" id=""
                                                                    value="Add">-</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">Total
                                                            Extracost Amount</td>
                                                        <td><input type="text" class="form-control extracost_amount"
                                                                value="{{ $QuotationData->extracost_amount }}"
                                                                name="extracost_amount" id="extracost_amount" readonly
                                                                style="background-color: #e9ecef;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end"
                                                            style="font-size:15px;color:black">Grand
                                                            Total
                                                        </td>
                                                        <td><input type="text" class="form-control grand_total"
                                                                value="{{ $QuotationData->grand_total }}"
                                                                name="grand_total" readonly id="grand_total"
                                                                style="background-color: #e9ecef;"></td>
                                                        {{-- </tr>
                                                        <td colspan="5" class="text-end" style="font-size:15px;color:black">Paid
                                                            Amount
                                                            <span class="text-danger">*</span>
                                                        </td>
                                                        <td><input type="text" class="form-control paid_amount"
                                                                value="{{ $QuotationData->paid_amount }}"
                                                                name="paid_amount" required id="paid_amount"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text-end" style="font-size:15px;color:black">Balance
                                                        </td>
                                                        <td> <input type="text" class="form-control balance_amount"
                                                                value="{{ $QuotationData->balance_amount }}"
                                                                name="balance_amount" style="background-color: #e9ecef;"
                                                                id="balance_amount" readonly></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end" style="margin-top:3%">
                            <input type="submit" class="btn btn-primary" onclick="quotationubmitForm(this);" />
                            <a href="{{ route('quotation.index') }}" class="btn btn-primary cancel me-2">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
