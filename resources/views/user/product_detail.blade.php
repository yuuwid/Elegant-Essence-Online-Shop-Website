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

    <div class="flex flex-warp md:flex-nowrap gap-6">
        {{-- sisi kiri --}}
        <div class="shrink-0 w-full md:w-auto flex flex-col-reverse md:flex-row gap-4">
            <div id="images" class="flex md:flex-col gap-3 pb-1 md:pb-0 max-h-96 overflow-y-auto">
                @foreach (range(1, 4) as $item)
                    <div onclick="viewImage(this, {{ $loop->index }})"
                        class="bg-white rounded-md shadow p-1 cursor-pointer">
                        <img class="w-14" src="{{ asset('images/user/product-' . $loop->iteration . '.png') }}"
                            alt="" />
                    </div>
                @endforeach
            </div>
            <div class="h-96 relative bg-white rounded-md shadow-md p-3">

                <img id="bigImage" class="h-full aspect-[2/3]" src="{{ asset('images/user/product-1.png') }}"
                    alt="">

                <span onclick="nextPrevious(-1)"
                    class="absolute top-1/2 left-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center"><i
                        class="bi bi-chevron-left text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer"></i></span>
                <span onclick="nextPrevious(1)"
                    class="absolute top-1/2 right-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center"><i
                        class="bi bi-chevron-right text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer"></i></span>
            </div>
        </div>
        {{-- sisi kiri end --}}


        {{-- sisi kanan --}}
        <div class="w-full flex flex-col gap-4">

            <div class="flex gap-3">
                <span class="text-gray-400 text-sm"><i class="bi bi-star"></i>4.5</span>
            </div>

            <h2 class="text-lg font-medium text-gray-800">Men Blue Shirt</h2>

            {{-- nama, sku, brand --}}
            <div class="text-sm text-gray-800">
                <p><span class="text-gray-400">SKU:</span> FK-00001</p>
                <p><span class="text-gray-400">Brand:</span> Brand Name</p>
            </div>

            {{-- harga --}}
            <div>
                <span class="text-rose-500 font-bold text-xl">$69</span>
                <sub class="text-gray-400"><strike>$99</strike></sub>
            </div>

            {{-- warna --}}
            <div>
                <p class="text-gray-400">Colors:</p>
                <div class="flex gap-1">
                    <span style="background-color: #acacac" class="w-5 h-5 rounded-full">&nbsp;</span>
                    <span style="background-color: #cc00ff" class="w-5 h-5 rounded-full">&nbsp;</span>
                    <span style="background-color: #0048a7" class="w-5 h-5 rounded-full">&nbsp;</span>
                </div>
            </div>

            {{-- ukuran --}}
            <div>
                <p class="text-gray-400">Sizes:</p>
                <div class="flex gap-1 text-gray-400 text-sm">
                    <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">S</span>
                    <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">M</span>
                    <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">L</span>
                </div>
                <a href="#" class="text-gray-400 text-xs">Size Guide</a>
            </div>

            {{-- jumlah beli --}}
            <div>
                <p class="text-gray-400">Quantity</p>
                <div class="flex items-center gap-2">
                    <input type="text" value="1" readonly
                        class="bg-slate-200 rounded border border-gray-300 focus:outline-none px-2 text-lg font-medium w-20">
                    <button class="rounded border border-gray-300 w-7 h-7"><i
                            class="bi bi-plus-lg text-xl"></i></button>
                    <button class="rounded border border-gray-300 w-7 h-7"><i
                            class="bi bi-dash-lg text-xl"></i></button>
                </div>
            </div>

            {{-- like, +cart, buy --}}
            <div class="flex item-center gap-4">
                <span class="bg-white shadow-md rounded-full w-8 h-8 flex items-center justify-center">
                    <i class="bi bi-heart text-2xl text-gray-500"></i>
                </span>

                {{-- button add to cart --}}
                <div>
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-bold text-gray-600 rounded-lg group bg-gradient-to-br from-cyan-600 to-blue-700 group-hover:from-cyan-700 group-hover:to-blue-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-900">

                        <span
                            class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Add To Cart
                        </span>
                    </button>
                </div>

                {{-- button buy now --}}
                <div>
                    <button type="button"
                        class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-lg text-sm px-5 py-2 text-center mr-2 mb-2">Buy
                        Now</button>
                </div>
            </div>

        </div>
        {{-- sisi kanan end --}}
    </div>

    {{-- deskripsi produk --}}
    <div>
        <h3 class="text-lg text-gray-700 font-medium my-6">Deskripsi Produk</h3>
        <div class="text-gray-600">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus voluptatum, reiciendis veniam ipsum velit
            ullam consectetur illum quidem obcaecati alias hic earum consequatur facilis enim quia ex fuga rem repellat
            optio ducimus vitae odio id. Minus distinctio fugit veritatis autem mollitia, placeat nostrum quas alias
            sequi voluptates culpa. Ut repellendus recusandae nihil reprehenderit placeat impedit debitis facere
            repudiandae corporis consequatur, iste illum dolor officia cum repellat eligendi corrupti id ipsum
            perferendis illo tempore! Voluptate quas nisi rem sunt architecto. Tempore dolore minima ipsa ullam,
            perferendis dignissimos dolor earum doloremque ut quam? Est, inventore debitis fuga reprehenderit ipsam
            aperiam rem temporibus unde numquam. Modi quibusdam culpa sunt illo officia eius aspernatur quisquam.
        </div>
    </div>

    <section class="mt-20">
        <h3 class="text-gray-800 font-medium mb-2">Featured Product</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach (range(1, 12) as $item)
                <x-product.card1 />
            @endforeach
        </div>
    </section>

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
