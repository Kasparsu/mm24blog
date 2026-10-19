 <div class="card bg-base-300 shadow-sm">
    @if($post->image)
     <figure>
        <img src="{{ $post->image->path }}" />
    </figure>
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
         <div class="card-actions justify-end">
            @isset($posts)
                <a href="{{ route('post', $post) }}" class="btn btn-primary">@lang('Read more')</a>
            @endisset 
         </div>
     </div>
 </div>
