<x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    {{ __('Início') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.administrator.user.index') }}" :active="request()->routeIs('web.administrator.user.index')">
    {{ __('Usuários') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.administrator.company.index') }}" :active="request()->routeIs('web.administrator.company.index')">
    {{ __('Empresas') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.administrator.procedure.index') }}" :active="request()->routeIs('web.administrator.procedure.index')">
    {{ __('Procedimentos') }}
</x-jet-responsive-nav-link>
<x-jet-responsive-nav-link href="{{ route('web.administrator.reserve.index') }}" :active="request()->routeIs('web.administrator.reserve.index')">
    {{ __('Reservas') }}
</x-jet-responsive-nav-link>
