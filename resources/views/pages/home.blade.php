@extends('layouts/homepage')

@section('pages')
    <div style="padding-top: 65px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('upload/category/1669363912.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('upload/product/1669279646.jfif') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('upload/product/1669301273.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-sm pt-5">
        <div class="row d-flex justify-content-center align-items-center">
            {{-- Trending Products --}}
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="heading-section mb-5 pb-md-4">Trending Products</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">
                                @foreach ($product as $item)
                                    <div class="item d-block">
                                        <div class="work">
                                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url({{ asset('upload/product/' . $item->image) }});">
                                                <a href="/category/{{ $item->category->slug }}/{{ strtolower($item->slug) }}" class="icon d-flex align-items-center justify-content-center">
                                                    <span class="ion-ios-search"></span>
                                                </a>
                                            </div>
                                            <div class="text pt-3 w-100 text-center">
                                                <h3><a href="/category/{{ $item->category->slug }}/{{ strtolower($item->slug) }}">{{ $item->name }}</a></h3>
                                                <div class="d-flex justify-content-center align-items-center w-100">
                                                    <span>{{ $item->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Trending Category --}}
            <section class="ftco-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="heading-section mb-5 pb-md-4">Trending Category</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">
                                @foreach ($category as $item)
                                    <div class="item d-block">
                                        <div class="work">
                                            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url({{ asset('upload/category/' . $item->image) }});">
                                                <a href="/category/{{ strtolower($item->slug) }}" class="icon d-flex align-items-center justify-content-center">
                                                    <span class="ion-ios-search"></span>
                                                </a>
                                            </div>
                                            <div class="text pt-3 w-100 text-center">
                                                <h3><a href="/category/{{ strtolower($item->slug) }}">{{ $item->name }}</a></h3>
                                                <div class="d-flex justify-content-center align-items-center w-100">
                                                    <span>{{ $item->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('script.js') }}"></script>
    @endpush
@endsection