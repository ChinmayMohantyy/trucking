@extends('layouts.app')
<style>
    .form-control {
    height: 50px !important;
    padding: 7px !important;
}
    </style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                {{-- trailer --}}
                <center>
                    <h3>Post new Truck</h3>
                </center>
                <form action="{{ url('/save-posttruck') }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Reference#</label>
                            <input id="" type="text" class="form-control" name="reference" value="" required
                                placeholder="Reference#x">
                        </div>
                    </div>
                    {{-- trailer --}}
                    <h5>Trailer</h5>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Truck Type*</label>
                            <select name="truck_type" class="form-control">
                                <option value="">select</option>
                                <option value="item1">Flatbed f</option>
                                <option value="item2">van v</option>
                                <option value="item3">Reefer R</option>
                                <option value="item4">Step Deck SD</option>
                                <option value="item1">Power Only PO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Weight</label>
                            <div class="row">
                                <div class="col-md-7" style="margin-right: -30px;">
                                    <input id="mc_ff_mx	" type="text" class="form-control" name="weight" value="" placeholder="Weight">
                                </div>
                                <div class="col-md-5">
                                    <select name="weight_size" class="form-control">
                                        <option value="">Select Anysize</option>
                                        <option value="Any size">Any size</option>
                                        <option value="Full size">Full size</option>
                                        <option value="Partial size">Partial size</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Length</label>
                            <input id="" type="text" class="form-control" name="length" value="" required
                                placeholder="Length in ft" autofocus="autofocus">
                        </div>
                    </div><br>

                    {{-- trailer --}}

                    {{-- Lane --}}
                    <h5>Lane</h5>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Origin</label>
                            <input id="" type="text" class="form-control" name="origin" value="" placeholder="Any origin"
                                required>
                        </div>
                        {{-- <div class="form-group col-md-6">
                                <label>Destination</label>
                                <select name="languageSelect[]" multiple id="languageSelect">
                                    <option value="odisha">odisha</option>
                                    <option value="chatishgarh">chatishgarh</option>
                                    <option value="goa">goa</option>
                                    <option value="delhi">delhi</option>
                                </select>
                            </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doAddr">Destination</label>
                                <span class="label-desc">(City, ST / Zip / States)</span>
                                <div class="input-group addr-states-block">
                                    <input id="doAddr" name="languageSelect[]" type="text" class="form-control"
                                        no-submit="true" tabindex="6" placeholder="Any destination">
                                    <div class="input-group-append">
                                        <select id="do-states-ms" name="languageSelect[]" multiple="multiple"
                                            class="input-group-text" style="display:none">

                                            <optgroup label="US" value="US">

                                                <option value="AL">Alabama&lt;span
                                                    class="subtext"&gt;AL&lt;/span&gt;</span></option>

                                                <option value="AK">Alaska&lt;span
                                                    class="subtext"&gt;AK&lt;/span&gt;</span></option>

                                                <option value="AZ">Arizona&lt;span
                                                    class="subtext"&gt;AZ&lt;/span&gt;</span></option>

                                                <option value="AR">Arkansas&lt;span
                                                    class="subtext"&gt;AR&lt;/span&gt;</span></option>

                                                <option value="CA">California&lt;span
                                                    class="subtext"&gt;CA&lt;/span&gt;</span></option>

                                                <option value="CO">Colorado&lt;span
                                                    class="subtext"&gt;CO&lt;/span&gt;</span></option>
                                            </optgroup>

                                            <optgroup label="Canada" value="Canada">

                                                <option value="AB">Alberta&lt;span
                                                    class="subtext"&gt;AB&lt;/span&gt;</span></option>

                                                <option value="BC">British Columbia&lt;span
                                                    class="subtext"&gt;BC&lt;/span&gt;</span></option>

                                                <option value="MB">Manitoba&lt;span
                                                    class="subtext"&gt;MB&lt;/span&gt;</span></option>

                                                <option value="NB">New Brunswick&lt;span
                                                    class="subtext"&gt;NB&lt;/span&gt;</span></option>



                                            </optgroup>

                                            <optgroup label="Mexico" value="Mexico">

                                                <option value="AGU">Aguascalientes&lt;span
                                                    class="subtext"&gt;AGU&lt;/span&gt;</span></option>

                                                <option value="BCN">Baja California&lt;span
                                                    class="subtext"&gt;BCN&lt;/span&gt;</span></option>

                                                <option value="BCS">Baja California Sur&lt;span
                                                    class="subtext"&gt;BCS&lt;/span&gt;</span></option>

                                                <option value="CAM">Campeche&lt;span
                                                    class="subtext"&gt;CAM&lt;/span&gt;</span></option>



                                            </optgroup>

                                        </select>
                                    </div>
                                </div>
                                <div id="doAC" class="ac-container" style="display:none;">
                                </div>
                                <input type="hidden" id="doCity" name="doCity" />
                                <input type="hidden" id="doState" name="doState" />
                                <input type="hidden" id="doCountry" name="doCountry" />
                                <input type="hidden" id="doZip" name="doZip" />
                                <input type="hidden" id="doAddrLat" name="doAddrLat" />
                                <input type="hidden" id="doAddrLon" name="doAddrLon" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>Min Hauling Distance</label>
                            <input id="" type="text" class="form-control" name="min_hauling_distance" placeholder="Distance in mt."
                                value="" required>
                        </div>
                        <div class="form-group col-md-2">
                            <h3 style="margin-top: 29px;">----</h3>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Max Hauling Distance</label>
                            <input id="" type="text" class="form-control" name="max_hauling_distance" placeholder="Distance in mt."
                                value="" required>
                        </div>
                    </div>
                    {{-- Lane --}}


                    {{-- other --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Desired rate per mile</label>
                            <input id="" type="text" class="form-control" name="desired_rate_per_mile" placeholder="Rate"
                                value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Avilibility Date </label>
                            <input id="date_avilibility" type="text" class="form-control" name="avilibility_date" placeholder="Available daily"
                                value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input id="" type="text" class="form-control" name="description" value=""
                                required>
                        </div>
                    </div>
                    {{-- other --}}
                    {{-- contact --}}
                    <h5>Contacts</h5>

                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Contact Name</label>
                            <input id="" type="text" class="form-control" name="contact_name"
                                value="{{ Auth::user()->first_name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone No </label>
                            <input id="phone_no" type="text" class="form-control" name="phone"
                                value="{{ Auth::user()->phone }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Email Id</label>
                            <input id="" type="text" class="form-control" name="email"
                                value="{{ Auth::user()->email }}" required placeholder="email Id">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-danger">POST</button>
                    {{-- <a href="">Post and Create Next</a> --}}
                    <a href="{{('/truck-profile')}}" class="" style="float:right">Cancel</a>
                    {{-- contact --}}
            </div>
            </form>
        </div>
    </div>



    {{--  --}}
@endsection
@section('scripts')
<script>
    $("#date_avilibility").datepicker();
    $("#phone_no").inputmask({
            "mask": "(999) 999-9999"
        });
</script>
@endsection
