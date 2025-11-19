<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50 w-auto mb-6">
            <h3 class="text-xl font-medium text-gray-500 pb-2">Jumlah Karyawan</h3>
            <h1 class="text-3xl font-medium">{{ $totalkaryawan }}</h1>
        </div>
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50 w-auto mb-6">
            <h3 class="text-xl font-medium text-gray-500 pb-2">Karyawan Aktif</h3>
            <h1 class="text-3xl font-medium">{{ $jeniskaryawan }}</h1>
        </div>
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50 w-auto mb-6">
            <h3 class="text-xl font-medium text-gray-500 pb-2">Admin Aktif</h3>
            <h1 class="text-3xl font-medium">{{ $totaladmin }}</h1>
        </div>
    </div>

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border-2 shadow-lg border-gray-200 bg-white dark:border-gray-800">
            <div class="px-6 py-5 flex flex-row">
                <h3 class="font-bold text-2xl text-gray-800">Data Karyawan</h3><!---->
                <div class="justify-end flex flex-1">
                    <div class="text-base text-gray-50 flex flex-row items-center justify-between">
                        <a href=""
                            class="px-2 py-3 border-2 rounded-lg bg-indigo-500 w-auto h-9 items-center flex align-middle mr-2"><i
                                class="fa-solid fa-file-pdf mr-2"></i> PDF</a>
                        <button wire:click.prevent="export" type="button"
                            class="px-2 py-3 border-2 rounded-lg bg-indigo-500 w-auto h-9 items-center flex align-middle mr-2"><i
                                class="fa-solid fa-file-excel mr-2"></i> EXCEL</button>
                        <div wire:loading class="text-gray-500">
                            Sedang mengekspor... Tunggu sebentar!
                        </div>
                        <a wire:navigate href="{{ route('admin.tambahkaryawan') }}"
                            class="px-2 py-3 border-2 rounded-lg bg-indigo-500 w-auto h-9 items-center flex align-middle mr-2">
                            <i class="fa-solid fa-plus"></i>Tambah</a>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6 bg-orange-200 rounded-2xl">
                <div class="space-y-5">
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-50 dark:border-gray-800">
                        <div class="max-w-full overflow-x-auto custom-scrollbar">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th class="px-5 py-3 text-left w-3/11 sm:px-6">
                                            <p class="font-medium text-gray-900 text-theme-xs">No.
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left w-3/11 sm:px-6">
                                            <p class="font-medium text-gray-900 text-theme-xs">
                                                Nama Karyawan
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left w-2/11 sm:px-6">
                                            <p class="font-medium text-gray-900 text-theme-xs">
                                                Jabatan</p>
                                        </th>
                                        <th class="px-5 py-3 text-left w-2/11 sm:px-6">
                                            <p class="font-medium text-gray-900 text-theme-xs">
                                                Email
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left w-2/11 sm:px-6">
                                            <p class="font-medium text-gray-900 text-theme-xs">
                                                Tanggal</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y bg-gray-50">
                                    @foreach ($karyawans as $item)
                                        <tr class="border-t border-gray-100 dark:border-gray-800 hover:bg-gray-200">

                                            <td class="px-5 py-4 sm:px-6">
                                                <p class="text-gray-900 text-theme-sm">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <h1>{{ $item->name }}</h1>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6"><span
                                                    class="rounded-full px-2 py-0.5 text-theme-xs font-medium bg-success-50 text-success-700 dark:bg-success-500/15 dark:text-success-500">{{ $item->role }}</span>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <p class="text-gray-900 text-theme-sm">
                                                    {{ $item->email }}</p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6 flex flex-row gap-2">
                                                <button command="show-modal" commandfor="dialog"
                                                    class="rounded-lg bg-red-500 w-auto h-auto p-2 text-white border-2 border-red-600">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <button wire:navigate
                                                    href="{{ route('admin.editkaryawan', ['id' => $item->id]) }}"
                                                    class="rounded-lg bg-yellow-500 w-auto h-auto p-2 text-white border-2 border-yellow-600">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- modal dialog --}}
                        <el-dialog>
                            <dialog id="dialog" aria-labelledby="dialog-title"
                                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                <el-dialog-backdrop
                                    class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                <div tabindex="0"
                                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                    <el-dialog-panel
                                        class="relative transform overflow-hidden border-2 rounded-lg bg-orange-200 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                        <div class="bg-orange-200 border-b px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div
                                                    class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-500/10 sm:mx-0 sm:size-10">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" data-slot="icon" aria-hidden="true"
                                                        class="size-6 text-red-400">
                                                        <path
                                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 id="dialog-title" class="text-base font-semibold text-black">
                                                        Hapus Data Karyawan</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Yakin mau hapus data karyawan
                                                            ini?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <button wire:click="deleteKaryawan({{ $item->id }})" command="close"
                                                commandfor="dialog"
                                                class="inline-flex w-full justify-center rounded-lg border-2 border-red-600 bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Ya</button>
                                            <button type="button" command="close" commandfor="dialog"
                                                class="mt-3 inline-flex w-full justify-center rounded-lg border-2 border-gray-600 bg-gray-500 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Batal</button>
                                        </div>
                                    </el-dialog-panel>
                                </div>
                            </dialog>
                        </el-dialog>
                        {{-- modal dialog end --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
