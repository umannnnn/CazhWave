@extends('layouts.main')

@section('container')

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
    <div class="flex px-4 max-w-screen-xl">
        <article class="w-full max-w-6xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{  $course->author->name }}</p>
                            <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                Created by <a href="/courses?author={{  $course->author->username }}" class="text-blue-500 hover:underline">{{ $course->author->name }}</a> in <a href="/courses?category={{ $course->category->slug }}" class="text-blue-500 hover:underline">{{ $course->category->name }}</a>
                            </p>
                            <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                {{ $course->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $course->title }}</h1>
            </header>
            <p class="mb-5 text-justify">
                {{ $course->excerpt }}
            </p>
            <iframe width="auto" height="auto" src="https://www.youtube.com/embed/{{ $course->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p class="mt-5 max-w-lg text-4xl font-semibold leading-normal text-gray-900 dark:text-white">Course Description</p>
            <p class="mt-3 text-justify">
                {!! $course->description !!}
            </p>
        </article>
    </div>
</main>
@endsection 


