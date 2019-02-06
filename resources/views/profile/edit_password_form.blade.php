@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        @if($errors->count())
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{$error}}<br>
                            @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('change.confirm') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="password_old" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                <div class="col-md-6">
                                    <input id="oldpass" type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}" placeholder="Old Password" name="password_old" required autofocus>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="newpass" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" placeholder="New Password" name="new_password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Repeat New Password') }}</label>
                                <div class="col-md-6">
                                    <input id="newpass2" type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" placeholder="Repeat New Password" name="new_password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change') }}
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
