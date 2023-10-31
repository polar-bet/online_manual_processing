@extends('layouts.index')
@vite(['resources/sass/forum_page.scss', 'resources/js/theme-delete.js'])
@section('title', 'Форум')
@section('content')
            <livewire:forum.forum-component/>
                <script>
                    let title = document.querySelectorAll('.theme__title');

                    window.onload = function () {
                        title.forEach(title => {
                            if (window.innerWidth < 400) {
                                title.innerText = title.innerText.substring(0, 20) + '...';
                            }
                            if (title.innerText.length > 50) {
                                title.innerText = title.innerText.substring(0, 50) + '...';
                            }
                        });
                    }
                </script>
@endsection
