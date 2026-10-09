@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <h1>Home page</h1>
        <div class="grid grid-cols-4 gap-2">
            @foreach ($posts as $post)
                <div class="card bg-base-300 shadow-sm">
                    {{-- <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
                    </figure> --}}
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p>{{ $post->body }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Read more</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
