@extends('layouts.layout')

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div class="categories">

                </div>
                <div class="end-menu">
                    <a href="/blogs/create" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            @foreach($blogs as $blog)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{$blog->thumbnail_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{$blog->body}}</p>
                        <div class="text-end">
                        <a href="/blogs/{{$blog->id}}" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection