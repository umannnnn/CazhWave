@extends('layouts.main')

@section('container')

<h1 class="text-3xl font-extrabold leading-tight text-gray-900 mb-4 lg:text-4xl dark:text-white">Training Categories</h1>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($categories as $category)
    <div>
        <figure class="relative max-w-sm border-4 border-dashed transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="/courses?category={{ $category->slug }}">
                <div style="max-height: 350px; max-width: auto; overflow:hidden;">
                    <img class="h-auto max-w-full transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="{{ asset('storage/' . $category->image) }}" alt="">
                </div>
            </a>
            <figcaption class="absolute px-4 text-lg items-center justify-center text-white bg-black bg-opacity-50 bottom-6">
                <p class="text-2xl">{{ $category->name }}</p>
            </figcaption>
        </figure>
    </div>
    @endforeach
</div>

@endsection