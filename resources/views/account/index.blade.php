@extends('layouts.index')
@vite(['resources/sass/account_page.scss', 'resources/js/account.js'])
@section('title', 'Авторизація')
@section('content')
    <div class="main">
        <div class="main__error-field">
            <div class="main__error-content">
                @error('avatar')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
                @error('name')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
                @error('email')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
                @error('role_id')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
                @error('password')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
                @error('password_confirmation')
                <div>
                    <p class="text-danger">{{$message}}</p>
                </div>
                @enderror
            </div>
            <span class="main__close-button">&#10006;</span>
        </div>
        @if(session()->has('message'))
            <div class="main__info-field">
                <div class="main__info-content">
                    {{ session('message') }}
                </div>
                <span class="main__close-button">&#10006;</span>
            </div>
        @endif
        <script>
            // Отримати посилання на поле з помилками
            var errorField = document.querySelector('.main__error-field');
            var closeButton = document.querySelector('.main__close-button');
            var errors = document.querySelectorAll('.main__error-content div p');
            var hasError = false;
            errors.forEach(error => {
                if (error.innerHTML == null) {
                    error.style.display = 'none';
                } else {
                    hasError = true;
                }
            })
            $('.main__close-button').click(function () {
                $(this).parent().hide();
            });

            // Перевірити, чи є помилки
            // Додати клас для відображення поля з помилками
            if (hasError) {
                errorField.classList.toggle('error-field--active')
            }

            // Створити елемент хрестика для схову поля з помилками


            // Додати обробник події для схову поля з помилками при натисканні на хрестик
            closeButton.addEventListener('click', function () {
                errorField.classList.toggle('error-field--active');
            });

        </script>
        <div class="main__container {{(isset($mode) && ($mode == 'reg') ? 'right-panel-active' : '')}}" id="container">
            <!-- registration form -->
            <div class="main__form-container register-container">
                <form class="main__form" action="{{route('account.registration.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <h1 class="main__form-title">
                        Реєстрація
                    </h1>
                    <div class="main__input-file-holder" id="avatar-placeholder">
                        <input type="file" class="main__avatar-upload" name="avatar" id="avatar-upload"
                               accept=".svg, .png, .jpg, .gif, .jpeg">
                    </div>
                    <div class="main__form-group">
                        <input type="text" class="main__form-input" value="{{old('name')}}" name="name"
                               placeholder="Ім'я" required="required">
                        <label class="main__form-label">Ім'я</label>
                    </div>

                    <div class="main__form-group">
                        <input type="email" class="main__form-input" placeholder="Електронна пошта"
                               value="{{old('email')}}" name="email" required="required">
                        <label class="main__form-label">Електронна пошта</label>
                    </div>

                    <div class="main__form-group">
                        <select class="main__form-input" name="role_id" required="required">
                            <option selected disabled>Оберіть роль</option>
                            @foreach($roles as $role)
                                @if($role->status == 'user')
                                    <option
                                        @selected(old('role_id') == $role->id) value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label class="main__form-label">Роль</label>
                    </div>
                    <div class="main__form-group">
                        <input type="password" class="main__form-input" placeholder="Пароль" value="{{old('password')}}"
                               name="password" required="required">
                        <label class="main__form-label">Пароль</label>
                    </div>

                    <div class="main__form-group">
                        <input type="password" class="main__form-input" placeholder="Підтвердіть пароль"
                               name="password_confirmation" required="required">
                        <label class="main__form-label">Підтвердіть пароль</label>
                    </div>
                    <button type="submit"><span>Зареєструватись</span></button>
                </form>
            </div>
            <div class="main__form-container login-container">
                <!-- login form -->
                <form class="main__form" action="{{route('account.authorization.store')}}" method="post">
                    @csrf
                    @method('post')
                    <h1 class="main__form-title">
                        Увійти
                    </h1>
                    <div class="main__form-group">
                        <input type="email" class="main__form-input" name="email" placeholder="Електронна пошта"
                               value="{{isset($_COOKIE['email']) ? $_COOKIE['email'] : null}}" required="required" >
                        <label class="main__form-label">Електронна пошта</label>
                    </div>
                    <div class="main__form-group">
                        <input type="password" class="main__form-input" name="password" placeholder="Пароль"
                               required="required" value="{{isset($_COOKIE['password']) ? $_COOKIE['password'] : null}}">
                        <label class="main__form-label">Пароль</label>
                    </div>
                    <div class="main__login-functions">
                        <div class="main__login-checkbox">
                            <input type="checkbox" class="main__checkbox" name="remember" id="remember" {{isset($_COOKIE['email']) ? 'checked' : ''}}>
                            <label>запам'ятати мене</label>
                        </div>
                        <div class="main__forgot-pass">
                            <a href="{{route('account.password.forgot.index')}}" class="main__pass-link">Забули
                                пароль?</a>
                        </div>
                    </div>
                    <button type="submit"><span>Увійти</span></button>
                </form>
            </div>

            <div class="main__overlay-container">
                <div class="main__overlay">
                    <div class="main__overlay-panel overlay-left">
                        <h1 class="main__overlay-title">Вітаємо <br> друзі</h1>
                        <p>Якщо ви вже маєте обліковий запис, увійдіть тут</p>
                        <button class="main__login-link" id="login"><span>Увійти</span>
                            <i class="lni lni-arrow-left login"></i>
                        </button>
                    </div>
                    <div class="main__overlay-panel overlay-right">
                        <h1 class="main__overlay-title">Почніть просто<br> зараз</h1>
                        <p>Якщо ви не маєте облікового запису, зареєструватись тут.</p>
                        <button class="main__login-link" id="register"><span>Зареєструватись</span>
                            <i class="lni lni-arrow-right register"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__small-screen-container">
            <input type="checkbox" id="chk" aria-hidden="true" {{(isset($mode) && ($mode == 'reg') ? 'checked' : '')}}>
            <div class="main__small-screen-login">
                <form class="main__small-screen-form small-login-form" action="{{route('account.authorization.store')}}"
                      method="post">
                    @csrf
                    @method('post')
                    <label for="chk" class="main__small-screen-label login-label" aria-hidden="true">Увійти</label>
                    <div class="main__form-group">
                        <input type="email" name="email" class="main__form-input" placeholder="Електронна пошта"
                               required="required" value="{{isset($_COOKIE['email']) ? $_COOKIE['email'] : null}}">
                        <label class="main__form-label">Електронна пошта</label>
                    </div>
                    <div class="main__form-group">
                        <input type="password" class="main__form-input" name="password" placeholder="Пароль"
                               required="required" value="{{isset($_COOKIE['password']) ? $_COOKIE['password'] : null}}">
                        <label class="main__form-label">Пароль</label>
                    </div>
                    <div class="main__login-functions">
                        <div class="main__login-checkbox">
                            <input type="checkbox" class="main__checkbox" name="remember" id="remember" {{isset($_COOKIE['email']) ? 'checked' : ''}}>
                            <label>запам'ятати мене</label>
                        </div>
                        <div class="main__forgot-pass">
                            <a href="{{route('account.password.forgot.index')}}" class="main__pass-link"><span>Забули пароль?</span></a>
                        </div>
                    </div>
                    <button type="submit"><span>Увійти</span></button>
                </form>
            </div>

            <div class="main__small-screen-register">
                <form class="main__small-screen-form small-register-form"
                      action="{{route('account.registration.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <label for="chk" class="main__small-screen-label register-label"
                           aria-hidden="true">Реєстрація</label>

                    <div class="main__input-file-holder" id="avatar-placeholder-small">
                        <input type="file" class="main__avatar-upload" name="avatar" id="avatar-upload-small"
                               accept=".svg, .png, .jpg, .gif, .jpeg">
                    </div>
                    <div class="main__form-group">
                        <input type="text" class="main__form-input" name="name" placeholder="Ім'я" required="required"
                               value="{{old('name')}}">
                        <label class="main__form-label">Ім'я</label>
                    </div>
                    <div class="main__form-group">
                        <input type="email" class="main__form-input" name="email" placeholder="Електронна пошта"
                               required="required" value="{{old('email')}}">
                        <label class="main__form-label">Електронна пошта</label>
                    </div>
                    <div class="main__form-group">
                        <select class="main__form-input" name="role_id" required="required">
                            <option selected disabled>Оберіть роль</option>
                            @foreach($roles as $role)
                                @if($role->status == 'user')
                                    <option
                                        @selected(old('role_id') == $role->id) value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label class="main__form-label">Роль</label>
                    </div>
                    <div class="main__form-group">
                        <input type="password" class="main__form-input" name="password" placeholder="Пароль">
                        <label class="main__form-label">Пароль</label>
                    </div>
                    <div class="main__form-group">
                        <input type="password" class="main__form-input" name="password_confirmation"
                               placeholder="Підтвердіть пароль">
                        <label class="main__form-label">Підтвердіть пароль</label>
                    </div>
                    <button type="submit"><span>Зареєструватись</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection
