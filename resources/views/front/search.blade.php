@extends('front.layouts.header')

@section('content')
<section>
    <div class="temp1 tSearchArea">
        <div class="container2">
            <div class="temp1-txt">
                <form action="{{env("APP_URL")}}/search" method="post" name="search" id="search">
                    @csrf
                    <div class="tSearch">
                        <div class="tSearch-inner">
                            <button class="tSearchSubmit"><img src="{{asset('front/img/search.svg')}}" alt="search"></button>
                            <input type="search" value="{{($keyword!='')?$keyword:''}}" id="search" class="tSearchInput" name="keyword" placeholder="Enter your ULN (unique light number)">
                            @if ($keyword!="")
                                <button type="reset" onclick="top.location.href='/search'" class="tSearchClear"><img src="{{asset('front/img/clear.svg')}}" alt="search"></button>
                            @endif
                        </div>
                    </div>
                    <h1>Search your light</h1>
                    @if ($keyword=="")
                        <div class="tSearch-find">
                            <button class="btn-orange findBtn" type="submit">Find</button>
                        </div>
                    @endif
                </form>
            </div>
            @if ($keyword!="" && $search_data!="" && count($search_data)>0)                
                <div class="temp1-mapArea">
                    <div class="temp1-mapImg">
                        <img src="{{asset('front/img/globe.png')}}" alt="One Million Lights world map">

                        <div class="tStoriesArea">
                            <div class="tStoriesInner">
                                <div class="swiper tStorySlider">
                                    <div class="swiper-wrapper">
                                        @foreach ($search_data as $item)
                                            <div class="swiper-slide">
                                                <div class="tStory-item">
                                                    <div class="tStoryId">
                                                        <h6>{{$item->unique_light_number}}</h6>
                                                        <p>{{$item->country_name->name}} - {{ date("d M Y",strtotime($item->created_date))}}</p>
                                                        <a href="{{env("APP_URL")}}" class="tStory-close"><img src="{{asset('front/img/close.svg')}}" alt="close"></a>
                                                    </div>
                                                    <div class="tStoryTxt">
                                                        <h6>Story</h6>
                                                        <p>{{$item->story}}</p>
                                                        <div class="tStoryBtm">
                                                            <div class="tStory-like">
                                                                <a href="javascript:void(0)" onclick="like_count('{{$item->id}}','{{csrf_token()}}')">
                                                                    <img src="{{asset('front/img/heart.svg')}}" alt="like">
                                                                </a>                                                                
                                                                <span id="cheers_count_{{$item->id}}">{{Helper::format_number_in_k_notation($item->likes->count())}} People loved this</span>
                                                            </div>
                                                            <div class="tStory-share">
                                                                <!-- <img src="img/share.svg" alt="share"> -->
                                                                <div class="shareArea">
                                                                    <div class="shareIcon"></div>
                                                                    <div class="shareList">
                                                                        <ul>
                                                                        <li>
                                                                            <a
                                                                            href="https://www.facebook.com/sharer/sharer.php?u={{URL::to('/')}}&quote=I just nominated a spark of light to the #OneMillionLights campaign by the #Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                                                                            You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment."
                                                                            target="_blank"
                                                                            ><img src="{{asset('front/img/icon-facebook.svg')}}" alt="facebook"
                                                                            /></a>
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                            href="http://www.linkedin.com/shareArticle?mini=true&url={{URL::to('/')}}&title=Travel Union&summary=I just nominated a spark of light to the #OneMillionLights campaign by the #Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                                                                            You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment.&via={{URL::to('/')}}"
                                                                            target="_blank"
                                                                            ><img src="{{asset('front/img/icon-linkedIn.svg')}}" alt="linkedin"
                                                                            /></a>
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                            href="https://twitter.com/share?text=I just nominated a spark of light to the OneMillionLights campaign by the Civil20 Working Group Gender Equality and Disability, on {{URL::to('/')}}.

                                                                            You too can nominate more than one, people or organisations, who have made a difference in your life or someone else's, in the area of gender equality and women's empowerment.&url={{URL::to('/')}}&hashtags=OneMillionLights,Civil20"
                                                                            target="_blank"
                                                                            ><img src="{{asset('front/img/icon-twitter.svg')}}" alt="twitter"
                                                                            /></a>
                                                                        </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-button-prev tStories-prev"><img src="{{asset('front/img/prev.svg')}}" alt="prev"></div>
                                <div class="swiper-button-next tStories-next"><img src="{{asset('front/img/next.svg')}}" alt="next"></div>
                            </div>
                            
                            <div class="tSearchMapBtm">
                                <a href="{{env('APP_URL')}}/nominate-light" class="btn-orange">I would like to nominate</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="temp1-mapArea">
                <div class="temp1-mapImg">
                    <img src="{{asset('front/img/globe.png')}}" alt="One Million Lights world map">

                    <div class="tStoriesArea">
                        <div class="tStoriesInner">
                            <div class="swiper tStorySlider">
                                <div class="swiper-slide">
                                    <div class="tStory-item">
                                        <div class="tStoryId">
                                            <h6>No results found</h6>
                                            <a href="{{env("APP_URL")}}" class="tStory-close"><img src="{{asset('front/img/close.svg')}}" alt="close"></a>
                                        </div>
                                        <div class="tStoryTxt">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev tStories-prev"><img src="{{asset('front/img/prev.svg')}}" alt="prev"></div>
                            <div class="swiper-button-next tStories-next"><img src="{{asset('front/img/next.svg')}}" alt="next"></div>
                        </div>
                        
                        <div class="tSearchMapBtm">
                            <a href="{{env('APP_URL')}}/nominate-light" class="btn-orange">I would like to nominate</a>
                        </div>
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</section>
<script src="{{asset('front/js/search.js')}}"></script>
<script src="{{ asset('front/js/like_count.js')}}"></script>
@endsection