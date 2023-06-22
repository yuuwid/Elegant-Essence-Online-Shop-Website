@extends('master')

@section('title', $title)

@section('content')

    @include('admin.components.sidebar')

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil mengupdate profile'
            })
        </script>
    @endif

    <div class="p-4 sm:ml-64 mt-16 flex justify-center">
        <div class="w-full max-w-6xl mt-12 mx-8 my-4 px-2 py-8 rounded-md shadow-md border">
            <form class="flex flex-col xl:flex-row" method="POST" action="/admin/profile/edit" enctype="multipart/form-data">
                @csrf
                <div class="w-full xl:w-1/4 flex justify-center">

                    <div class="px-6">
                        <div
                            class="w-32 h-32 overflow-hidden rounded-full bg-cover flex flex-col items-center justify-center">
                            <label for="profilePhotoFile" class="text-gray-500">
                                <div id="uploadIcon"
                                    class="w-full h-full hidden items-center justify-center cursor-pointer">
                                    <i class="bi bi-upload text-4xl"></i>
                                </div>
                                <input type="file" value="" name="profile_photo" id="profilePhotoFile"
                                    class="hidden">
                            </label>
                            <div id="previewContainer" class="w-full h-full bg-cover cursor-pointer">
                                <img src="/images/{{ $user->profile_photo }}" id="profilePhotoPreviewImage"
                                    class="w-full h-full bg-cover object-cover" alt="Preview Image">
                            </div>
                        </div>

                        <div class="w-full text-center mt-2">
                            <label for="profilePhotoFile"
                                class="font-light text-center cursor-pointer hover:text-e2-blue-900 hover:underline">
                                Ubah Foto
                            </label>
                        </div>
                    </div>


                </div>
                <div class="w-full xl:w-3/4 px-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold">Profile</h1>
                    </div>

                    <div class="mb-3">
                        <label for="name-input" class="block mb-2 text-sm font-bold text-gray-900">
                            Nama Lengkap
                        </label>
                        <input type="text" name="full_name" id="name-input" value="{{ $user->full_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>

                    <hr class="mt-6 mb-3">

                    <div class="mb-3 flex flex-col lg:flex-row gap-6">
                        <div class="flex-1">
                            <label for="nip-input" class="block mb-2 text-sm font-bold text-gray-900">
                                NIP
                            </label>
                            <input type="text" name="" id="nip-input" value="{{ $user->nip }}"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                disabled>
                            <input type="hidden" name="nip" value="{{ $user->nip }}"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex-1">
                            <label for="nik-input" class="block mb-2 text-sm font-bold text-gray-900">
                                NIK
                            </label>
                            <input type="text" name="nik" id="nik-input" value="{{ $user->nik }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                    </div>

                    <hr class="mt-6 mb-3">

                    <div class="flex flex-col lg:flex-row">
                        <div class="mb-3 flex-1">
                            <label for="password-input" class="block mb-2 text-sm font-bold text-gray-900">
                                Password
                            </label>
                            <input type="password" name="password" id="password-input" value="" placeholder="*******"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <div class="flex-1"></div>
                    </div>
                    <div class="text-center mt-6">
                        <button class="bg-e2-blue-base hover:bg-e2-green text-white px-4 py-1.5 rounded-md shadow">
                            Simpan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script></script>

    <script>
        document.getElementById('profilePhotoFile').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var profilePhotoPreviewImage = document.getElementById('profilePhotoPreviewImage');
                profilePhotoPreviewImage.src = e.target.result;

                var previewContainer = document.getElementById('previewContainer');
                previewContainer.classList.remove('hidden');

                var uploadIcon = document.getElementById('uploadIcon');
                uploadIcon.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        });

        document.getElementById('profilePhotoPreviewImage').addEventListener('click', function() {
            document.getElementById('profilePhotoFile').click();
        });
    </script>
@endsection
