@extends('admin.layouts.master')

@section('title', 'Post Create')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('admin/post') }}" class="btn btn-secondary mb-3">
                Back
            </a>
        </div>
        <div class="col-md-12">

            @include('message.danger')

            <div class="card card-body">
                <form action="{{ url('admin/post') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Post Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Post Content</label>
                        <textarea name="content" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Post Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection