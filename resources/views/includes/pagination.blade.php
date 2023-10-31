@vite("resources/sass/pagination.scss")
@php
    $currentPage = $collection->currentPage();
    $lastPage = $collection->lastPage();
@endphp
@if ($paginator->hasPages() > 1)
    <div class="row justify-content-center">
        <div class="pagination">
            <button href="{{ $collection->previousPageUrl() }}"
                    {{$collection->onFirstPage() ? 'hidden' : ''}} class="btn-nav left-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="left-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                </svg>
            </button>
            <div class="page-numbers">

                @if ($lastPage <= 7)
                    @foreach (range(1, $lastPage) as $pageNumber)
                        <a href="{{ $collection->url($pageNumber) }}"
                           class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                    @endforeach
                @else
                    @if ($currentPage <= 4)
                        @foreach (range(1, 4) as $pageNumber)
                            <a href="{{ $collection->url($pageNumber) }}"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                        @endforeach
                        <span class="btn-page">...</span>
                        <a href="{{ $collection->url($lastPage) }}" class="btn-page">{{ $lastPage }}</a>
                    @elseif ($currentPage >= $lastPage - 3)
                        <a href="{{ $collection->url(1) }}" class="btn-page">1</a>
                        <span class="btn-page">...</span>
                        @foreach (range($lastPage - 4, $lastPage) as $pageNumber)
                            <a href="{{ $collection->url($pageNumber) }}"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                        @endforeach
                    @else
                        <a href="{{ $collection->url(1) }}" class="btn-page">1</a>
                        <span class="btn-page">...</span>
                        @foreach (range($currentPage - 1, $currentPage + 1) as $pageNumber)
                            <a href="{{ $collection->url($pageNumber) }}"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                        @endforeach
                        <span class="btn-page">...</span>
                        <a href="{{ $collection->url($lastPage) }}" class="btn-page">{{ $lastPage }}</a>
                    @endif
                @endif
            </div>
            <a href="{{ $collection->nextPageUrl() }}"
               {{$currentPage == $lastPage ? 'hidden' : ''}} class="btn-nav right-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="right-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </a>
        </div>

    </div>
@endif
