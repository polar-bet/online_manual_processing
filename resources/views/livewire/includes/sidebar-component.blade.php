<div>
    <div id="side-bar" class="sidebar {{ $isSidebarActive ? 'sidebar--active' : '' }}">
        <div class="sidebar__top">
            <h1 class="sidebar__title">
              {{$status == 'documentation' ? 'Документація' : 'Приклади'}}
            </h1>
            <button id="side-bar-button" wire:click="sidebarToggle" class="sidebar__button-open"></button>
        </div>
        <form action role="search" class="sidebar__form">
            <input wire:model="filter" type="search" class="sidebar__filter" placeholder="Фільтрувати">
        </form>
        <div class="sidebar__section-container section-container">
            <ul class="section-container__section-list">
                @foreach($sections as $section)
                    <li class="section-container__section-list-item">
                        <div class="section-container__section-name" wire:click="sectionToggle({{$section->id}})" role="button">
                            {{$section->name}}
                        </div>
                        <ul class="section-container__types-list {{ $activeSections[$section->id] ? 'type-list--open' : 'type-list--closed' }}">
                            @foreach(($status == 'documentation' ? $section->documentationType : $section->exampleType) as $type)
                                <li class="section-container__types-list-item">
                                    @if($activeTypes[$type->id])
                                        <div class="section-container__type-name" wire:click="typeToggle({{$type->id}})" role="button">
                                            <div class="section-container__icon icon--open">–</div>
                                            {{$type->name}}
                                        </div>
                                    @else
                                        <div class="section-container__type-name btn-type--closed" wire:click="typeToggle({{$type->id}})" role="button">
                                            <div class="section-container__icon icon--open">+</div>
                                            {{$type->name}}
                                        </div>
                                    @endif
                                    <ul class="section-container__class-list {{ $activeTypes[$type->id] ? 'class-list--open' : 'class-list--closed' }}">
                                        @foreach(( $status == 'documentation' ? $type->documentationArticle()->where('name', 'ilike', '%' . $filter . '%')->get() : $type->exampleArticle()->where('name', 'ilike', '%' . $filter . '%')->get()) as $article)
                                            <li class="section-container__class-list-item">
                                                <a class="section-container__class-list-link" href="{{ $status == 'documentation' ? route('documentation.show', $article->id) : route('example.show', $article->id)}}">
                                                    <span>{{$article->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
