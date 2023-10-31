@extends('layouts.index')
@vite(['resources/sass/user_office.scss'])
@section('title', 'Особистий кабінет')
@section('content')
    <div class="main">
        <div class="main__container user-container">
            <div class="user-container container-top">
                <div class="container-top__user-image">
                    <img src="{{asset($user->avatar)}}" alt="user-image">
                </div>
                <div class="container-top__functional-buttons functional-buttons">

                    <button class="functional-buttons__edit-button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"></button>

                    <a href="{{route('logout')}}" class="functional-buttons__logout-button"></a>

                </div>
            </div>
            <div class="user-container__content">
                <div class="user-container__user-info">
                    <div class="user-container__user-name">
                        {{$user->name}}
                    </div>
                    <div class="user-container__user-status">
                        {{$user->role->name}}
                    </div>
                </div>
                <div class="user-container__user-data user-data">
                    <div class="user-data__content">
                        <div class="user-data__user-email">
                            <div class="user-data__email-title">
                                <div class="user-data__email-icon"></div>
                                <span>Електронна пошта:</span>
                            </div>
                            <div class="user-data__email-value">
                                {{$user->email}}
                            </div>
                        </div>
                        <div class="user-data__registration-date">
                            <div class="user-data__registration-date-title">
                                <div class="user-data__registration-date-icon"></div>
                                <span>Дата реєстрації:</span>
                            </div>
                            <div class="user-data__registration-date-value">
                                {{\Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-office.update', auth()->user()->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Редагування облікового
                                        запису</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3 justify-content-center">
                                        <div class="main__input-file-holder" id="avatar-placeholder">
                                            <input type="file" class="main__avatar-upload" name="avatar"
                                                   id="avatar-upload"
                                                   accept=".svg, .png, .jpg, .gif, .jpeg">
                                        </div>
                                        @error('avatar')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ім'я</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Ім'я"
                                               value="{{auth()->user()->name}}">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Електронна пошта</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="Електронна пошта"
                                               value="{{auth()->user()->email}}">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    @if(auth()->user()->role->status == 'user')
                                        <label class="form-label">Роль</label>
                                        <select name="role_id" class="form-control form-select-sm"
                                                aria-label=".form-select-sm example">
                                            @foreach($roles as $role)
                                                @if($role->status == 'user')
                                                    <option
                                                        @selected(auth()->user()->role_id == $role->id) value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    @endif
                                </div>
                                <script>
                                    let avatar = document.getElementById('avatar-placeholder');
                                    let upload = document.getElementById('avatar-upload');
                                    window.onload = function () {
                                        avatar.style.backgroundImage = 'url("{{ auth()->user()->avatar }}")';
                                    }
                                    upload.onchange = function () {
                                            avatar.style.backgroundImage = 'url("' + URL.createObjectURL(upload.files[0]) + '")';
                                    }

                                </script>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна
                                    </button>
                                    <button type="submit" class="btn btn-primary">Редагувати</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
