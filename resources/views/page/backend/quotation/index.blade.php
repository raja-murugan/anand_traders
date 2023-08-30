@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
         <a href="{{ route('quotation.create') }}" class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add
                        Quotation</a>
            <div class="list-btn">
                  <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('quotation.datefilter') }}">
                            @method('PUT')
                            @csrf
                            <div style="display: flex">
                                 <div style="margin-right: 10px;">
                                       <select class="form-control" name="quotaiontype" id="quotaiontype">
                                          <option value="none">Status</option>
                                          <option value="converted Quotation">converted Quotation</option>
                                          <option value="Non converted Quotation">Non converted Quotation</option>
                                       </select>
                                 </div>
                                 <div style="margin-right: 10px;"><input type="date" name="from_date"
                                        class="form-control from_date" value="{{ $today }}"></div>
                                <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                        value="Search" /></div>
                            </div>
                        </form>
                        
                    </div>
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
                                 <td># {{ $Quotationdata['quotation_number'] }}</td>
                                 <td>{{ date('d-m-Y', strtotime($Quotationdata['date'])) }}</td>
                                 <td>{{ $Quotationdata['customer'] }}</td>
                                 <td>₹ {{$Quotationdata['grand_total'] }}.00</td>
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
                                       @if ($Quotationdata['status'] != 1)
                                             <a href="{{ route('quotation.convertbill', ['unique_key' => $Quotationdata['unique_key']]) }}" 
                                             class="badge bg-primary-light" style="color:#28084b;">Convert to Bill</a>
                                       @else
                                             <a class="badge" style="color:#28084b;background-color:#e5e5e5;">Bill Converted</a>
                                        @endif
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
