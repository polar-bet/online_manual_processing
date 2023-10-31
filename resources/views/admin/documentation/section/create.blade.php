@extends("admin.layouts.index")

@section("content")

    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.documentation.section.index')}}">Розділи
                                    документації</a></li>
                            <li class="breadcrumb-item active">Створення розділу документації</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Створення розділу документації</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.documentation.section.store')}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name">Назва розділу *</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Назва розділу" value="{{old('name')}}">
                                    @error('name')
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
