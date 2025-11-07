 <div class="border-2 rounded-lg w-auto h-auto p-6 bg-amber-50">
     <div>
         <h2 class="text-2xl font-semibold text-gray-800 mb-4">Form Tambah Budget</h2>
     </div>
     {{-- form start --}}
     <form class="gap-x-4" wire:submit.prevent="store">
         <div>
             {{-- name  --}}
             <div>
                 <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                 <div class="mt-1">
                     <input type="text" wire:model="name" id="name"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('name')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- total budget --}}
             <div>
                 <label for="email" class="block text-sm font-medium text-gray-900">Jumlah Budget</label>
                 <div class="mt-1">
                     <input type="number" wire:model="total_amount" id="total_amount"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('email')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- start date --}}
             <div>
                 <label for="amount" class="block text-sm font-medium text-gray-900">Dimulai</label>
                 <div class="mt-1">
                     <input type="date" wire:model="start_date" id="start_date"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('password')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- end date --}}
             <div>
                 <label for="amount" class="block text-sm font-medium text-gray-900">Selesai</label>
                 <div class="mt-1">
                     <input type="date" wire:model="end_date" id="end_date"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('password')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- pilih karyawan --}}
             <div>
                 <label for="pilihan_users" class="block text-sm font-medium text-gray-900">Pilih Karyawan</label>
                 <div class="mt-1">
                     <select type="date" wire:model="pilihan_users" id="pilihan_users" multiple
                         {{-- class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"> --}}>
                           
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                    </select>
                     @error('password')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             
             <div>
                 <div class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 mt-4 w-full">
                     <a wire:navigate href="{{route('admin.budget')}}" type="button" command="close" commandfor="dialog"
                         class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Batal</a>
                     <button type="submit"
                         class="mt-3 inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Simpan</button>
                 </div>
             </div>
     </form>
     {{-- form end --}}
 </div>
