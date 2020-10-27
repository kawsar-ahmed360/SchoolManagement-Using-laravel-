<div class="modal fade" id="exampleModal" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Edite</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('profile_update') }}" method="post" accept-charset="utf-8" id="Editepro">
                      @csrf
                      
                          <div class="form-group">
                          <label style="color:white">User Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name..">
                       </div>

                       <div class="form-group">
                          <label style="color:white">Email</label>
                          <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email.">
                       </div>

                        <div class="form-group">
                          <label style="color:white">Number</label>
                          <input type="text" class="form-control" name="number" id="number" placeholder="Enter your number.">
                       </div> 


                       <input type="hidden" value="{{ $user->id }}" name="UserId" id="UserId">


                       <div class="form-group">
                          <label style="color:white">Address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address.">
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