@extends('admin.layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="{{ url('admin/post') }}" class="btn btn-secondary mb-3">
                Back
            </a>
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                @foreach ($post->images as $image)
                    <img src="{{ $image->post_image_link }}" alt="">
                @endforeach
                <p>
                    {{ $post->content }}
                </p>
                </div>
                <div class="card-footer">
                    @foreach ($post->categories as $categroy)
                        {{ $categroy->name }} 
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                    <br><hr>
                    Posted by {{ $post->user->name }} on <b>{{ $post->created_at->diffForHumans() }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection

