@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper" xmlns:livewire="http://www.w3.org/1999/html">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Статті документації</li>
                        </ol>
                    </div>
                </div>
                <div class="row ml-0 mb-2 pt-2">
                    <a class="btn btn-primary" href="{{route('admin.documentation.article.create')}}"><i class="ion ion-plus"></i> <span
                            class="text-center align-items-center">Додати</span></a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <livewire:admin.documentation.article-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
