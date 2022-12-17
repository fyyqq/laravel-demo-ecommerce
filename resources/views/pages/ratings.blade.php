@extends('layouts/homepage')

@section('pages')
<style>
    .fa-star {
        text-shadow: unset;
    }
</style>
    <?php
        use Carbon\Carbon;
        echo Carbon::now()->format('d/m/Y');
    ?>
    <div class="container-sm pb-5" style="margin-top: 120px;">
        <h1 class="text-muted">All Ratings</h1>
        <div class="container pt-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="row row-cols-3">
                    @foreach ($dataRatings as $item)
                        <div class="col mb-4">
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
                                </div>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection