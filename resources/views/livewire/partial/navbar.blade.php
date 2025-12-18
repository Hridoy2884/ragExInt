<nav
    x-data="{ open: false }"
    class="fixed w-full z-50 bg-white/10 backdrop-blur-lg border-b border-gray-300/20 shadow-lg"
    style="border-image: linear-gradient(90deg, #ffffff30 0%, #ffffff10 50%, #ffffff30 100%) 1;"
>
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <span class="text-xl font-bold text-white drop-shadow-md tracking-wider">
                    Reg<span class="text-indigo-400">Ex</span>Int
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="/" class="text-white font-medium hover:text-indigo-400 transition drop-shadow-sm tracking-wide">Home</a>
                <a href="/about" class="text-white font-medium hover:text-indigo-400 transition drop-shadow-sm tracking-wide">About Us</a>
                <a href="/products" class="text-white font-medium hover:text-indigo-400 transition drop-shadow-sm tracking-wide">Our Products</a>
                <a href="/blog" class="text-white font-medium hover:text-indigo-400 transition drop-shadow-sm tracking-wide">Blog</a>
            </div>

            <!-- Mobile Button -->
            <button
                @click="open = !open"
                class="md:hidden p-2 rounded-lg text-white hover:bg-white/20 transition"
                aria-label="Open menu"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        x-cloak
        class="md:hidden bg-white/10 backdrop-blur-lg border-t border-gray-300/20"
        style="border-image: linear-gradient(90deg, #ffffff30 0%, #ffffff10 50%, #ffffff30 100%) 1;"
    >
        <div class="px-4 py-4 space-y-3">
            <a href="/" class="block py-2 text-white font-medium hover:text-indigo-400 transition tracking-wide">Home</a>
            <a href="/about" class="block py-2 text-white font-medium hover:text-indigo-400 transition tracking-wide">About Us</a>
            <a href="/products" class="block py-2 text-white font-medium hover:text-indigo-400 transition tracking-wide">Our Products</a>
            <a href="/blog" class="block py-2 text-white font-medium hover:text-indigo-400 transition tracking-wide">Blog</a>
        </div>
    </div>
</nav>
