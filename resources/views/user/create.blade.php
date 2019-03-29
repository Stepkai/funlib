@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-10 offset-md-1">
                            @if(empty($user->id))
                                <h3 class="style-header" style="padding-top: 40px">ADD NEW USER</h3>
                            @else
                                <h3 class="style-header" style="padding-top: 40px">EDIT USER</h3>
                            @endif
                        </div>
                        <div class="col-md-10 offset-md-1">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            <form method="POST" action="{!! route('save', ['id' => $user->id]) !!}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                        <input id="name" type="name" placeholder="Enter your name"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ $user->name }}" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                        <input id="email" type="email" placeholder="Enter your email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $user->email }}" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                        <input id="password" type="password" placeholder="Password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                        <input id="password-confirm" type="password" placeholder="Repeat your password"
                                               class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                        <select name="role">
                                            <option disabled>Choice role</option>
                                            @if(!empty($user->id))
                                                <option value="{{$user->role}}">{{$user->role}}</option>
                                            @endif
                                            <option value="admin">Admin</option>
                                            <option value="client">Client</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-10 offset-md-1">
                                        <button type="submit" class="btn btn-secondary w-100">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection