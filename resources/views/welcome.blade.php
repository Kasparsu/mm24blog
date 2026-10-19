@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <h1>{{ __('Dashboard Page') }}</h1>
        {{ $posts->links() }}
        <div class="grid grid-cols-4 gap-2">
            @foreach ($posts as $post)
                @include('partials.post-card')
            @endforeach
        </div>
    </div>
@endsection
