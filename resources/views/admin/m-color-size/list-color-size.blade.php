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
                                        <button data-modal-target="formSizeModal" data-modal-toggle="formSizeModal"
                                            class="bg-e2-blue-700 hover:bg-e2-blue-base text-white px-1.5 py-0.5 rounded"
                                            onclick="setId({{ $s->id_size }})">
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

        {{-- HELPER MODAL --}}
        <input type="hidden" id="helper-modal-value" value="">
        {{-- HELPER MODAL END --}}

        {{-- MODAL Form SIZE --}}
        <div id="formSizeModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Ukuran
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <i class="bi bi-x"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="formSizeModal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I
                            Simpan
                        </button>
                        <button data-modal-hide="formSizeModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL Form SIZE END --}}

    </div>

    <script>
        function setId(id) {
            $('#helper-modal-value').val(id);
        }
    </script>

@endsection
