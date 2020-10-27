<div class="modal fade" id="fee" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fee Category Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('FeeCategorySave') }}" method="post" accept-charset="utf-8" id="feeadd">
                      @csrf
                      
                          <div class="form-group">
                          <label style="color:white">Fee Name </label>
                          <input type="text" class="form-control @error('fee_category') is-invalid @enderror" name="fee_category" id="fee_category" placeholder="Enter your fee_category..">

                           @error('fee_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                      




                   


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-danger btn-sm">Clear Data</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
                    </form>

                </div>
             </div>

      </div>
    </div>
  </div>
</div>