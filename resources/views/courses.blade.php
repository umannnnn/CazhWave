@extends('layouts.main')

@section('container')

<h1 class="text-3xl mx mb-3 font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $title }}</h1>

<form action="/courses">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
        </div>
        <input type="search" name="search" value="{{ request('search') }}" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search training..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>


@if ($courses->count())
    {{-- <div class="w-full p-4 mb-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{ $courses[0]->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </a>
        <h5 class="mb-2 mt-2 text-3xl font-bold text-gray-900 dark:text-white"><a href="/courses/{{ $courses[0]->slug }}"> {{ $courses[0]->title }}</h5></a>
        <p class="mb-3 text-base font-light text-gray-500 dark:text-gray-400">
            Created by <a href="/courses?author={{ $courses[0]->author->username }}" class="text-blue-500 hover:underline">{{ $courses[0]->author->name }}</a> in <a href="/courses?category={{ $courses[0]->category->slug }}" class="text-blue-500 hover:underline">{{ $courses[0]->category->name }}</a>
            {{ $courses[0]->created_at->diffForHumans() }}
        </p>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ $courses[0]->excerpt }}</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href="/courses/{{ $courses[0]->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div> --}}

    <div class="grid lg:grid-cols-3 gap-3">

    @foreach ($courses as $course)    
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $course->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </a>
            <div class="p-5">
                <a href="/courses/{{ $course->slug }}" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $course->title }}</h5>
                </a>
                <p class="mb-6 font-normal text-gray-700 dark:text-gray-400">Created by <a href="/courses?author={{ $course->author->username }}" class="text-blue-500 hover:underline">{{ $course->author->name }}</a> in <a href="/courses?category={{ $course->category->slug }}" class="text-blue-500 hover:underline">{{ $course->category->name }}</a></p>
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-blue-700 dark:text-white">Progress on this course</span>
                    <span class="text-sm font-medium text-blue-700 dark:text-white">45%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                </div>
            </div>
        </div>
    @endforeach

    </div>

@else
    <p class="text-center text-2xl">No course found.</p>
@endif

<div class="m-5 justify-items-center"> {{ $courses->links() }} </div>  

@endsection