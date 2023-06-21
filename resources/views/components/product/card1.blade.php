<a href="{{ route('products_detail') }}" class="bg-white rounded-lg shadow-lg p-3 relative">
    <img class="mx-auto" src="{{ asset('images/user/product-1.png') }}" alt="">

    <div class="flex justify-between gap-3 my-4">
        <p class=" font-medium text-gray-800">Mens Casual Slim Fit T-Shirts</p>
        <div class="flex flex-col items-end">
            <strong class="text-e2-blue-600">$69</strong>
            <strike class="text-gray-400">$99</strike>
        </div>
    </div>

    <div class="flex justify-between items-center mb-2">
        <div class="flex gap-1">
            <span style="background-color: #acacac" class="w-5 h-5 rounded-full">&nbsp;</span>
            <span style="background-color: #cc00ff" class="w-5 h-5 rounded-full">&nbsp;</span>
            <span style="background-color: #0048a7" class="w-5 h-5 rounded-full">&nbsp;</span>
        </div>

        <div class="flex gap-1 text-gray-400 text-sm">
            <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">S</span>
            <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">M</span>
            <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">L</span>
        </div>
    </div>

    <div class="flex justify-between items-center">
        <span class="text-gray-400"><i class="bi bi-star"></i>4.5</span>
        <span class="text-e2-blue-700 flex items-center font-bold"><i class="bi bi-cart-plus text-2xl"></i>Buy Now</span>
    </div>

    <div class="absolute top-2 left-3 right-3 flex justify-between items-center">
        <span class="bg-white shadow-md rounded-full w-7 h-7 flex items-center justify-center"><i 
            class="bi bi-heart text-xl"></i></span>
    </div>

</a>
