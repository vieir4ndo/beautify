<x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.admininistrator.user.index') }}" :active="request()->routeIs('web.admininistrator.user.index')">
    {{ __('Usuários') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.admininistrator.company.index') }}" :active="request()->routeIs('web.admininistrator.company.index')">
    {{ __('Empresas') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.admininistrator.procedure.index') }}" :active="request()->routeIs('web.admininistrator.procedure.index')">
    {{ __('Procedimentos') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.admininistrator.reserve.index') }}" :active="request()->routeIs('web.admininistrator.reserve.index')">
    {{ __('Reservas') }}
</x-jet-responsive-nav-link>