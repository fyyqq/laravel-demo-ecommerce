@extends('layouts/homepage')

@section('pages')
<style>
    .increment-btn, .decrement-btn {
        cursor: pointer;
    }
    .fa-star {
        text-shadow: unset;
    }
</style>
<?php
    use Carbon\Carbon;
    echo Carbon::now()->format('d/m/Y');
?>
<div class="pb-5">
    <main class="mt-5 pt-4 data_product">
        <div class="container dark-grey-text mt-4">
            @if (session()->has('cart'))
                <div class="alert alert-success">{{ session('cart') }}</div>
            @endif
            <div class="row wow fadeIn">
                <div class="col-md-6 mb-4 text-center">
                    <img src="/upload/product/{{ $data->image }}" class="img-fluid w-50">
                </div>
                <div class="col-md-6 mb-4 ">
                    <div class="p-4">
                        <div class="mb-3">
                            <a href="/category/{{ $data_category->name }}" class="text-decoration-none">
                                <span class="badge bg-primary text-decoration-none">{{ $data_category->name }}</span>
                            </a>
                            @if ($data->quantity < 1)
                                <div class="d-inline">
                                    <span class="badge bg-danger text-decoration-none">Out of Stock</span>
                                </div>
                            @else
                                <div class="d-inline">
                                    <span class="badge bg-success text-decoration-none">In Stock</span>
                                </div>
                            @endif
                        </div>
                        <p class="lead font-weight-bold">{{ $data->name }}</p>
                        <p class="lead">
                            <span class="text-danger pe-2">
                                <del style="font-size: 16px">${{ $data->original_price }}</del>
                            </span>
                            <span>${{ $data->selling_price }}</span>
                        </p>
                        <p>{{ $data->description }}</p>
                    </div>
                    <div class="d-flex ps-4" style="transform: translateY(20px)">
                        <div class="mb-4 input-group text-center mb-3" style="height: 20px;">
                            <input type="hidden" name="product_id" class="product_id" value="{{ $data->id }}">
                            <input type="hidden" name="quantityProduct" value="{{ $data->quantity }}" id="quantity_product">
                            <button class="input-group-text decrement-btn" {{ ($data->quantity < 1) ? "disabled" : "" }}>-</button>
                            <input type="text" name="quantity" id="" class="border text-center quantity-input" value="{{ ($data->quantity < 1) ? "0" : "1" }}" size="2" disabled>
                            <button class="input-group-text increment-btn" {{ ($data->quantity < 1) ? "disabled" : "" }}>+</button>
                        </div>
                        <div class="d-flex w-100" style="transform: translateY(-2px);">
                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                            <button type="submit" class="badge bg-primary border-0 px-3 cart-btn me-2" {{ ($data->quantity < 1) ? "disabled" : "" }}>
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                            <button class="badge bg-danger border-0 px-3 wishlist-btn">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="my-5">
                @if ($rating->count() < 1)
                    <h2 class="text-dark text-center">No Rating Yet !</h2>
                @else
                    <section>
                        <div class="container py-5">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10 col-xl-8 text-center">
                                    <h3 class="fw-bold mb-4">Review & Rating</h3>
                                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    @foreach ($rating as $item)
                                    <div class="col-md-4 mb-4 mb-md-0">
                                        <div class="card border-0" style="height: 400px; overflow: hidden;
                                            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                                                    <div class="w-100" style="position: absolute; top: 0;">
                                                        <div class="badge bg-dark float-end me-3 mt-3 px-2">x {{ $item->product_qty }}</div>
                                                    </div>
                                                <div class="card-body py-4 mt-2">
                                                    <div class="d-flex justify-content-center mb-4">
                                                        <img src="{{ asset('upload/rating/unknown.png') }}" class="rounded-circle shadow-1-strong" width="100" height="100" />
                                                    </div>
                                                    <h6 class="font-weight-bold">{{ $item->order->fname }} {{ $item->order->lname }}</h6>
                                                    <p class="my-3">{{ $item->title }}</p>
                                                    <ul class="list-unstyled d-flex justify-content-center">
                                                        <?php
                                                            $x = 0;
                                                            while($x < $item->star) {
                                                                echo '<li><i class="fas fa-star fa-sm text-warning"></i></li>';
                                                                $x++;
                                                            }
                                                        ?>
                                                    </ul>
                                                    <p class="mb-2">{{ is_null($item->review) ? "No Review!" : "$item->review" }}</p>
                                                    <div class="w-100" style="position: absolute; bottom: 0;">
                                                        <div class="float-end me-3 mb-3 px-2">
                                                            <small class="text-muted">
                                                                <?php
                                                                    echo Carbon::parse($item->created_at)->diffForHumans();
                                                                ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($rating->count() >= 3)
                                    <div class="mt-5">
                                        <a href="/category/{{ $data->category->slug }}/{{ $data->slug }}/ratings" class="btn btn-primary px-4 text-center">More Ratings</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                @endif
            </div>
            <hr>
            <div class="row d-flex justify-content-center wow fadeIn">
                <div class="col-md-6 text-center">
                    <h4 class="mt-4 mb-5 h4">Another Products in {{ $data_category->name }}</h4>
                </div>
            </div>
            <div class="row wow fadeIn">
                @foreach ($moreProduct as $item)
                    <a href="/category/{{ $item->category->slug }}/{{ $item->slug }}" class="text-decoration-none col-lg-4 col-md-12 mb-4 d-flex flex-column  " style="display: grid; place-items: center;">
                        <img src="/upload/product/{{ $item->image }}" class="img-fluid" style="width: 300px;">
                        <div class="d-flex flex-column text-center mt-2 w-100">
                            <h6 class="text-dark">{{ $item->slug }}</h6>
                            <small class="text-muted">${{ $item->selling_price }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
</div>
@push('script')
    <script src="{{ asset('script.js') }}"></script>
@endpush
@endsection