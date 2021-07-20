@extends('app')
@section('content')
<div>
    @include('alerts.toastr')
</div>
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-4 white">
            <div class="p-5 mt-5">
                <img src="assets/img/basic/logoadm.png" alt=""/>
            </div>
            <div class="p-5 login-form">
                <h3>Welcome Back</h3>
                <p>Hey Soldier welcome back signin now there is lot of
                    new stuff waiting
                    for you</p>
                {!! Form::open(['route'=>'login','method'=>'POST']) !!}
                    {{ csrf_field() }}
                    <div class="form-group has-icon">
                        <i class="icon-envelope-o"></i>
                        {!! Form::email('email', null, ['class'=>'form-control form-control-lg', 'placeholder'=>'Email Address', 'require']) !!}
                        @error('email')
                        <span class="help-block text-danger">
                            {{ $message }}
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group has-icon"><i class="icon-user-secret"></i>
                        {!! Form::password('password', ['class'=>'form-control form-control-lg', 'placeholder'=>'password', 'require']) !!}
                        @error('password')
                        <span class="help-block text-danger">
                            {{ $message }}
                        </span>
                        @enderror 
                    </div>
                    <a href="#" onclick="mostrarForm('passwordReset')">
                        <p class="forget-pass">¿ Olvidaste tu contraseña ?</p>
                    </a>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                {!! Form::close() !!}
            </div>
            <div class="p-5 form-passwordReset" style="display:none;" > 
                @include('auth.passwords.email')
            </div>
        </div>
        <div class="col-md-8  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
             data-bg-possition="center"
             style="background: url('./assets/img/app/bgLogin.jpg') #FFEFE4; background-position: center center; background-repeat: no-repeat;
    background-size: cover;">
        </div>
    </div>
</div>
<script>
  function mostrarForm(key){ 
      switch (key) {
        case 'passwordReset':
            $(".login-form").hide();
            $(".form-passwordReset").show('fast');
        break;
        case 'register':
            $(".login-form").hide();
            $(".form-passwordReset").hide();
            $(".form-register").show('fast');
        break;
        case 'login':
            $(".form-passwordReset").hide();
            $(".form-register").hide();
            $(".login-form").show('fast');
        break;
      }
  }
</script>
@endsection