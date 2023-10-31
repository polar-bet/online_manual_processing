@vite(['resources/js/header.js', 'resources/sass/search.scss'])

<div class="header">
    <div class="header__container">
        <div class="header__logo">
            <a href="{{route('home.index')}}" class="header__logo-link">
                <div class="header__logo-image"></div>
            </a>
        </div>
        <div class="header__search">
            <button id="btnSearch" class="header__search-button" data-bs-toggle="modal" data-bs-target="#searchModal">
                <img src="{{asset('storage/images/search_logo.svg')}}" alt="logo" class="header__search-logo">
            </button>
        </div>
        <div class="modal fade" id="searchModal" data-bs-keyboard="false" tabindex="0"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" style="position: relative">
                        <livewire:search.search-component/>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__burger-menu-btn">
            <span></span>
        </div>

        <div class="header__burger-menu">

            <ul class="header__section-list">
                <li class="header__section-list-item"><a id="forum" href="{{route('forum.theme.index')}}"
                                                         class="header__section-link">Форум</a></li>
                <li class="header__section-list-item"><a id="documentation" href="{{route('documentation.index')}}"
                                                         class="header__section-link">Документація</a></li>
                <li class="header__section-list-item"><a id="examples" href="{{route('example.index')}}"
                                                         class="header__section-link">Приклади</a></li>
                <li class="header__section-list-item"><a id="reference" href="{{route('reference.overview.index')}}"
                                                         class="header__section-link">Довідка</a></li>
            </ul>
            @guest()
                <div class="header__login">
                    <a href="{{route('account.index')}}" class="header__login-link">УВІЙТИ</a>
                </div>
            @endguest
            @auth()
                <div class="header__user-office">
                    <a href="{{route('user-office.index')}}" class="header__user-office-link">
                        <img src="{{auth()->user()->avatar}}" alt="avatar">
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>
