@extends('.admin.layout.main')

@section('content')
    <div class="content">
        <!-- Simple panel -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Truck Load Destination<a class="heading-elements-toggle"></a></h5><br>

                <a href="{{url('admin/addloads')}}"><button class="btn btn-primary marginData">Add load</button></a>                

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin Id</th>
                        <th>Pick up</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Weight</th>
                        <th>Distance</th>
                        <th>Truck Type</th>
                        <th>Price</th>
                        <th>Pre-meter-price</th>
                        <th>Prepare Load</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addload_view as $loaddetail)
                        
                    
                    <tr>
                        <td>{{$loaddetail->id}}</td>
                        <td>{{$loaddetail->admin_id}}</td>
                        <td>@if($loaddetail->pickup == 'date')
                            {{$loaddetail->date}}
                            @else
                            {{$loaddetail->pickup}}
                            @endif
                            </td>
                        <td>{{$loaddetail->origin}}</td>
                        <td>{{$loaddetail->destination}}</td>
                        <td>{{$loaddetail->weight}}</td>
                        <td>{{$loaddetail->distance}}</td>
                        <td>{{$loaddetail->truck_type}}</td>
                        <td>{{$loaddetail->price}}</td>
                        <td>{{$loaddetail->per_meter_price}}</td>
                        <td>{{$loaddetail->prepare_load}}</td>

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>

    </div>
@endsection
