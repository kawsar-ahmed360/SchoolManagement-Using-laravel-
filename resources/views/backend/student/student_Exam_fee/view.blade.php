@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Student Exam Fee</h4>

                              

                                        <div class="card">
                                           <div class="card-body">
                                   
                                              <div class="form-row">
                                                 <div class="form-group col-md-4">
                                                    <label>Class Name <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                                                        <option selected disabled="">---Select Class--</option>
                                                        @foreach($class as $c)
                                                          <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                    <label>Session Name <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="session_id" id="session_id">
                                                        <option selected="" disabled="">---Select session--</option>
                                                        @foreach($year as $y)
                                                          <option value="{{ $y->id }}">{{ $y->session }}-{{ $y->session+1 }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-3">
                                                    <label>Exam Name <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="exam_id" id="exam_id">
                                                        <option selected="" disabled="">---Select Exam--</option>
                                                      
                                                         @foreach($exam as $e)
                                                          <option value="{{ $e->id }}">{{ $e->exam_name }}</option>
                                                         @endforeach
                                                     
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-1" style="padding-top: 30px">
                                                     <a id="Search" class="btn btn-success btn-sm">Search</a>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                 
                                       
                                       <div class="card">
                                          <div class="card-body">
                                             <div id="DocumentResult">
                                               
                                             </div>

                                          </div>
                                       </div>



                                          
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection

{{-- @include('backend/exam_type/modal/add_exam') --}}
{{-- @include('backend/exam_type/modal/edite') --}}
@section('footer')

<script id="DocumentFull" type="text/x-handlebars-template">
  
   <table class="table-sm table-striped table-bordered" width="100%">
     <thead>
       <tr style="text-align:center">
         @{{{thsourch}}}
       </tr>
     </thead>
     <tbody>
      @{{#each this}}
       <tr style="text-align:center">
       @{{{tdsourch}}}
       </tr>

       @{{/each}}
     </tbody>
   </table>

</script>


<script type="text/javascript">
  
  $(document).on('click','#Search',function(){
   var class_id = $('#class_id').val();
   var session_id = $('#session_id').val();
   var exam_id = $('#exam_id').val();

   if (class_id && session_id && exam_id) {
    
     $.ajax({
      url:"{{ route('StudentExamAjax') }}",
      type:"GET",
      data:{class_id:class_id,session_id:session_id,exam_id:exam_id},

      success:function(data){
        
        var sourch = $('#DocumentFull').html();
        var template = Handlebars.compile(sourch);
        var html = template(data);
        $('#DocumentResult').html(html);

      }
     });


   }else{
    alert('any item not selected please check this page!!!!!!');
   }
  });
</script>

@endsection