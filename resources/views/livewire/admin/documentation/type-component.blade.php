<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця з типами документації</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input wire:model="filter" wire:input="filter" type="search" name="table_search"
                                   class="form-control float-right" placeholder="Пошук">
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="bg-gradient-blue">
                        <tr>
                            <th>ID</th>
                            <th>Назва типу</th>
                            <th>Назва розділу</th>
                            <th>Дата створення</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->name}}</td>
                                <td>{{$type->documentationSection->name}}</td>
                                <td>{{$type->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.documentation.type.delete', $type->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.documentation.type.edit', $type->id)}}"
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
</div>
