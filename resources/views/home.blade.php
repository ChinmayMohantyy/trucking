@extends('layouts.app')
<style>
    .form-control {
        height: 50px !important;
        background: transparent !important;
        padding: 7px !important;
    }
</style>


@section('content')
    <div class="container">

        <div class="card form_blocs_wrap" style="border-radius:20px">
            <div class="card-body p-3">
                <form>
                    <div class="row justify-content-between">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="but">
                                <div class="row">
                                    <button type="button" class="btn btn-secondary">Any Truck</button>
                                    <div class="but1 px-1">
                                        <button type="button" class="btn btn-secondary"> + </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Origin</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Any</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Deadhead</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>100ml</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Destination</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Any</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Deadhead</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>100ml</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Pickup Date</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Any</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="exampleFormControlSelect1">Truck Type</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Any</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered" style="border-collapse:collapse;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Age</th>
                                                <th scope="col">Pick Up</th>
                                                <th scope="col">Origin</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Destination</th>
                                                <th scope="col">WT</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Dist</th>
                                                <th scope="col">Truck</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">$/mi</th>
                                                <th scope="col">Prepare</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($add_load as $loaddetail)
                                                <tr colspan="11" data-toggle="collapse" data-target="#demo{{ $loaddetail->id }}"
                                                    class="accordion-toggle">
                                                    <th scope="row"><span class="p">{{ $loaddetail->created_at }}</span></th>
                                                    <td><span class="smalls lg">{{ $loaddetail->pickup }}</span></td>
                                                    <td><span class="smalls lg">{{ $loaddetail->origin }}</span></td>
                                                    <td><span class="smalls lg">CA</span></td>
                                                    <td><span class="smalls lg">{{ $loaddetail->destination }}</span></td>
                                                    <td><span class="smalls lg">OR</span></td>
                                                    <td><span class="smalls lg">30k</span></td>
                                                    <td><span class="p1"></span><input type="checkbox" name="" value=""></td>
                                                    <td><span class="smalls lg">987mi</span></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <div class="but2">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Forecast
                                                            </button>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            <b>Show Market
                                                                                Rate Forecast</b></h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>The feature is available to Doft Premium
                                                                            subscribers only.

                                                                            Would you like to see rate forecasts for
                                                                            all eligible loads?<br>

                                                                        </p>
                                                                        <h3>Try Premium for Free!</h3>
                                                                        <p></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="but3">
                                                                            <button type="button" class="btn">10- Day
                                                                                Free
                                                                                Trial</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <div class="but2">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Forecast
                                                            </button>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            <b>Show Market
                                                                                Rate Forecast</b></h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>The feature is available to Doft Premium
                                                                            subscribers only.

                                                                            Would you like to see rate forecasts for
                                                                            all eligible loads?<br>

                                                                        </p>
                                                                        <h3>Try Premium for Free!</h3>
                                                                        <p></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="but3">
                                                                            <button type="button" class="btn">10- Day
                                                                                Free
                                                                                Trial</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <div class="but2">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Forecast
                                                            </button>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            <b>Show Market
                                                                                Rate Forecast</b></h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>The feature is available to Doft Premium
                                                                            subscribers only.

                                                                            Would you like to see rate forecasts for
                                                                            all eligible loads?<br>

                                                                        </p>
                                                                        <h3>Try Premium for Free!</h3>
                                                                        <p></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="but3">
                                                                            <button type="button" class="btn">10- Day
                                                                                Free
                                                                                Trial</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="p">
                                                    <td colspan="11" class="hiddenRow">
                                                        <div class="accordian-body collapse p-3" id="demo{{ $loaddetail->id }}">
                                                            <div class="but4">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-toggle="modal" data-target="#exampleModal1">
                                                                    Report a problem
                                                                </button>
                                                            </div>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel"><b>Show
                                                                                    Market Rate Forecast</b></h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-center">

                                                                            <div id="accordion">
                                                                                <div class="card">
                                                                                    <div class="card-header"
                                                                                        id="headingOne">
                                                                                        <h5 class="mb-0">
                                                                                            <button class=" btn-link"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#collapseOne"
                                                                                                aria-expanded="true"
                                                                                                aria-controls="collapseOne">
                                                                                                Collapsible Group
                                                                                                Item #1
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>

                                                                                    <div id="collapseOne"
                                                                                        class="collapse show"
                                                                                        aria-labelledby="headingOne"
                                                                                        data-parent="#accordion">
                                                                                        <div class="card-body">
                                                                                            Anim pariatur cliche
                                                                                            reprehenderit, enim
                                                                                            eiusmod high life
                                                                                            accusamus terry
                                                                                            richardson ad squid. 3
                                                                                            wolf moon officia aute,
                                                                                            non cupidatat skateboard
                                                                                            dolor brunch. Food truck
                                                                                            quinoa nesciunt laborum
                                                                                            eiusmod. Brunch 3 wolf
                                                                                            moon tempor, sunt aliqua
                                                                                            put a bird on it squid
                                                                                            single-origin coffee
                                                                                            nulla assumenda
                                                                                            shoreditch et. Nihil
                                                                                            anim keffiyeh helvetica,
                                                                                            craft beer labore wes
                                                                                            anderson cred nesciunt
                                                                                            sapiente ea proident. Ad
                                                                                            vegan excepteur butcher
                                                                                            vice lomo. Leggings
                                                                                            occaecat craft beer
                                                                                            farm-to-table, raw denim
                                                                                            aesthetic synth nesciunt
                                                                                            you probably haven't
                                                                                            heard of them accusamus
                                                                                            labore sustainable VHS.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header"
                                                                                        id="headingTwo">
                                                                                        <h5 class="mb-0">
                                                                                            <button
                                                                                                class=" btn-link collapsed"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#collapseTwo"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="collapseTwo">
                                                                                                Collapsible Group
                                                                                                Item #2
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div id="collapseTwo" class="collapse"
                                                                                        aria-labelledby="headingTwo"
                                                                                        data-parent="#accordion">
                                                                                        <div class="card-body">
                                                                                            Anim pariatur cliche
                                                                                            reprehenderit, enim
                                                                                            eiusmod high life
                                                                                            accusamus terry
                                                                                            richardson ad squid. 3
                                                                                            wolf moon officia aute,
                                                                                            non cupidatat skateboard
                                                                                            dolor brunch. Food truck
                                                                                            quinoa nesciunt laborum
                                                                                            eiusmod. Brunch 3 wolf
                                                                                            moon tempor, sunt aliqua
                                                                                            put a bird on it squid
                                                                                            single-origin coffee
                                                                                            nulla assumenda
                                                                                            shoreditch et. Nihil
                                                                                            anim keffiyeh helvetica,
                                                                                            craft beer labore wes
                                                                                            anderson cred nesciunt
                                                                                            sapiente ea proident. Ad
                                                                                            vegan excepteur butcher
                                                                                            vice lomo. Leggings
                                                                                            occaecat craft beer
                                                                                            farm-to-table, raw denim
                                                                                            aesthetic synth nesciunt
                                                                                            you probably haven't
                                                                                            heard of them accusamus
                                                                                            labore sustainable VHS.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header"
                                                                                        id="headingThree">
                                                                                        <h5 class="mb-0">
                                                                                            <button
                                                                                                class=" btn-link collapsed"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#collapseThree"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="collapseThree">
                                                                                                Collapsible Group
                                                                                                Item #3
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div id="collapseThree"
                                                                                        class="collapse"
                                                                                        aria-labelledby="headingThree"
                                                                                        data-parent="#accordion">
                                                                                        <div class="card-body">
                                                                                            Anim pariatur cliche
                                                                                            reprehenderit, enim
                                                                                            eiusmod high life
                                                                                            accusamus terry
                                                                                            richardson ad squid. 3
                                                                                            wolf moon officia aute,
                                                                                            non cupidatat skateboard
                                                                                            dolor brunch. Food truck
                                                                                            quinoa nesciunt laborum
                                                                                            eiusmod. Brunch 3 wolf
                                                                                            moon tempor, sunt aliqua
                                                                                            put a bird on it squid
                                                                                            single-origin coffee
                                                                                            nulla assumenda
                                                                                            shoreditch et. Nihil
                                                                                            anim keffiyeh helvetica,
                                                                                            craft beer labore wes
                                                                                            anderson cred nesciunt
                                                                                            sapiente ea proident. Ad
                                                                                            vegan excepteur butcher
                                                                                            vice lomo. Leggings
                                                                                            occaecat craft beer
                                                                                            farm-to-table, raw denim
                                                                                            aesthetic synth nesciunt
                                                                                            you probably haven't
                                                                                            heard of them accusamus
                                                                                            labore sustainable VHS.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="but3">
                                                                                <button type="button"
                                                                                    class="btn">Submit to
                                                                                    report</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col" style="color:black;">
                                                                    <h4><b>{{ $loaddetail->created_at}}</b></h4>
                                                                    <p>Lorem ipsum dolor sit amet consectetur
                                                                        adipisicing elit. Sunt, iusto?</p>
                                                                </div>
                                                                <div class="col">
                                                                    <img src="assets/img/map.jpg" class="img-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$add_load->links()}}
                                </div>

                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel"
                                    aria-labelledby="v-pills-basic-tab">

                                </div>
                                <!-- login -->
                                <div class="tab-pane fade" id="v-pills-login" role="tabpanel"
                                    aria-labelledby="v-pills-login-tab">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                            <div class="table-responsive">
                                                <table class="table dash_list">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"><input type="checkbox"
                                                                    aria-label="Checkbox for following text input"> Age
                                                            </th>
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
                                                        <tr class="text-center">
                                                            <td colspan="8">No data</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- social -->
                                <div class="tab-pane fade" id="v-pills-social" role="tabpanel"
                                    aria-labelledby="v-pills-social-tab">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                href="#pills-home" role="tab" aria-controls="pills-home"
                                                aria-selected="true">Bookmarks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">Active Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                aria-selected="false">Finished Jobs</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                                    <div class="table-responsive">
                                                        <table class="table dash_list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Ref#</th>
                                                                    <th scope="col">Age</th>
                                                                    <th scope="col">Pickup</th>
                                                                    <th scope="col">Origin</th>
                                                                    <th scope="col">Destination</th>
                                                                    <th scope="col">WT</th>
                                                                    <th scope="col">Size</th>
                                                                    <th scope="col">Dist</th>
                                                                    <th scope="col">Truck</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">$/ml</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                                    <div class="table-responsive">
                                                        <table class="table dash_list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Ref#</th>
                                                                    <th scope="col">Pickup</th>
                                                                    <th scope="col">Origin</th>
                                                                    <th scope="col">Destination</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">$/ml</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                            aria-labelledby="pills-contact-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                                    <div class="table-responsive">
                                                        <table class="table dash_list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Ref#</th>
                                                                    <th scope="col">Pickup</th>
                                                                    <th scope="col">Origin</th>
                                                                    <th scope="col">Destination</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">$/ml</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- finish -->
                            <div class="tab-pane fade" id="v-pills-finish" role="tabpanel"
                                aria-labelledby="v-pills-finish-tab">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-for-tab" data-toggle="pill" href="#pills-for"
                                            role="tab" aria-controls="pills-for" aria-selected="true">Rate
                                            Forecast</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-cost-tab" data-toggle="pill" href="#pills-cost"
                                            role="tab" aria-controls="pills-cost" aria-selected="false">Fuel Costs
                                            Calculator</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-fact-tab" data-toggle="pill" href="#pills-fact"
                                            role="tab" aria-controls="pills-fact" aria-selected="false">Factoring</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="pills-for" role="tabpanel"
                                        aria-labelledby="pills-for-tab">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Origin</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3"
                                                class="col-sm-2 col-form-label">Deestination</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Truck
                                                Type</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Size</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-dark">Sign in</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-cost" role="tabpanel"
                                        aria-labelledby="pills-cost-tab">
                                        <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Origin</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail3"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-2 col-form-label">Deestination</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword3"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Fuel cost
                                                    per gallon</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword3"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Miles per
                                                    gallon</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword3"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-fact" role="tabpanel"
                                        aria-labelledby="pills-fact-tab">

                                        <h1 class="text-center">Freight Factoring for 2.49%</h1>

                                        <div class="row">
                                            <div class="col">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    Reprehenderit quae, repellendus inventore veniam vitae iure dolor
                                                    ducimus recusandae voluptatum mollitia velit ipsa soluta minus enim
                                                    nobis atque ullam pariatur itaque dolorum quisquam beatae libero
                                                    voluptate alias? Culpa ducimus quaerat provident alias voluptates
                                                    suscipit magni beatae veniam veritatis, temporibus eligendi
                                                    laudantium?</p>
                                                <div class="but6">
                                                    <button type="button" class="btn btn-dark">Apply For
                                                        Factoring</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>


    </div>
@endsection
