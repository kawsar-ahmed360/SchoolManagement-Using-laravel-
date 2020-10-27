@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Student Registation Fee</h4>

                              

                                        <div class="card">
                                           <div class="card-body">
                                   
                                              <div class="form-row">
                                                 <div class="form-group col-md-5">
                                                    <label>Class Name <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                                                        <option selected disabled="">---Select Class--</option>
                                                        @foreach($class as $c)
                                                          <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-5">
                                                    <label>Session Name <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="session_id" id="session_id">
                                                        <option selected="" disabled="">---Select session--</option>
                                                        @foreach($year as $y)
                                                          <option value="{{ $y->id }}">{{ $y->session }}-{{ $y->session+1 }}</option>
                                                        @endforeach
                                                    </select>
                                                 </div>

                                                 <div class="form-group col-md-2" style="padding-top: 30px">
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

   <script id="Documnet_template" type="text/x-handlebars-template">
                                               <table id="datatable" class="table-sm table-bordered table-striped" width="100%">
                                                 <thead>
                                                    <tr>
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

    // alert(session_id);

    if (class_id && session_id) {

      $.ajax({
        url:"{{ route('StudentRegisAjax') }}",
        type:"GET",
        data:{class_id:class_id,session_id:session_id},
         
         beforesend:function(){

         },
        success:function(data){
          
          var sourch = $('#Documnet_template').html();
          var template = Handlebars.compile(sourch);
          var html = template(data);

          $('#DocumentResult').empty().html(html);
           $('[data-toggle="tooltip"]').tooltip();
        }
      });
    }
  });
</script>
  


@endsection