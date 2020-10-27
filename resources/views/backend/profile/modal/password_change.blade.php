<div class="modal fade" id="passwordchange" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Password Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('pass_change') }}" method="post" accept-charset="utf-8" id="Editepass">
                      @csrf
                      
                          <div class="form-group">
                          <label style="color:white">Current Password</label>
                          <input type="password" class="form-control @error('current_pass') is-invalid @enderror" name="current_pass" id="current_pass" placeholder="Enter your current_pass..">
                            @error('current_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                       <div class="form-group">
                          <label style="color:white">New Password</label>
                          <input type="password" class="form-control @error('new_pass') is-invalid @enderror" name="new_pass" id="new_pass" placeholder="Enter your new_pass.">

                           @error('new_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                        <div class="form-group">
                          <label style="color:white">Confirm Password</label>
                          <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Enter your confirm.">
                       </div> 


                       <input type="hidden" value="{{ $user->id }}" name="UserId" id="UserId">


                     {{--   <div class="form-group">
                          <label style="color:white">Address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address.">
                       </div> --}}


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