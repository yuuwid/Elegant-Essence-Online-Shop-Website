@extends('master')

@section('title', $title)

@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        {{-- HEAD --}}
        <div class="flex justify-between p-4 items-center">
            <div class="">
                <h1 class="text-2xl font-bold">Daftar Produk</h1>
            </div>

            <div class="">
                <a href="/admin/dashboard/list-produk/m/add"
                    class="bg-e2-green hover:bg-emerald-300 rounded-lg shadow text-white px-4 py-1.5">
                    Tambah Produk
                </a>
            </div>
        </div>

        {{-- SEARCH BAR --}}
        <div class="w-full px-4 pb-4 py-2">

            <form action="/admin/dashboard/list-produk/search" method="GET">
                <label for="keyword" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="keyword" name="keyword" value="{{ $keyword ?? '' }}"
                        class="block w-full p-3 pl-14 text-sm
                        text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500
                        focus:border-blue-500"
                        placeholder="Cari Nama Produk">
                </div>
            </form>

        </div>

        {{-- Produk List --}}
        <div class="w-full px-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <table class="w-full text-sm text-left  text-gray-500">
                    <thead class="text-xs text-white uppercase !bg-e2-blue-base">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Brand
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Varian Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $p->product_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $p->brand != null ? $p->brand->brand : "Tidak ada Merk" }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->category != null ? $p->category->category : "Tidak ada Kategori" }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ sizeof($p->variants) }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="bg-e2-green hover:bg-emerald-500 px-2 py-1.5 rounded-md text-white">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#"
                                            class="bg-e2-red hover:bg-red-300 px-2 py-1.5 rounded-md text-white">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $products->links() !!}
        </div>


    </div>
@endsection
