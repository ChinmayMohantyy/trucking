@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div id="user_driver">
                    <form method="POST" action="{{ url('user-register') }}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__caption">
                                <div class="Lpo09">
                                    <h4>Sign Up Your Account</h4>
                                </div>
                                <div class="form-group text-center">
                                    {{-- <input type="radio" id="driver" style="position:initial"
                                    onclick="setColor1(event,'driver')"value="Dr">
                                        DRIVER
                                    <input type="radio" style="position:initial" id="shipper"
                                        value="indivisual"onclick="setColor1(event,'shipper')" checked>
                                        SHIPPER --}}
                                    <label>I'm a &nbsp;<a href="" id="driver" class="btn btn-danger text-white"
                                            onclick="setColor1(event,'driver')">DRIVER</a> <a href=""
                                            class="btn btn-secondary text-white" id="shipper"
                                            onclick="setColor1(event,'shipper')">SHIPPER</a></label>
                                </div>
                                <div class="form-group text-center">
                                    <p>Are you indivisual or business?</p>
                                    <input type="radio" name="bond" style="position:initial"
                                        onclick="show1();"value="business">
                                    Business
                                    <input type="radio" style="position:initial" name="bond"
                                        value="indivisual"onclick="show2();" checked>
                                    Individual
                                </div>
                                <input type="hidden" name="user_type" value="driver">
                                {{-- company --}}
                                <div id="bonddiv" style="display:none">
                                    <h5>Company</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Company Name*</label>
                                            <input id="company_name" type="text" class="form-control" name="company_name"
                                                value="" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Business type*</label>
                                            <select name="business_type" class="form-control">
                                                <option value="">select</option>
                                                <option value="Carrier">Carrier</option>
                                                <option value="Dispacher">Dispacher</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>MC/FF/MX#</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="mc_ff_mx" class="form-control">
                                                        <option value="">select</option>
                                                        <option value="MC">MC</option>
                                                        <option value="FF">FF</option>
                                                        <option value="MX">MX</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8" style="margin-left: -29px;">
                                                    <input id="mc_ff_mx	" type="text" class="form-control"
                                                        name="mc_ff" value="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>DOT#</label>
                                            <input id="dot" type="text" class="form-control" name="dot"
                                                value="">
                                        </div>


                                    </div>


                                </div>
                                <br>

                                {{-- company --}}



                                {{-- Personal info --}}
                                <h5>Personal Info</h5>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name*</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                            value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name*</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Cell Phone*</label>
                                        <input id="phone" type="text" class="form-control" name="phone"
                                            value="" required>
                                    </div>

                                </div>




                                {{-- Account --}}
                                <h5>Account</h5>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail*</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password*</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- survey --}}
                                <h5>Survey</h5>
                                <hr>
                                <div class="col-md-12">
                                    <select name="survey" class="form-control">
                                        <option>How many trucks do you have?</option>
                                        <option value="1">One truck</option>
                                        <option value="2">From 2 to 5 trucks</option>
                                        <option value="3">From 6 to 20 trucks</option>
                                        <option value="4">Over 20 trucks</option>
                                    </select>
                                </div>
                                <div class="form-group row text-center mt-2">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agree">

                                            <label class="form-check-label" for="remember">
                                                I agree to <a href=""style="color:blue">Terms of Use</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger">Sign Up</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <div id="user_shipper" style="display:none">
                    <form method="POST" action="{{ url('user-register') }}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__caption">
                                <div class="Lpo09">
                                    <h4>Sign Up Your Account</h4>
                                </div>
                                <div class="form-group text-center">
                                    <label>I'm a &nbsp;<a href="" id="driver" class="btn btn-danger text-white"
                                            onclick="setColor1(event,'driver')">DRIVER</a> <a href=""
                                            class="btn btn-secondary text-white" id="shipper"
                                            onclick="setColor1(event,'shipper')">SHIPPER</a></label>
                                </div>
                                <div class="form-group text-center">
                                    <p>Are you indivisual or business?</p>
                                    <input type="radio" name="bond" style="position:initial"
                                        onclick="show3();"value="business">
                                    Business
                                    <input type="radio" style="position:initial" name="bond"
                                        value="indivisual"onclick="show4();" checked>
                                    Individual
                                </div>
                                <input type="hidden" name="user_type" value="shipper">
                                {{-- company --}}
                                <div id="bonddiv1" style="display:none">
                                    <h5>Company</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Company Name*</label>
                                            <input id="company_name" type="text" class="form-control" name="company_name"
                                                value="" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Business type*</label>
                                            <select name="business_type" class="form-control">
                                                <option value="Shipper">Shipper</option>
                                                <option value="Broker">Broker</option>
                                            </select>
                                        </div>
    
                                    </div>
                                    {{-- <div class="row" >
                                                <div class="form-group col-md-6">
                                                    <label>MC/FF/MX#</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <select name="position" class="form-control">
                                                                <option>MC</option>
                                                                <option>FF</option>
                                                                <option>MX</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-8" style="margin-left: -29px;">
                                                            <input id="mc_ff_mx	" type="text" class="form-control" name="mc_ff_mx" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>DOT#</label>
                                                    <input id="dot" type="text" class="form-control" name="dot" value="" required>
                                                </div>
                
                                            </div> --}}
    
                                </div>
                                <br>
    
                                {{-- company --}}
    
    
    
                                {{-- Personal info --}}
                                <h5>Personal Info</h5>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name*</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                            value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name*</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Cell Phone*</label>
                                        <input id="phone1" type="text" class="form-control" name="phone"
                                            value="" required>
                                    </div>
    
                                </div>
    
    
    
    
                                {{-- Account --}}
                                <h5>Account</h5>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail*</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password*</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- survey --}}
                                <h5>Survey</h5>
                                <hr>
                                <div class="col-md-12 form-group">
                                    <select name="survey" class="form-control">
                                        <option>How many trucks do you have?</option>
                                        <option>One truck</option>
                                        <option>From 2 to 5 trucks</option>
                                        <option>From 6 to 20 trucks</option>
                                        <option>Over 20 trucks</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <select name="post_load" class="form-control" id="cboOptions"
                                        onchange="showDiv('div',this)">
                                        <option value="">How do you want to post your loads?</option>
                                        <option value="1">manually</option>
                                        <option value="2">I post loads on my website</option>
                                        <option value="3">Send a file to our email</option>
                                        <option value="4">Through TMS</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="div2" style="display: none">
                                    <select name="tms_use" class="form-control" id="type">
                                        <option value="">What TMS do you use?</option>
                                        <option value="item1">McLeod</option>
                                        <option value="item2">DAT</option>
                                        <option value="item3">Ascend TMS</option>
                                        <option value="item4">Aljex</option>
                                        <option value="item1">Mercury Gate</option>
                                        <option value="item2">Truckstop</option>
                                        <option value="item3">TMW</option>
                                        <option value="item4">Other</option>
                                    </select>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agree">
    
                                            <label class="form-check-label" for="remember">
                                                I agree to <a href=""style="color:blue">Terms of Use</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger">Sign Up</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            
        </div>

    </div>

    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#phone").inputmask({
            "mask": "(999) 999-9999"
        });
        $("#phone1").inputmask({
            "mask": "(999) 999-9999"
        });

        function show1() {
            document.getElementById('bonddiv').style.display = 'block';
        }

        function show2() {
            document.getElementById('bonddiv').style.display = 'none';
        }

        function show3() {
            document.getElementById('bonddiv1').style.display = 'block';
        }

        function show4() {
            document.getElementById('bonddiv1').style.display = 'none';
        }

        function setColor1(event, user) {
            event.preventDefault();
            var driverBtn = document.querySelector("#driver");
            var shipperBtn = document.querySelector("#shipper");

            if (user == "shipper") {
                console.log("shipper");
                console.log(shipperBtn);

                document.querySelector('#shipper').classList.add('btn-danger')
                document.querySelector('#driver').classList.remove('btn-secondary')
                document.querySelector('#shipper').classList.remove('btn-secondary')

                // shipperBtn.classList.add("btn-danger");
                // shipperBtn.classList.remove("btn-secondary");
                // driverBtn.classList.remove("btn-danger");
                // driverBtn.classList.add("btn-secondary");
            } else {
                console.log(driverBtn);
                console.log("driver");

                document.querySelector('#shipper').classList.remove('btn-danger')
                document.querySelector('#shipper').classList.add('btn-secondary')
                document.querySelector('#driver').classList.add('btn-danger')

                // driverBtn.classList.add("btn-danger");
                // shipperBtn.classList.remove("btn-danger");
                // shipperBtn.classList.add("btn-secondary");
            }

            if (user == 'driver') {
                document.getElementById('user_driver').style.display = 'block';
                document.getElementById('user_shipper').style.display = 'none';
            }
            if (user == "shipper") {
                document.getElementById('user_shipper').style.display = 'block';
                document.getElementById('user_driver').style.display = 'none';
            }

        }


        function showDiv(prefix, chooser) {
            console.log(chooser)
            var selectedOption = (chooser.options[chooser.selectedIndex].value);
            if (selectedOption == "4") {
                console.log("hello")
                var div = document.getElementById(prefix + "2");
                div.style.display = 'block';
            } else {
                var div = document.getElementById(prefix + "2");
                div.style.display = 'None';
            }
        }
    </script>
@endsection
