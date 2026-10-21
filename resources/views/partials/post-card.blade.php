 <div class="card bg-base-300 shadow-sm">
     @if ($post->images->count() === 1)
         <figure>
             <img src="{{ $post->images->first()->path }}" />
         </figure>
     @elseif($post->images->count() > 1)
         <div class="carousel rounded-box">
            @foreach($post->images as $image)
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
         <span class="text-base-content/70">{{ $post->user->name }}</span>
         <span class="text-base-content/70">{{ $post->created_at->diffForHumans() }}</span>
         <div>
            @foreach ($post->tags as $tag)
                <div class="badge badge-outline badge-primary">{{ $tag->name }}</div>
            @endforeach
         </div>
         <div class="card-actions justify-end">
             @isset($posts)
                 <a href="{{ route('post', $post) }}" class="btn btn-primary">@lang('Read more')</a>
             @endisset
         </div>
     </div>
 </div>
