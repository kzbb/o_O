@extends('layouts.app')

@section('content')
    @auth
        <div class="text-center">
            <a class="btn btn-outline-primary" href="{{ url('/home') }}">Home</a>
        </div>
    @else
        <div class="card" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
            <div class="card-body px-3 py-3">
                
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col">
                        <input id="password" type="password"    class="form-control" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
                <div class="text-right">
                    <a class="btn btn-link btn-sm" href="{{ route('register') }}">
                        or Register
                    </a>
                </div>
            </div>
        </div>
    @endauth
@endsection