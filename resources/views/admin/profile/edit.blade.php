@extends('admin.layouts.master')

@section('title', auth()->user()->name)

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center mb-5">
                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                            alt="User profile picture">
                    </div>

                    <form method="post" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('put')
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col"> <b>Name</b> </div>
                                <div class="col">
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col"> <b>Email</b> </div>
                                <div class="col">
                                    <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-primary"><b>Update</b></button>
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary"><b>Back</b></a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection