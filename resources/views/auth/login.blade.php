@extends('layouts.frontend')

@section('content')
{{-- @php $theme = 1; @endphp --}}
{{-- @php $theme = 2; @endphp --}}
@php $theme = 3; @endphp
<div class="container">
    <div class="row justify-content-center">
        @if($theme == 1)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @elseif($theme == 2)
            <div class="col-md-12 login-1">
                <div class="register-photo">
                    <div class="form-container">
                        <div class="image-holder"></div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <h2 class="text-center"><strong>Welcome back!</strong></h2>
                            <div class="form-group">
                                <input  id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" email="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}> 
                                        <label class="form-check-label" for="flexCheckDefault"> Remember me </label> 
                                        </div>
                                    <div> <a href="#" class="text-info">Forgot Password</a> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block btn-info mt-3" type="submit">Login</button>
                            </div>
                            <a class="already" href="#">Terms of Use and Privacy Policy</a>
                        </form>
                    </div>
                </div>
            </div>
        @elseif($theme == 3)
        <div class="col-md-12 login-2">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('processLogin') }}">
                            @csrf
                            <div class="form">
                                <h2>Login</h2>
                                <div class="inputbox mt-3">
                                     <span>Email</span> <input id="email" type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                                     @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                     </div>
                                    <div class="inputbox mt-3"> 
                                        <span>Password</span> <input od="password" type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"> 
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="w-100"> 
                                            <button class="btn first-btn btn-block">Login </button> 
                                        </div> 
                                    </div>
                                    <a href="#">Forgot Password?</a>
                                    {{-- <div class="form-check mt-2"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> I agree to the terms and conditions of <a href="" class="login">Privacy & Policy</a> </label> </div> --}}

                                    <div class="sign-up-options">
                                        <div class="top">
                                            <div class="divider"></div>
                                            <span class="or ">OR</span>
                                            <div class="divider"></div>
                                        </div>
                                        <div class="bottom">
                                            <button class="btn-sign-up" type="button">
                                                {{-- <adiv class="logo"><div class="icon social-white-background social-white-fb-blue-png"></div></adiv> --}}
                                                <div class="">Facebook</div>
                                            </button>
                                            <button class="btn-sign-up" type="button">
                                                {{-- <div class="logo"><div class="icon social-white-background social-white-google-png" ></div></div> --}}
                                                <div class="">Google</div>
                                            </button>
                                            <button class="btn-sign-up" type="button">
                                                {{-- <div class="logo"><div class="icon social-white-background social-white-apple-black-png" ></div></div> --}}
                                                <div class="">Apple</div>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="w-100 text-center mt-3">
                                        <span>New to StoreName? </span> &nbsp;
                                        <a href="/register" class="second-btn">Sign up</a>

                                    </div>
                                    
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center mt-5"> <img src="https://i.imgur.com/98GXnDD.png" width="400"> </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
