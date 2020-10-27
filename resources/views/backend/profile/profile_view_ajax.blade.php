   <div class="image text-center">
                                       <img src="{{ $user->image?url('public/backend/profile/'.$user->image):url('public/pro.jpg') }}" width="300px" style="border-radius: 7px" alt="">
                                         
                                         <h3 style="margin-top: 5px">@if($user->user_roll=='1')
                                         <span class="badge badge-success">Admin</span>
                                         @elseif($user->user_roll=='2')
                                         <span class="badge badge-warning">User</span>
                                         @elseif($user->user_roll=='3')
                                         <span class="badge badge-danger">Student</span>
                                         @endif</h3>

                                       <h4>Popuar Soft</h4>
                                       <p>Feni town</p>                   		
                                  </div>

                                  <table class="table table-bordered">
                                  	<tr style="text-align: center"><th>Name </th> <td>{{ $user->name }}</td></tr>
                                  	<tr style="text-align: center"><th>Email </th> <td>{{ $user->email }}</td></tr>
                                  	<tr style="text-align: center"><th>Number </th> <td>{{ $user->number }}</td></tr>
                                  	<tr style="text-align: center"><th>Address </th> <td>{{ $user->address }}</td></tr>
                                  	<tr><th colspan="2" style="text-align: center">
                                  		<button onclick="edite_profile('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}','{{ $user->mobile }}','{{ $user->address }}')" class="btn btn-success btn-sm">Edite Profile</button>
                                  		<button onclick="change('{{ $user->id }}')" class="btn btn-danger btn-sm">Password Change</button>
                                  		<button onclick="image('{{ $user->id }}')" class="btn btn-dark btn-sm">Upload Image</button>
                                  	</th></tr>
                                  </table> 