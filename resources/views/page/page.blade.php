@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('InputURL') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeUrl') }}">
                        {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                            <div class="col-md-6">
                                <input id="url" class="form-control" name="url" value="{{ old('url') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Input') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
