@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Bill</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                <form autocomplete="off" method="POST" action="{{ route('bill.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <input type="hidden" class="form-control quotation_id" name="quotation_id" id="quotation_id" value="{{ $QuotationData->id }}">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bill No <span class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control" name="billno" placeholder="Enter Bill No"
                                                            id="billno" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $QuotationData->date }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $QuotationData->time }}" name="time" id="time"
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
                                                                <option
                                                                    value="{{ $customers->id }}" @if ($customers->id === $QuotationData->customer_id) selected='selected' @endif>
                                                                    {{ $customers->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Bank <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select bank_id js-example-basic-single"
                                                            name="bank_id" id="bank_id" required>
                                                            <option value="" disabled selected hiddden>Select Bank
                                                            </option>
                                                            @foreach ($bank as $banks)
                                                                <option
                                                                    value="{{ $banks->id }}">{{ $banks->name }}</option>
                                                            @endforeach
                                                        </select>
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
                                                        <th style="width:14%"></th>
                                                        <th style="width:14%">Quantity</th>
                                                        <th style="width:14%">Cost Per Quantity</th>

                                                        <th style="width:20%">Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="">
                                                @foreach ($QuotationProducts as $index => $QuotationProduct)
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="{{ $index + 1 }}"
                                                                readonly />
                                                        </td>
                                                        <td colspan="2"><input type="hidden" id="bill_detail_id"
                                                                name="bill_detail_id[]" value="{{ $QuotationProduct->id }}"/>
                                                            <select class="form-control" disabled>
                                                                <option value="" selected hidden class="text-muted" >
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product as $products)
                                                                        <option
                                                                            value="{{ $products->id }}"@if ($products->id === $QuotationProduct->product_id) selected='selected' @endif>
                                                                            {{ $products->name }}
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="bill_product_id[]" id="bill_product_id" value="{{ $QuotationProduct->product_id }}"/>
                                                        </td>
                                                        <td><input type="text" class="form-control bill_quantity" readonly
                                                                id="bill_quantity" name="bill_quantity[]" value="{{ $QuotationProduct->quantity }}"  />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_rateper_quantity"
                                                                id="bill_rateper_quantity" name="bill_rateper_quantity[]" readonly
                                                                value="{{ $QuotationProduct->rateper_quantity }}"  /></td>
                                                        <td><input type="text" class="form-control bill_product_total"
                                                                readonly id="bill_product_total"
                                                                style="background-color: #e9ecef;" name="bill_product_total[]"
                                                                placeholder="Total" value="{{ $QuotationProduct->product_total }}"/></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <hr>
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                </thead>
                                                <tbody class="extracost_tr">
                                                @foreach ($QuotationExtracosts as $index => $QuotationExtracosts_arr)
                                                    <tr>
                                                        <td colspan="2" class="text-end"style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3">
                                                            <input type="hidden" id="billextracost_detail_id"name="billextracost_detail_id[]"value="{{ $QuotationExtracosts_arr->id }}" />
                                                            <input type="text" class="form-control"id="bill_extracost_note" readonly
                                                                placeholder="Note"
                                                                value="{{ $QuotationExtracosts_arr->extracost_note }}" name="bill_extracost_note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="extracost_id[]" />
                                                            <input type="text" class="form-control bill_extracost"
                                                                id="bill_extracost"placeholder="Extra Cost" readonly
                                                                name="bill_extracost[]" value="{{ $QuotationExtracosts_arr->extracost }}" />
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>


                                        <div class="row" style="margin-top:3%">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label>Discount Type</label>
                                                            <select class="select" name="bill_discount_type" id="bill_discount_type" required disabled>
                                                                <option value="">Select</option>
                                                                <option value="percentage"@if ('percentage' === $QuotationData->discount_type) selected='selected' @endif>Percentage(%)</option>
                                                                <option value="fixed"@if ('fixed' === $QuotationData->discount_type) selected='selected' @endif>Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control bill_discount" readonly value="{{ $QuotationData->discount }}" name="bill_discount" id="bill_discount" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tax</label>
                                                    <select class="select bill_tax_percentage" name="bill_tax_percentage" id="bill_tax_percentage" disabled>
                                                        <option>No Tax</option>
                                                        <option value="3"@if ('3' === $QuotationData->tax_percentage) selected='selected' @endif>GST - (3%)</option>
                                                        <option value="8"@if ('8' === $QuotationData->tax_percentage) selected='selected' @endif>GST - (8%)</option>
                                                        <option value="12"@if ('12' === $QuotationData->tax_percentage) selected='selected' @endif>GST - (12%)</option>
                                                        <option value="18"@if ('18' === $QuotationData->tax_percentage) selected='selected' @endif>GST - (18%)</option>
                                                        <option value="28"@if ('28' === $QuotationData->tax_percentage) selected='selected' @endif>GST - (28%)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="form-group-item border-0 p-0">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="form-group notes-form-group-info">
                                                            <label>Notes <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" placeholder="Enter Notes" name="bill_add_on_note" id="bill_add_on_note" required>{{ $QuotationData->add_on_note }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <p>Gross Amount <span class="bill_sub_total">₹  {{ $QuotationData->sub_total }} </span></p>
                                                                <input type="hidden" class="form-control bill_sub_total" name="bill_sub_total" id="bill_sub_total" value="{{ $QuotationData->sub_total }}">

                                                                <p>Discount <span class="bill_discount_price">₹  {{ $QuotationData->discount_price }} </span></p>
                                                                <input type="hidden" class="form-control bill_discount_price"name="bill_discount_price"id="bill_discount_price" value="{{ $QuotationData->discount_price }}">

                                                                <p>Total <span class="bill_total_amount">₹  {{ $QuotationData->total_amount }} </span></p>
                                                                <input type="hidden" class="form-control bill_total_amount"name="bill_total_amount"id="bill_total_amount" value="{{ $QuotationData->total_amount }}">

                                                                <p>Tax Amount <span class="bill_tax_amount">₹  {{ $QuotationData->tax_amount }}  </span></p>
                                                                <input type="hidden" class="form-control bill_tax_amount"name="bill_tax_amount"id="bill_tax_amount" value="{{ $QuotationData->tax_amount }}">
                                                                
                                                                <p>Extra Cost <span class="bill_extracost_amount">₹  {{ $QuotationData->extracost_amount }} </span></p>
                                                                <input type="hidden" class="form-control bill_extracost_amount" name="bill_extracost_amount" id="bill_extracost_amount" value="{{ $QuotationData->extracost_amount }}">

                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Grand Total <span class="">₹  {{ $QuotationData->grand_total }} </span></h4>
                                                                
                                                                <input type="hidden" class="form-control bill_grand_total" name="bill_grand_total" id="bill_grand_total" value="{{ $QuotationData->grand_total }}">

                                                               
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Paid Amount <span class=""><input type="text" class="form-control bill_paid_amount"  name="bill_paid_amount" id="bill_paid_amount" placeholder="Paid Amount"> </span></h4>
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Balance<span class="bill_balance_amount"> </span>
                                                                <input type="hidden" class="form-control bill_balance_amount"  name="bill_balance_amount" id="bill_balance_amount" ></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    @endsection
