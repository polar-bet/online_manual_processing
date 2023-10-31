<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця з темами</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input wire:input="filter" wire:model="filter" type="search" name="table_search"
                                   class="form-control float-right" placeholder="Пошук">
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-gradient-blue">
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Автор</th>
                            <th>Кількість відповідей</th>
                            <th>Кількість переглядів</th>
                            <th>Дата створення</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($themes as $theme)
                            <tr>
                                <td>{{$theme->id}}</td>
                                <td>{{$theme->title}}</td>
                                <td>{{$theme->user->name}}</td>
                                <td>{{$theme->themeReply->count()}}</td>
                                <td>{{$theme->views}}</td>
                                <td>{{$theme->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.theme.delete', $theme->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.theme.show', $theme->id)}}"
                                               class="btn btn-success"><i class="ion ion-eye"></i>
                                            </a>
                                            <a href="{{route('admin.theme.edit', $theme->id)}}"
                                               class="btn btn-primary"><i class="ion ion-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    {{$themes->links('livewire.includes.pagination')}}
</div>
