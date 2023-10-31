@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.documentation.article.index')}}">Статті
                                    документації</a>
                            </li>
                            <li class="breadcrumb-item active">Перегляд статті</li>
                        </ol>
                    </div>
                </div>
                <form class="mb-2" action="{{route('admin.documentation.article.delete', $article->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.documentation.article.edit', $article->id)}}"
                           class="btn btn-primary"><i class="ion ion-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger"><i
                                class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-gradient-blue">
                        <tr>
                            <th>Назва поля</th>
                            <th>Значення</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-bold">ID</td>
                            <td>{{$article->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Назва статті</td>
                            <td>{{$article->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Короткий опис</td>
                            <td>{{$article->short_description}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Опис</td>
                            <td class="text-wrap">{!!  htmlspecialchars_decode($article->description) !!}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Дата створення</td>
                            <td>{{$article->created_at}}</td>
                        </tr>
                        @if($article->example->count() > 0)
                            <tr>
                                <td class="text-bold">Приклади</td>
                                <td>
                                    @foreach($article->example as $example)
                                        <pre><code>{{$example->example}}</code></pre>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if($article->documentationSyntax->count() > 0)
                            <tr>
                                <td class="text-bold">Синтаксис</td>
                                <td>
                                    @foreach($article->documentationSyntax as $syntax)
                                        {{$syntax->syntax}}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if($article->documentationConstructor->count() > 0)
                            <tr>
                                <td class="text-bold">Конструктор</td>
                                <td>
                                    @foreach($article->documentationConstructor as $constructor)
                                        {{$constructor->name}}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if($article->documentationParameter->count() > 0)
                            <tr>
                                <td class="text-bold">Параметри</td>
                                <td>
                                    <table>
                                        <thead class="bg-gradient-blue">
                                        <th>Назва</th>
                                        <th>Тип</th>
                                        <th>Опис</th>
                                        </thead>
                                        @foreach($article->documentationParameter as $parameter)
                                            <tr>
                                                <td>{{$parameter->name}}</td>
                                                <td>{{$parameter->type}}</td>
                                                <td>{{$parameter->description}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @endif
                        @if($relatedClasses->count() > 0)
                            <tr>
                                <td class="text-bold">Пов'язані класи</td>
                                <td>
                                    @foreach($relatedClasses as $relatedClass)
                                        {{$relatedClass->name}}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if($article->documentationMethod->count() > 0)
                            <tr>
                                <td class="text-bold">Методи</td>
                                <td>
                                    @foreach($article->documentationMethod as $method)
                                        <a href="{{route('admin.documentation.method.show', $method->id)}}">{{$method->name}}</a>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
