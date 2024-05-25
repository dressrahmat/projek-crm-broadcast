<div>
    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit Device
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.name" value="Name" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" required
                        autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Webhook -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.webhook" value="Webhook URL" />
                    <x-input id="form.webhook" type="text" class="mt-1 w-full" wire:model="form.webhook" required
                        autocomplete="form.webhook" />
                    <x-input-error for="form.webhook" class="mt-1" />
                </div>

                <!-- Webhook Connect -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.webhookconnect" value="Webhook Connect" />
                    <x-input id="form.webhookconnect" type="text" class="mt-1 w-full"
                        wire:model="form.webhookconnect" required autocomplete="form.webhookconnect" />
                    <x-input-error for="form.webhookconnect" class="mt-1" />
                </div>

                <!-- Webhook Status -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.webhookstatus" value="Webhook Status" />
                    <x-input id="form.webhookstatus" type="text" class="mt-1 w-full" wire:model="form.webhookstatus"
                        required autocomplete="form.webhookstatus" />
                    <x-input-error for="form.webhookstatus" class="mt-1" />
                </div>

                <!-- Webhook Chaining -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.webhookchaining" value="Webhook Chaining" />
                    <x-input id="form.webhookchaining" type="text" class="mt-1 w-full"
                        wire:model="form.webhookchaining" required autocomplete="form.webhookchaining" />
                    <x-input-error for="form.webhookchaining" class="mt-1" />
                </div>

                <!-- Auto Read -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.autoread" value="Auto Read" />
                    <x-input id="form.autoread" type="text" class="mt-1 w-full" wire:model="form.autoread" required
                        autocomplete="form.autoread" />
                    <x-input-error for="form.autoread" class="mt-1" />
                </div>

                <!-- Personal -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.personal" value="Personal" />
                    <x-input id="form.personal" type="text" class="mt-1 w-full" wire:model="form.personal" required
                        autocomplete="form.personal" />
                    <x-input-error for="form.personal" class="mt-1" />
                </div>

                <!-- Group -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.group" value="Group" />
                    <x-input id="form.group" type="text" class="mt-1 w-full" wire:model="form.group" required
                        autocomplete="form.group" />
                    <x-input-error for="form.group" class="mt-1" />
                </div>

                <!-- Quick -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.quick" value="Quick" />
                    <x-input id="form.quick" type="text" class="mt-1 w-full" wire:model="form.quick" required
                        autocomplete="form.quick" />
                    <x-input-error for="form.quick" class="mt-1" />
                </div>

                <!-- Resend -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.resend" value="Resend" />
                    <x-input id="form.resend" type="text" class="mt-1 w-full" wire:model="form.resend" required
                        autocomplete="form.resend" />
                    <x-input-error for="form.resend" class="mt-1" />
                </div>

                <!-- Target -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.target" value="Target" />
                    <x-input id="form.target" type="text" class="mt-1 w-full" wire:model="form.target" required
                        autocomplete="form.target" />
                    <x-input-error for="form.target" class="mt-1" />
                </div>

                <!-- Country Code -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.countryCode" value="Country Code" />
                    <x-input id="form.countryCode" type="text" class="mt-1 w-full" wire:model="form.countryCode"
                        required autocomplete="form.countryCode" />
                    <x-input-error for="form.countryCode" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
