<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Адміністративна панель</li>
        <li class="nav-item">
            <a href="{{route("admin.user.index")}}" class="nav-link">
                <i class="nav-icon ion ion-person"></i>
                <p>
                    Облікові записи <span class="badge bg-gray-light right">{{$user->count()}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.role.index")}}" class="nav-link">
                <i class="nav-icon fas fa-theater-masks"></i>
                <p>
                    Ролі <span class="badge bg-gray-light right">{{$role->count()}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.theme.index")}}" class="nav-link">
                <i class="nav-icon ion ion-chatbox"></i>
                <p>
                    Теми <span class="badge bg-gray-light right">{{$theme->count()}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link">
                <i class="nav-icon ion ion-document-text"></i>
                <p>
                    Документація
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{route('admin.documentation.section.index')}}" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Розділи <span class="badge bg-gray-light right">{{$documentationSection->count()}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.documentation.type.index')}}" class="nav-link">
                        <i class="fas fa-bars nav-icon"></i>
                        <p>Типи <span class="badge bg-gray-light right">{{$documentationType->count()}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.documentation.article.index')}}" class="nav-link">
                        <i class="fas fa-newspaper nav-icon"></i>
                        <p>Статті <span class="badge bg-gray-light right">{{$documentationArticle->count()}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.documentation.method.index')}}" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>Методи <span class="badge bg-gray-light right">{{$documentationMethod->count()}}</span></p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route("documentation.index")}}" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>
                    Приклади
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{route('admin.example.section.index')}}" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Розділи <span class="badge bg-gray-light right">{{$exampleSection->count()}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.example.type.index')}}" class="nav-link">
                        <i class="fas fa-bars nav-icon"></i>
                        <p>Типи <span class="badge bg-gray-light right">{{$exampleType->count()}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.example.article.index')}}" class="nav-link">
                        <i class="fas fa-newspaper nav-icon"></i>
                        <p>Статті <span class="badge bg-gray-light right">{{$exampleArticle->count()}}</span></p>
                    </a>
                </li>
            </ul>

        <li class="nav-item">
            <a href="{{route("home.index")}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    На головну

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("logout")}}" class="nav-link">
                <i class="nav-icon fas fa-arrow-alt-circle-left"></i>
                <p>
                   Вийти
                </p>
            </a>
        </li>
        </li>
    </ul>
</nav>
