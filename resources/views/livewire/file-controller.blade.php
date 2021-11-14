<div>
    {{-- tambah --}}
    <div class="absolute bottom-10 right-14">
        <div class="bg-green-500 rounded-full p-2 inline-block z-20 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
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
