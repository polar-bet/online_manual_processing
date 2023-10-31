@vite("resources/sass/pagination.scss")
@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->LastPage();
@endphp
@if ($paginator->hasPages())
    <div class="row justify-content-center">
        <div class="pagination">
            <button wire:click="previousPage" {{$paginator->onFirstPage() ? 'hidden' : ''}} class="btn-nav left-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="left-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                </svg>
            </button>
            <div class="page-numbers">

                @if ($lastPage <= 7)
                    @foreach (range(1, $lastPage) as $pageNumber)
                        <button wire:click="gotoPage({{$pageNumber}})"
                           class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                    @endforeach
                @else
                    @if ($currentPage <= 4)
                        @foreach (range(1, 4) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                        <span class="btn-page">...</span>
                        <button wire:click="gotoPage({{$lastPage}})" class="btn-page">{{ $lastPage }}</button>
                    @elseif ($currentPage >= $lastPage - 3)
                        <button wire:click="gotoPage({{1}})" class="btn-page">1</button>
                        <span class="btn-page">...</span>
                        @foreach (range($lastPage - 4, $lastPage) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                    @else
                        <button wire:click="gotoPage({{1}})" class="btn-page">1</button>
                        <span class="btn-page">...</span>
                        @foreach (range($currentPage - 1, $currentPage + 1) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                               class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                        <span class="btn-page">...</span>
                        <button wire:click="gotoPage({{$lastPage}})" class="btn-page">{{ $lastPage }}</button>
                    @endif
                @endif
            </div>
            @if(!$paginator->onLastPage())
            <button wire:click="nextPage" {{$currentPage == $lastPage ? 'hidden' : ''}} class="btn-nav right-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="right-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </button>
            @endif
        </div>
    </div>
@endif
