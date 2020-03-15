@extends('admin.layouts.master')

@section('title', 'Post All')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('admin/post/create') }}" class="btn btn-primary mb-3">
                Create
            </a>
        </div>
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ url("admin/post/$post->id") }}" class="btn btn-info">View</a>
                            <a href="{{ url("admin/post/$post->id/edit") }}" class="btn btn-success">Edit</a>
                            <a href="{{ url("admin/post/$post->id/delete") }}" class="btn btn-danger">Del</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection