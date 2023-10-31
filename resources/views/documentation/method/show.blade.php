@extends('layouts.index')
@vite(['resources/sass/method_page.scss'])
@section('title', 'Документація')
@section('content')
    <div class="main">
        <aside>
            @section('sidebar-content')
                @include('documentation.sidebar.index')
            @endsection
            @include('includes.sidebar')
        </aside>
        <div class="main__container">
            <div class="main__breadcrumbs breadcrumbs">
                <a href="{{route('documentation.index')}}" class="breadcrumbs__link">
                <span class="breadcrumbs__module">
                    Документація
                </span>
                </a>
                <span class="breadcrumbs__separator">❯</span>
                <a href="{{route('documentation.index') . '#' .  $article->documentationType->documentationSection->name}}"
                   class="breadcrumbs__link"><span
                        class="breadcrumbs__module">{{$article->documentationType->documentationSection->name}}</span></a>
                <span class="breadcrumbs__separator">❯</span>
                <a href="{{route('documentation.index') . '#' .  $article->documentationType->name}}"
                   class="breadcrumbs__link"><span
                        class="breadcrumbs__module">{{$article->documentationType->name}}</span></a>
                <span class="breadcrumbs__separator">❯</span>
                <span class="breadcrumbs__module">{{$article->name}}</span>
            </div>
            <div class="main__class-name class-name">
                <div class="class-name__title">Назва класу</div>
                <div class="class-name__value">{{$article->name}}</div>
            </div>
            <div class="main__description description">
                <div class="description__title">
                    Опис
                </div>
                <div class="description__value">
                    {!! htmlspecialchars_decode($article->description) !!}
                </div>
            </div>
            <div class="main__example example">
                <div class="example__title">Приклади</div>
                <ul class="example__list">
                    @foreach($article->example as $example)

                        <li class="example__list-item">
                            <button class="example__copy-button default">
                                <div class="example__copy-icon"></div>
                                <span>Копіювати</span>
                            </button>
                            <pre>
                                <code class="language-java">{{$example->example}}</code>
                            </pre>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($methods->count() > 0)
                <div class="main__methods methods">
                    <div class="methods__title">
                        Методи
                    </div>
                    <ul class="methods__list">
                        @foreach($methods as $method)
                            <li class="methods__list-item">
                                <code>{{$method->name}}</code>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="main__constructors constructors">
                <div class="constructors__title">Конструктор</div>
                <ul class="constructors__list">
                    @foreach($article->documentationConstructor as $constructor)
                        <li class="constructors__list-item">
                            <code class="constructors__code">
                                {{$constructor->name}}
                            </code>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="main__parameters parameters">
                <div class="parameters__title">
                    Параметри
                </div>
                <ul class="parameters__list">
                    @foreach($article->documentationParameter as $parameter)
                        <li class="parameters__list-item">
                            <div class="parameters__name"><code>{{$parameter->name}}</code></div>
                            <div class="parameters__description">{{$parameter->description}}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($relatedClasses->count() > 0)
                <div class="main__related related">
                    <div class="related__title">
                        Пов'язані
                    </div>
                    <ul class="related__list">
                        @foreach($relatedClasses as $relatedClass)
                            <li class="parameters__list-item">
                                <a href="{{route('documentation.show', $relatedClass->id)}}"><code>{{$relatedClass->name}}</code></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <script>hljs.highlightAll();</script>
@endsection
