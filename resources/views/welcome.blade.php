<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Spendly | Budget Tracker</title>
</head>

<body>
    {{-- haeder start --}}
    <header class="bg-orange-200 shadow m-4 rounded-lg">
        {{-- navbar start --}}
        <nav aria-label="Global" class="p-4 bg-orange-200 flex justify-between items-center rounded-lg border-2">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img src="{{ asset('/asset/img/spendly-high-resolution-logo-transparent.png') }}"
                        alt="" class="h-8 w-auto" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" command="show-modal" commandfor="mobile-menu"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-cyan-900">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <el-popover-group class="hidden lg:flex lg:gap-x-12">
                <div class="relative">
                    <button popovertarget="desktop-menu-product"
                        class="flex items-center gap-x-1 text-sm/6 font-semibold text-cyan-900">
                        Product
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                            class="size-5 flex-none text-gray-500">
                            <path
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>

                    <el-popover id="desktop-menu-product" anchor="bottom" popover
                        class="w-screen max-w-md overflow-hidden rounded-3xl bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                        <div class="p-4">
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 text-cyan-900 group-hover:text-cyan-900">
                                        <path d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-cyan-900">
                                        Analytics
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-cyan-900">Get a better understanding of your traffic</p>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 text-cyan-900 group-hover:text-cyan-900">
                                        <path
                                            d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-cyan-900">
                                        Engagement
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-cyan-900">Speak directly to your customers</p>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 text-cyan-900 group-hover:text-cyan-900">
                                        <path
                                            d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-cyan-900">
                                        Security
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-cyan-900">Your customers’ data will be safe and secure</p>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 text-cyan-900 group-hover:text-cyan-900">
                                        <path
                                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-cyan-900">
                                        Integrations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-cyan-900">Connect with third-party tools</p>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true"
                                        class="size-6 text-cyan-900 group-hover:text-cyan-900">
                                        <path
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="#" class="block font-semibold text-cyan-900">
                                        Automations
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-cyan-900">Build strategic funnels that will convert</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x divide-white/10 bg-gray-700/50">
                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-cyan-900 hover:bg-gray-700/50">
                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="size-5 flex-none text-gray-500">
                                    <path
                                        d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                                        clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                                Watch demo
                            </a>
                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-cyan-900 hover:bg-gray-700/50">
                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="size-5 flex-none text-gray-500">
                                    <path
                                        d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                                        clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                                Contact sales
                            </a>
                        </div>
                    </el-popover>
                </div>

                <a href="#" class="text-sm/6 font-semibold text-cyan-900">Features</a>
                <a href="#" class="text-sm/6 font-semibold text-cyan-900">Marketplace</a>
                <a href="#" class="text-sm/6 font-semibold text-cyan-900">Company</a>
            </el-popover-group>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{route('login')}}" class="text-sm/6 font-semibold text-cyan-900">Log in <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        {{-- navbar end --}}

        {{-- android menu start --}}
        <el-dialog>
            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                <div tabindex="0" class="fixed inset-0 focus:outline-none flex items-center justify-center">
                    <el-dialog-panel
                        class="fixed h-[70%] w-100 overflow-y-auto bg-orange-200 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10 rounded-lg shadow-lg transition transition-discrete [--dialog-gap:--spacing(3)] open:block data-closed:opacity-0 data-closed:scale-95 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in border-2">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>
                                <p class="text-cyan-900 border-2 bg-orange-200 rounded-lg w-15 text-center font-bold">
                                    menu</p>
                            </a>
                            <button type="button" command="close" commandfor="mobile-menu"
                                class="-m-2.5 rounded-md p-2.5 text-cyan-900">
                                <span class="sr-only">Close menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        {{-- menu start --}}
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-white/10">
                                <div class="space-y-2 py-6">
                                    <div class="-mx-3">
                                        <button type="button" command="--toggle" commandfor="products"
                                            class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-cyan-900 hover:bg-white/5">
                                            Product
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                                                aria-hidden="true"
                                                class="size-5 flex-none in-aria-expanded:rotate-180">
                                                <path
                                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <el-disclosure id="products" hidden class="mt-2 block space-y-2">
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Analytics</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Engagement</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Security</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Integrations</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Automations</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Watch
                                                demo</a>
                                            <a href="#"
                                                class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-cyan-900 hover:bg-white/5">Contact
                                                sales</a>
                                        </el-disclosure>
                                    </div>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-cyan-900 hover:bg-white/5">Features</a>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-cyan-900 hover:bg-white/5">Marketplace</a>
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-cyan-900 hover:bg-white/5">Company</a>
                                </div>
                                <div class="py-6">
                                    <a href="{{route('login')}}"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-cyan-900 hover:bg-white/5">Log
                                        in</a>
                                </div>
                            </div>
                        </div>
                        {{-- menu end --}}
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
        {{-- android menu end --}}
    </header>
    {{-- end navbar --}}


    {{-- start hero section --}}
    <section class="m-4 p-4 bg-gray-50 shadow rounded-lg vh-100 flex items-start justify-start">
        <div class="flex flex-col lg:flex-row w-full items-center">
            <div class="flex flex-col justify-start items-start mt-10 lg:mt-50 mb-4 lg:mb-40 py-4 w-full lg:w-1/2">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4 items-start text-cyan-900">Track Keuangan
                    dengan mudah & cermat !</h2>
                <p class="mb-4 items-start text-cyan-700">permudah track anggaran dengan pelacakan real time !</p>
                <a href="/dashboard">
                    <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Click Me</button>
                </a>
            </div>
            <div
                class="max-w-md mx-auto lg:max-w-xl xl:max-w-2xl flex justify-center items-center align-items-center mt-6 lg:mt-0 lg:ml-20 p-4 w-full lg:w-1/2">
                {{-- gambar nanti disini --}}
                <svg class="w-full h-auto max-w-sm sm:max-w-md lg:max-w-full text-cyan-900" fill="none"
                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    {{-- contoh icon dari heroicons --}}
                    {{-- <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path> --}}
                    {{-- atau pake icon dari iconpack --}}
                    <x-icon.iconpack></x-icon.iconpack>
                </svg>
            </div>
        </div>
    </section>
    {{-- end hero section --}}

    {{-- start about section --}}
    <section class="m-4 p-4 bg-gray-50 shadow rounded-lg vh-100 ">
        <h1 class="text-center text-5xl md:text-7xl mb-10 md:mb-15 mt-10 text-cyan-900">Tentang</h1>
        {{-- start card --}}
        <div
            class="flex flex-col lg:flex-row justify-evenly items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
            {{-- start card 01 --}}
            <div class="card w-full sm:w-96 bg-white shadow-lg rounded-lg p-6 text-center border-2 bg-amber-50">
                <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Teruji dan Terpercaya</h2>
                <p class="mb-4 text-center text-cyan-900">Kami telah membantu ... bisnis mencapai .... Kami didukung
                    oleh ....</p>
                <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Pelajari Lebih
                    Lanjut</button>
            </div>
            {{-- start card 02 --}}
            <div class="card w-full sm:w-96 bg-white shadow-lg rounded-lg p-6 text-center border-2 bg-amber-50">
                <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Solusi Yang Memukau</h2>
                <p class="mb-4 text-center text-cyan-900">Membantu Pelacakan uang perusahaaan dengan "real time".</p>
                <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Pelajari Lebih
                    Lanjut</button>
            </div>
            {{-- start card 03 --}}
            <div class="card w-full sm:w-96 bg-white shadow-lg rounded-lg p-6 text-center border-2 bg-amber-50">
                <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Dukungan Sepenuh Hati</h2>
                <p class="mb-4 text-center text-cyan-900">Tim Customer Service 24/7 yang siap membantu anda</p>
                <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Pelajari Lebih
                    Lanjut</button>
            </div>
        </div>
        {{-- end card --}}
    </section>
    {{-- end about section --}}

    {{-- start fitur section --}}
    <section class="m-4 p-4 bg-gray-50 shadow rounded-lg vh-100 ">
        <h1 class="text-center text-5xl md:text-7xl mb-10 md:mb-15 mt-10 text-cyan-900">Fitur</h1>
        {{-- start card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- start card 01 (Pelacakan Anggaran) --}}
            <div
                class="card w-full lg:w-full h-auto lg:h-96 bg-white shadow-lg rounded-lg p-6 text-center col-span-1 md:col-span-2 lg:col-span-2 flex flex-col justify-end items-center border-2">
                <div class="w-full">
                    {{-- gambar nanti disini --}}

                </div>
                <div class="py-1 w-full">
                    <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Pelacakan Anggaran</h2>
                    <p class="mb-4 text-center text-cyan-900">Buat anggaran, lacak pengeluaran, dan capai tujuan
                        keuangan Anda dengan mudah.</p>
                    <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Pelajari Lebih
                        Lanjut</button>
                </div>
            </div>
            {{-- start card 02 (Laporan Keuangan) --}}
            <div
                class="card w-full lg:w-full h-auto lg:h-96 bg-white shadow-lg rounded-lg p-6 text-center row-span-2 md:col-span-2 lg:col-span-1 flex flex-col justify-end items-center border-2">
                <div class="w-full">
                    {{-- gambar nanti disini --}}

                </div>
                <div class="py-1 w-full">
                    <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Laporan Keuangan</h2>
                    <p class="mb-4 text-center text-cyan-900">Dapatkan wawasan mendalam tentang kebiasaan belanja Anda
                        dengan laporan yang mudah dipahami.</p>
                    <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Pelajari Lebih
                        Lanjut</button>
                </div>
            </div>
            {{-- start card 03 (Sinkronisasi Akun) --}}
            <div
                class="card w-full h-auto lg:h-96 bg-white shadow-lg rounded-lg p-6 col-span-1 lg:col-span-4 flex flex-col lg:flex-row items-center border-2">
                <div class="flex flex-col justify-center text-center py-4 w-full lg:w-[40%]">
                    <h2 class="text-2xl font-bold mb-4 text-center text-cyan-900">Sinkronisasi Akun</h2>
                    <p class="mb-4 text-center text-cyan-900">Hubungkan akun bank dan kartu kredit Anda untuk pelacakan
                        otomatis dan real-time.</p>
                    <div class="text-center">
                        <button class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600 w-auto">Pelajari
                            Lebih Lanjut</button>
                    </div>
                </div>
                <div class="w-full lg:w-[60%] flex justify-center items-center mt-4 lg:mt-0"> {{-- gambar nanti disini --}}

                </div>
            </div>
        </div>
        {{-- end card --}}
    </section>
    {{-- end fitur section --}}


    {{-- start contact section --}}
    <section class="m-4 p-4 bg-gray-50 shadow rounded-lg vh-100 flex flex-col justify-center items-center">
        <h1 class="text-center text-5xl md:text-7xl mb-10 mt-10 text-cyan-900">Contact</h1>
        <div
            class="m-4 p-4 w-full max-w-2xl flex flex-col md:flex-row justify-start items-start shadow-lg rounded-lg border">
            {{-- start form --}}
            <form action="" class="w-full md:w-1/2 p-6 rounded-lg ">
                <div class="mb-4">
                    <label for="name" class="block text-cyan-900 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-cyan-900 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-cyan-900 font-bold mb-2">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-cyan-900 text-gray-50 rounded hover:bg-blue-600">Send
                    Message</button>
            </form>
            <div class="w-full md:w-1/2 flex justify-center items-center p-6"> {{-- gambar/info kontak nanti disini --}}

            </div>
        </div>
    </section>
    {{-- end contact section --}}


    {{-- start footer --}}
    <footer class="bg-white rounded-lg">
        <div class="bg-gray-50 text-center p-4 rounded-lg m-4 shadow text-cyan-900">
            <p>&copy; 2025 Finance Tracker. All rights reserved.</p>
            <p>made with love by rian fikri hafiz</p>
        </div>
    </footer>
    {{-- end footer --}}


    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>

</html>
