<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>


            <div class="flex space-x-8 ms-10">
                <x-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.index')">
                    {{ __('Reservas') }}
                </x-nav-link>

                <x-nav-link :href="route('emprestimos.index')" :active="request()->routeIs('emprestimos.index')">
                    {{ __('Empréstimos') }}
                </x-nav-link>

                <x-nav-link :href="route('livros.index')" :active="request()->routeIs('livros.index')">
                    {{ __('Livros') }}
                </x-nav-link>

                @if(auth()->user()->hasRole('admin'))
                    <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                        {{ __('Categorias') }}
                    </x-nav-link>

                    <x-nav-link :href="route('autores.index')" :active="request()->routeIs('autores.index')">
                        {{ __('Autores') }}
                    </x-nav-link>

                    <x-nav-link :href="route('editoras.index')" :active="request()->routeIs('editoras.index')">
                        {{ __('Editoras') }}
                    </x-nav-link>

                    <x-nav-link :href="route('exemplares.index')" :active="request()->routeIs('exemplares.index')">
                        {{ __('Exemplares') }}
                    </x-nav-link>

                    <x-nav-link :href="route('multas.index')" :active="request()->routeIs('multas.index')">
                        {{ __('Multas') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('multas.usuarias')" :active="request()->routeIs('multas.usuarias')">
                        {{ __('Minhas Multas') }}
                    </x-nav-link>
                @endif
            </div>

            <div class="flex items-center ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
