<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('web.administrator.company.create') }}">
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
                                <label class="block font-medium text-sm text-gray-700" for="fantasy_name">
                                    Nome Fantasia
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="fantasy_name" type="text" name="fantasy_name" required="required" autofocus="autofocus"
                                    autocomplete="fantasy_name">
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
                                <label class="block font-medium text-sm text-gray-700" for="description">
                                    Descrição
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="description" type="text" name="description" required="required"
                                    autofocus="autofocus" autocomplete="description"
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="federal_registration">
                                    Inscrição Federal
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="federal_registration" type="text" name="federal_registration" required="required"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="logo_path">
                                    Logo Path
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="logo_path" type="text" name="logo_path" required="required"
                                    autofocus="autofocus" autocomplete="logo_path"
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_post_code">
                                    CEP
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="address_post_code" type="text" name="address_post_code" required="required"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_street">
                                    Rua
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="address_street" type="text" name="address_street" required="required"
                                    autofocus="autofocus" autocomplete="address_street"
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_complement">
                                    Complemento
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="address_complement" type="text" name="address_complement" required="required"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_neighborhood">
                                    Bairro
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="address_neighborhood" type="text" name="address_neighborhood" required="required"
                                    autofocus="autofocus" autocomplete="address_neighborhood"
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_city">
                                    Cidade
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="address_city" type="text" name="address_city" required="required"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="address_state">
                                    Estado
                                </label>
                                <select id="address_state"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="address_state" required autofocus
                                        autocomplete="address_state">
                                    <option value="" disabled selected>Selecione
                                    </option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="EX">Estrangeiro</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="facebook">
                                    Facebook
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="facebook" type="text" name="facebook"
                                >
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="instagram">
                                    Instagram
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="instagram" type="text" name="instagram"
                                >
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="whatsapp">
                                    Whatsapp
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                    id="whatsapp" type="text" name="whatsapp"
                                >
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
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
                                <label class="block font-medium text-sm text-gray-700" for="phone_number">
                                    Administrador
                                </label>
                                <select id="administrator_id"
                                        class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                                        name="administrator_id" required autofocus
                                        autocomplete="administrator_id">
                                    <option value="" disabled selected>Selecione
                                    </option>
                                    @foreach($companyAdministrators as $administrator)
                                        <option value="{{$administrator->id}}"> {{ $administrator->name }}</option>
                                    @endforeach
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
