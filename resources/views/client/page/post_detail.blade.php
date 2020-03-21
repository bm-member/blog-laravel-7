@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <p>Post {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</p>
                    <a href="{{ url("/") }}" class="btn btn-primary"> &laquo; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection