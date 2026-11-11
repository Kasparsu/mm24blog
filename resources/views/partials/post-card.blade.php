 <div class="card bg-base-300 shadow-sm">
     @if ($post->images->count() === 1)
         <figure>
             <img src="{{ $post->images->first()->path }}" />
         </figure>
     @elseif($post->images->count() > 1)
         <div class="carousel rounded-box">
             @foreach ($post->images as $image)
                 <div class="carousel-item w-full">
                     <img src="{{ $image->path }}" class="w-full" />
                 </div>
             @endforeach
         </div>
     @endif
     <div class="card-body">
         <h2 class="card-title">{{ $post->title }}</h2>
         @isset($posts)
             <p>{{ $post->snippet }}</p>
         @else
             <p>{!! $post->displayBody !!}</p>
         @endisset
         <span class="text-base-content/70">
             <a href="{{ route('user', $post->user) }}" class="btn btn-link">
                 {{ $post->user->name }}
             </a>
         </span>
         <span class="text-base-content/70">{{ $post->created_at->diffForHumans() }}</span>
         <span class="text-base-content/70"><b>Comments:</b> {{ $post->comments_count }}</span>
         <span class="text-base-content/70"><b>Likes:</b>
            <div class="tooltip">
                <div class="tooltip-content">
                    @foreach($post->likedUsers as $liker)
                        <div class="text-base-content/70">{{ $liker->user->name }}</div>
                    @endforeach
                </div>
                <span>{{ $post->likes_count }}</span>
            </div>
        </span>
         <div class="badge badge-secondary">{{ $post->category?->name ?? 'Uncategorized' }}</div>
         <div class="flex flex-wrap gap-1">
             @foreach ($post->tags as $tag)
                 <div class="badge badge-outline badge-primary">{{ $tag->name }}</div>
             @endforeach
         </div>
         <div class="card-actions justify-end">
            <form action="{{route('like', $post)}}" method="POST">
                @if($post->authHasLiked)
                    <button class="btn btn-error">Unlike</button>
                @else
                    <button class="btn btn-primary">Like</button>
                @endif
            </form>
             @isset($posts)
                 <a href="{{ route('post', $post) }}" class="btn btn-primary">@lang('Read more')</a>
             @endisset
         </div>
     </div>
 </div>
