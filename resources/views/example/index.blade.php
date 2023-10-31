@extends('layouts.index')
@vite(['resources/sass/example_page.scss'])
@section('title', 'Приклади')
@section('content')
    <div class="main">
        <livewire:example.index-component/>
    </div>
@endsection
