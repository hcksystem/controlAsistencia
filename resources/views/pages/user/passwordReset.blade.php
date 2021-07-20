@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white">
<i class="mr-2 icon-security"></i>
Cambio de Contraseña
</h1>
@endsection
@section('top-menu')
{{-- @include('pages.account.headbar') --}}
@endsection
@section('maincontent')
<div>
    @include('alerts.toastr')
</div>
<div class="page  height-full">
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="col-md-12">
                <div class="card">
                    <div class="form-group">
                        <div class="card-header white">
                            <h6><i class="mr-2 icon-security"></i> CAMBIO DE CONTRASEÑA </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'passwordUpdate','method'=>'PUT', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
                        <div class="row">
                            <div class="form-group col-4 m-0" id="email_group">
                                <i class="icon-envelope-o"></i>
                                {!! Form::label('email', 'Correo', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::email('email', null, ['class'=>'form-control r-0 light s-12', 'id'=>'email','onfocus'=>'inputClear(this.id)']) !!}
                                <span class="email_span"></span>
                            </div>
                            <div class="form-group col-4 m-0" id="password_group">
                                <i class="icon icon-user-secret"></i>
                                {!! Form::label('password', 'Contraseña', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::password('password', ['class'=>'form-control r-0 light s-12', 'id'=>'password','onfocus'=>'inputClear(this.id)']) !!}
                                <span class="password_span"></span>
                            </div>
                            <div class="form-group col-4 m-0" id="name_group">
                                <i class="icon-check"></i>
                                {!! Form::label('password confirm', 'Confirmar Contraseña', ['class'=>'col-form-label s-12', 'onfocus'=>'inputClear(this.id)']) !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control r-0 light s-12', 'id'=>'password-confirm']) !!}
                                <span class="password_confirm_span"></span>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Restablecer Contraseña</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {
$('#category').addClass('active');
});
</script>
@endsection
{{-- @extends('app')
@section('content')
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-3 white">
            <div class="p-5 mt-5">
                <img src="../../assets/img/basic/logo.png" alt=""/>
            </div>
            <div class="p-5 login-form">
                <h3>Restablecimiento de contraseña</h3>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <div class="form-group has-icon">
                        <i class="icon-envelope-o"></i>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group has-icon">
                        <i class="icon-user-secret"></i>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group has-icon">
                        <i class="icon-check"></i>
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirm">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
            data-bg-possition="center"
            style="background: url('../../assets/img/app/bgLogin.jpg') #FFEFE4; background-position: center center; background-repeat: no-repeat;
            background-size: cover;">
        </div>
    </div>
</div>
@endsection --}}