<footer class="relative w-full bg-black border-t-2 border-[var(--dark-cyan)] font-mono select-none px-6 lg:px-12 pb-8 pt-12">

    <div class="absolute inset-x-0 top-0 h-4 pointer-events-none opacity-85 select-none px-6 lg:px-12">
        <div class="absolute left-6 top-0 w-[50%] h-[1px] bg-[var(--dark-cyan)]"></div>
        <div
            class="absolute left-[calc(50%+24px)] top-0 w-6 h-[1px] bg-[var(--dark-cyan)] origin-left rotate-[-30deg]"></div>
        <div class="absolute left-[calc(50%+45px)] top-[10px] right-6 h-[1px] bg-[var(--dark-cyan)]"></div>
    </div>

    <div class="mx-auto max-w-7xl relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center pb-8 border-b border-[var(--grey-1)]">

            <div class="flex flex-col gap-2">
                <span class="text-lg font-bold tracking-wider text-[var(--light-cyan)]">
                    jpOS
                </span>
                <p class="text-xs text-[var(--dark-cyan)] tracking-wide uppercase leading-relaxed max-w-xs">
                    Constructed via Laravel framework.
                    <br>
                    Cyberware Authorised.
                    <br>
                    Network Secure.
                </p>
            </div>

            <div class="flex flex-col gap-2 md:items-center">
                <div class="flex flex-wrap gap-x-6 gap-y-2 text-s uppercase tracking-widest text-[var(--light-cyan)]">
                    <a href="{{config('social.github')}}" target="_blank"
                       class="hover:text-[var(--pink)] transition-colors">
                        // <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="{{config('social.linkedin')}}" target="_blank"
                       class="hover:text-[var(--pink)] transition-colors">
                        // <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="{{config('social.instagram')}}" target="_blank"
                       class="hover:text-[var(--pink)] transition-colors">
                        // <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#landing" class="hover:text-[var(--pink)] transition-colors">
                        // <i class="fa-solid fa-arrow-up"></i>
                    </a>
                </div>
            </div>

            <div class="flex justify-center md:justify-end items-center w-full md:max-w-72 h-full min-h-[100px]">
                <img src="{{ Vite::asset('resources/images/james.png') }}" alt="James"
                     class="mx-auto md:mr-0 block max-h-16 object-contain">
            </div>
        </div>

        <div
            class="flex flex-col sm:flex-row justify-between items-center pt-6 text-[10px] tracking-widest text-[var(--dark-cyan)] uppercase gap-4">
            <div class="flex items-center gap-2 font-mono">
                <span class="w-1.5 h-1.5 bg-green-900 rounded-full animate-pulse"></span>
                <span>
                    Status: Operational
                </span>
            </div>

            <div>
                © {{ date('Y') }} JAMES PINK-GYETT.
                <br>
                <a href="https://www.cdprojektred.com/" target="_blank">
                    Inspired by Cyberpunk 2077.
                </a>
            </div>
        </div>

    </div>
</footer>
