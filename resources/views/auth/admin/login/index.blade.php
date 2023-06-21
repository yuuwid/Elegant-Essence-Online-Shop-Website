@extends('master')

@section('title', $title)

@section('content')

    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="/images/root/logo.png" alt="logo">
                Elegant Essence
            </div>

            @if ($message = Session::get('error'))
                <div class="w-full sm:max-w-md">
                    @include('auth.admin.login.components.alert')
                </div>
            @endif
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                        ADMIN LOGIN
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="/admin/auth/login">
                        @csrf
                        <div>
                            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">
                                NIP
                            </label>
                            <input type="text" name="nip" id="nip"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Masukan NIP" required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-e2-blue-900 hover:bg-e2-blue-700 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- @include('template.components.extra') --}}

@endsection