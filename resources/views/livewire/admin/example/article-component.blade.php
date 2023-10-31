<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця зі статтями прикладів</h3>
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
                            <th>Назва статті</th>
                            <th>Назва типу</th>
                            <th>Назва розділу</th>
                            <th>Дата створення</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->name}}</td>
                                <td>{{$article->exampleType->name}}</td>
                                <td>{{$article->exampleType->exampleSection->name}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.example.article.delete', $article->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.example.article.show', $article->id)}}"
                                               class="btn btn-success"><i class="ion ion-eye"></i>
                                            </a>
                                            <a href="{{route('admin.example.article.edit', $article->id)}}"
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
    {{$articles->links('livewire.includes.pagination')}}
</div>
