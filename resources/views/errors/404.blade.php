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
                <!-- <h3 class="panel-heading">IT REPORTER<a href="404">404</a></h3> -->
                <!-- <div class="panel-body"> -->

                <div class = "message">
                    
                    <div class="message-head"><h1>404</h1></div>
                    <div class="message-content"><p>Извините, этой странички не существует :( </p>
                    <p>Попробуйте начать с <a href="/">начала</a> </p></div>

                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<div class="backstretch" style="left: 0px;top: 0px;overflow: hidden;margin: 0px;padding: 0px;height: 974px;width: 1920px;z-index: -999999;position: fixed;"><img style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1920px; height: 1440.51px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -233.255px;" src="http://keenthemes.com/preview/metronic/theme/assets/pages/media/bg/1.jpg"></div>
@endsection
