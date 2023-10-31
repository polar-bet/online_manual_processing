<!DOCTYPE html>
@extends('layouts.index')

@vite(['resources/sass/theme_create.scss'])
@section('title', 'Додавання теми')
@section('content')

    <div class="main">
        <div id="error-container"></div>
        <div class="main__container">
            <div class="main__bread-crumb breadcrumbs">
                <a href="{{route('forum.theme.index')}}" class="main__return-link">Форум</a>
                <div class="main__bread-crumb-separator">❯</div>
                Створення теми
            </div>

            <h1 class="main__title">Створення теми</h1>
            <form class="main__form" action="{{route('forum.theme.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('POST')
                <div class="main__input-container">
                    <label class="main__input-label" for="title">Заголовок теми</label>
                    <input id="title" name="title" type="text" class="main__input-title">
                    @error("title")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="main__description-label" for="summernote">Опис</label>
                    <textarea name="description" id="summernote">{{old("description")}}</textarea>
                    @error("description")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
        </textarea>
                <div class="main__submit-row">
                    <div class="main__submit-button-container">
                        <button class="main__form-submit-button" type="submit">Створити тему</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
