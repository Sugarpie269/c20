@extends('front.layouts.header')

@section('content')

<section class="form-container">
    <div class="form-inner-box">			
        <!-- multistep form -->
        <form id="msform" name="msform" action="{{env("APP_URL")}}/form_save" method="POST">
            @csrf
            <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Step 1</li>
            <li>Step 2</li>
            <li>Step 3</li>
          </ul>
          <!-- fieldsets -->
          <fieldset id="nomination-form1">
            <h2 class="fs-title">Nominator’s Info - Tell us about yourself</h2>
            <h3 class="fs-subtitle">You will be prompted to enable Location. This is required as we intend to publish selected stories on a global map.</h3>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-control"   />
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="Email Address" class="form-control"  />
            </div>
            <div class="form-group">
                <select class="form-control" placeholder="Country" name="country" id="country">
                    <option value="">Select Country</option>
                    @foreach ($data['countries'] as $c_data)
                    <option value="{{$c_data->id}}">
                        {{$c_data->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" placeholder="State" id="state" name="state" >
                </select>    	
            </div>
            <div class="form-group">
                <input type="text" name="age" placeholder="Age" class="form-control" />
            </div>
            <div class="form-group">
                <select class="form-control" placeholder="Gender" name="gender" >
                    <option value="0">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="transgender">Transgender</option>
                    <option value="nonbinary">Non binary</option>
                    <option value="prefernottosay">Prefer not to say</option>
                </select>    	
            </div>            
            <span id="locationspan" style="color: red;display:none">Please allow location permission to continue</span>
            <div class="text-center">   
                <input type="submit" name="next" class="next action-button" value="Next" />
            </div>
          </fieldset>
          <fieldset id="nomination-form2">
            <h2 class="fs-title">Nominated Person, Organisation or Initiative</h2>
            <h3 class="fs-subtitle mb19">Next: Nominee’s Information</h3>
            <h3 class="fs-subtitle subtitle-box">
                Please provide the details of the person, organisation or project you want to nominate as a light (i.e. has made a difference in your life or someone else’s in the area of gender equality and women’s empowerment). Their name and email will be kept confidential and will be not shared with any third party.
            </h3>
            <div class="form-group">
                <span class="public-info">Keep this information public</span>			    	
                <div class="form-group public-radio-btn">
                    <label for="yes">
                        <input type="radio" name="keep_public" value="Yes" id="public_yes" checked="checked" class="radio-email"> Yes
                    </label>
                    <label for="no">
                        <input type="radio" name="keep_public" value="No" id="public_no" class="radio-email"> No
                    </label>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <p>Who do you wish to nominate</p>
            </div>
            <div class="form-group mb29">
                <select class="form-control" id="nominate" name="nomination_type">
                    <option value="0">Select Option</option>
                    <option value="individual">Individual</option>
                    <option value="cso">CSO</option>
                    <option value="ngo">NGO</option>
                    <option value="initiative">Initiative</option>
                    <option value="institution">Institution</option>
                </select>
            </div>
            <div class="nominee-relation-container">
                <div class="form-group">
                    <p>Relation to the nominee</p>
                </div>
                <div class="form-group">
                    <select class="form-control" name="nominee_relation">
                        <option value="0">Select Option</option>
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="sibling">Direct sibling</option>
                        <option value="relative">Relative</option>
                        <option value="friend">Family Friend/Friend</option>
                        <option value="colleague">Colleague</option>
                        <option value="teacher">Teacher/Guide</option>
                        <option value="employer">Employer</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button width50 m-right15" value="Previous" />
            <input type="submit" name="next" class="next action-button width50" value="Next" />
          </fieldset>
          <fieldset class="nominee-details"  id="nomination-form3">
              <!-- <div> -->
              <div class="form-panel">
                  <h2 class="fs-title">Nominee’s Information</h2>
                  <div class="form-group">
                      <input type="text" name="naminee_name" placeholder="Name of the Nominee*" class="form-control" />
                  </div>
                  <div class="form-group is-individual">
                    <select class="form-control" placeholder="Gender of the Nominee*" name="naminee_gender">
                        <option value="0">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="transgender">Transgender</option>
				    	<option value="nonbinary">Non binary</option>
				    	<option value="prefernottosay">Prefer not to say</option>
                    </select>    				  			
                  </div>
            {{-- <div class="form-group">
                <input type="text" name="naminee_email" placeholder="Email Address" class="form-control" />
            </div> --}}
            <div class="form-group">
                <select class="form-control" placeholder="Country of the Nominee*" name="naminee_country" id="naminee_country">
                    <option value="">Select Country</option>
                    @foreach ($data['countries'] as $naminee_data)
                    <option value="{{$naminee_data->id}}">
                        {{$naminee_data->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" placeholder="State of the Nominee*" name="naminee_state" id="naminee_state">
                    <option value="0">State</option>
                </select>    	
            </div>
              <div class="form-group nominee-description">
                  <p>Please describe how the nominee made a difference in your life in 250-500 words</p>
                  <textarea class="form-control" placeholder="Your Answer" name="story"></textarea>
              </div>
              </div>
              <div class="form-panel">
                  <div class="nomination-information-box">
                      <p>
                          You can tell us how the person, organisation or initiative made a difference in your life or in someone else’s life in terms of gender equality and women’s empowerment. It can be, for example, a father who broke cultural norms so that his daughter studied further, a colleague who supported you to take action in an unsafe working environment, an organisation who helped empower women with skills, a mother who encouraged her son to contribute in household chores, etc.
                      </p>
                      <p> 
                          It can be related to any area of life: education and skill development, physical and mental health, economic empowerment, safety and security, engaging men and boys, environment, and breaking socio cultural barriers.
                      </p> 
                      <p>
                          You can describe the nature of the impact or change they made, such as how they inspired or engaged you, enabled access, raised awareness, or generated opportunities for you or women in your community in the mentioned areas.
                      </p>
                      <p>
                       (Unless you have their consent, please keep the identity of the people mentioned anonymous. You may identify them with initials instead, e.g. Ms. A.B. in India/Kerala)
                      </p>
                  </div>
              </div>
              <div class="form-panel" style="margin-right: 0;">
                  <div class="form-group additional-information">
                      <p>
                          You can provide a link to any additional information to support the nomination, for example to a website, video, social media page, testimony, etc.
                      </p>
                  </div>
                <div class="form-group mb20">
                    <input type="text" name="info_url" placeholder="Type your URL here..." class="form-control" />
                </div>
                <div class="form-group email-title">
                    <h3>Would you like us to send a short note of gratitude to your nominee, to inform them that you have been a light of their life?  If so, please share their email address below. The email address will be kept confidential and will not be used for any other purpose.</h3>
                </div>
                <div class="form-group radio-btn">
                    <label for="yes">
                        <input type="radio" name="forEmail" value="Yes" id="yes" checked="checked" class="radio-email"> Yes
                    </label>
                    <label for="no">
                        <input type="radio" name="forEmail" value="No" id="no" class="radio-email"> No
                    </label>
                </div>
                <div class="form-group mb45 email-box">
                    <input type="text" id="naminee_email" name="naminee_email" placeholder="Email Address of the Nominee*" class="form-control" />
                </div>
                <div class="form-group checkbox">
                    <label>
                          <input type = "checkbox" name="concent_1" id="concent_1" value = "y"> I understand that all email addresses will be kept confidential.
                       </label>
                </div>
                <div class="form-group checkbox">
                    <label>
                          <input type = "checkbox" name="concent_2" id="concent_2" value = "y"> I agree that my story can be published on the website and reports.
                       </label>
                </div>
                <div class="form-group checkbox">
                    <label>
                          <input type = "checkbox" name="concent_3" id="concent_3" value = "y"> I have the permission to publish the name of my nominee in my story.
                       </label>
                </div>
              </div>
              <div class="clearfix"></div>
              <input type="hidden" name="latitude" id="latitude">
              <input type="hidden" name="longitude" id="longitude">
            <input type="button" name="previous" class="previous action-button  m-right15 submit-btn" value="Previous" />
            <input type="submit" href="/light-up" class="submit action-button  submit-btn" value="Submit">
        <!-- </div> -->
          </fieldset>
        </form>
    </div>
</section>

<!-- Popup -->
<div class="fpp">
    <div class="fpp-inner">
        <a href="#" style="cursor: pointer" class="fpp-close">
            <img src="{{ asset('front/img/close.svg') }}" alt="close">
        </a>
        <div class="fpp-list">
            <div class="fpp-item">
                <h6>On your Android phone or tablet</h6>
                <ul>
                    <li>Open the Chrome app.</li>
                    <li>To the right of the address bar,</li>
                    <li>tap More. Settings.</li>
                    <li>Tap Site settings. Location.</li>
                    <li>Turn Location on</li>
                </ul>
            </div>
            <div class="fpp-item">
                <h6>On your Mac</h6>
                <ul>
                    <li>Choose Apple menu > System Settings</li>
                    <li>Click Privacy & Security in the sidebar</li>
                    <li>Then click Location Services on the right. (You may need to scroll down.)</li>
                    <li>Turn Location Services on for your browser</li>
                </ul>

            </div>
            <div class="fpp-item">
                <h6>On your computer, open Chrome.</h6>
                <ul>
                    <li>At the top right, click More. Settings.</li>
                    <li>Click Privacy and security. Site Settings.</li>
                    <li>Click Location.</li>
                    <li>Choose the option ‘Sites can ask for your locations’</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="fppOverlay"></div>

{{-- <script src="{{ asset('front/js/form.js') }}"></script> --}}
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front/js/form-validation.js') }}"></script>

<script>
    $(document).ready(function(){

        /* Popup js */
        $('.fpp, .fppOverlay').fadeIn();
        
        $('.fpp-close').on('click', function() {
            $('.fpp, .fppOverlay').fadeOut();
        });

        $("#nominate").on("change",function(){
            var selectedValue = $(this).val();
            if(selectedValue == "individual"){
                $(".nominee-relation-container").show();
                $(".is-individual").show();
            }
            else{
                $(".nominee-relation-container").hide();
                $(".is-individual").hide();
            }
        });

        // $(".radio-email").on("click", function(){
        //     var emailValue = $(this).val();

        //     if(emailValue == "Yes"){
        //         $(".email-box").show();
        //     }
        //     else{
        //         $(".email-box").hide();
        //     }
        // });			

        $("#progressbar").css({"width":"44%","margin":"auto"});
        $(".next").click(function(){
            var field = $("fieldset").attr("class");
            if(field == "nominee-details"){
                $("#progressbar").css("width","100%");
            }
            else{
                $("#progressbar").css({"width":"44%","margin":"auto"});
            }

        });


        $(".next").click(function(){
            if($('#nomination-form3').css('display') == 'block'){
                    $("#progressbar").css("width","100%");
                }
        })
        $(".previous").click(function(){
            if($('#nomination-form3').css('display') == 'none'){
                $("#progressbar").css({"width":"44%","margin":"auto"});
            }
        })


        $(".next").click(function(){
            if($('#nomination-form2').css('display') == 'block'){
                $("#progressbar li:nth-child(2)").addClass("active")
            }
            if($('#nomination-form3').css('display') == 'block'){
                $("#progressbar li:nth-child(3)").addClass("active")
            }
        });
        $(".previous").click(function(){
            if($('#nomination-form3').css('display') == 'none'){
                $("#progressbar li:nth-child(3)").removeClass("active")
            }
            if($('#nomination-form2').css('display') == 'none'){
                $("#progressbar li:nth-child(2)").removeClass("active")
            }
        })
        

    })
</script>

    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({
                    url:base_url+"/fetch-states",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('#naminee_country').on('change', function () {
                var idCountry = this.value;
                $("#naminee_state").html('');
                $.ajax({
                    url:base_url+"/fetch-states",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#naminee_state').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#naminee_state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            
            if (localStorage.getItem("latitude") && localStorage.getItem("longitude")) {
                navigator.geolocation.getCurrentPosition((position) => {
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    localStorage.setItem("latitude", lat);
                    localStorage.setItem("longitude", long);
                    $("#latitude").val(lat);
                    $("#longitude").val(long);
                    $("#locationspan").hide();
                    $(".next").attr("disabled",false)
                },function(error) {
                    if (error.code == error.PERMISSION_DENIED)
                    {
                        alert('We need your location permission');
                        $("#locationspan").show()
                        $(".next").attr("disabled",true)
                    }
                });
            } else {
                navigator.geolocation.watchPosition((position)=> {
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    localStorage.setItem("latitude", lat);
                    localStorage.setItem("longitude", long);
                    $("#latitude").val(lat);
                    $("#longitude").val(long);
                    $("#locationspan").hide()
                    $(".next").attr("disabled",false)
                },function(error) {
                    if (error.code == error.PERMISSION_DENIED)
                    {
                        alert('We need your location permission');
                        $("#locationspan").show()
                        $(".next").attr("disabled",true)
                    }
                });
                
            }
            // if(!localStorage.getItem("latitude") && !localStorage.getItem("longitude")){
            //     alert("Please allow location permission to continue")
            //     $("#locationspan").show()
            //     $(".next").attr("disabled",true)
            // }
        })
    </script>
@endsection
