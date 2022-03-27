<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset("resources/css/style.css") }}">
    <title>Личный кабинет</title>
</head>
<body>
    <header class="header d-flex">
        <ul class="nav-list">
            <li class="item"><h4>Личный кабинет</h4></li>
            <li ><a href="logout" class="logout" style="padding-left: 30px">Выйти</a></li>
        </ul>
</header>
<div class="container mt-4">
    <h4>Данные пользователя:</h4>
    <h6>ID: {{ Auth::user()->id }}</h6>
    <h6>Имя: {{ Auth::user()->name }}</h6>
    <h6>Email: {{ Auth::user()->email }}</h6>
    <a href="update" class="btn btn-primary mt-3">Редактировать профиль</a>
</div>
</body>
</html>
