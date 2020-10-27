    @foreach($user as $u)
                                              <tr style="text-align: center">
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->email }}</td>
                                                <td>{{ $u->number }}</td>
                                                <td>{{ $u->code }}</td>
                                                <td>{{ $u->address }}</td>
                                                <td>
                                                    @if($u->user_roll=='1')
                                                    <span class="badge badge-success">Admin</span>
                                                    @elseif($u->user_roll=='2')
                                                    <span class="badge badge-warning">Student</span>
                                                    @elseif($u->user_roll=='3')
                                                    <span class="badge badge-danger">Employ</span>
                                                    @elseif($u->user_roll=='4')
                                                    <span class="badge badge-danger">Operator</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button onclick="dele('{{ $u->id }}')" style="border-radius: 4px;color:red" type="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                          @endforeach