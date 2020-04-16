@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('message.alert')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.role.update', ['role' => $role->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" {{ $role->isDisabled() }}
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Permission: </label>
                        </div>
                        <div class="row">
                            @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                        id="{{ Str::slug($permission->name) }}"
                                        {{ $role->isDisabled() }}
                                        {{ $role->isChecked($permission) }}
                                        class="form-check-input">
                                    <label class="form-check-label {{ $permission->isDeleteLabel() }}"
                                        for="{{ Str::slug($permission->name) }}">
                                        {{ Str::title($permission->name) }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @unless ($role->isAdmin())
                        <button type="submit" class="btn btn-primary">Update</button>
                        @endunless
                        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection