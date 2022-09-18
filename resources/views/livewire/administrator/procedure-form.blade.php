<form method="POST" action="{{ route('web.administrator.procedure.create') }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="title" value="{{ __('Título') }}"/>
            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                         wire:model="title"
                         required autofocus/>
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="description" value="{{ __('Descrição') }}"/>
            <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                         :value="old('description')" wire:model="description"
                         required autofocus/>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="duration" value="{{ __('Duração') }}"/>
            <x-jet-input id="duration" class="block mt-1 w-full" type="time" name="duration" :value="old('duration')"
                         wire:model="duration"
                         required autofocus/>
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="price" value="{{ __('Preço') }}"/>
            <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" wire:model="price"
                         :value="old('price')"
                         required autofocus/>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="company_id" value="{{ __('Empresa') }}"/>
            <select id="company_id"
                    class="border border-gray-300 text-gray-900 rounded-md block mt-1 w-full"
                    name="company_id" autofocus
                    autocomplete="company_id" wire:model="company_id">
                <option value="" selected>Selecione
                </option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}"> {{ $company->fantasy_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="active" value="{{ __('Ativo') }}"/>
            <select id="active"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    name="active" required autofocus
                    autocomplete="active" wire:model="active">
                <option value="" disabled selected>Selecione
                </option>
                <option value="false">Não
                </option>
                <option value="true">Sim
                </option>
            </select>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-5">
            <x-jet-label for="image_path" value="{{ __('Imagem') }}"/>
            <x-jet-input id="image_path" class="block mt-1 w-full" type="text" name="image_path" :value="old('image_path')"
                         wire:model="image_path"
                         required autofocus/>
        </div>
    </div>
    <div class="flex justify-end -mx-3 p-3">
        <x-jet-button class="ml-4">
            {{ __('Enviar') }}
        </x-jet-button>
    </div>
</form>
