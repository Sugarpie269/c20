@extends('front.layouts.header')

@section('content')
    <section>
        <div class="temp1" id="home">
            <div class="container2">
                <div class="temp1-txt">
                    <h1>Celebrate International Women’s Day with One Million Lights</h1>
                    <p>Nominate a light: individuals or organisations that have made a difference in your life or someone
                        else’s, in the area of gender equality and women’s empowerment. See your nominations light up on the
                        world map!</p>
                </div>
                <div class="temp1-specList">
                    <div class="temp1-specItem">
                        <div class="temp1-siLabel">Total Lights</div>
                        <div class="temp1-siVal">{{ Helper::format_number_in_k_notation($data['total_records']) }}</div>
                    </div>
                    <div class="temp1-specItem">
                        <div class="temp1-siLabel">Lights in the last 24 hours</div>
                        <div class="temp1-siVal">
                            {{ Helper::format_number_in_k_notation($data['total_records_last_24_hours']) }}</div>
                    </div>
                    <div class="temp1-specItem temp1-specItemFull">
                        <div class="temp1-siLabel">Time left for the campaign</div>
                        <div class="temp1-siVal" id="countDown"></div>
                    </div>
                </div>
                <div class="temp1-mapArea">
                    <div class="temp1-mapImg">
                        <img src="{{ asset('front/img/globe.png') }}" class="temp1-mapImage" alt="One Million Lights world map">
                        <a href="/nominate-light" class="abs btn-orange">I would like to nominate</a>
                        <a href="explore-lights-map" class="abs btn-stories"><span>Stories</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="temp2 aboutUs" id="aboutUs">
            <div class="container2">
                <div class="temp2-txt">
                    <h6 class="block-title">ABOUT US</h6>
                    <h2>Honour Bright Changemakers in the world</h2>
                    <div class="temp2-txtImg">
                        <img src="{{ asset('front/img/womens-day.jpg') }}" alt="Celebrate International Womens Day">
                        <p>The Working Group Gender Equality and Disability of Civil20, one of the Engagement Groups of the
                            G20, invites you to participate in our worldwide campaign to commemorate women’s empowerment and
                            promote gender equality.</p>
                    </div>
                </div>
                <div class="temp2-accArea">
                    <div class="temp2-acc">
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Outcome</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>The campaign launched on March 8th, 2023, International Women’s Day, during an online
                                    launch event with renowned Indian and international speakers. The Grand Finale of this
                                    campaign will happen at the C20 Gender Equality & Disability Working Group event on
                                    April 22nd and 23rd in Odisha.<br> We hope to have collected one million nominations and
                                    will have a special display of lights during the Grand Finale.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Impact</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>The One Million Lights campaign is a powerful reminder of the impact we can have on
                                    others to create a brighter, more positive future for women all over the world. By
                                    recognising and acknowledging these bright changemakers, the campaign aims to create a
                                    ripple effect of inspiration and positivity to make a real difference in the world.</p>
                            </div>
                        </div>
                    </div>

                    <div class="temp2-item">
                        <div class="temp2-iHead">
                            <h6>Nominate a Light</h6>
                        </div>
                        <div class="temp2-iTxt">
                            <p>One or more people (e.g. mother, father, teacher, friend, colleague), organisations (e.g.
                                civil society organisations, non-government organisations, educational institutions), or
                                initiatives (e.g. communities, projects). Tell us how your nominees have made a difference
                                in your life or someone else’s in the area of gender equality and women’s empowerment. Your
                                nominees will receive a note of gratitude to inform them that they have been a light in your
                                life.</p>
                        </div>
                    </div>
                    <div class="temp2-item">
                        <div class="temp2-iHead">
                            <h6>One Million Sparks of Light</h6>
                        </div>
                        <div class="temp2-iTxt">
                            <p>Each nomination will be represented as a spark of light on a digital global map, symbolising
                                the spread of collective efforts and illuminating the way towards progress. Selected stories
                                will be exhibited to the global community through the C20 platform.</p>
                        </div>
                    </div>
                </div>
                <div class="temp2-sliderArea">
                    <h2>Partner organizations</h2>
                    <div class="swiper temp2-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/1-amrita-vishwa-vidyapeetam.png') }}" alt="amrita vishwa vidyapeetam"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/2-mata-amritanandmayi-math.png') }}" alt="mata amritanandmayi math"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/3-creativeland-technology.png') }}" alt="creativeland technology"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/4-unicef.png') }}" alt="unicef"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/5-embracing-the-world.png') }}" alt="embracing the world"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/6-unesco.png') }}" alt="unesco"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/7-u20.png') }}" alt="u20"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/8-rising-flame.png') }}" alt="rising flame"></div>
                            </div>						
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/9-kiit.png') }}" alt="kiit"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/10-never-alone.png') }}" alt="never alone"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/11-neweb.png') }}" alt="neweb"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/12-bss.png') }}" alt="bss"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/13-ahf.png') }}" alt="ahf"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/14-cvg.png') }}" alt="cvg"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/15-livelihood-alternatives.png') }}" alt="livelihood alternatives"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/16-fish.png') }}" alt="fish"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/17-friendship.png') }}" alt="friendship"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/18-ohana.png') }}" alt="ohana"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/19-prerana.png') }}" alt="prerana"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/20-w4e.png') }}" alt="w4e"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/21-ipledge-foundation.png') }}" alt="ipledge foundation"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/22-nsss.png') }}" alt="nsss"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/23-saathi.png') }}" alt="saathi"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/24-indian-school-of-democracy.png') }}" alt="indian school of democracy"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/25-mind-empowered.png') }}" alt="mind empowered"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/26-al-nour-organization.png') }}" alt="al nour organization"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/17-la-verit-onlus.png') }}" alt="La Verit Onlus Internation Diplomacy"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/28-aapka-doctor.png') }}" alt="Aapka Doctor"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/29-ufladeahi.png') }}" alt="ufladeahi"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/30-astitva-women-education.png') }}" alt="astitva women education"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/31-mirando-xafrica.png') }}" alt="mirando xafrica"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/32-ieee-kerala.png') }}" alt="ieee kerala"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/33-kismat-trust.png') }}" alt="Kismat Trust"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/34-prakarsa.png') }}" alt="Prakarsa"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/35-araceli-alonso.png') }}" alt="Araceli Alonso"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/36-boshra-awad.png') }}" alt="Boshra Awad"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/37-winnie-mitullah.png') }}" alt="Winnie Mitullah"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="temp2-sItem"><img src="{{ asset('front/img/partner/38-nobel-peace.png') }}" alt="Nobel Peace"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="temp2 faqsGradient">
            <div class="container2">
                <div class="temp2-txt">
                    <h2>About the Civil20 Working Group on Gender Equality & Disability (India)</h2>
                    <div class="temp2-videoArea">
                        <div class="temp2-video">
                            <div class="temp2-vidPoster">
                                <picture>
                                    <source srcset="{{ asset('front/img/civil20.jpg') }}" media="(min-width: 800px)">
                                    <source srcset="{{ asset('front/img/civil20.jpg') }}" media="(min-width: 300px)">
                                    <img src="{{ asset('front/img/civil20.jpg') }}" class="temp2-vidPosterImg"
                                        alt="Civil20">
                                </picture>
                                <a href="javascript:void(0)" class="temp2-play">
                                    <img src="{{ asset('front/img/play.svg') }}" alt="play">
                                </a>
                            </div>
                            <div class="temp2-vid">
                                <video src="{{ asset('front/img/You-Are-The-Light-C20.mp4') }}"
                                    class="temp2-vidVideo"></video>
                                <a href="javscript:void(0)" class="temp2-videoClose">
                                    <img src="{{ asset('front/img/close.svg') }}" alt="close">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="temp2-accArea faqsArea" id="faqs">
                    <div class="temp2-acc">
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Who can participate and who can be nominated?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>Everyone, everywhere in the world can participate. To participate, all you have to do is nominate people or organisations who have been a “light” in your life or in the life of someone you know! We welcome nominations of individuals (e.g. a mother, father, grandparent, teacher, friend, colleague, etc.), organisations (e.g. civil society organisations, non-government organisations, educational institutions), or initiatives (e.g. communities, projects, etc.).</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>How many people or organisations can I nominate?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>As many individuals and organisations as you wish, as long as they have made a difference in your life or someone else’s in the area of gender equality and women’s empowerment.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Is there any criteria or eligibility?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>The only criteria is that your nominees have contributed towards gender equality and women’s empowerment, by inspiring or engaging you or someone else, enabled access, raised awareness, or generated opportunities for you or women and girls in your community.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>How do I nominate them?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>You can nominate the individual, organisation or initiative by filling out the One Million Lights Form.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Where will I see my nominations?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>Each nomination will be reflected on the globe on this website as a spark of “light,” thus lighting up the world with examples of positive change. Selected stories will be showcased on the map.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>How will the information I submit be used?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>Information collected will be kept confidential and displayed as sparks of light on an online world map. Only the initials, state and country of the people nominated will be displayed (e.g., Ms A.B. Kerala, India). Selected stories of how the nominees have made a difference may be shared, provided that the participant agreed to it.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Will my nominees know about the nomination?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>If you share the email address of your nominees with us, they will receive a short note of gratitude to thank them for being a light. We will also share a link to the webpage where they can see the world light up.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>How long does the campaign run?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>The campaign was launched on March 8th, 2023, International Women’s Day, during a public online event with renowned Indian and international speakers. By the time of the main C20 event organised by the Gender Equality &  Disability Working Group on the 22nd and 23rd of April, we hope to have collected one million nominations.</p>
                            </div>
                        </div>
                        <div class="temp2-accItem">
                            <div class="temp2-accHead">
                                <h6>Where can I learn more about India G20 and C20 GED?</h6>
                                <span><img src="{{ asset('front/img/arrowBtm.svg') }}" alt="drop down"></span>
                            </div>
                            <div class="temp2-accContent">
                                <p>You can find more information on <br>
                                    <a href="https://c20.amma.org/" target="_blank">https://c20.amma.org/</a><br>
                                    <a href="https://c20.amma.org/gender-equality-disability"
                                        target="_blank">https://c20.amma.org/gender-equality-disability</a><br>
                                    <a href="https://civil20.net" target="_blank">https://civil20.net</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>

    <footer id="nominateNow">
        <section>
            <div class="temp3">
                <div class="container2">
                    <div class="temp3-inner">
                        <div class="temp3-txt">
                            <h6>Join us in recognising and celebrating those who have made a difference, and be a part of creating a brighter future for all.</h6>
                            <div class="temp3-link">
                                <a href="/nominate-light" class="btn-white">I would like to nominate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<h5>ONE MILLION LIGHTS</h5>
    <div class="footerNav">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#aboutUs">About Us</a></li>
            <li><a href="#faqs">FAQs</a></li>
            <li><a href="/nominate-light">Nominate Now</a></li>
        </ul>
    </div>
    <div class="footerSocial">
        <ul>
            <li>
                <a href="mailto:onemillionlights@am.amrita.edu" target="_blank"><img src="{{ asset('front/img/email.svg') }}" alt="email"></a>
            </li>
            <li>
                <a href="https://www.facebook.com/ammachi.labs" target="_blank"><img src="{{ asset('front/img/facebook.svg') }}" alt="facebook"></a>
            </li>
            <li>
                <a href="https://www.instagram.com/ammachilabs/" target="_blank"><img src="{{ asset('front/img/instagram.svg') }}"
                        alt="instagram"></a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/ammachi-labs/" target="_blank"><img src="{{ asset('front/img/linkedin.svg') }}" alt="linkedin"></a>
            </li>
            <li>
                <a href="https://twitter.com/ammachilabs" target="_blank"><img src="{{ asset('front/img/twitter.svg') }}" alt="twitter"></a>
            </li>
        </ul>
    </div>
    </footer>
	<script src="{{ asset('front/js/home.js') }}"></script>
		@endsection       
