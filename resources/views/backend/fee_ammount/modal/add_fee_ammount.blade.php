@extends('backend/master')

@section('content')

        
             <div class="card">
                <div class="card-body">

                             <h4 class="card-title">Fee Ammount Form  <a href="{{ route('FeeAmmountview') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>fee ammount list</a></h4>
                   
                      
                   <form action="{{ route('FeeAmmountSave') }}" method="post" accept-charset="utf-8">
                      @csrf

                         <div class="add_item">
                          <div class="form-row">

                             <div class="form-group col-md-4">
                                  <label>Fee Category</label>
                                  <select class="form-control" name="fee_category_id" id="fee_category_id">
                                    <option disabled="" selected="">---fee category--</option>
                                   @foreach($feecategory as $f)
                                     <option value="{{ $f->id }}">{{ $f->fee_category }}</option>
                                   @endforeach
                                  </select>
                                  <span style="color:red">{{ ($errors->has('fee_category_id'))?($errors->first('fee_category_id')):"" }}</span>
                               </div>


                               <div class="form-group col-md-3">
                                  <label>Class Name</label> 
                                  <select class="form-control" name="class_id[]" id="class_id">
                                    <option disabled="" selected="">---Select Class--</option>
                                     @foreach($class as $c)
                                           <option value="{{ $c->id }}">{{ $c->class_name }}</option>}
                                           
                                     @endforeach
                                  </select>
                                   <span style="color:red">{{ ($errors->has('class_id'))?($errors->first('class_id')):"" }}</span>
                               </div>

                                  <div class="form-group col-md-4">
                                  <label>Ammount</label>
                                   <input type="text" class="form-control" name="ammount[]" id="ammount" placeholder="Enter Ammount.........">

                                    <span style="color:red">{{ ($errors->has('ammount'))?($errors->first('ammount')):"" }}</span>
                               </div>


                                <div class="form-group col-md-1" style="padding-top: 33px">
                                   <span class="btn btn-success btn-sm addmoreitem"><i class="fa fa-plus-circle"></i></span>
                               </div>


                          </div>
                      </div>

                      <button type="submit" class="btn btn-success btn-sm">All Submit</button>
                     
                   </form>

                </div>
             </div>


           <div style="visibility: hidden">
                <div class="whole_extea_item" id="whole_extea_item">
                     <div class="delete_whole_extra_item" id="delete_whole_extra_item">
                        <div class="form-row">
                           <div class="form-group col-md-5">
                                  <label>Class Name</label> 
                                  <select class="form-control" name="class_id[]" id="class_id">
                                    <option disabled="" selected="">---Select Class--</option>
                                     @foreach($class as $c)
                                           <option value="{{ $c->id }}">{{ $c->class_name }}</option>}
                                           
                                     @endforeach
                                  </select>
                               </div>
                           
                              <div class="form-group col-md-5">
                                  <label>Ammount</label>
                                   <input type="text" class="form-control" name="ammount[]" id="ammount" placeholder="Enter Ammount.........">
                               </div>

                               <div class="form-group col-md-2" style="padding-top: 33px">
                                    <div class="form-row">
                                      <span style="margin-right: 6px" class="btn btn-success btn-sm addmoreitem"><i class="fa fa-plus-circle"></i></span>
                                  <span class="btn btn-danger btn-sm addmoreitemRemove"><i class="fa fa-minus-circle"></i></span>
                                    </div>
                               </div>

                        </div>
                     </div>
                </div>
             </div>  

@endsection

@section('footer')

 <script type="text/javascript">

  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','success') }}";

  switch(type){
    case "success":
    toastr.success("{{ Session::get('message') }}");
    break;
  }
  @endif
   
   $(function(){

      var counter =0;

      $(document).on('click','.addmoreitem',function(){
        var whole_add_item = $('.whole_extea_item').html();
        $(this).closest('.add_item').append(whole_add_item);
        counter++;
      });

      $(document).on('click','.addmoreitemRemove',function(event){
        $(this).closest('.delete_whole_extra_item').remove();
        counter-=1;
      });
   });

 </script>
@endsection