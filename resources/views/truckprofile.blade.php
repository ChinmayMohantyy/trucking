
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12" style="margin-left: 971px;">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a href="/post-truck"><button class="btn btn-success">post truck</button></a>
			</li>
		</ul>
	</div>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<div class="row">
				<div class="form-group col-xl-12 col-lg-12 col-md-12 mb-2">
					<div class="table-responsive">
						<table class="table dash_list">
							<thead>
								<tr>
									<th scope="col"><input type="checkbox" aria-label="Checkbox for following text input"> Id</th>
									<th scope="col">Origin</th>
									<th scope="col">Destination</th>
									<th scope="col">Weight</th>
									<th scope="col">Length</th>
									<th scope="col">Truck</th>
									<th scope="col">Size</th>
									<th scope="col">Phone</th>
								</tr>
							</thead>
							<tbody>
							   @foreach ($truck_details as $truck)
								   
							  
								<tr>
									<td>{{$truck->id}}</td>
									<td>{{$truck->origin}}</td>
									<td>{{$truck->destination}}</td>
									<td>{{$truck->weight}}</td>
									<td>{{$truck->length}}</td>
									<td>{{$truck->truck_type}}</td>
									<td>{{$truck->desired_rate_per_mile}}</td>
									<td>{{$truck->phone}}</td>
								</tr>
								@endforeach	
							</tbody>
						</table>
						{{$truck_details->links()}}
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection
