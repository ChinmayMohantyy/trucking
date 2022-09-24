@extends('.admin.layout.main')
@section('content')
    <form action="{{url('/admin/save-addload') }}" method="POST">
        @csrf
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"></h5>
                <div class="heading-elements">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group " style="margin-left: 2%;">
                        <label class="display-block">Pickup:</label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="pickup" id="pickup" value="ASAP"
                                onclick="show1();">
                            ASAP
                        </label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="pickup" id="pickup" checked="checked"
                                value="date" onclick="show2();">
                            Date
                        </label>

                    </div>
                </div>

                <div class="col-md-6" id="bonddiv">
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" id=""
                            value="">
                    </div>
                </div>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>origin:</label>
                            <input type="text" required class="form-control" placeholder="origin"name="origin"
                                id="origin" value="">
                        </div>


                        <div class="form-group">
                            <label>weight</label>
                            <input type="text" class="form-control" placeholder="weight" required name="weight"
                                value="" id="weight">
                        </div>

                        <div class="form-group">
                            <label>Truck Type:</label>
                            <select data-placeholder="Select your state" class="select form-control" id="truck_type"
                                name="truck_type" value="">
                                <option></option>
                                <optgroup label="truck_1">
                                    <option value="Flatbed">Flatbed</option>
                                    <option value="Van">Van</option>
                                    <option value="Reefer">Reefer</option>
                                    <option value="Step Deck">Step Deck</option>
                                    <option value="Power Only">Power Only</option>
                                    
                                  
                                </optgroup>
                                <optgroup label="other">
                                    <option value="Lowboy">Lowboy</option>
                                    <option value="RGN">RGN</option>
                                    <option value="Conestoga">Conestoga</option>
                                    <option value="Double Drop">Double Drop</option>                                   
                                    <option value="Auto Carrier">Auto Carrier</option>
                                    <option value="Dump Trailer">Dump Trailer</option>
                                    <option value="Hopper Bottom">Hopper Bottom</option>
                                    <option value="Tanker">Tanker </option>
                                    <option value="Container"> Container</option>
                                    <option value="Bulk">Bulk</option>
                                    <option value="Sprinter / Cargo Van ">Sprinter / Cargo Van </option>
                                    <option value="Box Truck ">Box Truck </option>
                                    <option value="Pickup Truck "> Pickup Truck</option>

                                </optgroup>                                                    
                            </select>
                        </div>


                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Destination:</label>
                            <input type="text" class="form-control" required placeholder="destination"name="destination"
                                id="destination" value="">
                        </div>
                    </div>


                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Add Load <i
                            class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!-- /2 columns form -->
@endsection
@section('scripts')
    <script>
        function show1() {
            document.getElementById('bonddiv').style.display = 'none';
        }

        function show2() {
            document.getElementById('bonddiv').style.display = 'block';
        }
    </script>
@endsection
<!-- /2 columns form -->
