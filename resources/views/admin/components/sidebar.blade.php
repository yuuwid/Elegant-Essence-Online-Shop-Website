{{-- NAVBAR --}}
@include('admin.components.navbar')


<aside id="logo-sidebar"
    class="fixed top-10 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto  bg-white">
        <ul class="space-y-1 font-medium">
            <li>
                <a href="/admin/" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <i class="bi bi-view-list"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                    aria-controls="dropdown-transaksi-submenu-sidebar"
                    data-collapse-toggle="dropdown-transaksi-submenu-sidebar">
                    <i class="bi bi-boxes"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>
                        Transaksi
                    </span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <ul id="dropdown-transaksi-submenu-sidebar" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/admin/dashboard/transaksi/baru"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-inboxes"></i>
                            <span class="ml-2">Transaksi Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/transaksi/diproses"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-textarea"></i>
                            <span class="ml-2">Diproses</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/transaksi/dikirim"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-mailbox"></i>
                            <span class="ml-2">Dikirim</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/transaksi/selesai"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-check2-square"></i>
                            <span class="ml-2">Selesai</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/transaksi"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-archive"></i>
                            <span class="ml-2">Daftar Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                    aria-controls="dropdown-produk-submenu-sidebar"
                    data-collapse-toggle="dropdown-produk-submenu-sidebar">
                    <i class="bi bi-boxes"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>
                        Produk
                    </span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <ul id="dropdown-produk-submenu-sidebar" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/admin/dashboard/list-produk"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-box-seam"></i>
                            <span class="ml-2">Daftar Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/list-brand"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-card-checklist"></i>
                            <span class="ml-2">Daftar Brand</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/list-categories"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-card-checklist"></i>
                            <span class="ml-2">Daftar Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/list-colors-sizes"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100">
                            <i class="bi bi-list-columns"></i>
                            <span class="ml-2">Daftar Ukuran & Warna</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
