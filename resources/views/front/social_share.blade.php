@extends('front.layouts.header')

@section('content')
<section>
    <div class="temp1 tSearchArea">
        <div class="container2">            
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
                                                                <img src="{{asset('front/img/share.svg')}}" alt="share">
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
                                <a href="/nominate-light" class="btn-orange">I would like to nominate</a>
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