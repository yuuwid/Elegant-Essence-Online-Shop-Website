<div class="flex-1">
    @if ($errors->has('size') || $errors->has('slug_category'))
        <div id="alert-error" class="flex p-4 mb-4 border-t-4 border-red-500  text-red-800 rounded-lg bg-red-200"
            role="alert">
            <i class="bi bi-exclamation-triangle"></i>
            <span class="sr-only">Info</span>
            <div class="ml-3 font-medium">
                Oops... Sepertinya ada yang terlewat.
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1 hover:bg-red-200 inline-flex h-8 w-8"
                data-dismiss-target="#alert-error" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="bi bi-x text-xl align-middle"></i>
            </button>
        </div>
    @endif


    <div id="alert-success-api-size"
        class="hidden p-4 mb-4 border-t-4 border-green-500  text-green-800 rounded-lg bg-green-200" role="alert">
        <i class="bi bi-exclamation-triangle"></i>
        <span class="sr-only">Info</span>
        <div class="ml-3 font-medium" id="alert-success-api-size-msg">

        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1 hover:bg-green-200 inline-flex h-8 w-8"
            data-dismiss-target="#alert-success-api-size" aria-label="Close">
            <span class="sr-only">Close</span>
            <i class="bi bi-x text-xl align-middle"></i>
        </button>
    </div>

    <div id="alert-failed-api-size"
        class="hidden p-4 mb-4 border-t-4 border-red-500  text-red-800 rounded-lg bg-red-200" role="alert">
        <i class="bi bi-exclamation-triangle"></i>
        <span class="sr-only">Info</span>
        <div class="ml-3 font-medium" id="alert-failed-api-size-msg">
            Oops... Sepertinya ada yang terlewat.
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1 hover:bg-red-200 inline-flex h-8 w-8"
            data-dismiss-target="#alert-failed-api-size" aria-label="Close">
            <span class="sr-only">Close</span>
            <i class="bi bi-x text-xl align-middle"></i>
        </button>
    </div>

    <div class="mb-3">
        <div class="flex justify-between">
            <h1 class="text-lg font-bold mb-2">Ukuran Kategori</h1>
            <div class="">
                <button data-modal-target="formAddSizeModal" data-modal-toggle="formAddSizeModal"
                    class="bg-e2-blue-700 hover:bg-e2-green text-white px-1.5 py-0.5 rounded">
                    <i class="bi bi-plus"></i>
                    <span class="me-1">Tambah</span>
                </button>
            </div>
        </div>
        <div class="flex-1 flex flex-wrap">
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
            <a href="/admin/dashboard/list-colors-sizes?search-by-category=null"
                class="text-blue-700 hover:text-white border border-e2-blue-base hover:bg-e2-green focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-1.5 text-center mr-2 mb-2 uppercase {{ request()->get('search-by-category') != 'null' ? '' : 'bg-e2-green !text-white' }}">
                Tidak ada Jenis
            </a>
        </div>

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
                    <th scope="col" class="px-0 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (sizeof($sizes))
                    @foreach ($sizes as $s)
                        <tr class="bg-white border-b hover:bg-e2-blue-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $s->category != null ? $s->category->category : '-' }}
                            </th>
                            <th class="px-6 py-4 text-center">
                                {{ $s->size }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $s->variants_count }}
                            </td>
                            <td class="px-0 py-4 flex gap-x-2">
                                <button data-modal-target="formEditSizeModal" data-modal-toggle="formEditSizeModal"
                                    class="bg-e2-blue-700 hover:bg-e2-blue-base text-white px-1.5 py-0.5 rounded"
                                    onclick="setIdUpdateSize({{ $s->id_size }})">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button data-modal-target="deleteSizeConfirmModal"
                                    data-modal-toggle="deleteSizeConfirmModal"
                                    class="bg-e2-red hover:bg-red-700 text-white px-1.5 py-0.5 rounded "
                                    onclick="setIdDeleteSize({{ $s->id_size }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b hover:bg-e2-blue-100">
                        <th scope="row" colspan="4" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Tidak ada data
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>

    <div class="mt-3">
        {{ $sizes }}
    </div>
</div>


{{-- HELPER MODAL --}}
<input type="hidden" id="helper-modal-size-id" value="">
{{-- HELPER MODAL END --}}

{{-- MODAL Form SIZE --}}
<div id="formAddSizeModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <form action="/admin/dashboard/list-colors-sizes/h/add/size" method="POST"
            class="relative bg-white rounded-lg shadow">
            @csrf
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Ukuran
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="formAddSizeModal">
                    <i class="bi bi-x"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="mb-3">
                    <label class="font-bold" for="size_field">Ukuran </label>
                    <div class="mt-2">
                        <input id="size_field" type="text" name="size" value="{{ old('size') }}"
                            class="w-full max-w-md border rounded-md border-gray-300">
                    </div>
                </div>
                <div class="">
                    <label for="category_field" class="block mb-2  font-bold text-gray-900">
                        Pilih Kategori
                    </label>
                    <select id="category_field" name="slug_category"
                        class="w-full max-w-md  border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option selected value="-1">Pilih Kategori</option>
                        @foreach ($categories as $c)
                            @if ($errors->has('slug_category'))
                                @if ($c->slug_category == old('slug_category'))
                                    <option selected value="{{ $c->slug_category }}">{{ $c->category }}
                                    </option>
                                @else
                                    <option value="{{ $c->slug_category }}">{{ $c->category }}
                                    </option>
                                @endif
                            @else
                                <option value="{{ $c->slug_category }}">{{ $c->category }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="formAddSizeModal" type="submit "
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan
                </button>
                <button data-modal-hide="formAddSizeModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
{{-- MODAL Form SIZE END --}}

{{-- MODAL Form Edit Size --}}
<div id="formEditSizeModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            @csrf
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900">
                    Edit Ukuran
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="formEditSizeModal">
                    <i class="bi bi-x"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="mb-3">
                    <label class="font-bold" for="size_field">Ukuran </label>
                    <div class="mt-2">
                        <input id="size_field_edit" type="text" name="size" value=""
                            class="w-full max-w-md border rounded-md border-gray-300">
                    </div>
                </div>
                <div class="">
                    <label for="category_field_edit" class="block mb-2  font-bold text-gray-900">
                        Pilih Kategori
                    </label>
                    <select id="category_field_edit" name="slug_category"
                        class="w-full max-w-md  border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    </select>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="formEditSizeModal" type="submit "
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    onclick="sendUpdateSize()">
                    Simpan
                </button>
                <button data-modal-hide="formEditSizeModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
{{-- MODAL Form Edit Size End --}}

{{-- MODAL CONFIRM DELETE --}}
<div id="deleteSizeConfirmModal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="deleteSizeConfirmModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">
                    Yakin ingin menghapus data ini ?
                </h3>
                <button data-modal-hide="deleteSizeConfirmModal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                    onclick="sendDeleteSize()">
                    Ya, Hapus
                </button>
                <button data-modal-hide="deleteSizeConfirmModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                    Tidak, Batal
                </button>
            </div>
        </div>
    </div>
</div>
{{-- MODAL CONFIRM DELETE END --}}


<script>
    function apiSend(method, endpoint, data) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, endpoint, false);
        xhr.setRequestHeader("Content-Type", "application/json");
        if (data != null) {
            var jsonData = JSON.stringify(data);
            xhr.send(jsonData);
        } else {
            xhr.send(null);
        }
        return JSON.parse(xhr.responseText);
    }

    function apiGET(endpoint, data) {
        return apiSend('GET', endpoint, data);
    }
</script>

<script>
    function setIdUpdateSize(id) {
        $('#helper-modal-size-id').val(id);

        data_size = apiGET('/api/sizes/' + id.toString(), null);
        $('#size_field_edit').val(data_size['size'])

        categories = apiGET('/api/categories', null)

        const select = $('#category_field_edit');

        if (data_size['id_category'] == null) {
            select.append('<option selected value="-1">Pilih Kategori</option>')
        }

        select.children('option').remove();
        
        categories.forEach(cat => {
            if (data_size['id_category'] != null) {
                if (cat['slug_category'] == data_size['category']['slug_category']) {
                    var el = '<option selected value="' +
                        cat['slug_category'] +
                        '">' +
                        cat['category'] +
                        '</option>';
                } else {
                    var el = '<option value="' + cat['slug_category'] + '">' + cat['category'] + '</option>';
                }
            } else {
                var el = '<option value="' + cat['slug_category'] + '">' + cat['category'] + '</option>';
            }

            select.append(el);
        });

    }

    function sendUpdateSize() {
        const size = $('#size_field_edit').val()
        const slug_category = $('#category_field_edit').val();
        const id_size = $('#helper-modal-size-id').val();

        const data = {
            'id_size': id_size,
            'size': size,
            'slug_category': slug_category,
        };


        const result = apiSend('PUT', '/api/sizes/' + id_size, data);

        if (result) {
            $('#alert-success-api-size').toggleClass('hidden flex');
            $('#alert-success-api-size-msg').html('Berhasil <b>memperbarui</b> data')

            setTimeout(function() {
                location.reload();
            }, 1000);
        } else {
            $('#alert-failed-api-size').toggleClass('hidden flex');
        }
    }

    function setIdDeleteSize(id) {
        $('#helper-modal-size-id').val(id);
    }

    function sendDeleteSize() {
        const id_size = $('#helper-modal-size-id').val();

        const result = apiSend('DELETE', '/api/sizes/' + id_size, null);


        if (result) {
            $('#alert-success-api-size').toggleClass('hidden flex');
            $('#alert-success-api-size-msg').html('Berhasil <b>menghapus</b> data')
            setTimeout(function() {
                location.reload();
            }, 1000);
        } else {
            $('#alert-failed-api-size').toggleClass('hidden flex');
        }
    }
</script>
