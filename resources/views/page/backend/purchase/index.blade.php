@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Purchase</h6>
            <div class="list-btn">
                  <ul class="filter-list">
                     <li>
                     <a class="btn btn-primary" href="{{ route('purchase.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Purchase</a>
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
                                 <th>Purchase Number</th>
                                 <th>Voucher Number</th>
                                 <th>Date</th>
                                 <th>Vendor</th>
                                 <th>Total</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($Purchasedata as $keydata => $Purchasedatas)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>#{{ $Purchasedatas['purchase_number'] }}</td>
                                 <td>{{ $Purchasedatas['vocher_number'] }}</td>
                                 <td>{{ date('d-m-Y', strtotime($Purchasedatas['date'])) }}</td>
                                 <td>{{ $Purchasedatas['vendor'] }}</td>
                                 <td>{{$Purchasedatas['purchase_grandtotal'] }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                             <a href="{{ route('purchase.edit', ['unique_key' => $Purchasedatas['unique_key']]) }}"
                                                   class="badge bg-warning-light" style="color:#28084b;">Edit</a>
                                       </li>
                                       <li>
                                             <a href="#purchasedelete{{ $Purchasedatas['unique_key'] }}" data-bs-toggle="modal"
                                             data-bs-target=".purchasedelete-modal-xl{{ $Purchasedatas['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>
                                 </td>
                              </tr>
                              <div class="modal fade purchasedelete-modal-xl{{ $Purchasedatas['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="purchasedeleteLargeModalLabel{{$Purchasedatas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.purchase.delete')
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
