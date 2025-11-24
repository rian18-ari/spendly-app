 <div class="border-2 rounded-lg w-auto h-auto p-6 bg-amber-50">
     <div>
         <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail Karyawan</h2>
     </div>
     {{-- form start --}}
     <form class="gap-x-4" wire:submit.prevent="update">
         <div>
             {{-- name  --}}
             <div>
                 <label for="note" class="block text-sm font-medium text-gray-900">Name</label>
                 <div class="mt-1">
                     <input type="text" wire:model="note" id="note"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('note')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- nominal --}}
             <div>
                 <label for="amount" class="block text-sm font-medium text-gray-900">Nominal</label>
                 <div class="mt-1">
                     <input type="text" wire:model="amount" id="amount"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('amount')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             {{-- tanggal --}}
             <div>
                 <label for="date" class="block text-sm font-medium text-gray-900">Tanggal</label>
                 <div class="mt-1">
                     <input type="text" wire:model="date" id="date"
                         class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                     @error('date')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
             <div>
                <div>
                 <label for="type" class="block text-sm font-medium text-gray-900">Tipe</label>
                 <div class="mt-1">
                     <input type="text" wire:model="type" id="type" required class="block w-full rounded-md border-gray-300">
                     @error('type')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
                <div>
                 <label for="status" class="block text-sm font-medium text-gray-900">Status</label>
                 <div class="mt-1">
                     <select wire:model="status" id="status" required class="block w-full rounded-md border-gray-300">
                     @error('status')
                         <span class="text-sm text-red-500">
                             {{ $message }}
                         </span>
                     @enderror
                     <option value="">--Pilih--</option>
                     <option value="pending">Pending</option>
                     <option value="approved">Approved</option>
                     <option value="rejected">Rejected</option>
                 </select>
                 </div>
             </div>
             </div>
             {{-- tippe --}}
             
             <div>
                 <div class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 mt-4 w-full">
                     <a wire:navigate href="{{route('admin.karyawan')}}" command="close" commandfor="dialog"
                         class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Batal</a>
                     <button type="submit"
                         class="mt-3 inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Simpan</button>
                 </div>
             </div>
     </form>
     {{-- form end --}}
 </div>
