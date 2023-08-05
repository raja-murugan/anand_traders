@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Quotation</h6>
            <div class="list-btn">
                  <ul class="filter-list">
                     <li>
                     <a class="btn btn-primary" href="{{ route('quotation.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Quotation</a>
                     </li>
                  </ul>
               </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-center table-hover datatable table-striped">
                           <thead class="thead-light">
                              <tr>
                                 <th>S.No</th>
                                 <th>Quotation Number</th>
                                 <th>Date</th>
                                 <th>Customer</th>
                                 <th>Total</th>
                                 <th>Paid</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($data as $keydata => $Quotationdata)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $Quotationdata->quotation_number }}</td>
                                 <td>{{ $Quotationdata->date }}</td>
                                 <td>{{ $Quotationdata->customer_id }}</td>
                                 <td>{{ $Quotationdata->grand_total }}</td>
                                 <td>{{ $Quotationdata->paid_amount }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          
                                       </li>
                                       <li>
                                          
                                       </li>
                                    </ul>
                                 
                                 </td>
                              </tr>

                             
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               
            </div>
         </div>
         


      </div>

   </div>
</div>
@endsection