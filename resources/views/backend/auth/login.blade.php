@extends('backend.layouts.master')

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="text-center mb-6">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card-group mb-0">
                                    <div class="card p-4">
                                        <div class="card-body">
                                            <h1>{{ __('Login') }}</h1>
                                            @if(Session::has('success'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('success') }}
                                                    @php
                                                    Session::forget('success');
                                                    @endphp
                                                </div>
                                            @endif
                                            @if ($message = Session::get('error'))
                                                <div class="alert alert-danger alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                            <p class="text-muted">{{ __('Log In to your account') }}</p>
                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="email" name="email" class="form-control" placeholder="{{ __('Enter Your Email') }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                                <div class="input-group mb-4">
                                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                    <input type="password" name="password" class="form-control" placeholder="{{ __('Enter Your Password') }}">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-gradient-primary btn-block">{{ __('Login') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
