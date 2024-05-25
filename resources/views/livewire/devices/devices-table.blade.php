<div class="card card-side bg-gray-200 shadow-xl">
    <div class="card-body">
        <div class="flex justify-between items-center mx-4 gap-x-9">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-700 shadow-md w-fit">
                <h1 class="text-xl text-slate-50 font-bold">Data Devices</h1>
            </div>
            <div>
                @livewire('devices.devices-create')
            </div>
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
                                <div class="inline" x-data="{
                                    token: '{{ $device['token'] }}',
                                    copyToClipboard() {
                                        navigator.clipboard.writeText(this.token)
                                            .then(() => {
                                                this.$dispatch('sweet-alert', { title: 'Token telah disalin ke clipboard!' });
                                            })
                                            .catch(err => {
                                                console.error('Error copying text: ', err);
                                            });
                                    }
                                }">
                                    <button class="btn btn-neutral text-white" @click="copyToClipboard()">Token</button>
                                </div>
                                <button class="btn btn-accent text-white">Edit </button>
                                <button class="btn btn-secondary text-white"
                                    @click="$dispatch('modal-delete-device', { token: '{{ $device['token'] }}' })"
                                    type="button">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="shadow-md mb-4">
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <x-sweet-alert />
    <div>
        <x-device-confirm-delete />
    </div>
    @livewire('devices.devices-send-otp')
</div>
