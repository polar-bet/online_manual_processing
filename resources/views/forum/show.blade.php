<!DOCTYPE html>
@extends('layouts.index')
@vite(['resources/sass/theme_show.scss','resources/js/add-comment.js', 'resources/js/comment.js'])
@section('title', $theme->title)
@section('content')
    <div class="main">
        <div class="main__container">
            <div class="main__breadcrumbs breadcrumbs">
                <a href="{{route('forum.theme.index')}}" class="breadcrumbs__link">
                <span class="breadcrumbs__module">
                  Форум
                </span>
                </a>
                <span class="breadcrumbs__separator">❯</span>
                <span class="breadcrumbs__module">{{$theme->title}}</span>
            </div>
            <div class="main__theme-topic theme-topic">
                <div class="theme-topic__title">
                    {{$theme->title}}
                </div>
                <div class="theme-topic__author-section">
                    <div class="theme-topic__bottom-container">
                        <div class="theme-topic__author-info-container">
                            <div class="theme-topic__author-icon">
                                <img class="theme-topic__author-image" src="{{asset($theme->user->avatar)}}" alt="avatar">
                            </div>
                            <div class="theme-topic__author-info">
                                <div class="theme-topic__author-name">
                                    {{$theme->user->name}}
                                </div>
                                <div class="theme-topic__theme-post-date">
                                    {{\Carbon\Carbon::parse($theme->created_at)->diffForHumans()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:forum.theme.theme-component :theme="$theme"/>
        </div>
    </div>

@endsection
