@extends('front.master')
@section('title','เข้าสู่ระบบ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <span style="color:#71BA51;font-size: 20px; ">{{__('auth.text_login')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">{{__('auth.email')}}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">{{__('auth.password')}}</label>
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> จำรหัสผ่าน
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    เข้าสู่ระบบ
                                </button>

                                <a class="btn btn-success" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่านหรือไม่?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
