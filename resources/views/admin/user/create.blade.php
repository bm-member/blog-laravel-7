@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('message.alert')
        </div>
        <div class="col-md-12 mb-3">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create
            </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users List</h3>
            
                    <div class="card-tools">
                        <form>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control float-right" placeholder="Search">
                
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.user.destroy', ['user' => $user->id]) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There is no user.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            {{ $users->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>

@endsection