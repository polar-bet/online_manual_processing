<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця з обліковими записами</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input wire:model="filter" wire:model="filter" type="search" name="table_search"
                                   class="form-control float-right" placeholder="Пошук">
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-gradient-blue">
                        <tr>
                            <th>ID</th>
                            <th>Ім'я</th>
                            <th>Електронна пошта</th>
                            <th>Аватар</th>
                            <th>Роль</th>
                            <th>Дата створення</th>
                            <th>Обмеження</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><img style="max-width: 60px; min-width: 60px" class="img-thumbnail"
                                         src="{{asset($user->avatar)}}" alt="avatar"></td>
                                <td><span class="tag tag-danger">{{$user->role->name}}</span></td>
                                <td>{{$user->created_at}}</td>
                                <td>{{(isset($user->muted_until) ? 'до ' . $user->muted_until : 'немає')}}</td>
                                <td>
                                    <form action="{{route('admin.user.delete', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.user.edit', $user->id)}}"
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
    {{$users->links('livewire.includes.pagination')}}
</div>
