
@if($alldata)

<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>

                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                            
                                                <th>ID No</th>
                                                <th>Roll</th>
                                                <th>Year</th>
                                                @if(@Auth::user()->user_roll=='1')
                                                  <th>Code</th>
                                                @endif
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody id="examnew">
                                                  
                                            @php($sl=1)
                                                 @foreach($alldata as $a)
                                                  <tr style="text-align: center">
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $a->name }}</td>
                                                    <td>{{ $a->class_name }}</td>
                                                    <td>{{ $a->id_no }}</td>
                                                    <td>{{ $a->id }}</td>
                                                    <td>{{ $a->session }}</td>
                                                     @if(@Auth::user()->user_roll=='1')

                                                      <td>{{ $a->code }}</td>
                                                     @endif
                                                    <td><img src="{{ url('public/backend/student_profile/'.$a->image) }}" width="50px" style="border-radius: 7px;" alt=""></td>
                                                    <td>
                                                      <a href="{{ route('Student_regEditeajax',$a->student_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                      <a href="{{ route('Student_promotion',$a->student_id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></a>
                                                      <a title="Details pdf" href="{{ route('Student_details',$a->student_id) }}" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                  </tr>
                                                 @endforeach 
                                       
                                               {{-- @include('backend/exam_type/view_exam_ajax') --}}


                                            </tbody>
                                        </table>

@else
<span style="font-size: 20px;color:red;text-align: center">data not fount</span>
@endif

                                        