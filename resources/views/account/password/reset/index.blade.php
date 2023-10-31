@extends('layouts.index')
@section('title', 'Забули пароль')
@vite(['resources/sass/forgot_page.scss'])
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <div class="content justify-content-center mt-5 mb-5">
        <form action="{{route('account.password.reset.update', $token)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card card-primary">
                <div class="card-header justify-content-center text-center">
                    <div class="row">
                        <h3 class="card-title text-bold">Зміна паролю</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Електронна пошта</label>
                        <input type="email" name="email" class="form-control" placeholder="Електронна пошта">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" class="form-control" name="password"
                               placeholder="Пароль">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="text" name="token" hidden="hidden" value="{{$token}}">
                    <div class="form-group">
                        <label>Підтвердіть пароль</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Підтвердження паролю">
                    </div>

                </div>

                <div class="card-footer justify-content-center">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Змінити пароль</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
