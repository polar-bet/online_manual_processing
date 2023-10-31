@extends('layouts.index')
@vite(['resources/sass/home_page.scss'])
@section('title', 'Головна сторінка')
@section('content')
<div class="main">
    <div class="main__container">
        <div class="main__welcome">
            <div class="main__welcome-content">
                <div class="main__welcome-title">
                    Ласкаво просимо до Processing!
                </div>
                <div class="main__welcome-description">
                    Processing - це гнучкий програмний скетчбук і мова для навчання програмуванню. З 2001 року
                    Processing
                    сприяє розвитку
                    програмної грамотності в образотворчому мистецтві та візуальної грамотності в технологіях. Десятки
                    тисяч
                    студентів,
                    художників, дизайнерів, дослідників та аматорів використовують Processing для навчання та створення
                    прототипів.
                </div>
                <div class="main__welcome-documentation-button">
                    <a href="{{route('documentation.index')}}" class="main__welcome-documentation-link"><span> Документація</span></a>
                </div>
            </div>
            <div class="main__welcome-placeholder">
                <img src="{{asset('storage/images/welcome_placeholder.svg')}}" alt="placeholder" class="main__welcome-placeholder-image">
            </div>
        </div>
        <div class="main__examples">
            <div class="main__example-title">Приклади</div>
            <ul class="main__example-list">
                <li class="main__example-list-item">
                    <a href="#" class="main__example-link">
                        <div class="main__example-card">
                            <div class="main__example-preview">
                                <img src="{{asset('storage/images/example_1.svg')}}" alt="image" class="main__example-image">
                            </div>
                            <div class="main__example-card-content">
                                <div class="main__example-card-title">
                                    Насиченість
                                </div>
                                <div class="main__example-card-description">Приклади в кольорі</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="main__example-list-item">
                    <a href="#" class="main__example-link">
                        <div class="main__example-card">
                            <div class="main__example-preview">
                                <img src="{{asset('storage/images/example_2.svg')}}" alt="image" class="main__example-image">
                            </div>
                            <div class="main__example-card-content">
                                <div class="main__example-card-title">
                                    Радіальний градієнт
                                </div>
                                <div class="main__example-card-description">Приклади в кольорі</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="main__example-list-item">
                    <a href="#" class="main__example-link">
                        <div class="main__example-card">
                            <div class="main__example-preview">
                                <img src="{{asset('storage/images/example_3.svg')}}" alt="image" class="main__example-image">
                            </div>
                            <div class="main__example-card-content">
                                <div class="main__example-card-title">
                                    Системи з багатьма частинками
                                </div>
                                <div class="main__example-card-description">у розділі Моделювання прикладів</div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="main__example-button"><a href="{{route('example.index')}}" class="main__example-button-link">Більше прикладів</a></div>

        </div>
    </div>
</div>
@endsection
