@extends('layouts/homepage')

@section('pages')
<style>
    .d-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        padding: 40px 120px;
        column-gap: 20px;
        row-gap: 40px;
    }
</style>
<div class="container-sm" style="padding-top: 130px;">
    <h1 class="text-muted h2">Category: {{ $title }}</h1>
    <div class="py-5">
        <div class="d-grid">
            @foreach ($data_product as $item)
                <a href="/category/{{ strtolower($data_category->slug) }}/{{ $item->slug }}" class="text-decoration-none">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="/upload/product/{{ $item->image }}" class="w-100" height="240">
                        <div class="card-body border-top">
                            <p class="card-title text-dark fw-bold">{{ $item->name }}</p>
                            <small class="card-text text-muted">${{ $item->selling_price }}</small>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@push('script')
    <script src="{{ asset('script.js') }}"></script>
@endpush
@endsection
