@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-sm">
            {{-- <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
                    </figure> --}}
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p>{!! $post->displayBody !!}</p>
                <div class="card-actions justify-end">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
