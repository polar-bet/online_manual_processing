@vite(['resources/sass/sidebar.scss', 'resources/js/sidebar.js'])
<div id="side-bar" class="sidebar">
    <div class="sidebar__top">
        <h1 class="sidebar__title">
            Документація
        </h1>
        <button id="side-bar-button" class="sidebar__button-open">
        </button>
    </div>
    <form action role="search" class="sidebar__form">
        <input type="search" class="sidebar__filter" placeholder="Фільтрувати">
    </form>
    <div class="sidebar__section-container section-container">
        <ul class="section-container__section-list">
            @yield('sidebar-content')
        </ul>
    </div>
</div>
