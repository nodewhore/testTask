<!DOCTYPE html>
<html lang="ru">
<?php
    function gen_password($length = 6)
{
	$chars = 'qazxswedcvfrtgbnh#ndspyujmkiosiriusqllp1234567890QAZ1fdXSWEDfds%CVFRTG2BNHsdfYU$J1fsdMK#@IOLP';
	$size = strlen($chars) - 1;
	$password = '';
	while($length--) {
		$password .= $chars[random_int(1, $size)];
	}
	return $password;
}
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset("resources/css/style.css") }}">
    <title>Регистрация</title>
</head>
<body>
    <div class="wrapper s mb-4">
        <div class="wrap">
        <form method="POST" action="{{ route('user.signup') }}">
        @csrf
        <p class="signing">Регистрация</p>
        <input type="email" class="login_form" name="email" placeholder="Email" required>
        @error('email')
        <div class="msg">{{ $message }}</div>
        @enderror
        <br>
        <input type="text" class="login_form" name="name"  placeholder="Имя" required>
        <br>
        @error('name')
        <div class="msg">{{ $message }}</div>
        @enderror
        <input type="text" class="login_form" name="password"  placeholder="Пароль" required>
        <br>
        <input type="text" class="login_form" name="password2"  placeholder="Повторите пароль" required>
        <br>
        @error('password')
        <div class="msg">{{ $message }}</div>
        @enderror
        <label for="login_form">Рекомендуемый пароль</label>
        <input type="text" class="login_form"  value="{{ gen_password(12) }}">
        <br>
        <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me" control-id="ControlID-3"> Я согласен с условиями <a href="#">пользовательского соглашения</a>
        </label>
    </div>
        <button type="submit" class="sign_button register-btn">Зарегистрироваться</button>
    </form>
    <p>Есть аккаунт? <a href="/"class="reset">Авторизуйтесь!</a></p>
    <div class="reset">
    <a href="reset" class="reset">Забыли пароль?</a>
</div>
</div>
</div>
</body>
</html>
