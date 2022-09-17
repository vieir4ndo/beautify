<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Novo Usuário
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
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Nome
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="name" type="text" name="name" required="required" autofocus="autofocus"
                                    autocomplete="name">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="type">
                                    Tipo
                                </label>
                                <select id="type"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="type" required autofocus
                                        autocomplete="type">
                                    <option value="" disabled selected>Selecione
                                    </option>
                                    <option value="{{\App\Enums\UserType::Administrator->value}}"
                                    >Administrador
                                    </option>
                                    <option value="{{\App\Enums\UserType::CompanyAdministrator->value}}"
                                    >Administrador de Empresa
                                    </option>
                                    <option value="{{\App\Enums\UserType::Client->value}}"
                                    >Cliente
                                    </option>
                                    <option value="{{\App\Enums\UserType::Employee->value}}"
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
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="phone_number">
                                    E-mail
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="email" type="email" name="email" required="required"
                                >
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="birth_date">
                                    Data de Nascimento
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="birth_date" type="date" name="birth_date">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="phone_number">
                                    Empresa
                                </label>
                                <select id="company_id"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="company_id" autofocus
                                        autocomplete="company_id">
                                    <option value="" selected>Selecione
                                    </option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}"> {{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="active">
                                    Ativo
                                </label>
                                <select id="active"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                        name="active" required autofocus
                                        autocomplete="active">
                                    <option value="" disabled selected>Selecione
                                    </option>
                                    <option value="false"
                                    >Não
                                    </option>
                                    <option value="true"
                                    >Sim
                                    </option>
                                </select>
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
