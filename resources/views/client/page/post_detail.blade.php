@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid mb-5" src="{{ $post->image_url }}" alt="Post Image">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <p>Post <small><i>{{ $post->date }}</i></small> by <b>{{ $post->user->name }}</b></p>
                    <a href="{{ url("/") }}" class="btn btn-primary"> &laquo; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection