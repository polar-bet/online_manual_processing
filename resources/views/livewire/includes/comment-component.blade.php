<div>

    <div class="section-title">Коментарі</div>
    <hr>
    @auth
        @if(isset(auth()->user()->muted_until) && \Carbon\Carbon::now()->lt(auth()->user()->muted_until))
            <div class="row justify-content-center">
                <div class="info-box bg-gradient-red col-10">
                                            <span class="info-box-icon"><img
                                                    src="{{asset('storage/images/exclamation-octagon.svg')}}"
                                                    alt="icon"></span>
                    <div class="info-box-content text-center">
                        <p class="text-bold">Ваша можливість спілкування обмежена
                            до {{Carbon\Carbon::parse(auth()->user()->muted_until)->isoFormat('D.MM.Y H:m')}}</p>
                    </div>
                </div>
            </div>
        @else
            <form class="mb-3">
                <div id="comment-section" class="main__add-comment-section" wire:ignore>
            <textarea wire.model.defer="content" class="main__txt-comment" name="content"
                      placeholder="напишіть свою відповідь"
                      id="content" wire:model="content"></textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="main__add-comment-button-section">
                        <div class="main__button-holder">
                            <div class="main__cancel-button-holder">
                                <button type="button" class="main__cancel-button">Відміна</button>
                            </div>
                            <div class="main__create-button-holder">
                                <button type="button" id="createButton" class="main__create-button">Написати коментар
                                </button>
                            </div>
                            <div class="main__post-button-holder">
                                <button type="button" id="send" class="main__post-button" wire:click="addComment">
                                    Опублікувати
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    @endauth
    @guest
        <form class="mb-3">
            <div id="comment-section" class="main__add-comment-section">
                <div class="main__button-holder">
                    <div class="main__create-button-holder">
                        <button type="button" class="main__create-button" data-bs-toggle="modal"
                                data-bs-target="#createCommentMessage">Написати коментар
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="createCommentMessage" data-bs-backdrop="static"
                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1 class="text-bold text-center" style="font-size: 25px;">Для можливості створення
                                    коментарів до статті необхідно увійти в обліковий запис</h1>
                            </div>
                            <div class="modal-footer">
                                <div class="list-group w-100">
                                    <a href="{{route('account.index')}}"
                                       class="list-group-item list-group-item-action bg-gradient-blue text-white text-center">
                                        Увійти
                                    </a>
                                    <button type="button"
                                            class="list-group-item list-group-item-action text-center"
                                            data-bs-dismiss="modal">
                                        Відміна
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endguest
    <ul class="main__theme-comment-container theme-comment-container">
        @if ($comments->count() > 0)
            @foreach($comments as $comment)

                <li class="theme-comment-container__theme-comment theme-comment">
                    <div class="theme-comment__user-info">
                        <div class="theme-comment__user-name">
                            {{$comment->user->name}}
                        </div>
                        <img src="{{asset($comment->user->avatar)}}" alt="avatar" class="theme-comment__user-icon">
                        <div class="theme-content__user-status">
                            {{$comment->user->role->name}}
                        </div>
                    </div>
                    <div class="theme-comment__description-container">
                        <div class="theme-comment__comment-content">
                            <div class="theme-comment__content-holder">
                                {!!  $comment->content !!}
                            </div>
                            @auth
                                @if(($comment->user->id == auth()->user()->id) || in_array(auth()->user()->role->status,['admin','moderator']))
                                    <div class="theme-comment__option-section">
                                        <div class="other">
                                            <span class="spot">⚫</span>
                                            <span class="spot">⚫</span>
                                            <span class="spot">⚫</span>
                                            <button class="theme-comment__delete-button" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop"><i
                                                    class="fas fa-trash-alt"></i><span>Видалити</span></button>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                             data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h1 class="text-bold text-center" style="font-size: 25px;">Ви впевнені, що
                                            бажаєте видалити цей коментар?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="list-group w-100">
                                            <button type="button" wire:click="delete({{$comment->id}})"
                                                    data-bs-dismiss="modal"
                                                    class="list-group-item list-group-item-action bg-danger text-white text-center">
                                                Видалити
                                            </button>
                                            <button type="button"
                                                    class="list-group-item list-group-item-action text-center"
                                                    data-bs-dismiss="modal">
                                                Відміна
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-comment__function-section">
                            <div class="theme-comment__comment-post-date">
                                    <span
                                        class="theme-comment__post-date-value">  {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                            </div>
                            <div class="theme-comment__function-container">
                                @switch(class_basename($comment))
                                    @case('DocumentationComment')
                                        <div class="theme-comment__like-container">
                                            @auth
                                                <button wire:click="like({{$comment->id}})"
                                                        class="theme-comment__like-button {{$comment->documentationCommentInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->count() > 0 ? 'like--active' : ''}}">
                                                </button>
                                            @endauth
                                            @guest
                                                <div class="theme-comment__like"></div>
                                            @endguest
                                            <span
                                                class="theme-comment__like-count">{{$comment->documentationCommentInteraction()->where('interaction_type', 'like')->get()->count()}}</span>
                                        </div>
                                        <div class="theme-comment__dislike-container">
                                            @auth
                                                <button wire:click="dislike({{$comment->id}})"
                                                        class="theme-comment__dislike-button {{$comment->documentationCommentInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->count() > 0 ? 'dislike--active' : ''}}">
                                                </button>
                                            @endauth
                                            @guest
                                                <div class="theme-comment__dislike"></div>
                                            @endguest
                                            <span
                                                class="theme-comment__dislike-count">{{$comment->documentationCommentInteraction()->where('interaction_type', 'dislike')->get()->count()}}</span>
                                        </div>
                                        @break
                                    @case('ExampleComment')
                                        <div class="theme-comment__like-container">
                                            @auth
                                                <button wire:click="like({{$comment->id}})"
                                                        class="theme-comment__like-button {{$comment->exampleCommentInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->count() > 0 ? 'like--active' : ''}}">
                                                </button>
                                            @endauth
                                            @guest
                                                <div class="theme-comment__like"></div>
                                            @endguest
                                            <span
                                                class="theme-comment__like-count">{{$comment->exampleCommentInteraction()->where('interaction_type', 'like')->get()->count()}}</span>
                                        </div>
                                        <div class="theme-comment__dislike-container">
                                            @auth
                                                <button wire:click="dislike({{$comment->id}})"
                                                        class="theme-comment__dislike-button {{$comment->exampleCommentInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->count() > 0 ? 'dislike--active' : ''}}">
                                                </button>
                                            @endauth
                                            @guest
                                                <div class="theme-comment__dislike"></div>
                                            @endguest
                                            <span
                                                class="theme-comment__dislike-count">{{$comment->exampleCommentInteraction()->where('interaction_type', 'dislike')->get()->count()}}</span>
                                        </div>
                                        @break
                                @endswitch

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <p class="text-bold h5 text-center" style="color: #d5d5d5">Коментарів немає, додайте перший коментар</p>
        @endif
    </ul>
    {{$comments->links('livewire.includes.pagination')}}
    @push('scripts')
        <script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    $("#content").summernote({
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link']],
                            ['view', ['fullscreen', 'help']]
                        ],
                        callbacks: {
                            onChange: function (contents, $editable) {
                            @this.set('content', contents);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
