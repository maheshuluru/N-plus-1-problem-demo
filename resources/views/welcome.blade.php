@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Comments</th>
                    <th>Author</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->comments_count }}</td>
                    <td>{{ $post->author->name }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
