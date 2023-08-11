<form autocomplete="off" method="POST" action="{{ route('bank.store') }}">
    @csrf
       <div class="card">
          <div class="card-body">
             <div class="form-group-item">

                   <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Bank<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Bank Name">
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Note</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Enter Note"></textarea>
                         </div>
                      </div>
                   </div>
                   <div class="add-customer-btns text-end">
                      <button type="submit" class="btn customer-btn-save">Save</button>
                   </div>
             </div>
          </div>
       </div>
    </form>
