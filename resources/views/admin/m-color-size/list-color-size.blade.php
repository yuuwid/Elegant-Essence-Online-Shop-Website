@extends('master')

@section('title', $title)

@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">
        @if (session('success'))
            <div id="alert-1" class="flex p-4 mb-4 border-t-4 border-green-500  text-green-800 rounded-lg bg-green-200"
                role="alert">
                <i class="bi bi-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-3 font-medium">
                    {!! session('success')['msg'] !!}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1 hover:bg-green-200 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <i class="bi bi-x text-xl align-middle"></i>
                </button>
            </div>
        @endif

        <div class="flex flex-col md:flex-row gap-4 justify-evenly mt-6">
            {{-- UKURAN --}}
            <div class="flex-1">

                <div class="mb-3">
                    <h1 class="text-lg font-bold mb-2">Kategori</h1>
                    <a href="/admin/dashboard/list-colors-sizes"
                        class="text-blue-700 hover:text-white border border-e2-blue-base hover:bg-e2-green focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-1.5 text-center mr-2 mb-2 uppercase {{ request()->get('search-by-category') != null ? '' : 'bg-e2-green !text-white' }}">
                        Semua
                    </a>
                    @foreach ($categories as $c)
                        <a href="/admin/dashboard/list-colors-sizes?search-by-category={{ $c->slug_category }}"
                            class="text-blue-700 hover:text-white border border-e2-blue-base hover:bg-e2-green focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-1.5 text-center mr-2 mb-2 uppercase {{ request()->get('search-by-category') == $c->slug_category ? 'bg-e2-green !text-white' : '' }}">
                            {{ $c->category }}
                        </a>
                    @endforeach
                </div>

                <div class="relative overflow-x-auto border sm:rounded-lg">
                    <table class="w-full text-base text-left text-gray-500">
                        <thead class="text-sm font-bold uppercase !bg-e2-blue-base text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Ukuran
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jumlah Varian Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $s)
                                <tr class="bg-white border-b hover:bg-e2-blue-100">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $s->category->category }}
                                    </th>
                                    <th class="px-6 py-4 text-center">
                                        {{ $s->size }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ $s->variants_count }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="hidden" id="{{ $s->id_size }}" value="">
                                        <button
                                            class="bg-e2-blue-700 hover:bg-e2-blue-base text-white px-1.5 py-0.5 rounded ">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="bg-e2-red hover:bg-red-700 text-white px-1.5 py-0.5 rounded ">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            {{-- UKURAN END --}}
            {{-- WARNA --}}
            <div class="flex-1">

            </div>
            {{-- WARNA END --}}
        </div>

    </div>

@endsection
