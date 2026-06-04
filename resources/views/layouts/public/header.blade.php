<nav x-data="{ mobileMenuOpen: false }" class="cyber-nav fixed top-0 left-0 z-50 w-full bg-black/90 px-6 lg:px-12">
    <div class="mx-auto flex h-full max-w-7xl items-center justify-between relative">

        <div class="absolute inset-x-0 bottom-0 h-4 pointer-events-none opacity-80 select-none z-50">
            <div class="absolute left-0 bottom-0 w-[30%] h-[1px] bg-[var(--dark-cyan)]"></div>
            <div
                class="absolute left-[30%] bottom-0 w-6 h-[1px] bg-[var(--dark-cyan)] origin-left rotate-[30deg]"></div>
            <div class="absolute left-[calc(30%+21px)] bottom-[10px] right-0 h-[1px] bg-[var(--dark-cyan)]"></div>
        </div>

        <div class="flex items-center gap-6 z-10 select-none">
            <span class="text-xl font-bold uppercase tracking-wider text-[var(--light-cyan)]">
                JPG_
            </span>
            <div
                class="hidden sm:flex flex-col text-[10px] font-mono leading-none tracking-widest text-[var(--pink)] animate-pulse uppercase">
                <span>
                    SYSTEM ONLINE
                </span>
                <span class="text-[var(--dark-cyan)] mt-0.5">
                    v3.0.0
                </span>
            </div>
        </div>

        <!-- CENTER: Navigation Links (Hidden on mobile, flex on desktop) -->
        <div class="hidden md:flex items-center h-full text-xs uppercase tracking-[0.2em] z-10">
            <a href="#landing" class="px-4 py-2 text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors">
                {{ __('enums.navbar.home') }}
            </a>
            <span class="text-[var(--dark-cyan)] select-none">
                |
            </span>
            <a href="#about" class="px-4 py-2 text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors">
                {{ __('enums.about_me') }}
            </a>
            <span class="text-[var(--dark-cyan)] select-none">
                |
            </span>
            <a href="#experience" class="px-4 py-2 text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors">
                {{ __('enums.navbar.experience') }}
            </a>
            <span class="text-[var(--dark-cyan)] select-none">
                |
            </span>
            <a href="#projects" class="px-4 py-2 text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors">
                {{ __('enums.navbar.projects') }}
            </a>
        </div>

        <div class="flex items-center h-full font-mono text-xs pr-2 gap-4 z-50">
            <div class="hidden md:flex items-center gap-2 bg-black/50 px-3 py-1">
                <span
                    class="text-[9px] tracking-wider text-[var(--dark-cyan)] opacity-70 uppercase mr-1">
                    LANG_ID //
                </span>
                <a href="?lang=en" class="text-[var(--red)] font-bold tracking-wide transition-colors hover:text-white">
                    EN
                </a>
                <span class="text-[var(--dark-cyan)] opacity-40 select-none">/</span>
                <a href="?lang=ja" class="text-[var(--red)] tracking-wide transition-colors hover:text-[var(--yellow)]">
                    JA
                </a>
                <span class="text-[var(--dark-cyan)] opacity-40 select-none">/</span>
                <a href="?lang=nl" class="text-[var(--red)] tracking-wide transition-colors hover:text-[var(--yellow)]">
                    NL
                </a>
            </div>

            <div
                class="border-l-2 border-r-2 border-[var(--pink)] px-4 py-1 flex items-center gap-1.5 bg-[var(--pink)]/5 select-none">
                <span class="text-[var(--pink)] opacity-60">//</span>
                <span class="text-white tracking-widest font-bold">
                    <span id="clock"></span>
                </span>
            </div>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden flex items-center justify-center p-2 border border-[var(--dark-cyan)] bg-black/50 text-[var(--light-cyan)] transition-transform"
                    aria-label="Toggle Menu">
                <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-5 h-5 text-[var(--pink)]" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-[-20px]" x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-[-20px]"
         class="mobile-menu-overlay fixed inset-0 top-[var(--navbar-height)] w-full bg-black/95 border-b border-[var(--pink)] flex flex-col justify-between px-8 py-12 z-40 md:hidden">

        <div class="flex flex-col gap-6 text-lg uppercase tracking-[0.25em]">
            <a @click="mobileMenuOpen = false" href="#landing"
               class="text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors flex items-center gap-2">
                <span class="text-[var(--pink)] text-xs font-mono">
                    01//
                </span>
                Home
            </a>
            <a @click="mobileMenuOpen = false" href="#about"
               class="text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors flex items-center gap-2">
                <span class="text-[var(--pink)] text-xs font-mono">
                    02//
                </span>
                About
            </a>
            <a @click="mobileMenuOpen = false" href="#experience"
               class="text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors flex items-center gap-2">
                <span class="text-[var(--pink)] text-xs font-mono">
                    03//
                </span>
                Experience
            </a>
            <a @click="mobileMenuOpen = false" href="#projects"
               class="text-[var(--light-cyan)] hover:text-[var(--pink)] transition-colors flex items-center gap-2">
                <span class="text-[var(--pink)] text-xs font-mono">
                    04//
                </span>
                Projects
            </a>
        </div>

        <div class="border-t border-[var(--dark-cyan)]/30 pt-8 mt-auto flex flex-col gap-3">
            <span class="text-[10px] tracking-widest text-[var(--dark-cyan)] uppercase font-mono">
                SELECT_INTERFACE_LANG //
            </span>
            <div class="flex gap-4 font-mono text-sm">
                <a href="?lang=en"
                   class="text-[var(--red)] font-bold tracking-wide">
                    EN_
                </a>
                <a href="?lang=ja"
                   class="text-[var(--light-cyan)] opacity-70 tracking-wide hover:opacity-100 transition-opacity">
                    JA
                </a>
                <a href="?lang=nl"
                   class="text-[var(--light-cyan)] opacity-70 tracking-wide hover:opacity-100 transition-opacity">
                    NL
                </a>
            </div>
        </div>
    </div>
</nav>
<script>
    function startClock() {
        const clock = document.getElementById('clock');
        setInterval(() => {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clock.textContent = `${hours}:${minutes}:${seconds}`;
        }, 1000);
    }
    startClock();
</script>
