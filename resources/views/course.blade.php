@extends('layouts.main')

@section('container')

<main class="pt-2 pb-2 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
    <div class="flex px-4 max-w-screen-xl">
        <article class="w-full max-w-6xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('storage/' . $course->author->image) }}" alt="Jese Leos">
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
                <hr class="h-px mb-4 bg-gray-400 border-0 dark:bg-gray-700">
                <h1 class="mb-4 text-4xl text-center font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $course->title }}</h1>
            </header>
            <p class="mb-5 text-center">
                {{ $course->excerpt }}
            </p>
            <div class="iframe-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $course->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            {{-- <iframe width="auto" height="300px" src="https://www.youtube.com/embed/{{ $course->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
            <p class="mt-5 max-w-lg text-3xl font-semibold leading-normal text-gray-900 dark:text-white">Training Description</p>
            <p class="mt-2 text-center">
                {!! $course->description !!}
            </p>
        </article>
    </div>
    <hr class="h-px mt-8 bg-gray-400 border-0 dark:bg-gray-700">
    <div class="py-4 lg:py-8 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <form action="/course" class="space-y-4" method="post">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your phone number</label>
                <input type="text" id="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Type your phone number" required>
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send message</button>
        </form>
    </div>
</main>

<style>
    .iframe-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 aspect ratio (change as needed) */
        height: 0;
    }

    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

@endsection 




