@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.documentation.method.index')}}">Методи</a>
                            </li>
                            <li class="breadcrumb-item active">Перегляд методу</li>
                        </ol>
                    </div>
                </div>
                <form class="mb-2" action="{{route('admin.documentation.method.delete', $method->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.documentation.method.edit', $method->id)}}"
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
                            <td>{{$method->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Назва статті</td>
                            <td>{{$method->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Короткий опис</td>
                            <td>{{$method->short_description}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Опис</td>
                            <td class="text-wrap">{!!  htmlspecialchars_decode($method->description) !!}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Що повертає</td>
                            <td>{{$method->return}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Клас</td>
                            <td>{{$method->documentationArticle->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Дата створення</td>
                            <td>{{$method->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Приклади</td>
                            <td>
                                <pre><code>{{$method->example}}</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Синтаксис</td>
                            <td>
                                @foreach(explode('|',$method->syntax) as $syntax)
                                    {{$syntax}}
                                @endforeach
                            </td>
                        </tr>
                        @if($method->documentationMethodParameter->count() > 0)
                            <tr>
                                <td class="text-bold">Параметри</td>
                                <td>
                                    <table>
                                        <thead class="bg-gradient-blue">
                                        <th>Назва</th>
                                        <th>Тип</th>
                                        <th>Опис</th>
                                        </thead>
                                        @foreach($method->documentationMethodParameter as $parameter)
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
                        @if($relatedMethods->count() > 0)
                            <tr>
                                <td class="text-bold">Пов'язані методи</td>
                                <td>
                                    @foreach($relatedMethods as $relatedMethod)
                                        {{$relatedMethod->name}}<br>
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
