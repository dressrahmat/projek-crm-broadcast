<div class="card card-side bg-gray-200 shadow-xl">
    <div class="card-body">
        <div class="flex justify-between items-center mx-4 gap-x-9">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Data Label Kontak</h1>
            </div>
            {{-- <div>
                <input type="text" wire:model.debounce.50ms="search" wire:keyup="refreshSearch"
                    class="border border-gray-300 px-3 py-1 mt-2 rounded-md" placeholder="Cari...">
            </div> --}}
        </div>
        <table class="table text-base">
            <!-- head -->
            <thead class="text-lg">
                <tr>
                    <th>No</th>
                    <th>Label Kontak</th>
                    <th>Jumlah Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $label)
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ $label->nama_label }}</td>
                        <td>{{ $label->kontak->where('id_user', auth()->user()->id)->count() }}</td>
                        <td>
                            <!-- Dropdown -->
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="btn btn-xs rounded-md btn-neutral m-1"><i
                                        class="fas fa-eye"></i></div>
                                <ul tabindex="0"
                                    class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-md w-fit">
                                    {{-- <li class="my-1">
                                    <a href="{{ route('profile.edit', $role->id) }}"
                                        class="btn btn-xs rounded-md btn-success">
                                        <i class="far fa-id-card text-base"></i>
                                    </a>
                                </li> --}}
                                    <li class="my-1">
                                        <x-button @click="$dispatch('form-edit', { id: '{{ $label->id }}' })"
                                            wire:key="{{ $label->id }}" type="button">
                                            <i class="fas fa-edit text-base"></i>
                                        </x-button>
                                    </li>
                                    @if ($label->kontak->where('id_user', auth()->user()->id)->count() == 0)
                                        <li class="my-1">
                                            <x-danger-button
                                                @click="$dispatch('confirm-delete', { get_id: '{{ $label->id }}' })">
                                                <i class="fas fa-trash-alt text-base"></i>
                                            </x-danger-button>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="my-5">
            {{ $data->onEachSide(1)->links() }}
        </div>
    </div>
</div>
