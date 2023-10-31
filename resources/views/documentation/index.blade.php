@extends('layouts.index')
@vite(['resources/sass/documentation_page.scss','resources/js/documentation-page.js'])
@section('title', 'Документація')
@section('content')
    <div class="main">

            <livewire:documentation.index-component/>
        </div>
    </div>
@endsection
