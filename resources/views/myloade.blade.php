@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bookmarks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Active Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Finished Jobs</a>
        </li>
    </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
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
@endsection
