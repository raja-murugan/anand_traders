@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Update Purchase</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                <form autocomplete="off" method="POST"
                                    action="{{ route('purchase.update', ['unique_key' => $PurchaseData->unique_key]) }}"enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Purchase Number</label>
                                                        <input type="text" readonly  class="form-control" placeholder="Enter Purchase No"name="purchase_number" value="{{ $PurchaseData->purchase_number }}"
                                                            id="purchase_number" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Voucher Number</label>
                                                        <input type="text"  class="form-control" placeholder="Enter Voucher No"name="vocher_number" value="{{ $PurchaseData->vocher_number }}"
                                                            id="vocher_number" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $PurchaseData->date }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $PurchaseData->time }}" name="time" id="time"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Vendor <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select purchasevendor_id js-example-basic-single"
                                                            name="vendor_id" id="vendor_id" required>
                                                            <option value="" disabled selected hiddden>Select Vendor
                                                            </option>
                                                            @foreach ($vendor as $vendors)
                                                                <option value="{{ $vendors->id }}"@if ($vendors->id === $PurchaseData->vendor_id) selected='selected' @endif>{{ $vendors->name }}
                                                                </option>
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
                                                                    value="{{ $banks->id }}"@if ($banks->id === $PurchaseData->bank_id) selected='selected' @endif>{{ $banks->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive no-pagination">
                                            <table class="table table-center table-hover datatable">
                                            <button class="btn btn-primary form-plus-btn addpurchaseproductfields" type="button" id="" value="Add">Add Products</button>
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width:8%">S.No</th>
                                                        <th style="width:23%">Product</th>
                                                        <th style="width:14%"></th>
                                                        <th style="width:14%">Quantity</th>
                                                        <th style="width:14%">Cost Per Quantity</th>

                                                        <th style="width:20%">Cost</th>
                                                        <th style="width:5%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="purchaseproduct_fields">
                                                @foreach ($PurchaseProducts as $index => $PurchaseProductsarr)
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="{{ $index + 1 }}"
                                                                readonly />
                                                        </td>
                                                        <td colspan="2"><input type="hidden" id="purchase_detail_id"
                                                                name="purchase_detail_id[]" value="{{ $PurchaseProductsarr->id }}"/>
                                                            <select
                                                                class="form-control  purchase_productid select js-example-basic-single"
                                                                name="purchase_productid[]" id="purchase_productid"required>
                                                                <option value="" selected hidden class="text-muted">
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product as $products)
                                                                        <option
                                                                            value="{{ $products->id }}"@if ($products->id === $PurchaseProductsarr->purchase_productid) selected='selected' @endif>
                                                                            {{ $products->name }}
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control purchase_quantity"
                                                                id="purchase_quantity" name="purchase_quantity[]" value="{{ $PurchaseProductsarr->purchase_quantity }}" required />
                                                        </td>
                                                        <td><input type="text" class="form-control purchase_rateperquantity"
                                                                id="purchase_rateperquantity" name="purchase_rateperquantity[]"
                                                                value="{{ $PurchaseProductsarr->purchase_rateperquantity }}" required /></td>
                                                        <td><input type="text" class="form-control purchase_producttotal"
                                                                readonly id="purchase_producttotal"
                                                                style="background-color: #e9ecef;" name="purchase_producttotal[]"
                                                                placeholder="Total" value="{{ $PurchaseProductsarr->purchase_producttotal }}"/></td>
                                                        <td>
                                                        <button class="btn btn-danger form-plus-btn purchaseremove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <hr>
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                <button class="btn btn-primary form-plus-btn addpurchaseextranotefields" type="button" id="" value="Add">Add Extra Cost</button>
                                                </thead>
                                                <tbody class="purchaseextracost_tr">
                                                @foreach ($PurchaseExtracosts as $index => $PurchaseExtracostsarr)
                                                    <tr>
                                                        <td colspan="2" class="text-end"style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3">
                                                            <input type="hidden" id="purchaseextracost_detail_id"name="purchaseextracost_detail_id[]"value="{{ $PurchaseExtracostsarr->id }}" />
                                                            <input type="text" class="form-control"id="purchase_extracostnote"
                                                                placeholder="Note"
                                                                value="{{ $PurchaseExtracostsarr->purchase_extracostnote }}" name="purchase_extracostnote[]" />
                                                        </td>
                                                        <td><input type="hidden" name="extracost_id[]" />
                                                            <input type="text" class="form-control purchase_extracost"
                                                                id="purchase_extracost"placeholder="Extra Cost"
                                                                name="purchase_extracost[]" value="{{ $PurchaseExtracostsarr->purchase_extracost }}" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger form-plus-btn remove-purchaseextratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button>
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
                                                            <select class="select" name="purchase_discounttype" id="purchase_discounttype" required>
                                                                <option value="">Select</option>
                                                                <option value="percentage"@if ('percentage' === $PurchaseData->purchase_discounttype) selected='selected' @endif>Percentage(%)</option>
                                                                <option value="fixed"@if ('fixed' === $PurchaseData->purchase_discounttype) selected='selected' @endif>Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control purchase_discount" value="{{ $PurchaseData->purchase_discount }}" name="purchase_discount" id="purchase_discount" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tax</label>
                                                    <select class="select purchase_taxpercentage" name="purchase_taxpercentage" id="purchase_taxpercentage">
                                                        <option>No Tax</option>
                                                        <option value="0"@if ('0' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>No Tax</option>
                                                        <option value="3"@if ('3' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>GST - (3%)</option>
                                                        <option value="8"@if ('8' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>GST - (8%)</option>
                                                        <option value="12"@if ('12' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>GST - (12%)</option>
                                                        <option value="18"@if ('18' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>GST - (18%)</option>
                                                        <option value="28"@if ('28' === $PurchaseData->purchase_taxpercentage) selected='selected' @endif>GST - (28%)</option>
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
                                                            <textarea class="form-control" placeholder="Enter Notes" name="purchase_addon_note" id="purchase_addon_note" required>{{ $PurchaseData->purchase_addon_note }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <p>Gross Amount <span class="purchasesubtotal">₹  {{ $PurchaseData->purchase_subtotal }} </span></p>
                                                                <input type="hidden" class="form-control purchase_subtotal" name="purchase_subtotal" id="purchase_subtotal" value="{{ $PurchaseData->purchase_subtotal }}">

                                                                <p>Discount <span class="purchasediscountprice">₹  {{ $PurchaseData->purchase_discountprice }} </span></p>
                                                                <input type="hidden" class="form-control purchase_discountprice"name="purchase_discountprice"id="purchase_discountprice" value="{{ $PurchaseData->purchase_discountprice }}">

                                                                <p>Total <span class="purchasetotalamount">₹  {{ $PurchaseData->purchase_totalamount }} </span></p>
                                                                <input type="hidden" class="form-control purchase_totalamount"name="purchase_totalamount"id="purchase_totalamount" value="{{ $PurchaseData->purchase_totalamount }}">

                                                                <p>Tax Amount <span class="purchasetaxamount">₹  {{ $PurchaseData->purchase_taxamount }}  </span></p>
                                                                <input type="hidden" class="form-control purchase_taxamount"name="purchase_taxamount"id="purchase_taxamount" value="{{ $PurchaseData->purchase_taxamount }}">
                                                                
                                                                <p>Extra Cost <span class="purchaseextracostamount">₹  {{ $PurchaseData->purchase_extracostamount }} </span></p>
                                                                <input type="hidden" class="form-control purchase_extracostamount" name="purchase_extracostamount" id="purchase_extracostamount" value="{{ $PurchaseData->purchase_extracostamount }}">

                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Grand Total <span class="purchasegrandtotal">₹  {{ $PurchaseData->purchase_grandtotal }} </span></h4>
                                                                <input type="hidden" class="form-control purchase_grandtotal" name="purchase_grandtotal" id="purchase_grandtotal" value="{{ $PurchaseData->purchase_grandtotal }}">
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Paid Amount <span class=""><input type="text" class="form-control purchase_paidamount"  name="purchase_paidamount" id="purchase_paidamount" placeholder="Paid Amount" value="{{ $PurchaseData->purchase_paidamount }}"> </span></h4>
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Balance<span class="purchasebalanceamount"> ₹  {{ $PurchaseData->purchase_balanceamount }}</span>
                                                                <input type="hidden" class="form-control purchase_balanceamount"  name="purchase_balanceamount" id="purchase_balanceamount" value="{{ $PurchaseData->purchase_balanceamount }}"></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="purchseubmitForm(this);" />
                                            <a href="{{ route('purchase.index') }}"
                                                class="btn btn-cancel btn-danger">Cancel</a>
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
