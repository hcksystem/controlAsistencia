@extends('app')
@section('content')
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-3 white">
            <div class="p-5 mt-5">
                <img src="assets/img/basic/logo.png" alt=""/>
            </div>
            <div class="p-5">
                <h3>Welcome Back</h3>
                <p>Hey Soldier welcome back signin now there is lot of
                    new stuff waiting
                    for you</p>
                {!! Form::open(['route'=>'login','method'=>'POST']) !!}
                {{-- <form action="{{ route('login') }}" method="POST"> --}}
                    {{ csrf_field() }}
                    <div class="form-group has-icon">
                        <i class="icon-envelope-o"></i>
                        {!! Form::email('email', null, ['class'=>'form-control form-control-lg', 'placeholder'=>'Email Address', 'require']) !!}
                    </div>
                    <div class="form-group has-icon"><i class="icon-user-secret"></i>
                        {!! Form::password('password', ['class'=>'form-control form-control-lg', 'placeholder'=>'password', 'require']) !!}
                    </div>
                    <a href="">
                        <p class="forget-pass">¿ Have you forgot your password ?</p>
                    </a>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                {{-- </form> --}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-9  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
             data-bg-possition="center"
             style="background: url('./assets/img/app/bgLogin.jpg') #FFEFE4">
        </div>
    </div>
</div>
@endsection