<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('web.administrator.user.create') }}">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                    <x-jet-label for="name" value="{{ __('Nome') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="type" value="{{ __('Tipo') }}" />
                                <select id="type" class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full" name="type" :value="old('type')" required autofocus autocomplete="type">
                                    <option value="" disabled selected>Selecione o tipo do Usuário</option>
                                    <option value="{{\App\Enums\UserType::Administrator->value}}">Administrador</option>
                                    <option value="{{\App\Enums\UserType::CompanyAdministrator->value}}">Administrador de Empresa</option>
                                    <option value="{{\App\Enums\UserType::Client->value}}">Cliente</option>
                                    <option value="{{\App\Enums\UserType::Employee->value}}">Funcionário</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="phone_number" value="{{ __('Telefone') }}" />
                                <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="birth_date" value="{{ __('Data de Nascimento') }}" />
                                <x-jet-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="company_id" value="{{ __('Empresa') }}" />
                                <x-jet-input id="company_id" class="block mt-1 w-full" type="number" name="company_id" :value="old('company_id')" />
                            </div>
                        </div>

                        <div class="flex justify-end -mx-3 p-3">
                            <x-jet-button class="ml-4">
                                {{ __('Enviar') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
