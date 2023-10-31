@extends("admin.layouts.index")
@section("content")
    <section class="content-wrapper">
        <div class="content">
            @if(session()->has('error'))
                <div id="message" class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div class="container-fluid">
                <div class="row mb-2 pt-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Ролі</li>
                        </ol>
                    </div>
                </div>
                <div class="row ml-0 mb-2 pt-2">
                    <a class="btn btn-primary" href="{{route('admin.role.create')}}"><i class="ion ion-plus"></i>
                        <span
                            class="text-center align-items-center">Додати</span></a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <livewire:admin.role-component/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        setTimeout(function () {
            var messageContainer = document.querySelector('#message');
            if (messageContainer) {
                messageContainer.style.transition = 'opacity 0.5s';
                messageContainer.style.opacity = '0';
                setTimeout(function () {
                    messageContainer.style.display = 'none';
                    {{session()->forget('error')}}
                }, 500);
            }
        }, 3000);
    </script>
@endsection
