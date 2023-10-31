@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.theme.index')}}">Теми</a></li>
                            <li class="breadcrumb-item active">Перегляд теми</li>
                        </ol>
                    </div>
                </div>
                <form class="mb-2" action="{{route('admin.theme.delete', $theme->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group">
                        <a href="{{route('admin.theme.edit', $theme->id)}}"
                           class="btn btn-primary"><i class="ion ion-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger"><i
                                class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-gradient-blue">
                        <tr>
                            <th>Назва поля</th>
                            <th>Значення</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-bold">ID</td>
                            <td>{{$theme->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Заголовок</td>
                            <td>{{$theme->title}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Автор</td>
                            <td>{{$theme->user->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Кількість відповідей</td>
                            <td>{{$theme->themeReply->count()}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Кількість переглядів</td>
                            <td>{{$theme->views}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Дата створення</td>
                            <td>{{$theme->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Опис</td>
                            <td class="text-wrap">{!! htmlspecialchars_decode($theme->themeReply->first()->content) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
