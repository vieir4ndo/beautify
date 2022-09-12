 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
         {{ __('Dashboard') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.admininistrator.user.index') }}" :active="request()->routeIs('web.admininistrator.user.index')">
         {{ __('Usuários') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.admininistrator.company.index') }}" :active="request()->routeIs('web.admininistrator.company.index')">
         {{ __('Empresas') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.admininistrator.procedure.index') }}" :active="request()->routeIs('web.admininistrator.procedure.index')">
         {{ __('Procedimentos') }}
     </x-jet-nav-link>
 </div>
 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
     <x-jet-nav-link href="{{ route('web.admininistrator.reserve.index') }}" :active="request()->routeIs('web.admininistrator.reserve.index')">
         {{ __('Reservas') }}
     </x-jet-nav-link>
 </div>