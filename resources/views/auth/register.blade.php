<!--
<form method="POST" action="/auth/register">
{!! csrf_field() !!}
<div>
Имя
<input type="text" name="name" value="{{ old('name') }}">
</div>
<div>
Email
<input type="email" name="email" value="{{ old('email') }}">
</div>
<div>
Пароль
<input type="password" name="password">
</div>
<div>
Подтверждение пароля
<input type="password" name="password_confirmation">
</div>
<div>
<button type="submit">Регистрация</button>
</div>
</form>
-->
@include('layouts.header')
<div class="container">
    <div class="bs-example" data-example-id="simple-ul">
        <form method="POST" action="/auth/register" enctype="multipart/form-data" class="control-group">
        	{!! csrf_field() !!}
            <div id="center">
                <p><label id="centerlabel">Registration:</label></p>
            </div>
            <label>
                <p>Login</p>
            </label>
            <div class="form-group">
                <p><input type="text" class="form-control" name="name" value="{{ old('name') }}"></p>
                <span id="helpBlock1" class="help-block"></span>
            </div>
            <label>
            	<p>E-mail</p>
            </label>
            <div class="form-group">
                <p><input type="email" class="form-control" name="email" value="{{ old('email') }}"></p>
                <span id="helpBlock2" class="help-block"></span>
                <span id="helpBlock3" class="help-block"></span>
            </div>
            <label>
                <p>Password</p>
            </label>
            <div class="form-group">
            <p><input type="password" class="form-control" name="password"></p>
                <span id="helpBlock4" class="help-block"></span>
            </div>
            <label>
                <p>Confirm password</p>
            </label>
            <div class="form-group">
            	<p><input type="password" class="form-control" name="password_confirmation"></p>
                <span id="helpBlock4" class="help-block"></span>
            </div>        
            <p><button type="submit" name="Send" id="Send" class="btn btn-primary">Registration</button></p>
        </form>
    </div>
</div>
@include('layouts.footer')