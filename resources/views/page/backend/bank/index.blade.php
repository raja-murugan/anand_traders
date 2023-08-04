@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h5>Bank</h5>
            <div class="list-btn">
               <ul class="filter-list">
                  <li>
                     <a class="btn btn-primary" href="add-customer.html"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-8">
            <div class="card-table">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-center table-hover datatable">
                        <thead class="thead-light">
                           <tr>
                              <th>S.No</th>
                              <th>Bank</th>
                              <th>Note</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-4"></div>
      </div>

   </div>
</div>
@endsection