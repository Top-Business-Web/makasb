@extends('site.layouts.master')
@section('page_name')
    مكاسـب | ريديت
@endsection
@section('site_css')
    {{--            <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css"/>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/Conis.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/conis_ar.css"/>
    @endif
@endsection
@section('content')
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex">
        @include('site.layouts.sidebar')
        <div class="Home Followers">
            <div class="container sectionHight">
                <div class="row  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div><img src="{{asset('assets/site')}}/img/Button style-pana.svg" alt=""></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="shareBox">
                            <h3 class="fs-4 fw-bold TitlePage"> Reddit Upvotes</h3>
                            <h3 class="fs-5 fw-bold TitlePage2">get FREE points by liking, following and etc. other profiles -
                                posts </h3>
                            <p class="fs-6 mt-lg-3 lh-lg">
                                o get free points by upvoting other's Reddit Posts or Comments click on the "upvote"
                                button, then the post/comment will be opened with popUp and after upvoting the
                                post/comment CLOSE the popUp yourself. The users who don't close manually the popUp,
                                will not receive points.


                            </p>
                            <div>
                                <button class="mainButton Reddit"><a href="{{route('publishMySite')}}">
                                        Get Reddit Post - Comments Upvotes
                                    </a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container sectionHight2">
                <h3 class="fs-4 fw-bold TitlePage">Wait 9-10 seconds after Follow/Like/Subscribe and then close pop-up window.</h3>
                @if($data->count())
                    <div class="table Reddits">
                        <table class="table-bordered table">
                            <tr>
                                <th>Points</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($data as $row)
                                @if($row->points_for_click < $row->user->balance)
                                    <tr id="row{{$row->id}}">
                                        <td>{{$row->points_for_click}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <div class="text-center">
                                                <button data-site-id={{$row->id}} data-url="{{$row->url}}"
                                                        class="Deletes Reddit customBtn myShareBtn">Share
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <button class="Delete Reddit customBtn skipBtn"
                                                        onclick="HideFrame($(this).attr(('data-id')),$(this).attr('data-url'))"
                                                        data-url="{{$row->url}}"
                                                        data-id="{{$row->id}}">skip
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        {!! $data->links() !!}
                    </div>
                    {{--                        <iframe id="frame" src="">--}}
                    {{--                        </iframe>--}}
                    <iframe src="" id="frame" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                @else
                    @include('site.layouts.empty_data')
                @endif
                <style>
                    .customBtn {
                        font-size: 18px;
                        display: inline-block;
                        padding: 10px 15px;
                        color: #fff;
                    }

                    iframe {
                        display: block; /* iframes are inline by default */
                        border: none; /* Reset default border */
                        height: 100vh; /* Viewport-relative units */
                        width: 84vw;
                    }
                </style>

            </div>
        </div>
    </div>

@endsection
@section('site_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    @include('site.CustomScripts.handleViewScript')
@endsection
