@extends('front.layouts.header')

@section('content')
<section class="light-up-container">
        <div class="light-up-description">
        @if (count($search_data)>0)            
            <h1>Your Light is Up <sup><img src="{{ asset('front/img/star.svg') }}" alt="Star"></sup></h1>			
            <div class="light-number-content mobile-view">
                <h3>{{Request()->segment(2)}}</h3>
                <p>Your Unique Light Number</p>
            </div>
            <p>
                Thank you for sharing your story with us and nominating a light in your life. Your nominee is now visible as a spark of light on the map. Selected stories will be shared on the website, provided that we received the required permissions.
            </p>
        </div>
        <div class="light-number-content desktop-view">
            <h3>{{Request()->segment(2)}}</h3>
            <p>Your Unique Light Number</p>
        </div>
        <div class="email-message-content">
			<p>
				If you have shared the email address of your nominees with us, they will receive a short note of gratitude to thank them for being a light.
			</p>
		</div>
    {{-- <div class="light-number-content desktop-view">
        <h3>{{Request()->segment(2)}}</h3>
        <p>Your Unique Light Number</p>
    </div>
    <div class="email-message-content">
        <p>
            If you have shared the email address of your nominees with us, they will receive a short note of gratitude to thank them for being a light.
        </p>
    </div> --}}
    <div class="share-story-container">
        {{-- <img src="{{ asset('front/img/globe.png') }}" alt="Globe"> --}}
        <div id="chartdiv"></div>  <!-- Globe html div -->
        <div class="share-story-details desktop-view">
            {{-- <a href="javascript:void(0)" class="share-btn share-icon">Share my story</a> --}}
            <div class="shareMyStory">
                <a href="javascript:void(0)" class="shareMyStoryBtn">
                    <img src="{{ asset('front/img/share-icon.png') }}" alt="share">
                    <span>Share my story</span>
                </a>
            
                <div class="shareMyStoryList">
                    <ul>
                    <li>
                        <a
                        href="https://www.facebook.com/sharer/sharer.php?u={{URL::to('/')}}&quote=I just nominated a spark of light to the #OneMillionLights campaign by the #Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                        You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment."
                        target="_blank"
                        ><img src="{{ asset('front/img/icon-facebook.svg') }}" alt="facebook"
                        /></a>
                    </li>
                    <li>
                        <a
                        href="http://www.linkedin.com/shareArticle?url={{URL::to('/')}}&title=I just nominated a spark of light to the #OneMillionLights campaign by the #Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                        You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment.&via={{URL::to('/')}}"
                        target="_blank"
                        ><img src="{{ asset('front/img/icon-linkedIn.svg') }}" alt="linkedin"
                        /></a>
                    </li>
                    <li>
                        <a
                        href="https://twitter.com/share?text=I just nominated a spark of light to the OneMillionLights campaign by the Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                        You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment.&url={{URL::to('/')}}&hashtags=OneMillionLights,Civil20"
                                                                            
                        target="_blank"
                        ><img src="{{ asset('front/img/icon-twitter.svg') }}" alt="twitter"
                        /></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="shareMyStoryList-close"><img src="{{ asset('front/img/close-share.svg') }}" alt="close"/></a>
                    </li>
                    </ul>
                </div>
            </div>
            <a href="/form" class="share-btn">Nominate another light</a>
            <p>
                If you have shared the email address of your nominees with us, they will receive a short note of gratitude to thank them for being a light.
            </p>
        </div>
        <div class="share-story-details mobile-view">
            <p>
                Don’t stop with one light! If you feel that other people or organisations have made a difference in terms of women’s empowerment and gender equality, please nominate them too!
            </p>
            <a href="javascript:void(0)" class="share-btn share-icon">Share my story</a>
            <a href="/form" class="share-btn">Nominate another light</a>
        </div>
        @else
        <h1>No data found</h1>
        @endif
    </div>
</section>

<script>
    $('.shareMyStoryBtn').on('click', function () {
        $(this).hide();
        $('.shareMyStoryList').fadeIn();
    })
    $('.shareMyStoryList-close').on('click', function () {
        $('.shareMyStoryBtn').fadeIn();
        $('.shareMyStoryList').hide();
    })

/* Social share js  */
if ($(window).width() < 767) {
    $('.share-icon').on('click', function () {
        const shareButton = document.querySelector('.share-icon');
        const closeButton = document.querySelector('.close-button');
    shareButton.addEventListener('click', event => {
            if (navigator.share) {
                navigator.share({
                    title: 'C20',
                    url: window.location.href
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
            }
        });

});
}
individual = true;
var cities1 = [{title: "{{Request()->segment(2)}}",latitude: '{{$search_data[0]->latitude}}',longitude: '{{$search_data[0]->longitude}}'}];
</script>
<script src="{{ asset('front/js/slick.min.js')}}"></script>
<script src="{{ asset('front/js/like_count.js')}}"></script>
<script src="{{ asset('front/js/search.js')}}"></script>
<!-- Globe resources js -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldIndiaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="{{ asset('front/js/globe.js')}}"></script>
@endsection