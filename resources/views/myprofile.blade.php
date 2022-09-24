@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form_blocs_wrap">
                    <form>
                        <div class="row justify-content-between">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile Details</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="v-pills-noti-tab" data-toggle="pill" href="#v-pills-noti" role="tab" aria-controls="v-pills-noti" aria-selected="false">Feedback</a>
                                    </li>
                                  </ul>
                            <div class="col-lg-12">
                                    
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Profile -->
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                            
                                                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                                                    <form action="" method="post" class="form-line" id="">
                                                        @csrf
                                                        <div class="crs_log_wrap">
                                                            <div class="crs_log__thumb">
                                                                <img src="https://via.placeholder.com/1920x1200" class="img-fluid" alt="" />
                                                            </div>
                                                            <div class="crs_log__caption">
                                                                <div class="rcs_log_123">
                                                                    <div class="rcs_ico"><i class="fas fa-user"></i></div>
                                                                </div>
                                                                
                                                                <div class="rcs_log_124">
                                                                    <div class="Lpo09"><h4>Your Details</h4></div>
                                                                    <h5><b>Business Details</b></h5>
                                                                    <hr>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            
                                                                            <div class="form-group">
                                                                                <label>Company Name</label>
                                                                                <input type="text" class="form-control" value="{{Auth::user()->company_name}}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Business Type</label>
                                                                                <input type="text" class="form-control" value="{{Auth::user()->business_types}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>MC/FF/MX#(optional)</label>
                                                                                <input type="text" class="form-control" value="{{Auth::user()->mc_ff_mx}}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>DOT#(optional)</label>
                                                                                <input type="text" class="form-control" value="{{Auth::user()->dot}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h5><b> Personal Info</b></h5>
                                                                    <hr>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>First Name *</label>
                                                                                <input id="first_name" type="text" class="form-control" name="first_name"value="{{Auth::user()->first_name}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Last Name *</label>
                                                                                <input id="last_name" type="text" class="form-control" name="last_name"value="{{Auth::user()->last_name}}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Cell Phone *</label>
                                                                                <input id="phone1" type="text" class="form-control" name="phovalue="value="{{Auth::user()->phone}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Email *</label>
                                                                                <input type="text" class="form-control" value="{{Auth::user()->email}}"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <h5><b> Password</b></h5>
                                                                    <hr>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Current Password *</label>
                                                                                <input type="text" class="form-control" value="{{@$user->password}}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Confirm Password *</label>
                                                                                <input type="text" class="form-control" value="" />
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                    <h5><b>Site Preferences</b></h5>
                                                                    <hr>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Average miles per gallon *</label>
                                                                                <input type="text" class="form-control" value="" />
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
                                    </div>
                                    <!-- Feedback -->
                                    <div class="tab-pane fade" id="v-pills-noti" role="tabpanel" aria-labelledby="v-pills-noti-tab">
                                        <div class="row">
                                            <div class="col-12">
                                            <form>
                                        
                                                        
                                                            <div class="text-center"><h4>Your Feedback</h4></div>
                                                            
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Enter Feedback Here</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                  </div>
                                                                  <button type="button" class="btn btn-success">Submit</button>	  
                                                            </div>
                                                        
                                            </form>
                                            </div>
                                        </div>
                                    </div><!----------End----------->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection