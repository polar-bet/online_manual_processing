@extends("admin.layouts.index")

@section("content")
    <section class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$users->count()}}</h3>

                                <h5>Облікових записів</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{route('admin.user.index')}}" class="small-box-footer">Дізнатись більше <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$themes->count()}}</h3>

                                <h5>Тем на форумі</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                            <a href="{{route('admin.theme.index')}}" class="small-box-footer">Дізнатись більше <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$documentationClasses->count()}}</h3>

                                <h5>Статтей документації</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                            <a href="{{route('admin.documentation.article.index')}}" class="small-box-footer">Дізнатись більше <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{$exampleClasses->count()}}</h3>

                                <h5>Статтей прикладів</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <a href="{{route('admin.example.article.index')}}" class="small-box-footer">Дізнатись більше <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
