<div>
    <div class="main__container">
        <div class="main__top-container">
            <div class="main__forum-sections forum-sections">
                <div id="themes-section"
                     class="forum-sections__themes-section {{$mode == 'themes' ? 'section--active' : ''}}">
                    <button type="button" wire:click="themes" class="themes-section__link">
                        <div class="themes-section__icon"></div>
                        <span>Теми</span>
                    </button>
                </div>
                <div id="my-themes-section"
                     class="forum-sections__themes-section {{$mode == 'myThemes' ? 'section--active' : ''}}">
                    @auth
                    <button type="button" wire:click="myThemes" class="my-themes-section__link">
                        <div class="my-themes-section__icon"></div>
                        <span>Мої теми</span>
                    </button>
                    @endauth
                    @guest
                            <button type="button" class="my-themes-section__link" data-bs-toggle="modal"
                                    data-bs-target="#myThemesMessage">
                                <div class="my-themes-section__icon"></div>
                                <span>Мої теми</span>
                            </button>
                            <div class="modal fade" id="myThemesMessage" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h1 class="text-bold text-center" style="font-size: 25px;">Для перегляду власних тем необхідно увійти в обліковий запис</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="list-group w-100">
                                                <a href="{{route('account.index')}}"
                                                   class="list-group-item list-group-item-action bg-gradient-blue text-white text-center">
                                                    Увійти
                                                </a>
                                                <button type="button"
                                                        class="list-group-item list-group-item-action text-center"
                                                        data-bs-dismiss="modal">
                                                    Відміна
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest
                </div>
            </div>
            <div class="main__btn-create-theme">
                @auth
                    <a href="{{route('forum.theme.create')}}" class="main__create-link">
                        <div class="main__create-theme-icon">
                        </div>
                        <span>Створити тему</span>
                    </a>
                @endauth
                @guest
                    <button class="main__create-link" data-bs-toggle="modal"
                            data-bs-target="#createThemeMessage">
                        <div class="main__create-theme-icon">
                        </div>
                        <span>Створити тему</span>
                    </button>
                        <div class="modal fade" id="createThemeMessage" data-bs-backdrop="static"
                             data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h1 class="text-bold text-center" style="font-size: 25px;">Для можливості створення тем необхідно увійти в обліковий запис</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="list-group w-100">
                                            <a href="{{route('account.index')}}"
                                               class="list-group-item list-group-item-action bg-gradient-blue text-white text-center">
                                                Увійти
                                            </a>
                                            <button type="button"
                                                    class="list-group-item list-group-item-action text-center"
                                                    data-bs-dismiss="modal">
                                                Відміна
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endguest
            </div>
            <form action role="search" id="form" class="main__filter-form">
                <input id="filter" type="search" wire:model="filter" wire:input="filter" class="main__filter"
                       placeholder="фільтрувати за ключовими словами...">
            </form>

        </div>
        <div class="main__themes-container themes-container">
            <ul class="themes-container__themes-list">
                @if(isset($themes))
                    @foreach($themes as $theme)
                        <li class="themes-container__themes-list-item themes-list-item">
                            <a href="{{route('forum.theme.show', $theme->id)}}" class="themes-list-item__link">
                                <div class="themes-list-item__theme theme">
                                    <div class="theme__author-icon">
                                        <img src="{{$theme->user->avatar}}" alt="icon"
                                             class="theme__author-icon-image">
                                    </div>
                                    @if ($theme->is_solved)
                                        <div class="theme__status status--solved">
                                <span>
                                    Вирішено
                                </span>
                                        </div>
                                    @else
                                        <div class="theme__status status--open">
                                <span>
                                    Відкрито
                                </span>
                                        </div>
                                    @endif
                                    <div class="theme__middle-container">
                                        <div class="theme__main-info">
                                            <div class="theme__title">
                                                {{$theme->title}}
                                            </div>
                                            @auth
                                                @if(($theme->user->id == auth()->user()->id) || in_array(auth()->user()->role->status,['admin','moderator']))
                                                    <div class="theme__option-section">
                                                        <div class="other">
                                                            <span class="spot">⚫</span>
                                                            <span class="spot">⚫</span>
                                                            <span class="spot">⚫</span>
                                                            <button class="theme__delete-button" data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop"><i
                                                                    class="fas fa-trash-alt"></i><span>Видалити</span></button>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endauth
                                        </div>
                                        <div class="theme__bottom-container">
                                            <div class="theme__author-info">
                                                <div class="theme__user-icon"></div>
                                                <span class="theme__user-name">{{$theme->user->name}}</span>
                                                <span class="theme__user-status">({{$theme->user->role->name}})</span>
                                            </div>
                                            <div class="theme__data-right-container">
                                                <div class="theme__data">
                                                    <div class="theme__replies">
                                                        <div class="theme__replies-icon"></div>
                                                        <span>{{$theme->themeReply->count()}}</span>
                                                    </div>
                                                    <div class="theme__views">
                                                        <div class="theme__views-icon"></div>
                                                        <span>{{$theme->themeView->count()}}</span>
                                                    </div>
                                                </div>
                                                <div class="theme__post-date">
                                                    {{\Carbon\Carbon::parse($theme->created_at)->diffForHumans()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </li>
                        <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                             data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h1 class="text-bold text-center" style="font-size: 25px;">Ви впевнені, що
                                            бажаєте видалити цю тему?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="list-group w-100">
                                            <button type="button" wire:click="delete({{$theme->id}})"
                                                    data-bs-dismiss="modal"
                                                    class="list-group-item list-group-item-action bg-danger text-white text-center">
                                                Видалити
                                            </button>
                                            <button type="button"
                                                    class="list-group-item list-group-item-action text-center"
                                                    data-bs-dismiss="modal">
                                                Відміна
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$themes->links('livewire.includes.pagination')}}
                @endif
            </ul>
            @if($themes->count() == 0)
                @if($mode == 'themes')
                    <div class="row justify-content-center align-items-center">
                        <p class="text-bold h3" style="color: #d5d5d5">Теми не знайдено</p>
                    </div>
                @else
                    <div class="row justify-content-center align-items-center">
                        <p class="text-bold h3" style="color: #d5d5d5">Тут відображатимуться ваші теми</p>
                    </div>
                @endif
            @endif


        </div>
    </div>
</div>
