@extends('admin.layouts.master')

@section('title', 'Category Create')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3"> --}}
            <a href="{{ url('admin/category') }}" class="btn btn-secondary mb-3">
                Back
            </a>
        </div>
        <div class="col-md-12">
            @include('message.alert')

            <div class="card card-body">
                <form action="{{ url('admin/category') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection