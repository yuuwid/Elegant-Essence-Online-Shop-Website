@extends('master')

@section('title', $title)

@section('setup')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.js"></script>

@endsection

@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        @if (session('success'))
            <div id="alert-success" class="flex p-4 mb-4 border-t-4 border-green-500  text-green-800 rounded-lg bg-green-200"
                role="alert">
                <i class="bi bi-exclamation-triangle"></i>
                <span class="sr-only">Info</span>
                <div class="ml-3 font-medium">
                    {{ session('success')['msg'] }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1 hover:bg-green-200 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <i class="bi bi-x text-xl align-middle"></i>
                </button>
            </div>
        @endif
        <div class="flex flex-col xl:flex-row gap-4 gap-x-2 xl:gap-x-8 px-2 justify-evenly mt-6">
            {{-- UKURAN --}}
            @include('admin.m-color-size.size.m-size')
            {{-- UKURAN END --}}

            {{-- WARNA --}}
            @include('admin.m-color-size.color.m-color')

            {{-- WARNA END --}}
        </div>

    </div>


@endsection
