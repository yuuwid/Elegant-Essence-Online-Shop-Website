@extends('master')

{{-- navbar --}}
<div class="flex justify-between items-center px-8 md:px-20 mt-4 bg-white   mx-auto p-2 m-3">
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

{{-- content --}}
<section class="px-6 md:px-20 mt-6">
    <h1 class="text-5xl font-bold text-center drop-shadow-md text-black py-12">Wishlist</h1>

    <div class="grid grid-cols-3 gap-6">

        {{-- sisi kiri --}}
        <div class="md:col-span-2">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach (range(1, 6) as $item)
                    <div class="flex gap-4">
                        <div class="bg-gray-100 rounded shadow p-2">
                            <img class="w-20" src="{{ asset('images/user/product-1.png') }}" alt="">
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <h3 class="text-lg font-medium text-gray-800">Men Blue Shirt</h3>
                            <div class="text-gray-400 text-sm flex items-center gap-2">
                                <p class="flex items-center gap-1">
                                    Color: <span style="background-color: #006eff"
                                        class="w-5 h-5 rounded-full">&nbsp;</span>
                                </p>
                                <p>Size: M</p>
                            </div>
                            <p class="text-black text-lg font-bold">$69
                                <sub class="text-sm font-normal text-red-500">$99 </sub>
                            </p>
                            <div class="flex items-center gap-6">

                                <button class="text-e2-blue-700 font-bold uppercase">Add to Cart</button>
                                <button class="text-gray-400 uppercase">Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- sisi kiri end --}}



    </div>
</section>


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
