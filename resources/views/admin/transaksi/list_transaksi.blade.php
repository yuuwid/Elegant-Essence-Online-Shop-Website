@extends('master')

@section('title', $title)


@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        <h1 class="text-2xl font-bold my-6">Daftar Transaksi</h1>

        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 "
                        type="button">
                        <i class="bi bi-clock me-3"></i>
                        @if (request()->has('filter'))
                            @php
                                $filter = request()->get('filter');
                            @endphp
                            @if ($filter == 'hari-ini')
                                Hari ini
                            @elseif ($filter == '3-hari-terakhir')
                                3 Hari Terakhir
                            @elseif ($filter == '7-hari-terakhir')
                                7 Hari Terakhir
                            @elseif ($filter == '30-hari-terakhir')
                                30 Hari Terakhir
                            @elseif ($filter == '3-bulan-terakhir')
                                3 Bulan Terakhir
                            @else
                            @endif
                        @else
                            30 Hari Terakhir
                        @endif
                        <i class="bi bi-caret-down ms-3"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio" class="z-50 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center rounded hover:bg-gray-100">
                                    <a class="w-full h-full p-2" href="/admin/dashboard/transaksi?filter=hari-ini">
                                        Hari Ini
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center rounded hover:bg-gray-100">
                                    <a class="w-full h-full p-2" href="/admin/dashboard/transaksi?filter=3-hari-terakhir">
                                        3 Hari Terakhir
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center rounded hover:bg-gray-100">
                                    <a class="w-full h-full p-2" href="/admin/dashboard/transaksi?filter=7-hari-terakhir">
                                        7 Hari Terakhir
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center rounded hover:bg-gray-100">
                                    <a class="w-full h-full p-2" href="/admin/dashboard/transaksi?filter=30-hari-terakhir">
                                        30 Hari Terakhir
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center rounded hover:bg-gray-100">
                                    <a class="w-full h-full p-2" href="/admin/dashboard/transaksi?filter=3-bulan-terakhir">
                                        3 Bulan Terakhir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <form method="GET" action="/admin/dashboard/transaksi" class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="bi bi-search"></i>
                    </div>
                    <input type="text" id="table-search" name="keyword" value="{{ request()->get('keyword') }}"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search for items">
                </form>
            </div>
            <table class="w-full text-left text-gray-500">
                <thead class="text-sm uppercase bg-e2-blue-base text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Transaksi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pembeli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transactions->count() == 0)
                        <tr class="text-center">
                            <td colspan="4" class=" py-5">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($transactions as $tr)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $tr->created_at }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $tr->user->full_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tr->transaction_track->last()->status_transaction->status }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>
        <div class="my-6">
            {{ $transactions->withQueryString()->links() }}
        </div>


    </div>

@endsection
