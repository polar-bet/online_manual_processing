@extends("admin.layouts.index")
@vite(['resources/js/article.js', 'resources/js/admin-user-edit.js'])
@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.example.article.index')}}">Cтатті
                                    прикладів</a></li>
                            <li class="breadcrumb-item active">Редагування статті прикладів</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Редагування статті прикладів</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.example.article.update', $article->id)}}"
                                  enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="name">Назва *</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Назва статті" value="{{$article->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <label class="mb-3">Зображення *</label>
                                <div class="input-group mb-3 justify-content-center">
                                    <img id="avatar-img" class="img-fluid" style="max-width: 200px; min-width: 200px"
                                         src="{{asset($article->image)}}"
                                         alt="avatar">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input"
                                               id="exampleInputFile" accept=".png, .jpg, .jpeg, .svg, .gif">
                                        <label class="custom-file-label"
                                               for="exampleInputFile">{{basename($article->image)}}</label>
                                    </div>
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="summernote">Опис *</label>
                                    <textarea name="description" id="summernote">{{$article->description}}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Приклад *</label>
                                    <textarea class="form-control" style="resize: none"
                                              name="example">{{$article->example}}</textarea>
                                    @error("example")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Тип Прикладу *</label>
                                    <select class="s2 select2-hidden-accessible"
                                            name="example_type_id" data-placeholder="Тип документації"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($types as $type)
                                            <option
                                                @selected($article->exampleType->id == $type->id) value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('example_type_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-sm-5">Пов'язані функції</label>
                                    <div class="form-group">
                                        <select class="s2 select2 select2-hidden-accessible" multiple="multiple"
                                                name="featured_functions_id[]" data-placeholder="Пов'язані функції"
                                                style="width: 100%;" data-select2-id="2" tabindex="-1"
                                                aria-hidden="true">
                                            @php
                                                $featuredFunctions[] = '';
                                                    foreach ($article->exampleFeaturedFunction as $featuredFunction)
                                                    {
                                                        $featuredFunctions[] = $featuredFunction->documentationArticle->id;
                                                    }
                                            @endphp
                                            @foreach($documentationArticles as $documentationArticle)
                                                <option
                                                    @selected(in_array($documentationArticle->id, $featuredFunctions)) value="{{$documentationArticle->id}}">{{$documentationArticle->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('featured_functions_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @error('featured_functions_id.*')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
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
