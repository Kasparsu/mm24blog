@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary">New Post</a>
        {{ $posts->links() }}
        <table class="table table-zebra">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover:bg-base-300">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <div class="join">
                                <a class="btn btn-info">View</a>
                                <a class="btn btn-warning">Edit</a>
                                <a class="btn btn-error">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tfoot>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
