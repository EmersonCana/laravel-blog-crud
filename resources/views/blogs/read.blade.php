@extends('layouts.layout')

@section('body')

    <div class="row">
        <div class="col-9">
            <img src="{{$blog->thumbnail_url}}" alt="" width="100%">
            <br>
            <p class="h1">{{$blog->title}}</p>
            <span class="small">{{$blog->created_at}}</span><br>
            @if($user_id == $blog->user_id)
                <a href="/blogs/edit/{{$blog->id}}" class="btn btn-none">Edit</a> | 
                <button type="button" class="btn btn-none" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                Delete
                </button>
            @endif
            <hr>
            <p>
            {{$blog->body}}
            </p>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Related Blogs
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>


@include('blogs.components.confirm-delete-modal')

@endsection