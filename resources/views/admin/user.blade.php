@extends('admin.layout.main')


@section('content')
    <div class="content">
        <!-- Simple panel -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">User<a class="heading-elements-toggle"></a></h5><br>
                

               
                
                
                

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                       
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                 
                  
                      
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{$user->name}}</td>
                        
                            <td>{{$user->email}}</td>
                    
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href=""><i class="icon-eye"></i>
                                                View</a></li>
                                        <li><a href=""><i class="icon-pencil"></i>
                                                Edit</a></li>
                                        <li><a href=""><i
                                                    class="icon-trash"></i> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </div>

   
    

    
@endsection
