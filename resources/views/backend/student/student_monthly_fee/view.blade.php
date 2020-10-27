@extends('backend/master')

@section('content')


  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Student Monthly Fee</h4>

                              

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
                                                    <label>Month <span style="color:Red">*</span></label>
                                                    <select class="form-control form-control-sm" name="month" id="month">
                                                        <option selected="" disabled="">---Select Month--</option>
                                                      
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="Nobember">Nobember</option>
                                                        <option value="December">December</option>
                                                     
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
  
   <table class="table-bordered table-striped table-sm" width="100%">

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
    var month = $('#month').val();

    if (class_id && session_id && month) {
      $.ajax({
        url:"{{ route('StudentMonthlyAjax') }}",
        type:"GET",
        data:{class_id:class_id,session_id:session_id,month:month},

        success:function(data){
          
           var sourch = $('#DocumentFull').html();
           var template = Handlebars.compile(sourch);
           var html = template(data);
           $('#DocumentResult').empty().html(html);

        }
      });
    }
  });
</script>

@endsection