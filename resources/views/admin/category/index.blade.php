@extends('admin.layouts.master')

@section('title', 'All Category')

@section('content')
    <div class="container-fluid">
        <!-- Create and Search (Start) -->
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus-circle"></i> Create
                </a>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="input-group input-group">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search">
            
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Create and Search (End) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body p-0">
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Actions</td>
                        </tr>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ Str::limit($category->description, 50 ) }} </td>
                            <td>
                                <a href="{{ url("admin/category/$category->id") }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url("admin/category/$category->id/edit") }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url("admin/category/$category->id/delete") }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <h3>This is no Category {{ request('search') ?? '' }}</h3>
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection