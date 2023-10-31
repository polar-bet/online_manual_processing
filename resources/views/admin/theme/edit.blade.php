@extends("admin.layouts.index")

@section("content")

    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.theme.index')}}">Теми</a></li>
                            <li class="breadcrumb-item active">Редагування теми</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Редагування теми</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.theme.update', $theme->id)}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="title">Заголовок теми</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Заголовок" value="{{$theme->title}}">
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Опис</label>
                                    <textarea name="description" id="summernote">{{$theme->themeReply->first()->content}}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="row justify-content-center pl-2 pr-2">
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
