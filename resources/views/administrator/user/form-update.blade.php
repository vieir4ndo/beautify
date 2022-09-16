<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('web.administrator.user.update') }}">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Nome
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="name" type="text" name="name" required="required" autofocus="autofocus"
                                    autocomplete="name" value="{{ $user->name }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="type">
                                    Tipo
                                </label>
                                <select id="type"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="type" required autofocus
                                        autocomplete="type">
                                    <option value="" disabled>Selecione
                                    </option>
                                    <option value="{{\App\Enums\UserType::Administrator->value}}"
                                            @if($user->type == \App\Enums\UserType::Administrator->value) selected @endif
                                    >Administrador
                                    </option>
                                    <option value="{{\App\Enums\UserType::CompanyAdministrator->value}}"
                                            @if($user->type == \App\Enums\UserType::CompanyAdministrator->value) selected @endif
                                    >Administrador de Empresa
                                    </option>
                                    <option value="{{\App\Enums\UserType::Client->value}}"
                                            @if($user->type == \App\Enums\UserType::Client->value) selected @endif
                                    >Cliente
                                    </option>
                                    <option value="{{\App\Enums\UserType::Employee->value}}"
                                            @if($user->type == \App\Enums\UserType::Employee->value) selected @endif
                                    >Funcionário
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="phone_number">
                                    Telefone
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="phone_number" type="text" name="phone_number" required="required"
                                    autofocus="autofocus" autocomplete="phone_number"
                                    value="{{$user->phone_number}}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <x-jet-label for="email" value="{{ __('E-mail') }}"/>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="email" type="email" name="email" required="required"
                                    value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="birth_date">
                                    Data de Nascimento
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="birth_date" type="date" name="birth_date" value="{{$user->birth_date}}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="birth_date">
                                    Empresa
                                </label>
                                <x-jet-input id="company_id" class="block mt-1 w-full" type="number" name="company_id"
                                             :value="old('company_id')"/>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="active">
                                    Ativo
                                </label>
                                <select id="active"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="active" required autofocus
                                        autocomplete="active">
                                    <option value="" disabled>Selecione
                                    </option>
                                    <option value="false"
                                            @if($user->active == false) selected @endif
                                    >Não
                                    </option>
                                    <option value="true"
                                            @if($user->active == true) selected @endif
                                    >Sim
                                    </option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="id" id="id" value="{{$user->id}}">

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
