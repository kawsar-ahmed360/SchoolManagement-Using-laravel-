 @extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add Assing Subject form  <a href="{{ route('AssignSubjectview') }}" style="margin-left: 8px;" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> View Assing subject</a></h4>
                                           
                                            <form action="{{ route('AssignSubjectSave') }}" method="post" accept-charset="utf-8">
                                                @csrf
                                                      <div class="full_item">
                                                  <div class="form-row">
                                               
                                               <div class="form-group col-md-5">
                                                   <label>Class Name</label>
                                                   <select class="form-control" name="class_id" id="class_id">
                                                       <option disabled="" selected="">--Select Class--</option>

                                                       @foreach($class as $c)
                                                       <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>

                                          </div>


                                          <div class="form-row">
                                               <div class="form-group col-md-4">
                                                   <label>Subject Name</label>
                                                   <select class="form-control" name="subject_id[]" id="">
                                                      
                                                       <option selected="" disabled="">---Select Subject--</option>
                                                       @foreach($subject as $s)
                                                       <option value="{{ $s->id }}">{{ $s->subject }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Full Mark</label>
                                                    <input type="text" class="form-control" name="full_mark[]" id="" placeholder="full mark.....">
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Pass Mark</label>
                                                    <input type="text" class="form-control" name="pass_mark[]" id="" placeholder="pass_mark.....">
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Get Mark</label>
                                                    <input type="text" class="form-control" name="get_mark[]" id="" placeholder="get_mark.....">
                                               </div>

                                               <div class="form-group col-md-2" style="padding-top: 33px">
                                                  <span class="btn btn-success btn-sm addmoreevent"><i class="fa fa-plus-circle"></i></span>
                                               </div>
                                          </div>

                                    </div>

                                    <button type="submit" class="btn btn-success btn-sm">All submit</button>
                                            </form>
                                          
                                        </div>
                                </div>
                            </div> <!-- end col -->
                        </div>


                      <div style="visibility: hidden;">
                          <div class="whole_addmoreevent_tt"  id="whole_addmoreevent_tt">
                                   <div class="whole_addmoreevent_remove" id="whole_addmoreevent_remove">
                                          <div class="form-row">
                                               <div class="form-group col-md-4">
                                                   <label>Subject Name</label>
                                                   <select class="form-control" name="subject_id[]" id="">
                                                       <option selected="" disabled="">---Select Subject--</option>
                                                       @foreach($subject as $s)
                                                       <option value="{{ $s->id }}">{{ $s->subject }}</option>
                                                       @endforeach
                                                   </select>
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Full Mark</label>
                                                    <input type="text" class="form-control" name="full_mark[]" id="" placeholder="full mark.....">
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Pass Mark</label>
                                                    <input type="text" class="form-control" name="pass_mark[]" id="" placeholder="pass_mark.....">
                                               </div>

                                                <div class="form-group col-md-2">
                                                   <label>Get Mark</label>
                                                    <input type="text" class="form-control" name="get_mark[]" id="" placeholder="get_mark.....">
                                               </div>

                                                    <div class="form-group col-md-2" style="padding-top: 33px">
                                                   <div class="form-row">
                                                  <span style="margin-right: 9px;" class="btn btn-success btn-sm addmoreevent"><i class="fa fa-plus-circle"></i></span>
                                                  <span class="btn btn-danger btn-sm addremove"><i class="fa fa-minus-circle"></i></span>
                                                </div>
                                               </div>
                                          </div>               
                                 </div>                 
                            </div>                 
                      </div>                      

@endsection

{{-- @include('backend/exam_type/modal/add_exam') --}}
{{-- @include('backend/exam_type/modal/edite') --}}
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
        var counter = 0;
        $(document).on('click','.addmoreevent',function(){
        var full_html = $('.whole_addmoreevent_tt').html();
        $(this).closest('.full_item').append(full_html);
        counter++;
        });

        $(document).on('click','.addremove',function(){
            $(this).closest('.whole_addmoreevent_remove').remove();
            counter-=1
        });
    });
</script>
@endsection