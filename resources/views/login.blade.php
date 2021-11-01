@extends('layouts.app')

@section('content')
<div class="container">
<br>
    <center><img height="160" src="/images/logo.png" alt=""></center>
    <br>
	<center><h1><b>LOGIN PAGE</b></h1></center>
    <br>
    <div class="row">
        <div class="col-md">
            <div class="panel-body">

                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-4">
                            <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-4">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control input-lg" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-lg btn-block btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>    
                </form>

                <div class="col-md-12">
                    <br>
                    <center><a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a> | <a class="btn btn-link" href="https://pickupsoccer.net/register">Create new account?</a></p></center> 
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
    <br>
        <center><p class="smx">© Copyright 2017-2020 PickupSoccer.net</p></center>
        <center><p class="smx">Powered by <a class="smx" href="https://baffledjet.com" target="_blank">BAFFLEDJET.COM</a></p></center>
    </div>
</div>

@endsection


