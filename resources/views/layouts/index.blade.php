<html lang="uk">


@include('layouts.head')
<body>
<div class="wrapper">
    @include('layouts.header')
    <main class="main">
        @yield('content')
    </main>
    @include('layouts.footer')
</div>

@livewireScripts
@stack('scripts')
</body>

</html>
