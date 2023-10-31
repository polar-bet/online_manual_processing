@extends('layouts.index')
@vite(['resources/sass/example_show.scss', 'resources/sass/sidebar.scss', 'resources/js/add-comment.js','resources/js/sidebar.js', 'resources/sass/theme.scss'])
@section('title', $article->name)
@section('content')
    <div class="main">
        <aside>
            <livewire:example.sidebar-component/>
        </aside>
        <div class="main__container">
            <div class="main__breadcrumbs breadcrumbs">
                <a href="{{route('example.index')}}" class="breadcrumbs__link">
                <span class="breadcrumbs__module">
                  Приклади
                </span>
                </a>
                <span class="breadcrumbs__separator">❯</span>
                <a href="{{route('example.index') . '#' . $article->exampleType->exampleSection->name}}"
                   class="breadcrumbs__link"><span
                        class="breadcrumbs__module">{{$article->exampleType->exampleSection->name}}</span></a>
                <span class="breadcrumbs__separator">❯</span>
                <a href="{{route('example.index') . '#' . $article->exampleType->name}}" class="breadcrumbs__link"><span
                        class="breadcrumbs__module">{{$article->exampleType->name}}</span></a>
                <span class="breadcrumbs__separator">❯</span>
                <a href="{{route('example.index') . '#' . $article->name}}" class="breadcrumbs__link"><span
                        class="breadcrumbs__module">{{$article->name}}</span></a>
            </div>
            <div class="main__info-container">
                <div class="main__info-holder">
                    <div class="main__class-name class-name">
                        <span>{{$article->name}}</span>
                    </div>
                    <div class="main__description description">
                        {!! $article->description !!}
                    </div>

                </div>
                <div class="main__featured-functions">
                    <div class="main__featured-functions-title">Основні функції</div>
                    <ul class="main__featured-functions-list">
                        @foreach($article->exampleFeaturedFunction as $featuredFunction)
                            <li class="main__featured-functions-list-item">
                                <a href="{{route('documentation.show', $featuredFunction->documentationArticle->id)}}"
                                   class="main__featured-functions-link">
                                    <span>{{$featuredFunction->documentationArticle->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="main__preview-holder">
                <img class="main__preview-image" src="{{asset($article->image)}}" alt="image">
            </div>
            <script>{{$article->example}}</script>
            <div class="main__example example">
                <div class="example__list-item">
                    <button class="example__copy-button default">
                        <div class="example__copy-icon"></div>
                        <span>Копіювати</span>
                    </button>
                    <pre>
                        <code class="language-java">{{$article->example}}</code>
                    </pre>
                </div>
            </div>
            <div class="main__related-examples related-examples">
                <div class="related-examples__title">Пов'язані приклади</div>
                <ul class="related-examples__example-list">
                    @foreach($article->exampleType->exampleArticle as $example)
                        @if($example->id != $article->id)
                            <li class="related-examples__example-list-item example-list-item">
                                <a href="{{route('example.show', $example->id)}}" class="example-list-item__link">
                                    <img src="{{asset($example->image)}}" alt="preview"
                                         class="example-list-item__image">
                                    <div class="example-list-item__title">{{$example->name}}</div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <livewire:example.comment-component :article="$article"/>
        </div>
        <script>hljs.highlightAll();</script>
@endsection
