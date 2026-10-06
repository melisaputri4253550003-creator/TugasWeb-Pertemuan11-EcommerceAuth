<nav x-data="{ open: false }" class="border-b border-slate-800 bg-slate-950">

    <div class="mx-auto max-w-7xl px-6">

        <div class="flex h-20 items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-xl font-bold text-white shadow-lg shadow-blue-900/40">
                    S
                </div>

                <div>
                    <div class="text-lg font-bold tracking-wide text-white">
                        SNEAKORA
                    </div>

                    <div class="text-xs text-slate-400">
                        Step Into Your Style
                    </div>
                </div>

            </a>


            {{-- MENU --}}
            <div class="hidden sm:flex">

                <a
                    href="{{ route('dashboard') }}"
                    class="border-b-2 border-blue-500 px-4 py-7 text-sm font-semibold text-blue-400"
                >
                    Dashboard
                </a>

            </div>


            {{-- USER --}}
            <div class="hidden items-center gap-5 sm:flex">

                <div class="text-right">

                    <div class="text-sm font-semibold text-white">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-xs text-blue-400">
                        {{ ucfirst(Auth::user()->role ?? 'user') }}
                    </div>

                </div>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg border border-slate-700 bg-slate-900 px-4 py-2 text-sm font-medium text-slate-300 transition hover:border-blue-500 hover:bg-blue-600 hover:text-white"
                    >
                        Logout
                    </button>

                </form>

            </div>


            {{-- MOBILE --}}
            <button
                @click="open = !open"
                class="rounded-lg border border-slate-700 p-2 text-slate-300 sm:hidden"
            >
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>

        </div>


        {{-- MOBILE MENU --}}
        <div
            x-show="open"
            class="border-t border-slate-800 py-4 sm:hidden"
        >

            <a
                href="{{ route('dashboard') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium text-blue-400 hover:bg-slate-900"
            >
                Dashboard
            </a>

            <div class="mt-3 border-t border-slate-800 pt-3">

                <div class="px-4">

                    <div class="font-medium text-white">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-sm text-blue-400">
                        {{ ucfirst(Auth::user()->role ?? 'user') }}
                    </div>

                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf

                    <button
                        type="submit"
                        class="w-full px-4 py-3 text-left text-sm font-medium text-red-400 hover:bg-slate-900"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>