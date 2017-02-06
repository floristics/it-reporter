@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ url('/') }}/images/sdslogo.png" alt="">
                </a>
            </div>
            <div class="panel panel-default">
                <h3 class="panel-heading">IT REPORTER</h3>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">

                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Логин" required autofocus>
                            </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="checkbox">
                                    <input type="checkbox" name="remember"> Запомнить меня
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-custom">
                                    Войти
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-6">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Забыли свой пароль?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="backstretch" style="left: 0px;top: 0px;overflow: hidden;margin: 0px;padding: 0px;height: 974px;width: 1920px;z-index: -999999;position: fixed;"><img style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1920px; height: 1440.51px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -233.255px;" src="http://keenthemes.com/preview/metronic/theme/assets/pages/media/bg/1.jpg"></div>
@endsection
