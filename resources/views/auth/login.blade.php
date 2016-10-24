@include('layouts.header')
<div class="container">
    <div class="bs-example" data-example-id="simple-ul">
        <form method="POST"  action="/auth/login">
            <div id="message">
            	<p><label>Please, login</label></p>
            </div>
            <label>
                <p>E-mail</p>
            </label>
                <p><input type="text" name="email" class="form-control" id="login" placeholder="E-mail"></p>
            <label>
                <p>Password</p>
            </label>
            <p><input type="password" name="password" class="form-control" id="pass" placeholder="Password"></p>
            <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
            <input type="submit" value="Login">
        </form>
    </div>
</div>
@include('layouts.footer')
