@extends('master')

@section('title', $title)


@section('content')

    @include('admin.components.sidebar')

    <div class="p-4 sm:ml-64 mt-20">

        <div class="flex flex-col lg:flex-row gap-4 p-4">
            <div class="p-4 flex-1 border rounded shadow">
                <h1 class="mb-6 font-bold text-lg">Informasi Pesanan</h1>

                <div class="mb-3">
                    <span class="text-sm font-bold">
                        Kode Transaksi
                    </span>
                    @php
                        $dateTime = explode(' ', $transaction->created_at);
                        $date = str_replace('-', '', $dateTime[0]);
                        $time = str_replace(':', '', $dateTime[1]);

                        // no_transaksi = waktu + " " + id_transaction + " " + tanggal
                        $kode_transaksi = $time . ' ' . str_pad($transaction->id_transaction, 6, '0', STR_PAD_LEFT) . ' ' . $date;
                    @endphp
                    <h1 class="">
                        {{ $kode_transaksi }}
                    </h1>
                </div>

                <div class="mb-3">
                    <span class="text-sm font-bold">
                        Dibuat pada
                    </span>
                    <h1 class="">
                        {{ $transaction->created_at }}
                    </h1>
                </div>

                <hr class="my-3">

                <div class="mb-3">
                    <span class="text-sm font-bold">
                        Nama Pelanggan
                    </span>
                    <h1 class="">
                        {{ $transaction->user->full_name }}
                    </h1>
                </div>
                <div class="mb-3">
                    <span class="text-sm font-bold">
                        No Telpon Pelanggan
                    </span>
                    <h1 class="">
                        {{ $transaction->user->phone_number }}
                    </h1>
                </div>

                <hr class="my-3">

                <div class="mb-3">
                    <span class="text-sm font-bold">
                        Nama Penerima
                    </span>
                    <h1 class="">
                        {{ $transaction->delivery->recipient_name }}
                    </h1>
                </div>
                <div class="mb-3">
                    <span class="text-sm font-bold">
                        No Telpon Penerima
                    </span>
                    <h1 class="">
                        {{ $transaction->delivery->recipient_phone_number }}
                    </h1>
                </div>
                <div class="mb-3">
                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="bg-e2-blue-base hover:bg-e2-blue-800 text-white px-2 py-1 rounded" type="button">
                        Lihat Alamat Penerima
                    </button>
                </div>


            </div>

            <div class="flex-1 border rounded shadow">
                <h1 class="ml-4 mt-4 font-bold text-lg">Status Pesanan</h1>
                <ol class="ml-8 my-8 relative text-gray-500 border-l border-gray-200 dark:border-gray-700">
                    @php
                        function unset_status($array, $del_val)
                        {
                            $res = array_filter($array, function ($e) use ($del_val) {
                                return $e !== $del_val;
                            });
                            return array_values($res);
                        }
                        $status = ['Dibuat', 'Diproses', 'Dikirim', 'Ditolak', 'Selesai'];
                        // $status = array_slice($status, $n_track - 1);
                    @endphp
                    @foreach ($transaction->transaction_track as $track)
                        @if ($track['status_transaction']['status'] == 'Dibuat')
                            @php
                                $status = unset_status($status, 'Dibuat');
                            @endphp
                            <li class="mb-10 ml-6 flex items-center">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-blue-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-bag-check text-blue-700"></i>
                                </span>
                                <div class="ml-2">
                                    <h3 class="mb-0 font-medium leading-tight">{{ $track['status_transaction']['status'] }}
                                    </h3>
                                    <span class="text-xs">{{ $track['handle_at'] }}</span>
                                </div>
                            </li>
                        @elseif ($track['status_transaction']['status'] == 'Diproses')
                            @php
                                $status = unset_status($status, 'Diproses');
                            @endphp
                            <li class="mb-10 ml-6  flex items-center">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-blue-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-box-seam text-blue-700"></i>
                                </span>
                                <div class="ml-2">
                                    <h3 class="mb-0 font-medium leading-tight">{{ $track['status_transaction']['status'] }}
                                    </h3>
                                    <span class="text-xs">{{ $track['handle_at'] }}</span>
                                </div>
                            </li>
                        @elseif ($track['status_transaction']['status'] == 'Dikirim')
                            @php
                                $status = unset_status($status, 'Dikirim');
                            @endphp
                            <li class="mb-10 ml-6  flex items-center">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-blue-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-truck text-blue-700"></i>
                                </span>

                                <div class="ml-2">
                                    <h3 class="mb-0 font-medium leading-tight">{{ $track['status_transaction']['status'] }}
                                    </h3>
                                    <span class="text-xs">{{ $track['handle_at'] }}</span>
                                </div>
                            </li>
                        @elseif ($track['status_transaction']['status'] == 'Ditolak')
                            @php
                                $status = unset_status($status, 'Ditolak');
                            @endphp
                            <li class="mb-10 ml-6  flex items-center">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-red-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-bag-x text-red-700"></i>
                                </span>

                                <div class="ml-2">
                                    <h3 class="mb-0 font-medium leading-tight">{{ $track['status_transaction']['status'] }}
                                    </h3>
                                    <span class="text-xs">{{ $track['handle_at'] }}</span>
                                </div>
                            </li>
                        @elseif ($track['status_transaction']['status'] == 'Selesai')
                            @php
                                $status = unset_status($status, 'Selesai');
                            @endphp
                            <li class="mb-10 ml-6  flex items-center">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-blue-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-geo-fill text-blue-700"></i>
                                </span>

                                <div class="ml-2">
                                    <h3 class="mb-0 font-medium leading-tight">{{ $track['status_transaction']['status'] }}
                                    </h3>
                                    <span class="text-xs">{{ $track['handle_at'] }}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach

                    @if (sizeof($status) == 1)
                        @if ($status[0] == 'Selesai')
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                    <i class="bi bi-geo-fill text-green-700"></i>
                                </span>
                                <h3 class="ml-2 font-medium leading-tight">Selesai</h3>
                            </li>
                        @endif
                    @else
                        @foreach ($status as $s)
                            <li class="mb-10 ml-6 flex items-center">
                                @if ($s == 'Dibuat')
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                        <i class="bi bi-bag-check text-gray-700"></i>
                                    </span>
                                    <h3 class="ml-2 font-medium leading-tight">{{ $s }}</h3>
                                @elseif ($s == 'Diproses')
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                        <i class="bi bi-box-seam text-gray-700"></i>
                                    </span>
                                    <h3 class="ml-2 font-medium leading-tight">{{ $s }}</h3>
                                @elseif ($s == 'Dikirim')
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                        <i class="bi bi-truck text-gray-700"></i>
                                    </span>
                                    <h3 class="ml-2 font-medium leading-tight">{{ $s }}</h3>
                                @elseif ($s == 'Ditolak')
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                        <i class="bi bi-bag-x text-gray-700"></i>
                                    </span>
                                    <h3 class="ml-2 font-medium leading-tight">{{ $s }}</h3>
                                @elseif ($s == 'Selesai')
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white">
                                        <i class="bi bi-geo-fill text-gray-700"></i>
                                    </span>
                                    <h3 class="ml-2 font-medium leading-tight">{{ $s }}</h3>
                                @endif
                            </li>
                        @endforeach
                    @endif

                </ol>

            </div>
        </div>


        <div class="my-6 mx-4 rounded shadow border px-4 py-4">
            <h1 class="mb-6 font-bold text-lg">Detail Pesanan</h1>

            <div class="grid grid-cols-1 lg:grid-cols-2">
                @foreach ($transaction->detail_transaction as $dt)
                    @php
                        $product_dt = $dt['product'];
                        $price = $dt['variant']['price'];
                        $color_product = $dt['variant']['color'];
                        $size_product = $dt['variant']['size'];

                        $thumbnail = 'root/no-image.png';
                        foreach ($product_dt['images'] as $img) {
                            if ($img['thumnbail'] == 1) {
                                $thumbnail = $img['path_image'];
                                break;
                            }
                        }
                    @endphp

                    <div class="w-full flex gap-2 items-center border-t border-b py-2 px-2">
                        <img src="/images/{{ $thumbnail }}" class="w-24 h-24 border" alt="...">
                        <div class="">
                            <h1 class="font-bold">{{ $product_dt['product_name'] }}</h1>
                            <p class="text-xs">Ukuran: {{ $size_product['size'] }} | Warna: {{ $color_product['color'] }}
                            </p>
                            @if ($dt['discount'] > 0)
                                @php
                                    $price_discounted = ($price * $dt['discount']) / 100;
                                    $price_discounted = $price - $price_discounted;
                                    $price_discounted = number_format($price_discounted, 0, '', '.');
                                    $price = number_format($price, 0, '', '.');
                                @endphp
                                <h1 class="text-sm">
                                    Rp. {{ $price_discounted }}
                                    <span class="ms-4 text-sm line-through">Rp. {{ $price }}</span>
                                    <span
                                        class="text-xs bg-e2-green px-1 rounded text-white">-{{ $dt['discount'] }}%</span>
                                    <span class="ms-4 ">({{ $dt['qty'] }}x)</span>
                                </h1>
                            @else
                                <h1 class="text-sm">Rp. {{ $price }} ({{ $dt['qty'] }}x)</h1>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="my-6 mx-4 rounded shadow border px-4 py-4">
            @php
                $total_before_discount = 0;
                $total_after_discount = 0;
                $discount_total = 0;
                // $price = number_format($dt['variant']['price'], 0, '', '.');

                foreach ($transaction->detail_transaction as $dt) {
                    $qty = $dt['qty'];
                    $price = $dt['variant']['price'];
                    $discount = $dt['discount'];

                    $price_discounted = ($price * $discount) / 100;
                    $discount_total += $price_discounted;

                    $price_discounted = $price - $price_discounted;

                    $total_before_discount += $qty * $price;
                    $total_after_discount += $qty * $price_discounted;
                }
            @endphp
            <div class="flex justify-end items-center gap-4">
                <div class="">
                    <h1 class="font-bold mb-2">Total Belanja</h1>
                    <h1 class="font-bold mb-2">Total Diskon</h1>
                    <h1 class="font-bold mb-2">Total Bayar</h1>
                </div>
                <div>
                    <h1 class=" mb-2">Rp. </h1>
                    <h1 class=" mb-2">Rp. </h1>
                    <h1 class=" mb-2">Rp. </h1>
                </div>
                <div class="text-right">
                    <h1 class=" mb-2">{{ number_format($total_before_discount, 0, '', '.') }}</h1>
                    <h1 class=" mb-2">-{{ number_format($price_discounted, 0, '', '.') }}</h1>
                    <h1 class=" mb-2">{{ number_format($total_after_discount, 0, '', '.') }}</h1>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-e2-blue-base">
                        <h3 class="text-xl font-semibold text-white">
                            Detail Alamat
                        </h3>
                        <button type="button"
                            class="text-white bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="mb-3">
                            <span class="text-sm font-bold">
                                Alamat
                            </span>
                            <h1 class="">
                                {{ $transaction->delivery->address->street_name }}
                            </h1>
                        </div>
                        <div class="mb-3 flex flex-col lg:flex-row gap-3">
                            <div class="flex-1">
                                <span class="text-sm font-bold">
                                    Kecamatan
                                </span>
                                <h1 class="">
                                    {{ $transaction->delivery->address->subdistrict }}
                                </h1>
                            </div>
                            <div class="flex-1">
                                <span class="text-sm font-bold">
                                    Kode Pos
                                </span>
                                <h1 class="">
                                    {{ $transaction->delivery->address->zip_code }}
                                </h1>
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col lg:flex-row gap-3">
                            <div class="flex-1">
                                <span class="text-sm font-bold">
                                    Kota
                                </span>
                                <h1 class="">
                                    {{ $transaction->delivery->address->city }}
                                </h1>
                            </div>
                            <div class="flex-1">
                                <span class="text-sm font-bold">
                                    Provinsi
                                </span>
                                <h1 class="">
                                    {{ $transaction->delivery->address->province }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
