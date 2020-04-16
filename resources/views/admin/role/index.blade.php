@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('message.alert')
        </div>
        @can('create role')
        <div class="col-md-12 mb-3">
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create
            </a>
        </div>
        @endcan
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Roles List</h3>

                    <div class="card-tools">
                        <form>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control float-right" placeholder="Search">

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
                                <th>Role</th>
                                <th>Date</th>
                                {{-- @canany(['edit roles', 'delete roles']) --}}
                                <th>Actions</th>
                                {{-- @endcanany --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->date }}</td>
                                <td>
                                    @can('edit role')
                                    <a href="{{ route('admin.role.edit', ['role' => $role->id]) }}" class="btn btn-success btn-sm float-left mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan 
                                    @can('delete role')
                                    <form method="post" class="float-left"
                                        onsubmit="return confirm('Are you sure want to delete it?')"
                                        action="{{ route('admin.role.destroy', ['role' => $role->id ]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                        {{ $role->isDisabled() }}
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">There is no role.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            {{ $roles->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>

@endsection