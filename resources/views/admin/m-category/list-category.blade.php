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

        {{-- HEAD --}}
        <div class="flex justify-between p-4 items-center">
            <div class="">
                <h1 class="text-2xl font-bold">Daftar Kategori</h1>
            </div>

            <div class="">
                <a href="/admin/dashboard/list-categories/m/add"
                    class="bg-e2-green hover:bg-emerald-300 rounded-lg shadow text-white px-4 py-1.5">
                    Tambah Kategori
                </a>
            </div>
        </div>

        {{-- SEARCH BAR --}}
        <div class="w-full px-4 pb-4 py-2">
            <form action="/admin/dashboard/list-categories/search" method="GET">
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
                        placeholder="Cari Nama Brand">
                </div>
            </form>
        </div>

        {{-- Produk List --}}
        <div class="w-full px-4">
            <div class="grid grid-cols-2 sm:!grid-cols-4 md:!grid-cols-6 lg:!grid-cols-8 gap-3">
                @foreach ($categories as $c)
                    <a href="/admin/dashboard/list-categories/m/view/{{ $c->slug_category }}"
                        class="border shadow-md rounded max-w-xs group">
                        <div class="flex justify-center overflow-hidden">
                            <img class="rounded-t-lg w-32 h-32 group-hover:scale-110" src="{{ '/' . $c->logo }}"
                                alt="" />
                        </div>
                        <div class="p-5 text-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 group-hover:text-e2-green">
                                {{ $c->category }}
                            </h5>
                        </div>
                    </a>
                @endforeach
            </div>

            {!! $categories->links() !!}
        </div>


    </div>
@endsection
