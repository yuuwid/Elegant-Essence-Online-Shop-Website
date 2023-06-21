<!-- Navbar Start -->
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="bg-blue-900 py-4"></div>
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex ml-2 md:mr-24">
                    <img src="/images/root/logo.png" class="h-8 mr-3" alt="E2 Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">
                        Elegance Essence
                    </span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden w-full max-w-[15rem] my-4 mx-5 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-xs text-gray-600">
                                Selamat Datang
                            </p>
                            <p class="text-base font-bold text-gray-900" role="none">
                                {{ auth()->user()->full_name }}
                            </p>
                            <p class="text-xs font-medium text-gray-900 truncate" role="none">
                                {{ auth()->user()->nip }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="/admin/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a href="/admin/auth/logout"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
