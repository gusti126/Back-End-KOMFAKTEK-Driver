<div>

    {{-- create folder --}}
    @if ($isCreateFolder)
        <div class="absolute bottom-24 right-14">
            <div class="bg-gray-700 rounded-lg  inline-block p-4">
                <div class="mb-2">Folder Baru</div>
                <input type="text" class="text-white rounded-lg bg-gray-700 border border-white" wire:model="folderBaru"
                    placeholder="Nama Folder ...">
                <div class="flex justify-end mt-2 text-sm font-semibold">
                    <div class="mr-6" wire:click="cancleCreateFolder">Batal</div>
                    <div class="text-green-500">Buat</div>
                </div>
            </div>
        </div>
    @endif
    {{-- endcreate folder --}}

    {{-- tambah --}}
    <div class="absolute bottom-10 right-14">
        <div class="flex">
            {{-- button create file & folder --}}
            @if ($confirmAdd)
                <div class="rounded-full my-auto p-2 inline-block z-20 cursor-pointer bg-purple-500 mr-6"
                    wire:click="createFolder">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <div class="text-xs my-auto ml-1">Folder</div>
                    </div>
                </div>
                <div class="rounded-full my-auto p-2 inline-block z-20 cursor-pointer bg-purple-500 mr-6">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div class="text-xs my-auto ml-1">File</div>
                    </div>
                </div>
            @endif
            {{-- endbutton create file & folder --}}

            <div class="my-auto rounded-full p-2 inline-block z-20 cursor-pointer {{ $confirmAdd ? 'bg-purple-500 shadow-lg' : 'bg-green-500 ' }}"
                wire:click="hendleConfirmAdd({{ $fileId }})">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 {{ $confirmAdd ? 'rotate-45 ' : '' }}"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
            </div>

        </div>
    </div>
    {{-- endtambah --}}

    <div class="text-gray-300 text-xs mb-4">
        {{ $label }}
    </div>
    <div class="grid grid-flow-row grid-cols-12 gap-4">
        {{-- folders --}}
        @forelse ($folders as $item)
            <div class="col-span-3 bg-gray-800 p-2 rounded-lg cursor-pointer hover:border hover:border-green-500"
                wire:click="detail({{ $item->id }})">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 my-auto " viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                    </svg>
                    <div class="text-xs my-auto ml-2">{{ $item->title }}</div>
                </div>
            </div>
        @empty

        @endforelse

    </div>
</div>
