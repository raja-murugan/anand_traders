@extends('layout.backend.auth')

@section('content')




<div class="page-wrapper">
   <div class="content container-fluid">


      <div class="page-header">
         <div class="content-page-header">
            <h6>Add Quotation</h6>
         </div>
      </div>


      <div class="row">
         <div class="col-md-12">
            <div class="quotation-card">
               <div class="card-body">

                     


                     <div class="form-group-item border-0 mb-0">
                        <div class="row align-item-center">

                           <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Quotation Number</label>
                                 <input type="text" readonly class="form-control" name="quotation_number" id="quotation_number" value="{{$quotation_no}}">
                              </div>
                           </div>

                           <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Select Customer <span class="text-danger">*</span></label>
                                       <select class="form-control select customer_id js-example-basic-single" name="customer_id" id="customer_id">
                                          <option value="" disabled selected hiddden>Select Customer</option>
                                             @foreach ($customer as $customers)
                                                <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                                             @endforeach 
                                       </select>
                              </div>
                           </div>


                           <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label> Date <span class="text-danger">*</span></label>
                                 <input type="date" class="datetimepicker form-control" placeholder="Select Date" value="{{$today}}" name="date" id="date">
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Time <span class="text-danger">*</span></label>
                                 <input type="time" class="datetimepicker form-control" placeholder="Select Date" value="{{$timenow}}" name="time" id="time">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12">
                              <div class="form-group">
                                 <label>Note <span class="text-danger">*</span></label>
                                 <input type="text" class=" form-control" placeholder="Enter Notes"  name="add_on_note" id="add_on_note">
                              </div>
                           </div>
                        </div>

                       
                     </div>



                     <div class="form-group-item">
                        <div class="card-body">
                           <div class="card-table">
                              <div class="table-responsive no-pagination">
                                 <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                       <tr>
                                          <th style="width:8%">S.No</th>
                                          <th style="width:23%">Product</th>
                                          <th style="width:17%">Quantity</th>
                                          <th style="width:17%">Rate / Quantity</th>
                                          <th style="width:25%">Total</th>
                                          <th style="width:6%">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody class="product_fields">
                                       <tr>
                                          <td><input id="#" name="#" class="auto_num form-control" type="text" value="1" readonly /></td>
                                          <td><input type="hidden" id="quotation_detail_id" name="quotation_detail_id[]" />
                                                <select class="form-control  product_id select js-example-basic-single" name="product_id[]"
                                                   id="product_id1"required>
                                                   <option value="" selected hidden class="text-muted">Select Product
                                                   </option>
                                                   @foreach ($product as $products)
                                                      <option value="{{ $products->id }}">{{ $products->name }}
                                                      </option>
                                                   @endforeach
                                                </select></td>
                                          <td><input type="text" class="form-control quantity" id="quantity" name="quantity[]" value="" required /></td>
                                          <td><input type="text" class="form-control rateper_quantity" id="rateper_quantity" name="rateper_quantity[]"  value="" required /></td>
                                          <td><input type="text" class="form-control product_total" readonly id="product_total"style="background-color: #e9ecef;" name="product_total[]" placeholder="Total" /></td>
                                          <td><button style="width: 40px;"class="py-1 text-white font-medium rounded-lg text-sm  text-center btn btn-primary addproductfields"
                                                type="button" id="" value="Add">+</button></td>
                                       </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                          <td></td><td></td><td></td><td class="text-end" style="font-size:15px;color:black">Total</td>
                                          <td><input type="text" class="form-control sub_total" style="background-color: #e9ecef;"
                                                name="sub_total"  required id="sub_total" readonly></td>
                                       </tr>
                                    </tbody>
                                    <tbody>
                                       <tr>
                                          <td></td><td></td><td></td><td class="text-end" style="font-size:15px;color:black">Discount Price</td>
                                          <td><input type="text" class="form-control discount_price"name="discount_price"   id="discount_price" placeholder="Discount Price"></td>
                                       </tr>
                                    </tbody>
                                    <tbody>
                                       <tr>
                                          <td></td><td></td><td></td><td class="text-end" style="font-size:15px;color:black">Overall Amount</td>
                                          <td><input type="text" class="form-control overallamount"name="overallamount"  style="background-color: #e9ecef;"  id="overallamount" readonly></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>

                           </div>

                        </div>
                     </div>





                              <div class="row">
                                 <div class="col-lg-2 col-md-2 col-sm-2"></div>
                                 <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                       <label>Tax % </label>
                                       <input type="text" class="form-control tax_percentage"name="tax_percentage"   id="tax_percentage" placeholder="Tax %">
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                       <label>Tax Amount</label>
                                       <input type="text" class="form-control tax_amount" name="tax_amount"   id="tax_amount" placeholder="Tax Amount">
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                       <label>Final Amount</label>
                                       <input type="text" class="form-control tax_productamount" name="tax_disproductamount"   id="tax_disproductamount" readonly style="background-color: #e9ecef;">
                                    </div>
                                 </div>
                              </div>


                              <div class="form-group-item">
                                 <div class="row">
                                    <div class="col-xl-2 col-lg-12"></div>
                                    <div class="col-xl-10 col-lg-12">

                                          <div class="row align-items-center">
                                             
                                             <div class="table-responsive no-pagination">
                                                <table class="table table-center table-hover datatable">
                                                   <thead class="thead-light">
                                                      <tr>
                                                         <th style="width: 60%" >Note</th>
                                                         <th style="width:30%">Extra Cost</th>
                                                         <th style="width:10%"></th>
                                                      </tr>
                                                   </thead>
                                                   <tbody class="extracost_tr">
                                                      <tr>
                                                         <td><input type="text" class="form-control"id="extracost_note" placeholder="Note" value=""name="extracost_note[]" />
                                                         </td>
                                                         <td><input type="hidden" name="extracost_id[]"/>
                                                            <input type="text" class="form-control extracost" id="extracost"placeholder="Extra Cost"  name="extracost[]"value="" />
                                                         </td>
                                                         <td><button style="width: 40px;"class="py-1 addextranotefields text-white font-medium rounded-lg text-sm  
                                                               text-center btn btn-primary" type="button" id="" value="Add">+</button></td>
                                                      </tr>
                                                   </tbody>
                                                   <tbody>
                                                      <tr>
                                                         <td class="text-end" style="font-size:15px;color:black">Total</td>
                                                         <td><input type="text" class="form-control extracost_amount" name="extracost_amount" id="extracost_amount" readonly style="background-color: #e9ecef;"></td>
                                                      </tr>
                                                   </tbody>
                                                   <tbody>
                                                      <tr>
                                                         <td class="text-end" style="font-size:15px;color:black">Grand Total</td>
                                                         <td><input type="text" class="form-control grand_total" name="grand_total" readonly  id="grand_total" style="background-color: #e9ecef;"></td>
                                                      </tr>
                                                   </tbody>
                                                   
                                                   <tbody>
                                                      <tr>
                                                         <td class="text-end" style="font-size:15px;color:black">Paid Amount <span class="text-danger">*</span></td>
                                                         <td><input type="text" class="form-control paid_amount" name="paid_amount"   id="paid_amount"></td>
                                                      </tr>
                                                   </tbody>
                                                   <tbody>
                                                      <tr>
                                                         <td class="text-end" style="font-size:15px;color:black">Balance</td>
                                                         <td> <input type="text" class="form-control balance_amount" name="balance_amount"  style="background-color: #e9ecef;"  id="balance_amount" readonly></td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                    </div>
                                 </div>   
                              </div>

                                             
                     
                     <div class="text-end" style="margin-right:10%">
                        <a href="quotations.html" class="btn btn-primary">Save</a>
                        <a href="quotations.html" class="btn btn-primary cancel me-2">Cancel</a>
                     </div>

               </div>
            </div>
         </div>
      </div>



   </div>
</div>



@endsection