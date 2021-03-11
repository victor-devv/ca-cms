@extends('layouts.app')

@section('content')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="https://i.imgur.com/CXQmsmF.png" class="logo" />
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://i.imgur.com/uNGdWHi.png" class="image" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h4 class="mb-0 mr-4 mt-2 text-center">Sign In</h4>
                        <div hidden>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3 mb-4" hidden>
                        <div class="line"></div>
                        <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row px-3">
                            <label for="email" class="mb-1">
                                <h6 class="mb-0 text-sm">{{ __('E-Mail Address') }}</h6>
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="chk1" type="radio" name="editor" class="custom-control-input" value="form" checked  />
                                <label for="chk1" class="custom-control-label text-sm active">Form Editor</label>
                            </div>

                            <div class="ml-auto custom-control custom-checkbox custom-control-inline">
                                <input id="chk2" type="radio" name="editor" class="custom-control-input" value="visual" />
                                <label for="chk2" class="custom-control-label text-sm">Visual Editor</label>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3 px-3">
                            <button type="submit" class="btn btn-primary text-center">
                                Login
                            </button>
                            <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <div class="row mb-4 px-3">
                            <small class="font-weight-bold">Don't have an account?
                                <a class="text-danger" href="/register">Register</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3 text-center">
                <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                    <span class="fa fa-facebook mr-4 text-sm"></span>
                    <span class="fa fa-google-plus mr-4 text-sm"></span>
                    <span class="fa fa-linkedin mr-4 text-sm"></span>
                    <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection