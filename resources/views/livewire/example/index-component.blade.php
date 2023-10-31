<div class="main__container">
    <div class="main__title-container">
        <h1 class="main__title">Приклади</h1>
        <div class="main__description">Короткі прототипи програм, що вивчають принципи програмування за
            допомогою
            Processing.
        </div>
    </div>
    <form action role="search" id="form" class="main__filter-form">
        <input wire:model="filter" id="filter" type="search" class="main__filter" placeholder="фільтрувати за ключовими словами...">
    </form>
    <ul class="main__sub-list">
        @foreach($sections as $section)
            <li class="main__sub-list-item">
                <div id="{{$section->name}}" class="main__sub-container">
                    <div class="main__sub-title">
                        {{$section->name}}
                    </div>
                    <div class="main__sub-description">
                        {{$section->description}}
                    </div>
                </div>
                <ul class="main__section-list">
                    @foreach($section->exampleType as $type)
                        <li id="{{$type->name}}" class="main__section-list-item">
                            <section class="main__section section">
                                <div class="section__title">{{$type->name}}</div>
                                <ul class="section__example-list">
                                    @foreach($type->exampleArticle()->where('name', 'ilike', '%' . $filter . '%')->get() as $article)
                                        <li id="{{$article->name}}" class="section__example-list-item example-list-item">
                                            <a href="{{route('example.show', $article->id)}}"
                                               class="example-list-item__link">
                                                <img src="{{asset($article->image)}}"
                                                     alt="preview"
                                                     class="example-list-item__image">
                                                <div class="example-list-item__title">{{$article->name}}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
