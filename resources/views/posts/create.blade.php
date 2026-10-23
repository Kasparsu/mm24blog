@extends('partials.layout')
@section('content')
    <div class="container mx-auto">

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
            class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
            @csrf
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Title</legend>
                <input name="title" value="{{ old('title') }}" type="text"
                    class="input w-full @error('title') input-error @enderror" placeholder="Title" />
                @error('title')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Content</legend>
                <textarea name="body" class="textarea h-36 w-full @error('body') textarea-error @enderror"
                    placeholder="Some content here">{{ old('body') }}</textarea>
                @error('body')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Image</legend>
                <input name="images[]" type="file" multiple accept="image/*"
                    class="file-input w-full @error('images.*') file-input-error @enderror" />
                @error('images.*')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tags</legend>
                <div class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" aria-label="{{ $tag->name }}"
                            class="btn btn-sm" @checked(in_array($tag->id, old('tags', []))) />
                    @endforeach
                </div>
                <span class="label">Optional</span>
            </fieldset>
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
