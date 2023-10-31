<div>
    <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend" style="position: absolute; z-index: 5; top: 30%; left: 15px"><i class="fas fa-search"></i></div>
        <input wire:model="search" type="search" id="search" class="form-control pl-5"
               style="border-radius: 20px" placeholder="Шукати на сайті">
        <button id="btn-close" type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                aria-hidden="true"><i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" id="close"><path fill-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3.536-13.536a1 1 0 0 1 0 1.415L13.414 12l2.122 2.121a1 1 0 1 1-1.415 1.415L12 13.414l-2.121 2.122a1 1 0 1 1-1.415-1.415L10.586 12 8.464 9.879A1 1 0 1 1 9.88 8.464L12 10.586l2.121-2.122a1 1 0 0 1 1.415 0Z" clip-rule="evenodd"></path></svg></i></span></button>
    </div>
    <div class="form-group mb-3">
        @if(isset($documentationArticleResult) && count($documentationArticleResult) > 0)
            <div class="form-group mb-3">
                <h1 style="color: #9a9a9a">Статті документації</h1>
                <div class="form-group mb-3">
                    @foreach($documentationArticleResult as $documentationArticle)
                        <div class="form-group mb-1">
                            <a class="form-control pl-5" style="border-radius: 10px;"
                               href="{{route('documentation.show', $documentationArticle->id)}}">
                                <div class="input-group-prepend"
                                     style="position: absolute; z-index: 5; top: 30%; left: 15px"><i
                                        style="color: #9a9a9a" class="fas fa-search"></i></div>
                                <span>{{$documentationArticle->name}}</span><span
                                    class="path text-right text-bold">{{'[' . $documentationArticle->documentationType->documentationSection->name . '/' . $documentationArticle->documentationType->name . ']'}}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if(isset($methodResult)  && count($methodResult) > 0)
            <div class="form-group mb-3">
                <h1 style="color: #9a9a9a">Методи документації</h1>
                @foreach($methodResult as $method)
                    <div class="form-group mb-1">
                        <a class="form-control pl-5"
                           href="{{route('documentation.method.show', $method->id)}}">
                            <div class="input-group-prepend"
                                 style="position: absolute; z-index: 5; top: 30%; left: 15px"><i
                                    style="color: #9a9a9a" class="fas fa-search"></i></div>
                            <span>{{$method->name}}</span><span
                                class="path text-bold">{{'[' . $method->documentationArticle->documentationType->documentationSection->name . '/' . $method->documentationArticle->documentationType->name . '/' . $method->documentationArticle->name . ']'}}</span></a>
                    </div>
                @endforeach
            </div>
        @endif
        @if(isset($exampleResult) && count($exampleResult) > 0)
            <div class="form-group mb-3">
                <h1 style="color: #9a9a9a">Приклади</h1>
                <div class="form-group mb-3">
                    @foreach($exampleResult as $example)
                        <div class="form-group mb-1">
                            <a class="form-control pl-5"
                               href="{{route('example.show', $example->id)}}">
                                <div class="input-group-prepend"
                                     style="position: absolute; z-index: 5; top: 30%; left: 15px"><i
                                        style="color: #9a9a9a" class="fas fa-search"></i></div>
                                <span>{{$example->name}}</span><span
                                    class="path text-right text-bold">{{'[' . $example->exampleType->exampleSection->name . '/' . $example->exampleType->name . ']'}}</span></a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
