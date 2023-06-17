@extends('master')

@section('title', $title)

@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        <!-- Breadcrumb -->
        <nav class="flex mt-5 px-5 py-3 text-gray-700 " aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin/dashboard/list-brand"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <i class="bi bi-list me-2"></i>
                        List Brand
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="bi bi-chevron-right"></i>
                        <div class="ml-1 text-sm font-medium text-gray-700 md:ml-2 ">
                            Tambah Brand
                        </div>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex justify-center">

            <div class="w-full mt-2 max-w-3xl border p-8 shadow-lg rounded-md">
                @if ($errors->has('brand') || $errors->has('logo'))
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
                            @elseif ($errors->has('brand'))
                                Nama Brand Wajib diisi !
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

                <form method="POST" action="/admin/dashboard/list-brand/h/add" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center">
                        <div class="ms-6">
                            <div
                                @if ($errors->has('logo')) class="w-32 h-32 border-2 border-dashed border-red-600 flex flex-col items-center justify-center"
                            @else
                            class="w-32 h-32 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center" @endif>
                                <label for="logoBrandImageFile" class="text-gray-500">
                                    <div id="uploadIcon"
                                        class="w-full h-full flex items-center justify-center cursor-pointer">
                                        <i class="bi bi-upload text-4xl"></i>
                                    </div>
                                    <input type="file" value="" name="logo" id="logoBrandImageFile"
                                        class="hidden">
                                </label>
                                <div id="previewContainer" class="w-32 h-32 bg-cover hidden cursor-pointer">
                                    <img id="logoBrandPreviewImage" class="w-32 h-32 bg-cover" alt="Preview Image">
                                </div>
                            </div>

                            <div class="w-full text-center">
                                <span class="text-sm font-light text-center">Logo</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <label class="font-bold" for="brand_name">Nama Brand</label>
                        <div class="mt-2">
                            @if ($errors->has('brand'))
                                <input id="brand_name" type="text" name="brand"
                                    class="w-full max-w-md border rounded-md text-center border-red-500">
                                <p class="text-sm mt-2">*Wajib diisi !</p>
                            @else
                                <input id="brand_name" type="text" name="brand" value="{{ old('brand') }}"
                                    class="w-full max-w-md border rounded-md text-center">
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button class="bg-e2-green hover:bg-emerald-700 text-white rounded-md border px-6 py-2"
                            type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('logoBrandImageFile').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();


            reader.onload = function(e) {
                var logoBrandPreviewImage = document.getElementById('logoBrandPreviewImage');
                logoBrandPreviewImage.src = e.target.result;

                var previewContainer = document.getElementById('previewContainer');
                previewContainer.classList.remove('hidden');

                var uploadIcon = document.getElementById('uploadIcon');
                uploadIcon.classList.add('hidden');
            }


            reader.readAsDataURL(file);
        });

        document.getElementById('logoBrandPreviewImage').addEventListener('click', function() {
            document.getElementById('logoBrandImageFile').click();
        });
    </script>


@endsection
