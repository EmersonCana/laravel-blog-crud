@extends('layouts.layout')

@section('body')
<div class="m-auto" style="text-align: center;">
    <form action="/blogs/edit/{{$blog->id}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{$blog->title}}"><br>
        <input type="text" name="body" placeholder="Body" value="{{$blog->body}}"><br>
        <input type="text" name="thumbnail_url" placeholder="Thumbnail URL" value="{{$blog->thumbnail_url}}"><br>
        <button type="submit">Edit</button>
    </form>
</div>


@endsection