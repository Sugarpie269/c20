@extends('front.layouts.header')

@section('content')

<main>
    <section>
        <div class="temp1 nlTemp">
            <div class="container2">
                <div class="temp1-txt">
                    <h1>Nominate a Light</h1>
                    <p>Step-by-step guide on how to submit a nomination and what to include</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="temp4">
            <div class="container2">
                <div class="temp4-inner">
                    <div class="swiper temp4-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="temp4-sItem">
                                    <h5>STEP 1</h5>
                                    <h6>Nominator’s Info - Tell us about yourself</h6>
                                    <p>Your name, country, state, email address and location details.</p>
                                </div>
                                <div class="temp4-num">1</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp4-sItem">
                                    <h5>STEP 2</h5>
                                    <h6>Nominated Person, Organisation or Initiative</h6>
                                    <p>Who do you wish to nominate and the relation with the nominee</p>
                                </div>
                                <div class="temp4-num">2</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp4-sItem">
                                    <h5>STEP 3</h5>
                                    <h6>Nominee's Information</h6>
                                    <p>Name, gender, country, state, description of the incident, links to support of any and consent</p>
                                </div>
                                <div class="temp4-num">3</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp4-sItem">
                                    <h5>STEP 4</h5>
                                    <h6>Selected stories will be published</h6>
                                    <p>And will be reflected on the globe on this website as a spark of 'light', provided you have given us consent to do so & confirmed the consent of the person you've nominated.</p>
                                </div>
                                <div class="temp4-num">4</div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="temp4-link">
                        <a href="{{env("APP_URL")}}/form" class="btn-orange">Take me to the nomination form</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

    <script src="{{ asset('front/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/nominating-light.js') }}"></script>

@endsection
