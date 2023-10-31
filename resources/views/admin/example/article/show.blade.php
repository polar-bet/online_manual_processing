@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.example.article.index')}}">Статті
                                    прикладів</a>
                            </li>
                            <li class="breadcrumb-item active">Перегляд статті</li>
                        </ol>
                    </div>
                </div>
                <form class="mb-2" action="{{route('admin.example.article.delete', $article->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.example.article.edit', $article->id)}}"
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
                            <td class="text-bold">Зображення</td>
                            <td><img src="{{asset($article->image)}}" alt="image" style="max-width: 580px;max-height: 280px"></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Опис</td>
                            <td class="text-wrap">{!!  htmlspecialchars_decode($article->description) !!}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Дата створення</td>
                            <td>{{$article->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Приклад</td>
                            <td>
                                <pre><code>{{$article->example}}</code></pre>
                            </td>
                        </tr>
                        @if ($article->exampleFeaturedFunction->count() > 0)
                            <tr>
                                <td class="text-bold">Пов'язані функції</td>
                                <td>
                                    @foreach($article->exampleFeaturedFunction as $exampleFeaturedFunction)
                                        <a href="{{route('admin.documentation.article.show', $exampleFeaturedFunction->documentationArticle->id)}}">{{$exampleFeaturedFunction->documentationArticle->name}}</a>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if ($relatedExamples->count() > 0)
                            <tr>
                                <td class="text-bold">Пов'язані приклади</td>
                                <td>
                                    @foreach($relatedExamples as $related)
                                        <a href="{{route('admin.example.article.show', $related->id)}}">{{$related->name}}</a>
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
