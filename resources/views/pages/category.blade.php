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
    <div class="container-sm" style="padding-top: 80px;">
        <div class="py-4">
            <h2 class="text-dark">All Categories</h2>
            <div class="py-3">
                <div class="d-grid">
                    @foreach ($data as $item)
                        <a href="/category/{{ strtolower($item->slug) }}" class="text-decoration-none">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="/upload/category/{{ $item->image }}" class="w-100" height="200">
                                <div class="card-body">
                                    <p class="card-title text-dark fw-bold">{{ $item->name }}</p>
                                    <small class="card-text text-muted">{{ $item->description }}</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('script.js') }}"></script>
    @endpush
@endsection