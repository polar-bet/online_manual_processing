<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця із методами</h3>
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
                            <th>Назва методу</th>
                            <th>Назва класу</th>
                            <th>Короткий опис</th>
                            <th>Дата створення</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($methods as $method)
                            <tr>
                                <td>{{$method->id}}</td>
                                <td>{{$method->name}}</td>
                                <td>{{$method->documentationArticle->name}}</td>
                                <td>{{$method->short_description}}</td>
                                <td>{{$method->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.documentation.method.delete', $method->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.documentation.method.show', $method->id)}}"
                                               class="btn btn-success"><i class="ion ion-eye"></i>
                                            </a>
                                            <a href="{{route('admin.documentation.method.edit', $method->id)}}"
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
    {{$methods->links('livewire.includes.pagination')}}
</div>
