@extends('admin.layouts.master')

@section('title')
{{ $category->name }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <a href="{{ url('admin/category') }}" class="btn btn-secondary mb-3">
            Back
        </a>
        <div class="card card-body">
            <p>Name: {{ $category->name }}</p>
            <p>Description: {{ $category->description }}</p>
        </div>
    </div>
</div>
@endsection