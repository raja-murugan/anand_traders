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
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($quotation_data as $keydata => $Quotationdata)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>#{{ $Quotationdata['quotation_number'] }}</td>
                                 <td>{{ date('d-m-Y', strtotime($Quotationdata['date'])) }}</td>
                                 <td>{{ $Quotationdata['customer'] }}</td>
                                 <td>{{$Quotationdata['grand_total'] }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                             <a href="{{ route('quotation.edit', ['unique_key' => $Quotationdata['unique_key']]) }}"
                                                   class="badge bg-warning-light" style="color:#28084b;">Edit</a>
                                       </li>
                                       <li>
                                             <a href="#quotationdelete{{ $Quotationdata['unique_key'] }}" data-bs-toggle="modal"
                                             data-bs-target=".quotationdelete-modal-xl{{ $Quotationdata['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                       <li>
                                             <a href="{{ route('quotation.convertbill', ['unique_key' => $Quotationdata['unique_key']]) }}"
                                             class="badge bg-primary-light" style="color:#28084b;">Convert to Bill</a>
                                       </li>
                                       <li>
                                            <a href="{{ route('quotation.convertbill', ['unique_key' => $Quotationdata['unique_key']]) }}"
                                            class="badge bg-info" style="color:#28084b;">Print</a>
                                       </li>
                                    </ul>
                                 </td>
                              </tr>
                              <div class="modal fade quotationdelete-modal-xl{{ $Quotationdata['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="quotationdeleteLargeModalLabel{{$Quotationdata['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.quotation.delete')
                              </div>

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
