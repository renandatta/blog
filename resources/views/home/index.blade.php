@extends('layouts.home')

@section('title')
    | Comfort zone to enjoy news, fun content, and more facts about Korea and Kpop!
@endsection

@section('content')
    <div id="section-slider" class="slider02">
        <!-- Slider Content -->
        <div class="slider-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @foreach($top_3->details as $key => $item)
                        <!-- Item -->
                        <div class="thumbnail-1 v{{ $key+1 }}">
                            <a href="{{ route('home.post', $item->post->slug) }}">
                                <img src="{{ asset('storage/' . $item->post->media->location) }}" alt="Zona Korea">
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <div class="list-users-02">
                                            <ul class="images">
                                                <li><img src="{{ asset('storage/' . $item->post->user->media->location) }}" alt="Zona Korea"></li>
                                            </ul>
                                            <p><span>{{ $item->post->user->name }}</span></p>
                                            <h3>{{ $item->post->title }}</h3>
                                            <div class="like">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 481.567 481.567" style="enable-background:new 0 0 481.567 481.567;" xml:space="preserve">
														<path d="M424.7,55.841c-19.8-15.2-43.3-25-68.1-28.2c-42.6-5.6-84.3,7.4-115.8,35.6c-31.5-28.5-73.4-41.5-116.2-35.8
															c-24.8,3.3-48.4,13.2-68.3,28.6c-35.8,27.9-56.4,69.6-56.3,114.6c0,38.5,15.1,74.8,42.4,102.1l172.9,172.9
															c6.6,6.6,15.2,9.8,23.8,9.8c8.6,0,17.2-3.3,23.8-9.8l26.8-26.8c7-7,7-18.4,0-25.5c-7-7-18.4-7-25.5,0l-25.1,25.1l-171.2-171.3
															c-20.5-20.5-31.8-47.7-31.9-76.7c0-33.7,15.4-65.1,42.4-86.1c14.8-11.5,32.4-18.9,50.9-21.3c34.2-4.5,67.6,6.7,91.7,30.9
															l19.8,19.8l19.6-19.6c24-24.1,57.4-35.3,91.5-30.8c18.5,2.4,36,9.7,50.8,21c28.2,21.7,43.8,54.4,42.8,89.6
															c-0.8,27.7-12.9,54.6-33.9,75.7l-91.2,91.1c-7,7-7,18.4,0,25.5c7,7,18.4,7,25.5,0l91.2-91.2c27.6-27.6,43.4-63.1,44.4-100.1
															C482.9,128.041,462.2,84.641,424.7,55.841z"></path>
												</svg>
                                                {{ $item->post->vote_count }} Likes
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.Item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Slider Content -->
    </div>
    <!-- /.Section Slider 02 -->
    <!-- Section Contents -->
    <div id="section-contents">
        <div class="container">
            <div class="row">
                <!-- Block Style 9 -->
                <div class="col-12 col-lg-8">
                    <div class="block-title-2">
                        <h3>RECENT NEWS</h3>
                    </div>
                    <div class="masonry-mode01 card-columns">
                        @foreach($recent_news as $item)
                        <!-- Item -->
                        <div class="item">
                            <div class="block-style-12">
                                <!-- Contents -->
                                <div class="contents">
                                    <!-- Thumbnail -->
                                    <div class="thumbnail-1">
                                        <span class="bg-orange">{{ $item->post_category->name }}</span>
                                        <a href="#">
                                            <img src="{{ asset('storage/' . $item->media->location) }}" alt="Zona Korea">
                                        </a>
                                    </div>
                                    <!-- /.Thumbnail -->
                                    <!-- Content Wrapper -->
                                    <div class="content-wrapper">
                                        <!-- line -->
                                        <div class="line">
                                        </div>
                                        <!-- /.line -->
                                        <!-- Title -->
                                        <div class="title">
                                            <a href="#">
                                                <h2>{{ $item->title }}</h2>
                                            </a>
                                        </div>
                                        <!-- /.Title -->
                                        <!-- Description -->
                                        <div class="desc">
                                            <p>{{ str_replace("&nbsp;", " ", Str::limit(strip_tags($item->content), 200)) }}</p>
                                        </div>
                                        <!-- /.Description -->
                                    </div>
                                    <!-- Content Wrapper -->
                                    <!-- Peoples -->
                                    <div class="peoples">
                                        <div class="list-users-04">
                                            <ul class="images">
                                                <li><img src="{{ asset('storage/' . $item->user->media->location) }}" alt="Zona Korea"></li>
                                            </ul>
                                            <p>{{ $item->user->name }}</p>
                                        </div>
                                    </div>
                                    <!-- /.Peoples -->
                                </div>
                                <!-- /.Contents -->
                            </div>
                        </div>
                        <!-- /.Item -->
                        @endforeach
                    </div>

                    <div class="load-more-btn ts-top10">
                        <a class="btn" href="{{ route('recent_news') }}">Load More</a>
                    </div>
                    <div class="ts-space40"></div>
                </div>
                <!-- /.Block Style 9 -->
                <!-- Block Style 10, 11 -->
                <div class="col-12 col-lg-4">
                    <div class="block-style-10">
                        <div class="block-title-1">
                            <h3>TRENDING NEWS</h3>
                            <img src="{{ asset('assets/images/svg/more-1.svg') }}" alt="Zona Korea">
                        </div>
                        <div class="small-list-posts">
                            @foreach($trending_news as $item)
                            <!-- Item -->
                            <div class="item">
                                <a href="{{ route('post', $item->slug) }}">
                                    <div class="thumbnail-img">
                                        <img src="{{ asset('storage/' . $item->media->location) }}" alt="Zona Korea" class="img-fluid">
                                    </div>
                                    <div class="content">
                                        <h3>{{ $item->title }}</h3>
                                        <span>{{ strtoupper($item->created_at->diffForHumans()) }}</span>
                                    </div>
                                </a>
                            </div>
                            <!-- /Item -->
                            @endforeach
                        </div>
                    </div>
                    <div class="ts-space50"></div>
                    <div class="block-style-3">
                        <div class="block-title-1">
                            <h3>STAY CONNECTED</h3>
                            <img src="assets/images/svg/more-1.svg" alt="Zona Korea">
                        </div>
                        <div class="block-content">
                            <!-- Item -->
                            <div class="block-item">
                                <div class="block-left">
                                    <div class="social">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                    <div class="followers">
                                        <div class="content">
                                            <a href="{{ !empty($facebook) ? $facebook->content : '#' }}">
                                                <span class="count">Facebook</span>
                                                <span class="text">Zona Korea</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.Item -->
                            <!-- Item -->
                            <div class="block-item">
                                <div class="block-left">
                                    <div class="social">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <div class="followers">
                                        <div class="content">
                                            <a href="{{ !empty($twitter) ? $twitter->content : '#' }}">
                                                <span class="count">Twitter</span>
                                                <span class="text">@zonakorea</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.Item -->
                            <!-- Item -->
                            <div class="block-item">
                                <div class="block-left">
                                    <div class="social">
                                        <i class="fa fa-instagram"></i>
                                    </div>
                                    <div class="followers">
                                        <div class="content">
                                            <a href="{{ !empty($instagram) ? $instagram->content : '#' }}">
                                                <span class="count">Instagram</span>
                                                <span class="text">@zonakorea</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Item -->
                        </div>
                    </div>
                    <div class="ts-space50"></div>
                    <div class="block-style-4">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/images/iklan.jpg') }}" alt="Zona Korea">
                        </a>
                    </div>
                </div>
                <!-- /.Block Style 10, 11 -->

            </div>
        </div>
    </div>
@endsection
