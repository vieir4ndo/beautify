<x-jet-action-section>
    <x-slot name="title">
        {{ __('Ativar/Desativar Conta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Você poderá alterar isso a qualquer momento.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Uma vez desativada sua conta você não poderá realizar novas reservas.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Ativar/Desativar Conta') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Ativar/Desativar Conta') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Você tem certeza que deseja ativar/desativar sua conta?') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Ativar/Desativar Conta') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
