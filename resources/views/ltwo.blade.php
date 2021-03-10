@extends('layouts.app')

@section('carousel-links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
@endsection

@section('carousel-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        if ($(".brands_slider").length) {
            var brandsSlider = $(".brands_slider");

            brandsSlider.owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                singleItem: true,
                nav: false,
                dots: false,
                // autoWidth: true,
                items: 1,
                margin: 42,
            });

            if ($(".brands_prev").length) {
                var prev = $(".brands_prev");
                prev.on("click", function() {
                    brandsSlider.trigger("prev.owl.carousel");
                });
            }

            if ($(".brands_next").length) {
                var next = $(".brands_next");
                next.on("click", function() {
                    brandsSlider.trigger("next.owl.carousel");
                });
            }
        }
        if ($(".banners_slider").length) {
            var bannersSlider = $(".banners_slider");

            bannersSlider.owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 10000,
                singleItem: true,
                nav: false,
                // dots: false,
                // autoWidth: true,
                margin: 42,
                items: 1,

            });

            if ($(".banners_prev").length) {
                var prev = $(".banners_prev");
                prev.on("click", function() {
                    bannersSlider.trigger("prev.owl.carousel");
                });
            }

            if ($(".banners_next").length) {
                var next = $(".banners_next");
                next.on("click", function() {
                    bannersSlider.trigger("next.owl.carousel");
                });
            }
        }
    });
</script>
@endsection

@section('content')
<div class="container" hidden>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<main role="main">

    <!-- Marketing messaging and featurettes
        ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="row p-5">

        <div class="col-lg-12 p-5">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if(isset($images) && isset($videos))
                    @foreach(array_merge($images, $videos) as $key=>$item)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                    @elseif(isset($images))
                    @foreach($images as $key=>$image)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                    @elseif(isset($videos))
                    @foreach($videos as $key=>$video)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach

                    @else
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if(isset($images) && isset($videos))
                    @foreach($images as $key=>$image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="images d-flex flex-column justify-content-center"><img src="{{ asset('/storage/'.$image) }}" alt="image"></div>
                    </div>
                    @endforeach

                    @foreach($videos as $key=>$video)
                    <div class="carousel-item">
                        <div class="videos d-flex flex-column justify-content-center">
                            <video controls>
                                <source src="{{ asset('/storage/'.$video) }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    @endforeach

                    @elseif(isset($images))

                    @foreach($images as $key=>$image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="images d-flex flex-column justify-content-center"><img src="{{ asset('/storage/'.$image) }}" alt="image"></div>
                    </div>
                    @endforeach

                    @elseif(isset($videos))

                    @foreach($videos as $key=>$video)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="videos d-flex flex-column justify-content-center">
                            <video controls>
                                <source src="{{ asset('/storage/'.$video) }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <div class="carousel-item active">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title> </title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Example headline.</h1>
                                <p>Some representative placeholder content for the first slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title> </title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title> </title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>One more for good measure.</h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="container marketing py-4">

                <!-- sliders -->
                <div class="row">
                    @if(isset($mycontent))
                    <div class="col-md-12 mb-3 card" hidden>
                        <h5 class="text-center">{{$mycontent}}</h5>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="brands_slider_container">
                            <div class="owl-carousel owl-theme brands_slider">
                                @if(isset($logos))
                                @foreach($logos as $logo)
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('/storage/'.$logo) }}" alt="logo"></div>
                                </div>
                                @endforeach
                                @else

                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_1.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_2.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_4.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_5.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_3.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_6.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_7.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_8.jpg" alt=""></div>
                                </div>
                                @endif
                            </div> <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="brands_slider_container" hidden>
                            <div class="owl-carousel owl-theme banners_slider">
                                @if(isset($banners))
                                @foreach($banners as $banner)
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('storage/'.$banner) }}" alt="logo"></div>
                                </div>
                                @endforeach
                                @else

                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img class="center-block d-block mx-auto" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_1.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_2.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_4.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_5.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_3.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_6.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_7.jpg" alt=""></div>
                                </div>
                                <div class="owl-item">
                                    <div class="banners_item d-flex flex-column justify-content-center"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561819026/brands_8.jpg" alt=""></div>
                                </div>
                                @endif
                            </div> <!-- Brands Slider Navigation -->
                            <div class="brands_nav banners_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav banners_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                        <div class="col-md-12 mb-3 card" style="height: 130px;">
                            <h5 class="text-center my-auto">{{$mycontent}}</h5>
                        </div>
                    </div>
                    <div class="col-lg-2 p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="text-center">{{$currentTime}}</h2>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- /.container -->

        </div>


        <form action="{{ route('download') }}" method="POST" id="" class="float-left mr-auto" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary">Download</button>
        </form>

    </div>

    <!-- FOOTER -->
    <footer class="container-fluid bg-blue" style="padding: 1rem 3rem 1rem 3rem;">
        <p class="float-right" style="margin-top: 1rem;"><a href="#">Back to top</a></p>
        <p style="margin-top: 1rem;">&copy; 2017-2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</main>

@endsection