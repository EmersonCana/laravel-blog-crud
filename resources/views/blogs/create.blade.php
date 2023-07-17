@extends('layouts.layout')

@section('body')
<div class="m-auto" style="text-align: center;">
    <form action="/blogs/create" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="body" placeholder="Body"><br>
        <input type="text" name="thumbnail_url" placeholder="Thumbnail URL"><br>
        <button type="submit">Post</button>
    </form>
</div>


@endsection