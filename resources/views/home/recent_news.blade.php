@extends('layouts.home')

@section('title')
    | Recent News
@endsection

@section('content')
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
                                        <a href="{{ route('home.post', $item->slug) }}">
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
                                            <a href="{{ route('home.post', $item->slug) }}">
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
                    {{ $recent_news->links() }}
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
