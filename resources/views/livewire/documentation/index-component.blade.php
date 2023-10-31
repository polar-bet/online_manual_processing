<div class="main__container">
        <h1 class="main__title">
            Документація
        </h1>
    <form action role="search" id="form" class="main__filter-form">
        <input wire:model="filter" id="filter" type="search" class="main__filter"
               placeholder="фільтрувати за ключовими словами...">
    </form>
    @if(empty($filter))
        <div class="main__shortcuts">
            <h4 class="main__shortcuts-title">
                Ярлики
            </h4>
            <ul class="main__shortcuts-list">
                @php
                    $count = 0;
                @endphp

                @foreach ($sections as $section)
                    @if ($count % 4 === 0)
                        <li class="main__shortcuts-list-module">
                            <ul class="main__shortcuts-module-list">
                                @endif

                                <li class="main__shortcuts-list-item">
                                    <a href="#{{$section->name}}"
                                       class="main__shortcuts-link">{{ $section->name }}</a>
                                </li>

                                @php
                                    $count++;
                                @endphp

                                @if ($count % 4 === 0 || $loop->last)
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
    <ul class="main__section-container">
        @foreach($sections as $section)
            <li id="{{$section->name}}" class="main__section">
                <p>
                <div id="data" class="main__section-title">
                    {{$section->name}}
                </div>
                </p>
                <ul class="main__section-type-list">
                    @foreach($section->documentationType as $type)
                        <li id="{{$type->name}}" class="main__section-type-item">
                            <div class="main__section-type-title">
                                {{$type->name}}
                            </div>
                            <ul class="main__section-type-class-list">
                                @foreach($type->documentationArticle()->where('name', 'ilike', '%' . $filter . '%')->get() as $class)
                                    <li id="{{$class->name}}" class="main__section-type-class">
                                        <a href="{{route('documentation.show', $class->id)}}"
                                           class="main__section-type-link"><span>{{$class->name}}</span></a>
                                        <div
                                            class="main__section-type-class-description">{{$class->short_description}}
                                        </div>
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
