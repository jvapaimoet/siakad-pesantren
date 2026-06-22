<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}">

                        <h1 class="text-2xl font-bold text-green-600">
                            SIPES1
                        </h1>

                    </a>

                </div>

                <!-- Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        <i class="fa-solid fa-house me-1"></i>
                        Dashboard

                    </x-nav-link>

                    <x-nav-link href="/santri">

                        <i class="fa-solid fa-users me-1"></i>
                        Santri

                    </x-nav-link>

                    <x-nav-link href="/ustadz">

                        <i class="fa-solid fa-user-tie me-1"></i>
                        Ustadz

                    </x-nav-link>

                    <x-nav-link href="/jadwal">

                        <i class="fa-solid fa-calendar-days me-1"></i>
                        Jadwal

                    </x-nav-link>

                    <x-nav-link href="/laporan">

                        <i class="fa-solid fa-file-lines me-1"></i>
                        Laporan

                    </x-nav-link>

                    <x-nav-link href="/keuangan">

                        <i class="fa-solid fa-money-bill-wave me-1"></i>
                        Keuangan

                    </x-nav-link>

                </div>

            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            <div>
                                <i class="fa-solid fa-user me-1"></i>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-2">

                                <svg class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />

                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center gap-2">

                                <i class="fa-solid fa-right-from-bracket text-red-500"></i>

                                Logout

                            </button>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>

    </div>

</nav>
