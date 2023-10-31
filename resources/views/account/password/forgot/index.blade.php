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
        <div class="card card-primary">
            <form action="{{route('account.password.forgot.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="card-body justify-content-between" style="display: flex; flex-direction: row;">
                    <div id="placeholder" class="form-group w-50">
                        <h1>Скидання паролю</h1>
                        <p>Ви забули свій пароль, введіть вашу електронну пошту, щоб на неї прийшов новий пароль</p>
                    </div>
                    <div id="mail-holder" class="form-group justify-content-start" style="display: flex; align-items: flex-start; flex-direction: column; justify-content: center">
                        <label>Електронна пошта</label>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Електронна пошта">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary">Відправити</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
