@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Облікові записи</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <livewire:admin.user-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
