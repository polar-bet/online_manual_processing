<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Таблиця з розділами документації</h3>
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
                            <th>Назва розділу</th>
                            <th>Дата створення</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{$section->id}}</td>
                                <td>{{$section->name}}</td>
                                <td>{{$section->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.documentation.section.delete', $section->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{route('admin.documentation.section.edit', $section->id)}}"
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
    {{$sections->links('livewire.includes.pagination')}}
</div>
