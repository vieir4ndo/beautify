<form method="POST"
      @if ($user_id != null)
          action="{{ route('web.administrator.user.update', $user_id) }}"
      @else
          action="{{ route('web.administrator.user.create') }}"
    @endif
>
    @csrf

    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="name" value="{{ __('Nome') }}"/>
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                         wire:model="name"
                         required autofocus/>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="name" value="{{ __('Tipo') }}"/>
            <select id="type"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    name="type" required autofocus
                    autocomplete="type">
                <option value="" disabled>Selecione
                </option>
                <option value="{{\App\Enums\UserType::Administrator->value}}"
                        @if($type == \App\Enums\UserType::Administrator->value) selected @endif
                >Administrador
                </option>
                <option value="{{\App\Enums\UserType::CompanyAdministrator->value}}"
                        @if($type == \App\Enums\UserType::CompanyAdministrator->value) selected @endif
                >Administrador de Empresa
                </option>
                <option value="{{\App\Enums\UserType::Client->value}}"
                        @if($type == \App\Enums\UserType::Client->value) selected @endif
                >Cliente
                </option>
                <option value="{{\App\Enums\UserType::Employee->value}}"
                        @if($type == \App\Enums\UserType::Employee->value) selected @endif
                >Funcionário
                </option>
            </select>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="phone_number" value="{{ __('Telefone') }}"/>
            <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                         :value="old('phone_number')"
                         wire:model="phone_number"
                         required autofocus/>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="email" value="{{ __('E-mail') }}"/>
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                         wire:model="email"
                         required autofocus/>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="birth_date" value="{{ __('Data de Nascimento') }}"/>
            <x-jet-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                         :value="old('birth_date')"
                         wire:model="birth_date"
                         autofocus/>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="company_id" value="{{ __('Empresa') }}"/>
            <select id="company_id"
                    class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                    name="company_id" autofocus
                    autocomplete="company_id">
                <option value="" selected>Selecione
                </option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}"
                            @if($company_id == $company->id) selected @endif
                    > {{ $company->fantasy_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="active" value="{{ __('Ativo') }}"/>
            <select id="active"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    name="active" required autofocus
                    autocomplete="active">
                <option value="">Selecione
                </option>
                <option value="false"
                        @if($active == false) selected @endif
                >Não
                </option>
                <option value="true"
                        @if($active == true) selected @endif
                >Sim
                </option>
            </select>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="photo" value="{{ __('Imagem') }}"/>
            <input
                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="photo" name="photo" type="file" accept="image/*" wire:model="photo">
            <input type="hidden" id="profile_photo_url" name="profile_photo_url"
                   @if ($photo)
                       value="{{ $photo->temporaryUrl() }}"
                @endif
            >
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <img id="image-output" class="w-20 h-20 rounded-full object-cover"
                 @if ($photo)
                     src="{{ $photo->temporaryUrl() }}"
                 @elseif ($profile_photo_url)
                     src="{{ $profile_photo_url }}"
                 @else
                     src="{{url('/assets/images/img-user-default.png')}}"
                @endif
            />
        </div>
    </div>
    <div class="flex justify-end -mx-3 p-3">
        <x-jet-button class="ml-4">
            {{ __('Enviar') }}
        </x-jet-button>
    </div>
</form>
