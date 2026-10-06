<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">

        <div class="bg-slate-950">

            <div class="mx-auto max-w-7xl px-6 py-5">

                <h2 class="text-2xl font-bold text-white">
                    Dashboard SNEAKORA
                </h2>

                <p class="mt-1 text-sm text-slate-400">
                    Step Into Your Style
                </p>

            </div>

        </div>

    </x-slot>


    {{-- CONTENT --}}
    <div class="min-h-screen bg-slate-950 py-8">

        <div class="mx-auto max-w-7xl space-y-6 px-6">


            {{-- WELCOME --}}
            <div class="rounded-2xl border border-blue-900/60 bg-gradient-to-r from-slate-900 via-slate-900 to-blue-950 p-7 shadow-xl shadow-black/30">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-2xl font-bold text-white">
                            Selamat datang, {{ Auth::user()->name }}! 👋
                        </h3>

                        <p class="mt-2 text-slate-400">
                            Kelola produk dan pesanan SNEAKORA dengan mudah.
                        </p>

                    </div>

                    <div class="hidden rounded-2xl border border-blue-800 bg-blue-950/50 px-5 py-4 text-center sm:block">

                        <p class="text-xs uppercase tracking-wider text-blue-400">
                            Role
                        </p>

                        <p class="mt-1 font-bold text-white">
                            {{ ucfirst(Auth::user()->role ?? 'user') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- STATISTICS --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                {{-- PRODUCTS --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl shadow-black/20">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-400">
                                Total Produk
                            </p>

                            <p class="mt-3 text-4xl font-bold text-blue-400">
                                {{ $productCount }}
                            </p>

                        </div>

                        <div class="rounded-xl bg-blue-950 p-3 text-2xl">
                            👟
                        </div>

                    </div>

                </div>


                {{-- CATEGORY --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl shadow-black/20">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-400">
                                Kategori
                            </p>

                            <p class="mt-3 text-4xl font-bold text-blue-400">
                                {{ $categoryCount }}
                            </p>

                        </div>

                        <div class="rounded-xl bg-blue-950 p-3 text-2xl">
                            📂
                        </div>

                    </div>

                </div>


                {{-- ORDERS --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl shadow-black/20">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-400">
                                Total Pesanan
                            </p>

                            <p class="mt-3 text-4xl font-bold text-blue-400">
                                {{ $orderCount }}
                            </p>

                        </div>

                        <div class="rounded-xl bg-blue-950 p-3 text-2xl">
                            📦
                        </div>

                    </div>

                </div>

            </div>


            {{-- SEARCH --}}
            <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-xl shadow-black/20">

                <div class="mb-4">

                    <h3 class="text-lg font-bold text-white">
                        Cari Produk
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Cari berdasarkan nama, brand, atau warna.
                    </p>

                </div>


                <form
                    method="GET"
                    action="{{ route('dashboard') }}"
                    class="flex flex-col gap-3 md:flex-row"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari produk..."
                        class="flex-1 rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-600 outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    >

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-7 py-3 font-semibold text-white shadow-lg shadow-blue-900/30 transition hover:bg-blue-500"
                    >
                        🔍 Cari Produk
                    </button>

                    @if($search)

                        <a
                            href="{{ route('dashboard') }}"
                            class="rounded-xl border border-slate-700 px-6 py-3 text-center font-semibold text-slate-300 hover:bg-slate-800"
                        >
                            Reset
                        </a>

                    @endif

                </form>

            </div>


            {{-- PRODUCT TABLE --}}
            <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-xl shadow-black/20">

                <div class="border-b border-slate-800 px-6 py-5">

                    <h3 class="text-lg font-bold text-white">
                        {{ $search ? 'Hasil Pencarian' : 'Produk Terbaru' }}
                    </h3>

                    @if($search)

                        <p class="mt-1 text-sm text-slate-500">
                            Hasil untuk:
                            <span class="font-semibold text-blue-400">
                                "{{ $search }}"
                            </span>
                        </p>

                    @endif

                </div>


                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-slate-950">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Produk
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Brand
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Kategori
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Harga
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Stok
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-800">

                            @forelse($products as $product)

                                <tr class="transition hover:bg-slate-800/70">

                                    <td class="px-6 py-5 font-semibold text-white">
                                        {{ $product->name }}
                                    </td>

                                    <td class="px-6 py-5 text-slate-400">
                                        {{ $product->brand }}
                                    </td>

                                    <td class="px-6 py-5 text-slate-400">
                                        {{ $product->category->name ?? '-' }}
                                    </td>

                                    <td class="px-6 py-5 font-semibold text-blue-400">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-5">

                                        <span class="rounded-full bg-blue-950 px-3 py-1 text-xs font-semibold text-blue-400">
                                            {{ $product->stock }}
                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-12 text-center text-slate-500"
                                    >
                                        Produk tidak ditemukan.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>