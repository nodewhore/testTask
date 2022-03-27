<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset("resources/css/style.css") }}">
    <title>Вход</title>
</head>
<body>

<div class="wrapper">

        <div class="wrap">

    <form method="POST" action="{{ route('user.sign') }}">
    @csrf
        @error('email')
        <div class="msg my-4">{{ $message }}</div>
        @enderror
        <p class="signing">Вход</p>
        <input type="text" class="login_form" name="email" placeholder="E-mail" required>
        <br>
        <input type="password" class="login_form" name="password"  placeholder="Пароль" required>
        @error('password')
        <div class="alert">{{ $message }}</div>
        @enderror
        @error('password')
        <div class="alert">{{ $form_error }}</div>
        @enderror
        <br>
        <button type="submit" class="sign_button login-btn">Войти</button>
    </form>
    <p>Нет аккаунта? <a href="/signup"class="reset">Зарегистрируйтесь!</a></p>
    <div class="reset">
    <a href="" class="reset">Забыли пароль?</a>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</div>
</div>
</div>
</body>
</html>
