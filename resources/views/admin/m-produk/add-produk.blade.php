@extends('master')

@section('title', $title)

@section('setup')
    <link rel="stylesheet" href="{{ asset('vendor/multi-uploader/dist/image-uploader.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <script src="{{ asset('vendor/multi-uploader/dist/image-uploader.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <style>
        .jquery-uploader-preview-container {
            padding-bottom: 0px !important;
        }

        .jquery-uploader-select-card {
            margin-bottom: 0px;
        }
    </style>
@endsection

@section('content')

    @include('admin.components.sidebar')


    @if (session('success'))
        <div id="success-popup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-8">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 0a10 10 0 100 20 10 10 0 000-20zm4.95 7.768l-5.27 5.28a.657.657 0 01-.93 0l-2.957-2.95a.657.657 0 01.928-.929l2.03 2.028 4.82-4.827a.657.657 0 01.929.93z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="text-lg font-semibold text-e2-green">Success!</h2>
                </div>
                <p class="text-gray-700 mb-4">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form class="p-4 sm:ml-64 mt-20" method="POST" action="/admin/dashboard/list-produk/h/add"
        enctype="multipart/form-data">
        @csrf

        {{-- Breadcrumbs --}}
        <div class="flex justify-between items-center mt-3">
            <section class="">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/admin/dashboard/list-produk"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                                List Produk
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right"></i>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                    Tambah Produk
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </section>
            <div class="block lg:hidden">
                <button class="bg-e2-blue-500 hover:bg-e2-blue-900 rounded-md shadow-sm text-white px-4 py-2">
                    Simpan
                </button>
            </div>
        </div>

        <div class="w-full flex flex-col lg:!flex-row mt-8">
            <div class="w-full lg:w-[60%]">
                <h1 class="font-bold text-lg x-2 lg:mx-6 ">Detail Produk</h1>
                <div class="flex items-center flex-col sm:flex-row mt-4">
                    {{-- THUMBNAIL UPLOAD --}}

                    <div class="ms-6">
                        <div
                            @if ($errors->has('thumbnail')) class="w-32 h-32 border-2 border-dashed border-red-600 flex flex-col items-center justify-center"
                            @else
                            class="w-32 h-32 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center" @endif>
                            <label for="thumbnailImageFile" class="text-gray-500">
                                <div id="uploadIcon" class="w-full h-full flex items-center justify-center cursor-pointer">
                                    <i class="bi bi-upload text-4xl"></i>
                                </div>
                                <input type="file" value="" id="thumbnailImageFile" class="hidden">
                                <input type="hidden" name="thumbnail" id="thumbnail_temp_id"
                                    value="{{ @old('thumbnail') }}">
                            </label>
                            <div id="previewContainer" class="w-32 h-32 bg-cover hidden">
                                <img id="thumbnailPreviewImage" class="w-32 h-32 bg-cover" alt="Preview Image">
                            </div>
                        </div>

                        <div class="w-full text-center">
                            <span class="text-sm font-light text-center">Thumnbail</span>
                        </div>
                    </div>
                    {{-- THUMBNAIL UPLOAD END --}}
                    {{-- NAMA PRODUK --}}
                    <div class="mb-6 w-full mx-2 lg:mx-6 mt-4 sm:mt-0">
                        <label for="default-input" class="block mb-2 text-sm text-gray-900 font-bold">
                            Nama Produk <span class="text-red-600">*</span>
                        </label>
                        <input type="text" id="default-input" name="product_name" value="{{ old('product_name') }}"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 @if ($errors->has('product_name')) border-red-600 @endif focus:border-blue-500 block w-full p-2.5 ">
                        @if ($errors->has('product_name'))
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                Nama Produk wajib diisi !
                            </p>
                        @endif
                    </div>
                    {{-- NAMA PRODUK END --}}
                </div>

                {{-- DESKRIPSI FIELD --}}
                <div class="my-6 mx-2 lg:mx-6">
                    <label for="editor" class="block mb-2 text-sm font-bold text-gray-900">
                        Deskripsi
                    </label>
                    <textarea id="editor" rows="3" name="description" class="">
                        {{ old('description') }}
                    </textarea>
                </div>
                {{-- DESKRIPSI FIELD END --}}

                <div class="my-6 mx-2 lg:mx-6 flex gap-x-4">
                    {{-- BRAND FIELD --}}
                    <div class="flex-1">
                        <label for="brands" class="block mb-2 text-sm font-bold text-gray-900">
                            Pilih Brand <span class="text-red-600">*</span>
                        </label>
                        <select id="brands" name="slug_brand"
                            @if ($errors->has('slug_brand')) class="bg-gray-50 border border-red-600 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        @else
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif>
                            @if (old('slug_brand'))
                                <option value="-1">Pilih Brand</option>
                                @foreach ($brands as $b)
                                    <option @if (old('slug_brand') == $b->slug_brand) selected @endif value="{{ $b->slug_brand }}">
                                        {{ $b->brand }}</option>
                                @endforeach
                            @else
                                <option selected value="-1">Pilih Brand</option>
                                @foreach ($brands as $b)
                                    <option value="{{ $b->slug_brand }}">{{ $b->brand }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('slug_brand'))
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                Pilih Brand terlebih dahulu !
                            </p>
                        @endif
                    </div>
                    {{-- BRAND FIELD END --}}

                    {{-- KATEGORI FIELD --}}
                    <div class="flex-1">
                        <label for="kategori" class="block mb-2 text-sm font-bold text-gray-900">
                            Pilih Kategori <span class="text-red-600">*</span>
                        </label>
                        <select id="kategori" name="slug_category"
                            @if ($errors->has('slug_category')) class="bg-gray-50 border border-red-600 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        @else
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif>
                            @if (old('slug_category'))
                                <option value="-1">Pilih Kategori</option>
                                @foreach ($categories as $c)
                                    <option @if (old('slug_category') == $c->slug_category) selected @endif
                                        value="{{ $c->slug_category }}">{{ $c->category }}</option>
                                @endforeach
                            @else
                                <option selected value="-1">Pilih Kategori</option>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->slug_category }}">{{ $c->category }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('slug_category'))
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                Pilih Kategori terlebih dahulu !
                            </p>
                        @endif
                    </div>
                    {{-- KATEGORI FIELD END --}}

                </div>

                <hr>

                <div class="my-6 mx-2 lg:mx-6">
                    <h1 class="font-bold text-lg block mb-2 text-gray-900">
                        Varian Produk
                    </h1>


                    <table class="w-full" id="dynamicAddRemove">
                        <tr id="init-variant">
                            {{-- Button Add --}}
                            <td class="text-center">
                                <button type="button" name="add" id="dynamic-ar"
                                    class="bg-e2-green text-white mx-4 px-2.5 py-1.5 rounded-md">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </td>
                            {{-- Button Add END --}}
                        </tr>
                    </table>
                    <div class="">
                        <input type="hidden" id="temp_n_variant" name="temp_n_variant"
                            value="{{ old('temp_n_variant', 1) }}">
                    </div>
                </div>

            </div>
            <div class="w-full lg:w-[40%] mt-6 lg:!mt-0">
                <h1 class="font-bold text-lg">Gambar</h1>
                {{-- <div id="thumnbail-image" class="px-8"></div> --}}
                <div id="uploadContainer" class="flex flex-wrap">
                    <div id="uploadImagesBatch"
                        class="w-32 h-32 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center mt-4 mr-4">
                        <input type="file" name="images[]" class="hidden items-multi-upload" multiple>
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-4xl">+</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="batch_images_temp" name="batch_images" value="{{ @old('batch_images') }}">
            </div>
        </div>


        <div class="hidden justify-center mt-8 lg:!flex">
            <button class="bg-e2-blue-500 hover:bg-e2-blue-900 rounded-md shadow-sm text-white px-4 py-2" type="submit">
                Simpan
            </button>
        </div>
    </form>

    {{-- TOAST --}}
    <div id="toast-upload-success"
        class="fixed right-5 bottom-5 animate-slide-rtl hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
        role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <i class="bi bi-check"></i>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal" id="toast-upload-success-title"></div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
            data-dismiss-target="#toast-upload-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <i class="bi bi-x"></i>
        </button>
    </div>
    <div id="toast-upload-failed"
        class="fixed right-5 bottom-5 animate-slide-rtl hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
        role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-e2-red bg-red-100 rounded-lg">
            <i class="bi bi-x"></i>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">
            Gagal mengupload file
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
            data-dismiss-target="#toast-upload-failed" aria-label="Close">
            <span class="sr-only">Close</span>
            <i class="bi bi-x"></i>
        </button>
    </div>
    {{-- TOAST END --}}

    {{-- HIDDEN TEMPLATE --}}
    <div class="hidden" id="template-color">
        <option selected value="-1">Pilih Warna</option>
        @foreach ($colors as $color)
            <option value="{{ $color->id_color }}">{{ $color->color }}</option>
        @endforeach
    </div>
    <div class="hidden" id="template-size">
        <option selected value="-1">Pilih Ukuran</option>
        @foreach ($sizes as $size)
            <option value="{{ $size->id_size }}">{{ $size->size }}</option>
        @endforeach
    </div>
    <div class="hidden" id="template-variant">
        @include('admin.m-produk.template-multifield')
    </div>
    {{-- HIDDEN TEMPLATE END --}}

    {{-- WYSIWYG --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    @include('admin.m-produk.scripts.multi-field')

    @include('admin.m-produk.scripts.thumbnail')

    @include('admin.m-produk.scripts.batch-image')


    {{-- Pop Up --}}
    <script>
        function wait(ms) {
            var start = new Date().getTime();
            var end = start;
            while (end < start + ms) {
                end = new Date().getTime();
            }
        }
        var successPopup = document.getElementById('success-popup');
        var closeSuccessPopup = document.getElementById('close-success-popup');

        if (successPopup) {
            wait(3000);
            successPopup.style.display = 'none';
            window.location = "/admin/dashboard/list-produk"
        }
    </script>
@endsection
