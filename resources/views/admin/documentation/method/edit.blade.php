@extends("admin.layouts.index")
@vite(['resources/js/method.js'])
@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid justify-content-center">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.documentation.method.index')}}">Методи</a></li>
                            <li class="breadcrumb-item active">Створення методів</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card card-info">
                        <div class="card-header bg-gradient-blue">
                            <h3 class="card-title">Створення методів</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.documentation.method.update', $method->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="name">Назва *</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Назва статті" value="{{$method->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Короткий опис *</label>
                                    <input type="text" class="form-control" id="short_description"
                                           name="short_description"
                                           placeholder="Короткий опис" value="{{$method->short_description}}">
                                    @error('short_description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="summernote">Опис *</label>
                                    <textarea name="description" id="summernote">{{$method->description}}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Що повертає *</label>
                                    <input type="text" class="form-control" name="return"
                                           placeholder="Що повертає функція" value="{{$method->return}}">
                                    @error('return')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Стаття *</label>
                                    <select class="s2 select2 select2-hidden-accessible"
                                            name="documentation_article_id" data-placeholder="Оберіть статтю"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($articles as $article)
                                            <option
                                                @selected($article->id == $method->documentationArticle->id) value="{{$article->id}}">{{$article->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('documentation_article_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Приклад *</label>
                                    <div class="input-group mb-2">
                                                    <textarea class="form-control" name="example"
                                                              placeholder="Приклад"
                                                              style="resize: none;">{{$method->example}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="mb-3">
                                            <label class="col-sm-3">Cинтаксис *
                                            </label>
                                            <button type="button" id="btnAddSyntax" class="btn bg-gradient-blue"><i
                                                    class="ion ion-plus"></i></button>
                                        </div>
                                        <div id="syntaxHolder" class="form-group">
                                            @foreach(explode('|', $method->syntax) as $syntax)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="syntaxes[]"
                                                           placeholder="Синтаксис" value="{{$syntax}}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger delete-button"><i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('syntaxes')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @error('syntaxes.*')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="mb-3">
                                            <label class="col-sm-3">Параметри *
                                            </label>
                                            <button type="button" id="btnAddParameter" class="btn bg-gradient-blue"><i
                                                    class="ion ion-plus"></i></button>
                                        </div>
                                        <div id="parameterHolder" class="form-group">
                                            @foreach($method->documentationMethodParameter as $key => $value)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control"
                                                           name="parameters[{{$key}}][name]"
                                                           placeholder="Назва" value="{{$value['name']}}">
                                                    <input type="text" class="form-control"
                                                           name="parameters[{{$key}}][type]"
                                                           placeholder="Тип"
                                                           value="{{$value['type']}}">
                                                    <input type="text" class="form-control"
                                                           name="parameters[{{$key}}][description]"
                                                           placeholder="Опис" value="{{$value['description']}}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger delete-button"><i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('parameters')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @error('parameters.*.name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @error('parameters.*.type')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @error('parameters.*.description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Пов'язані методи</label>
                                        <select class="s2 select2 select2-hidden-accessible"
                                                name="related_method_id[]" data-placeholder="Пов'язані методи"
                                                style="width: 100%;" data-select2-id="2" tabindex="-1"
                                                aria-hidden="true" multiple="multiple">
                                            @php
                                                $related[] = '';
                                                    foreach ($relatedMethods as $relatedMethod)
                                                    {
                                                        $related[] = $relatedMethod->id;
                                                    }
                                            @endphp
                                            @foreach($documentationMethods as $documentationMethod)
                                                @if($documentationMethod->id != $method->id)
                                                    <option
                                                        @selected((in_array($documentationMethod->id, $related))) value="{{$documentationMethod->id}}">{{$documentationMethod->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @error('related_method_id')
                                        <p class="text-danger">{{$message}}</p>
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
