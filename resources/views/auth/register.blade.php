@extends('layouts.frontend')

@section('content')

@php $theme=1; @endphp
{{-- @php $theme=2; @endphp --}}

@if($theme == 1)
<div class="container d-flex justify-content-center align-items-center login-2">
    <div class="card mb-50">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('processRegistration') }}">
                    @csrf
                    <div class="form">
                        <h2>Sign up</h2>
                        <div class="inputbox mt-3">
                            <span>Full Name</span> 
                            <input id="name" type="text" placeholder="Full Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  required autocomplete="name" autofocus>

                           {{-- <div class="d-flex gap-md-0">
                            <input id="first_name" type="text" placeholder="First Name" name="first_name" class="form-control mr-2 @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"  required autocomplete="first_name" autofocus>
                            <input id="last_name" type="text" placeholder="Last Name" name="last_name" class="form-control ml-2 @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"  required autocomplete="last_name" autofocus>
                           </div> --}}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                         </div>
                            <div class="inputbox mt-3">
                                <span>Email</span> 
                                <input id="email" type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                            <div class="inp utbox mt-3"> 
                                <span>Password</span> <input id="password" type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"> 
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="inp utbox mt-3"> 
                                <span>Confirm Password</span> <input id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required autocomplete="password-confirmation"> 
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="w-100"> 
                                    <button class="btn btn-success first-btn btn-block mt-3">Sign up</button> 
                                </div> 
                            </div>

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
                                 <p style="font-size: 14px">By signing up, you agree to Store's 
                                <a href="#">Terms of Service & Privacy Policy</a></p>

                                <br>
                                <span>Have an account? </span> &nbsp;
                                <a href="/login" class="second-btn">Login</a>

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
@elseif($theme == 2)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
