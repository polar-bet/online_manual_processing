@extends("admin.layouts.index")
@vite(['resources/js/admin-user-edit.js'])
@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Облікові записи</a></li>
                            <li class="breadcrumb-item active">Редагування</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Редагування облікового запису</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.user.update', $user->id)}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}"
                                           placeholder="Ім'я">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="input-group mb-3 justify-content-center">
                                    <img id="avatar-img" class="img-fluid" style="max-width: 80px; min-width: 80px"
                                         src="{{asset($user->avatar)}}"
                                         alt="avatar">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="avatar" class="custom-file-input"
                                               id="exampleInputFile" accept=".png, .jpg, .jpeg, .svg, .gif">
                                        <label class="custom-file-label"
                                               for="exampleInputFile">{{basename($user->avatar)}}</label>
                                    </div>
                                    @error('avatar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Роль</label>
                                    <select class="form-control" name="role_id">
                                        @foreach($roles as $role)
                                            <option
                                                @selected($user->role_id == $role->id) value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                @if (isset($user->muted_until) && \Carbon\Carbon::now()->lt($user->muted_until))
                                    <div class="row justify-content-center">
                                        <div class="info-box bg-gradient-red col-10">
                                        <span class="info-box-icon"><img
                                                src="{{asset('storage/images/exclamation-octagon.svg')}}"
                                                alt="icon"></span>
                                            <div class="info-box-content">
                                                <p class="text-bold">Користувачу обмежена можливість спілкування
                                                    до {{$user->muted_until}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Обмеження можливості спілкування</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        </div>
                                        <select class="form-control select-drop" name="muted_until">
                                            <option disabled selected>оберіть значення</option>
                                            @if(isset($user->muted_until) && \Carbon\Carbon::now()->lt($user->muted_until))
                                                <option
                                                    value="{{null}}">Зняти обмеження
                                                </option>
                                            @endif
                                            @php
                                            $word = (isset($user->muted_until) && \Carbon\Carbon::now()->lt($user->muted_until) ? 'продовжити ' : '');
                                            @endphp
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addMinutes(30)}}">{{$word}}
                                                на 30 хвилин
                                            </option>
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addHour()}}">{{$word}}
                                                на годину
                                            </option>
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addDay()}}">{{$word}}
                                                на день
                                            </option>
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addWeek()}}">{{$word}}
                                                на тиждень
                                            </option>
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addMonth()}}">{{$word}}
                                                на місяць
                                            </option>
                                            <option
                                                value="{{(isset($user->muted_until) ? \Carbon\Carbon::parse($user->muted_until) : \Carbon\Carbon::now())->addDays(9999)}}">{{$word}}
                                                назавжди
                                            </option>
                                        </select>
                                        @error('muted_until')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary w-100">Редагувати</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
