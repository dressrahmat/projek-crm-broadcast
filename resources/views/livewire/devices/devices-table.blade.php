<div class="card card-side bg-gray-200 shadow-xl">
    <div class="card-body">
        <div class="flex justify-between items-center mx-4 gap-x-9">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Data Devices</h1>
            </div>
            <div>
                @livewire('devices.devices-create')
            </div>
            {{-- <div>
                <input type="text" wire:model.debounce.50ms="search" wire:keyup="refreshSearch"
                    class="border border-gray-300 px-3 py-1 mt-2 rounded-md" placeholder="Cari...">
            </div> --}}
        </div>
        <div class="mt-2">
            <table class="table text-base">
                <!-- head -->
                <thead class="text-lg">
                    <tr class="shadow-md mb-4">
                        <th colspan="3">Devices</th>
                        <th colspan="3">Package</th>
                        <th colspan="6" class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['data'] as $id => $device)
                        <tr class="shadow-md mb-4">
                            <td colspan="3">
                                <div>
                                    <p>{{ $device['device'] }}</p>
                                    <p>{{ $device['name'] }}</p>
                                    <p>{{ $device['status'] }}</p>
                                </div>
                            </td>
                            <td colspan="3">
                                <p>{{ $device['package'] }}</p>
                                <p>{{ $device['quota'] }}</p>
                                <p>{{ \Carbon\Carbon::createFromTimestamp($device['expired'])->formatLocalized('%d %b %Y') }}
                                </p>
                            </td>
                            <td colspan="6" class="text-right">
                                @if ($device['status'] == 'disconnect')
                                    <button wire:click="connect('{{ $device['token'] }}', '{{ $device['device'] }}')"
                                        class="btn btn-primary text-white">Connect</button>
                                @else
                                    <button wire:click="disconnect('{{ $device['token'] }}')"
                                        class="btn btn-secondary text-white">Disconnect</button>
                                @endif
                                <button class="btn btn-neutral text-white">Token</button>
                                <button class="btn btn-accent text-white">Edit </button>
                                <button class="btn btn-secondary text-white"
                                    @click="$dispatch('modal-delete-device', { token: '{{ $device['token'] }}' })"
                                    type="button">
                                    Hapus
                                </button>
                            </td>
                            {{-- <td>{{ $device['name'] }}</td>
                            <td>{{ $device['package'] }}</td>
                            <td>{{ $device['quota'] }}</td>
                            <td>{{ $device['status'] }}</td>
                            <td>{{ $device['token'] }}</td> --}}
                            {{-- <td>
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <div tabindex="0" role="button" class="btn btn-xs rounded-md btn-neutral m-1"><i
                                            class="fas fa-eye"></i></div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-md w-fit">
                                        <li class="my-1">
                                            <x-button @click="$dispatch('form-edit', { id: '{{ $permission->id }}' })"
                                                wire:key="{{ $permission->id }}" type="button">
                                                <i class="fas fa-edit text-base"></i>
                                            </x-button>
                                        </li>
    
                                        <li class="my-1">
                                            <x-danger-button
                                                @click="$dispatch('confirm-delete', { get_id: '{{ $permission->id }}' })">
                                                <i class="fas fa-trash-alt text-base"></i>
                                            </x-danger-button>
                                        </li>
                                    </ul>
                                </div>
                            </td> --}}
                        </tr>
                    @empty
                        <tr class="shadow-md mb-4">
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{-- <div class="grid grid-cols-12 mt-3">
            <div class="col-span-3">
                <h3 class="text-xl">Device</h3>
            </div>
            <div class="col-span-3">
                <h3 class="text-xl">Package</h3>
            </div>
            <div class="col-span-6">
                <h3 class="text-xl">Action</h3>

            </div>
        </div> --}}
        {{-- <div class="my-5">
            {{ $data->onEachSide(1)->links() }}
        </div> --}}
    </div>
    <x-sweet-alert />
    <div>
        <x-device-confirm-delete />
    </div>
    @livewire('devices.devices-send-otp')
</div>
