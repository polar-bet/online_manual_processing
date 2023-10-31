@extends("admin.layouts.index")
@vite(['resources/js/select-2.js'])
@section("content")

    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.documentation.type.index')}}">Типи
                                    документації</a></li>
                            <li class="breadcrumb-item active">Створення типу документації</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Створення типу документації</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.documentation.type.store')}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group mb-3">
                                    <label for="name">Назва типу *</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Назва типу" value="{{old('name')}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Розділ *</label>
                                    <select name="documentation_section_id" class="s2 select2-hidden-accessible"
                                            data-placeholder="Тип документації"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                            aria-hidden="true">
                                        <option selected disabled>Оберіть розділ</option>
                                        @foreach($sections as $section)
                                            <option
                                                @selected($section->id == old('documentation_section_id')) value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('documentation_section_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="row justify-content-center pl-2 pr-2">
                                    <button type="submit" class="btn btn-primary w-100">Створити</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
