 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
         {{ __('Início') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.administrator.user.index') }}" :active="request()->routeIs('web.administrator.user.index')">
         {{ __('Usuários') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.administrator.company.index') }}" :active="request()->routeIs('web.administrator.company.index')">
         {{ __('Empresas') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.administrator.procedure.index') }}" :active="request()->routeIs('web.administrator.procedure.index')">
         {{ __('Procedimentos') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.administrator.reserve.index') }}" :active="request()->routeIs('web.administrator.reserve.index')">
         {{ __('Reservas') }}
     </x-jet-nav-link>
 </div>
