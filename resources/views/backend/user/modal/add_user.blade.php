<div class="modal fade" id="user" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('AddUser') }}" method="post" accept-charset="utf-8" id="useradd">
                      @csrf
                      
                          <div class="form-group">
                          <label style="color:white">User Role</label>
                          <select class="form-control @error('user_roll') is-invalid @enderror" name="user_roll" id="user_roll">
                            <option disabled="" selected="">----Select Once---</option>
                            <option value="1">Admin</option>
                            <option value="4">Operator</option>
                            
                          </select>

                           @error('user_roll')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>


                            <div class="form-group">
                          <label style="color:white">User Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter User Name..............">

                           @error('name') 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>

                             <div class="form-group">
                          <label style="color:white">Email</label>
                           <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter User email..............">

                           @error('email')
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