@extends('master')

{{-- navbar --}}
<div class="flex justify-between items-center px-6 md:px-20 mt-4 bg-white mx-auto p-2 m-3">
    <a href="/user" class="flex ml-2 md:mr-24">
        <img src="/images/root/logo.png" class="h-8 mr-3" alt="E2 Logo" />
        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">
            Elegance Essence
        </span>
    </a>

    <div class="text-2xl relative " style="font-size: 29px ">
        <a href="{{ route('wishlist') }}"><i class="bi bi-heart"></i></a>
        <i class="bi bi-person"></i>
        <a href="{{ route('cart') }}"><i class="bi bi-cart3"></i></a>

        <span class="absolute right-18 bg-red-500 rounded-full w-4 h-4 text-xs text-white text-center">3</span>
    </div>
</div>
{{-- navbar --}}
{{-- <nav class="bg-white  ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/user" class="flex ml-2 md:mr-24">
                <img src="/images/root/logo.png" class="h-8 mr-3" alt="E2 Logo" />
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">
                    Elegance Essence
                </span>
            </a> --}}
{{-- <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> --}}
{{-- <div class="w-full md:block md:w-auto" id="navbar-default">

                <ul class="font-medium flex flex-col md:flex-row md:space-x-6" style="font-size: 29px">
                    <i class="bi bi-cart3"></i>
                    <i class="bi bi-person"></i>
                    <i class="bi bi-heart"></i>
                    <span
                        class="absolute top-5 right-18 bg-red-500 rounded-full w-4 h-4 text-xs text-white text-center">3</span>
                </ul>
            </div> --}}
{{-- </div>
    </nav> --}}

{{-- hero --}}
<div>
    <div class="owl-carousel h-min">
        <a href="#"><img src="{{ asset('images/user/gambar1.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/user/gambar2.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/user/gambar3.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/user/gambar4.png') }}" alt=""></a>
        <a href="#"><img src="{{ asset('images/user/gambar5.png') }}" alt=""></a>
    </div>
</div>

{{-- card pertama --}}
<section class="px-6 md:px-20 mt-6">
    <h3 class="text-gray-800 font-medium mb-2">Flash Sale</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach (range(1, 4) as $item)
            <x-product.card1 />
        @endforeach
    </div>
</section>

{{-- card kedua --}}
<section class="px-6 md:px-20 mt-14">
    <div class="flex items-center justify-between">
        <div class="flex gap-2">
            <h3 class="text-gray-800 font-medium underline mb-2">Best Seller</h3>
            <h3 class="text-gray-800 font-medium mb-2">New Product</h3>
        </div>
        <h3 class="text-e2-blue-700 font-medium mb-2">All Product</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach (range(1, 12) as $item)
            <x-product.card1 />
        @endforeach
    </div>


    {{-- footer --}}
    <footer class="px-6 md:px-20 mt-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <div class="flex">
                    <img src="/images/root/logo.png" class="h-7 mr-3" alt="E2 Logo" />
                    <span class="text-xl font-semibold sm:text-2xl whitespace-nowrap" style="font-size: 18px">
                        Elegance Essence
                    </span>
                </div>

                <ul class="mt-3 text-gray-800">
                    <li><i class="bi bi-geo-alt-fill"></i> Indonesia Surabaya</li>
                    <li><i class="bi bi-telephone-fill"></i> +62 12345678910</li>
                    <li><i class="bi bi-envelope-at-fill"></i> weblanjut.gmail.com</li>
                </ul>
            </div>

            <div>
                <h2 class="text-lg font-medium text-gray-800">Categories</h2>
                <ul class="mt-1 text-gray-800">
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                </ul>
            </div>

            <div>
                <h2 class="text-lg font-medium text-gray-800">Categories</h2>
                <ul class="mt-1 text-gray-800">
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                </ul>
            </div>
        </div>
        <p class="text-gray-400 text-center my-3">Copyrigt Elegance Essence | Designed by -_-</p>
    </footer>
