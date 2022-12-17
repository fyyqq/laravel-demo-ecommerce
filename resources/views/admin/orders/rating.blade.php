@extends('layouts/homepage')

@section('pages')
    <div class="container-sm pb-5" style="padding-top: 120px;">
        <h2 class="text-muted">Rating Products</h2>
        <div class="row mt-5">
            <div class="col-lg-12 col-12">
                <div class="card mb-3 border border-2 border-secondary shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center">
                            <img src="{{ asset('upload/product/' . $dataOrder->product->image) }}" class="" style="width: 150px;">
                            <div class="px-4 w-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="card-title h5">{{ $dataOrder->product->name }}</h3>
                                    <h6 class="card-title">${{ $dataOrder->product->selling_price }} x {{ $dataOrder->quantity }}</h6>
                                </div>
                                <small class="text-muted ">{{ $dataOrder->product->description }}</small>
                                <div class="float-end total_price">
                                    <div class="badge bg-success px-2">
                                        <h6 class="card-title mb-0">
                                            <span class="me-1">Total Price :</span>
                                            $<?php echo $dataOrder->product->selling_price * $dataOrder->quantity ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="mt-1 mb-4">
                            <h5 class="card-title">Rating Feedback</h5>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label text-dark">Title Feedback :</label>
                            <input type="text" name="title" id="title" class="form-control shadow-none title_feedback" placeholder="Title Your Feedback..." required>
                            <input type="hidden" name="product_id" id="prod_id" value="{{ $dataOrder->product_id }}">
                            <input type="hidden" name="quantity" id="qty" value="{{ $dataOrder->quantity }}">
                            <input type="hidden" name="user_id" id="user" value="{{ $userOrder->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Star Rating :</label>
                            <div class="con mt-4 ps-3" style="margin-bottom: 30px;">
                                <i class="fa fa-star" aria-hidden="true" id="st1"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st2"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st3"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st4"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st5"></i>
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label text-dark">Feedback Review :</label>
                                <textarea name="review" id="review" rows="8" class="form-control shadow-none w-100 review_feedback" placeholder="Your Feedback..."></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end btn-feedback">Submit Feedback</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#st1').on('click', function(e) {
                e.preventDefault();
                
                var star1 = e.target;

                var st2 = $(this).siblings('#st2')[0];
                var st3 = $(this).siblings('#st3')[0];
                var st4 = $(this).siblings('#st4')[0];
                var st5 = $(this).siblings('#st5')[0];
                
                $(star1).css('color', 'yellow');
                $(star1).addClass('checked');
                $(st2).css('color', 'unset');
                $(st2).removeClass('checked');
                $(st3).css('color', 'unset');
                $(st3).removeClass('checked');
                $(st4).css('color', 'unset');
                $(st4).removeClass('checked');
                $(st5).css('color', 'unset');
                $(st5).removeClass('checked');
            });

            $('#st2').on('click', function(e) {
                e.preventDefault();
                
                var star2 = e.target;

                var st3 = $(this).siblings('#st1')[0];
                var st3 = $(this).siblings('#st3')[0];
                var st4 = $(this).siblings('#st4')[0];
                var st5 = $(this).siblings('#st5')[0];

                $(st1).css('color', 'yellow');
                $(st1).addClass('checked');
                $(star2).css('color', 'yellow');
                $(star2).addClass('checked');
                $(st3).css('color', 'unset');
                $(st3).removeClass('checked');
                $(st4).css('color', 'unset');
                $(st4).removeClass('checked');
                $(st5).css('color', 'unset');
                $(st5).removeClass('checked');
            });
            
            $('#st3').on('click', function(e) {
                e.preventDefault();
                
                var star3 = e.target;

                var st1 = $(this).siblings('#st1')[0];
                var st2 = $(this).siblings('#st2')[0];
                var st4 = $(this).siblings('#st4')[0];
                var st5 = $(this).siblings('#st5')[0];

                $(st1).css('color', 'yellow');
                $(st1).addClass('checked');
                $(st2).css('color', 'yellow');
                $(st2).addClass('checked');
                $(star3).css('color', 'yellow');
                $(star3).addClass('checked');
                $(st4).css('color', 'unset');
                $(st4).removeClass('checked');
                $(st5).css('color', 'unset');
                $(st5).removeClass('checked');
            });
            
            $('#st4').on('click', function(e) {
                e.preventDefault();
                
                var star4 = e.target;

                var st1 = $(this).siblings('#st1')[0];
                var st2 = $(this).siblings('#st2')[0];
                var st3 = $(this).siblings('#st3')[0];
                var st5 = $(this).siblings('#st5')[0];
                
                $(st1).css('color', 'yellow');
                $(st1).addClass('checked');
                $(st2).css('color', 'yellow');
                $(st2).addClass('checked');
                $(st3).css('color', 'yellow');
                $(st3).addClass('checked');
                $(star4).css('color', 'yellow');
                $(star4).addClass('checked');
                $(st5).css('color', 'unset');
                $(st5).removeClass('checked');
            });

            $('#st5').on('click', function(e) {
                e.preventDefault();
                
                var star5 = e.target;

                var st1 = $(this).siblings('#st1')[0];
                var st2 = $(this).siblings('#st2')[0];
                var st3 = $(this).siblings('#st3')[0];
                var st4 = $(this).siblings('#st4')[0];

                $(st1).css('color', 'yellow');
                $(st1).addClass('checked');
                $(st2).css('color', 'yellow');
                $(st2).addClass('checked');
                $(st3).css('color', 'yellow');
                $(st3).addClass('checked');
                $(st4).css('color', 'yellow');
                $(st4).addClass('checked');
                $(star5).css('color', 'yellow');
                $(star5).addClass('checked');
            });
        });

        $(document).ready(function() {
            $('.btn-feedback').on('click', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                
                var title = $(this).parent('.card-body').find('.title_feedback').val();
                var review = $(this).parent('.card-body').find('.review_feedback').val();
                var user = $(this).parent('.card-body').find('#user').val();
                var product_id = $(this).parent('.card-body').find('#prod_id').val();
                var product_qty = $(this).parent('.card-body').find('#qty').val();
                var star = $('.fa-star.checked').length;

                if (title == null || title == '') {
                    alert('Title is Required!');
                } else if (star == '0' || star == 0) {
                    alert('Star is Required!');
                } else {
                    swal({
                            title: "Are you sure?",
                            text: "Once sending, You can't Update the review Anymore!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'POST',
                                url: '/dashboard/orders/rating-product',
                                data: {
                                    user_id: user,
                                    product_id: product_id,
                                    product_qty: product_qty,
                                    title: title,
                                    star: star,
                                    review: review,
                                },
                                success: function(res) {
                                    window.location.href = "{{ route('order-history') }}";
                                }
                            });
                        }
                    });

                }
            });
        });
    </script>
@endsection