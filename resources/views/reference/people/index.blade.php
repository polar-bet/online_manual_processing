@extends('layouts.index')
@vite(['resources/sass/reference_people.scss'])
@section('title', 'Люди')
@section('reference', ' active')
@section('content')
    <div class="main">
        <div class="main__container">
            <div class="main__links-container">
                <a href="{{route('reference.overview.index')}}" class="main__link">Огляд</a>
                <div class="main__link section--active">Люди</div>
            </div>
            <div class="main__description">Processing - це зусилля спільноти, очолювані невеликою групою ентузіастів.
            </div>
            <div class="main__content">
                <section class="main__section">
                    <h2 class="main__sub-title">
                        Керівники проекту
                    </h2>
                    <p class="main__text">
                        Бен Фрай і Кейсі Ріс почали займатися процесингом навесні 2001 року і продовжують одержимо
                        працювати
                        над ним. У 2012
                        році вони заснували
                        Фонд Процесингу разом з Деном Шиффманом, який формально приєднався до них як третій керівник
                        проекту.
                    </p>
                </section>
                <section class="main__section">
                    <h2 class="main__sub-title">
                        Розробники
                    </h2>
                    <ul class="main__developers-list">
                        <li class="main__developers-item">
                            Андрес Колубрі (Бостон), OpenGL / Відео
                        </li>
                        <li class="main__developers-item">
                            Елі Зананірі (Нью-Йорк), надані бібліотеки / інструменти
                        </li>
                        <li class="main__developers-item">
                            Семюель Поттінгер (Сан-Франциско), обчислювальне ядро
                        </li>
                    </ul>
                </section>
                <section class="main__section">
                    <h2 class="main__sub-title">
                        Бібліотеки, інструменти
                    </h2>
                    <p class="main__text">
                        Основне програмне забезпечення для обробки доповнюється бібліотеками та інструментами, які
                        надаються
                        спільнотою. Ці
                        винахідливі розширення є світлим майбутнім для проекту. Список наданих бібліотек та інструментів
                        розміщено в Інтернеті.
                        Ці внески не можна недооцінювати. Наприклад, подивіться, як Карстен Шмідт (Лондон) перетворив
                        Processing за допомогою
                        бібліотеки toxiclibs і як Дем'єн Ді Феде (Остін) розширив проект до програмування звуку за
                        допомогою
                        своєї бібліотеки
                        minim.
                    </p>
                </section>
                <section class="main__section">
                    <h2 class="main__sub-title">
                        Онлайн-посібник «Креативне програмування. Processing»
                    </h2>
                    <p class="main__text">
                        Онлайн-посібник був розроблений та спроектований студентом 4-го курсу ПГФК ДВНЗ «УжНУ» Олексієм
                        Олексієм в 2023 році. Проект
                        включає в себе функціонал звичайного онлайн-посібника з можливістю пошуку необхідних статтей, їх
                        фільтрування.
                        Також є форум на якому можна створювати теми для того, щоб хтось зміг допомогти вирішити проблему
                        або долучитися
                        до дискусії.
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection
