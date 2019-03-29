@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Users</div>

                    <div class="card-body">
                        <div>
                            <a type="button" class="btn btn-info small" href="user/create">Add User</a>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Role</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a type="button" class="btn btn-info small" href="/user/edit/{{$user->id}}">Edit</a>
                                            <a type="button" class="btn btn-danger small"
                                               href="/user/delete/{{$user->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection