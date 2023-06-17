<td>
    <div class="mb-3">
        {{-- PRICE FIELD --}}
        <div class="flex-grow">
            <label for="discount-{index}" class="block mb-2 text-sm font-bold text-gray-900">
                Harga
            </label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    Rp.
                </span>
                <input type="number" id="discount-{index}" name="price-{index}"
                    class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
            </div>
        </div>
        {{-- PRICE FIELD END --}}
    </div>

    <div class="flex flex-col sm:flex-row space-x-0 space-y-3 sm:space-x-3 sm:space-y-0 mb-3">
        {{-- DISKON FIELD --}}
        <div class="flex-1">
            <label for="discount-{index}" class="block mb-2 text-sm font-bold text-gray-900">
                Diskon
            </label>
            <div class="flex">
                <input type="number" id="discount-{index}" name="discount-{index}" value="0"
                    class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md">
                    %
                </span>
            </div>
        </div>
        {{-- DISKON FIELD END --}}

        {{-- STOK FIELD --}}
        <div class="flex-1">
            <label for="stock-{index}" class="block mb-2 text-sm font-bold text-gray-900">
                Stok
            </label>
            <div class="flex">
                <input type="number" id="stock-{index}" name="stock-{index}" value="0"
                    class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
            </div>
        </div>
        {{-- STOK FIELD END --}}
    </div>
    <div class="flex flex-col sm:flex-row space-x-0 space-y-3 sm:space-x-3 sm:space-y-0 mb-3">
        <div class="flex-1">
            <label for="color-{index}" class="block mb-2 text-sm font-bold text-gray-900">
                Pilih Warna
            </label>
            <select id="color-{index}" name="id_color-{index}"
                class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </select>
        </div>
        <div class="flex-1">
            <label for="size-{index}" class="block mb-2 text-sm font-bold text-gray-900">
                Pilih Ukuran
            </label>
            <select id="size-{index}" name="id_size-{index}"
                class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </select>
        </div>
    </div>
</td>
