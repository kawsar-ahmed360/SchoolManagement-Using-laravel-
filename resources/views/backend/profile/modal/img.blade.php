<div class="modal fade" id="imageUp" tabindex="-1" style="display: none"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             <div class="card">
                <div class="card-body">
                       
                    <form action="{{ route('profileChange') }}" method="post" accept-charset="utf-8" id="profile" enctype="multipart/form-data">
                      @csrf
                          

                          <div class="form-group">
                          <label style="color:white">Old Image</label>
                           <img src="{{ $user->image?url('public/backend/profile/'.$user->image):url('public/pro.jpg') }}" width="100px" alt="">
                       </div> 

                      
                        <div class="form-group">
                          <label style="color:white">Image</label>
                          <input type="file" class="form-control" name="image" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                       </div> 

                       <div class="form-group">
                          <label style="color:white">Preview Image</label>
                          <img id="blah" alt="your image" width="100" height="100" />
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