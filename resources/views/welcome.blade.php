@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        @isset($user)
            <div class="card bg-base-300 shadow-sm my-2">
                <div class="card-body">
                    <h1 class="card-title">{{ $user->name }}</h1>
                    <span class="text-base-content/70"><b>Followers:</b> {{ $user->followers()->count() }}</span>
                    <span class="text-base-content/70"><b>Followees:</b> {{ $user->followees()->count() }}</span>
                    <form action="{{route('follow', $user)}}" method="POST">
                        @if($user->authHasFollowed)
                            <button class="btn btn-error">Unfollow</button>
                        @else
                            <button class="btn btn-primary">Follow</button>
                        @endif
                    </form>
                </div>
            </div>
        @endisset
        {{ $posts->links() }}
        <div class="grid grid-cols-4 gap-2">
            @foreach ($posts as $post)
                @include('partials.post-card')
            @endforeach
        </div>
    </div>
@endsection
