@extends('master')

@section('title', $title)

@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        <!-- Breadcrumb -->
        <nav class="flex mt-5 px-5 py-3 text-gray-700 " aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin/dashboard/list-categories"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <i class="bi bi-list me-2"></i>
                        List Kategori
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="bi bi-chevron-right"></i>
                        <div class="ml-1 text-sm font-medium text-gray-700 md:ml-2 ">
                            Info Kategori
                        </div>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex justify-center">

            <div class="w-full mt-2 max-w-3xl border p-8 shadow-lg rounded-md">
                @if ($errors->has('category') || $errors->has('logo'))
                    <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium">
                            @if ($errors->has('logo'))
                                Logo Wajib diupload !
                            @elseif ($errors->has('category'))
                                Nama Category Wajib diisi !
                            @endif
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 "
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif
                <a href="/admin/dashboard/list-categories" class="text-sm hover:underline hover:text-e2-green">
                    <i class="bi bi-chevron-left"></i>
                    Kembali
                </a>

                <form method="POST" action="/admin/dashboard/list-categories/h/update/{{ $category->slug_category }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center">
                        <div class="ms-6">
                            <div
                                @if ($errors->has('logo')) class="w-32 h-32 border-2 border-dashed border-red-600 flex flex-col items-center justify-center"
                            @else
                            class="w-32 h-32 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center" @endif>
                                <label for="logoCategoryImageFile" class="text-gray-500">
                                    <div id="uploadIcon"
                                        class="w-full h-full hidden items-center justify-center cursor-pointer">
                                        <i class="bi bi-upload text-4xl"></i>
                                    </div>
                                    <input type="file" value="" name="logo" id="logoCategoryImageFile"
                                        class="hidden">
                                </label>
                                <div id="previewContainer" class="w-32 h-32 bg-cover  cursor-pointer">
                                    <img src="/{{ $category->logo }}" id="logoCategoryPreviewImage"
                                        class="w-32 h-32 bg-cover" alt="Preview Image">
                                </div>
                            </div>

                            <div class="w-full text-center">
                                <span class="text-sm font-light text-center">Logo</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <label class="font-bold" for="category_name">Nama Category</label>
                        <div class="mt-2">
                            @if ($errors->has('category'))
                                <input id="category_name" type="text" name="category"
                                    class="w-full max-w-md border rounded-md text-center border-red-500">
                                <p class="text-sm mt-2">*Wajib diisi !</p>
                            @else
                                <input id="category_name" type="text" name="category"
                                    value="{{ old('category', $category->category) }}"
                                    class="w-full max-w-md border rounded-md text-center">
                                <input type="hidden" name="slug_category" value="{{ $category->slug_category }}">
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-6 flex justify-center gap-x-6">
                        <button class="bg-e2-red hover:bg-e2-orange text-white rounded-md border px-6 py-2" type="button"
                            data-modal-target="popup-modal-confirm-delete" data-modal-toggle="popup-modal-confirm-delete">
                            Hapus
                        </button>
                        <button class="bg-e2-green hover:bg-emerald-700 text-white rounded-md border px-6 py-2"
                            type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div id="popup-modal-confirm-delete" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="popup-modal-confirm-delete">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Ingin Menghapus Kategori: {{ $category->category }} ?
                    </h3>
                    <form action="/admin/dashboard/list-categories/h/delete/{{ $category->slug_category }}"
                        method="post">
                        @csrf
                        <button data-modal-hide="popup-modal-confirm-delete" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Tidak
                        </button>
                        <button data-modal-hide="popup-modal-confirm-delete" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Iya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('logoCategoryImageFile').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();


            reader.onload = function(e) {
                var logoCategoryPreviewImage = document.getElementById('logoCategoryPreviewImage');
                logoCategoryPreviewImage.src = e.target.result;

                var previewContainer = document.getElementById('previewContainer');
                previewContainer.classList.remove('hidden');

                var uploadIcon = document.getElementById('uploadIcon');
                uploadIcon.classList.add('hidden');
            }


            reader.readAsDataURL(file);
        });

        document.getElementById('logoCategoryPreviewImage').addEventListener('click', function() {
            document.getElementById('logoCategoryImageFile').click();
        });
    </script>


@endsection
