@extends('layouts.public.app')

@section('title', 'James Pink-Gyett_')

@push('styles')
    <style>
        .color-sweep {
            background: linear-gradient(
                120deg,
                transparent 0%,
                var(--light-cyan) 30%,
                var(--red) 50%,
                var(--pink) 70%,
                transparent 100%
            );

            width: 200%;
            height: 100%;
            filter: blur(40px);
            mix-blend-mode: multiply;
            animation: colorSweep 6s linear infinite;
        }

        @keyframes colorSweep {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
    </style>
@endpush

@section('content')

    <!-- Landing -->
    <section class="landing-section relative flex min-h-screen items-center overflow-hidden bg-[var(--yellow)] pb-24 pt-16"
             id="landing">
        <div class="absolute inset-0 pointer-events-none color-sweep opacity-10"></div>
        <div class="absolute inset-0 pointer-events-none opacity-5 rotate-1"
             style="background-image: url('{{ asset('images/bitmap.svg') }}');background-repeat: repeat;background-size: 50px 50px;"></div>

        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 flex items-end">
            <div id="runner-container" class="w-full h-24 bg-black relative">
                <div id="runner-trail-pink"
                     class="absolute opacity-95 right-0 bottom-full h-3 bg-[var(--pink)] mb-12 md:mb-24 blur-sm w-0">
                </div>

                <div id="runner-trail-cyan"
                     class="absolute opacity-95 right-0 bottom-full h-2 bg-[var(--light-cyan)] mb-12 md:mb-24 blur-sm w-0">
                </div>

                <div id="cyber-runner"
                     class="absolute left-full bottom-full w-24 h-36 md:w-40 md:h-60 opacity-95 flex items-end">
                    <img src="{{ asset('images/runner.png') }}" alt="Runner" class="w-full select-none h-auto">
                </div>
            </div>
        </div>

        <div class="relative z-10 flex items-center px-8 lg:px-24 w-full">
            <div>
                <h1 class="jamespg-font-boldest leading-none uppercase text-black text-[clamp(4rem,12vw,12rem)]">
                    {{ __('enums.fn') }}
                    <br>
                    Pink-Gyett
                </h1>

                <h2 class="jamespg-font-boldest mt-4 text-xl md:text-3xl uppercase tracking-[0.3em] text-black">
                    //
                    {{ $mostRecentJob->title }}
                    {{ __('enums.at') }}
                    <span class="md:text-3xl">{{ $mostRecentJob->establishment }}</span><span class="blink">_</span>
                </h2>

                <div class="mt-8 h-1 w-60 bg-black"></div>

                <a href="#about"
                   class="group mt-8 inline-flex items-stretch overflow-hidden border border-black transition-all duration-300 select-none">
                    <span class="jamespg-font-boldest flex items-center px-8 py-4 text-md font-bold uppercase tracking-[0.25em] text-black transition-colors duration-300 group-hover:bg-black group-hover:text-white">
                        {{ __('enums.about_me') }}_
                    </span>
                    <span class="flex w-14 items-center text-lg justify-center bg-black text-white transition-all duration-300">
                        🡣
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="relative min-h-screen bg-black px-4 sm:px-8 lg:px-24 py-20 border-b border-[var(--grey-1)]"
             id="about">
        <div class="max-h-[600px] w-full mx-auto rounded-lg border border-[var(--grey-1)] bg-[#1e1e1e] font-mono shadow-2xl overflow-hidden flex flex-col">

            <div class="flex items-center justify-between h-8 bg-[var(--ide-bg-1)] text-white text-xs select-none border-b border-gray-600 font-sans shrink-0">
                <div class="flex items-center space-x-2 px-3">
                    <i class="fa-regular fa-file-code text-gray-400 text-sm"></i>
                    <span class="text-gray-300 font-normal">
                        cv
                    </span>
                </div>

                <div class="flex h-full items-stretch">
                    <button class="px-4 hover:bg-gray-500 text-gray-300 flex items-center justify-center">
                        <i class="fa-solid fa-minus text-[10px]"></i>
                    </button>
                    <button class="px-4 hover:bg-gray-500 text-gray-300 flex items-center justify-center">
                        <i class="fa-regular fa-square text-[10px]"></i>
                    </button>
                    <button class="px-4 hover:bg-red-700 text-gray-300 flex items-center justify-center">
                        <i class="fa-solid fa-xmark text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div class="flex flex-1 min-h-0">
                <div class="flex-1 flex flex-col min-w-0">

                    <div class="flex bg-[var(--ide-bg-1)] border-b border-[var(--grey-1)] text-sm shrink-0 select-none">
                        <div class="bg-[var(--ide-bg-2)] text-white px-4 py-2 border-b-[2px] border-[var(--ide-accent-1)] flex items-center space-x-2">
                            <i class="text-[var(--light-cyan)] fa-brands fa-php"></i>
                            <span>
                                index.blade.php
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 bg-[var(--ide-bg-3)] text-sm md:text-base leading-snug overflow-auto min-w-0 font-mono [counter-reset:line]">
                        <div class="text-gray-300 min-w-max">

                            <div class="flex items-start before:[counter-increment:line] before:content-[counter(line)] before:w-10 before:text-right before:pr-4 before:text-gray-600 before:select-none before:shrink-0">
                                <span class="text-gray-400">
                                    {
                                </span>
                            </div>

                            <div class="flex items-start before:[counter-increment:line] before:content-[counter(line)] before:w-10 before:text-right before:pr-4 before:text-gray-600 before:select-none before:shrink-0">
                                <span class="pl-4 text-[var(--ide-text-1)]">
                                    "name"
                                </span>
                                <span class="text-gray-400">
                                    :
                                </span>
                                <span class="text-[var(--ide-text-2)]">
                                    "{{ __('enums.fn') }} Pink-Gyett"
                                </span>
                                <span class="text-gray-400">
                                    ,
                                </span>
                            </div>

                            <div class="flex items-start before:[counter-increment:line] before:content-[counter(line)] before:w-10 before:text-right before:pr-4 before:text-gray-600 before:select-none before:shrink-0">
                                <span class="pl-4 text-[var(--ide-text-1)]">
                                    "currentRole"
                                </span>
                                <span class="text-gray-400">
                                    :
                                </span>
                                <span class="text-[var(--ide-text-2)]">
                                    "{{ $mostRecentJob->title }} @ {{ $mostRecentJob->establishment }}"
                                </span>
                            </div>

                            <?php /* foreach section will go here */ ?>

                            <div class="flex items-start before:[counter-increment:line] before:content-[counter(line)] before:w-10 before:text-right before:pr-4 before:text-gray-600 before:select-none before:shrink-0">
                                <span class="text-gray-400">
                                    }
                                </span>
                                <span class="animate-pulse text-[var(--pink)] font-bold">
                                    |
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="hidden md:block w-56 bg-[var(--ide-bg-1)] border-l border-gray-600 p-4 text-sm text-gray-400 select-none overflow-y-auto shrink-0">
                    <div class="font-bold text-xs uppercase tracking-wider text-gray-500 mb-3 py-1">
                        C:\Users\James\cv
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>app
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>bootstrap
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>config
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>database
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>lang
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>node_modules
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>public
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-4 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>resources
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-6 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>views
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-8 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>public
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-10 pr-4 py-1 bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-brands fa-php mr-1 text-[var(--light-cyan)]"></i>index.blade.php
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>routes
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>storage
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>tests
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-regular fa-folder mr-1 text-[var(--pink)]"></i>vendor
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-classic fa-gear mr-1 text-[var(--red)]"></i>.editorconfig
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-align-left mr-1 text-[var(--red)]"></i>.env
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-align-left mr-1 text-[var(--red)]"></i>.env.example
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-align-left mr-1 text-[var(--red)]"></i>.gitattributes
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-ban mr-1 text-[var(--red)]"></i>.gitignore
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-align-left mr-1 text-[var(--red)]"></i>.npmrc
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-brands fa-php mr-1 text-[var(--light-cyan)]"></i>artisan
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-code mr-1 text-[var(--yellow)]"></i>composer.json
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-code mr-1 text-[var(--yellow)]"></i>composer.lock
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-align-left mr-1 text-[var(--red)]"></i>LICENSE
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-code mr-1 text-[var(--yellow)]"></i>package.json
                    </div>
                    <div class="flex items-center space-x-2 text-white pl-2 pr-4 py-1 hover:bg-[var(--ide-accent-1)] rounded cursor-pointer">
                        <i class="fa-solid fa-code mr-1 text-[var(--yellow)]"></i>package-lock.json
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            gsap.registerPlugin(ScrollTrigger);

            const runner = document.querySelector("#cyber-runner");
            const pinkTrail = document.querySelector("#runner-trail-pink");
            const cyanTrail = document.querySelector("#runner-trail-cyan");

            const runnerTimeline = gsap.timeline({
                scrollTrigger: {
                    trigger: "#landing",
                    start: "top top",
                    end: "bottom top",
                    scrub: 0.5,
                    pin: true,
                    anticipatePin: 1,
                    invalidateOnRefresh: true
                }
            });

            runnerTimeline.to(runner, {
                x: () => -(window.innerWidth + runner.offsetWidth),
                ease: "none",
                onUpdate() {
                    const rect = runner.getBoundingClientRect();
                    const containerWidth = window.innerWidth;
                    const centerX = rect.left + (rect.width / 2);
                    const trailWidth = containerWidth - centerX;
                    const finalWidth = Math.max(0, trailWidth);

                    gsap.set(pinkTrail, {width: finalWidth});
                    gsap.set(cyanTrail, {width: finalWidth, y: 2});
                }
            }, 0);
        });

        document.addEventListener("click", (e) => {
            const link = e.target.closest('a[href^="#"]');
            if (!link) return;

            const href = link.getAttribute("href");
            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();

            if (href === "#landing") {
                const st = ScrollTrigger.getById("landingTrigger");
                gsap.to(window, {
                    duration: 1,
                    scrollTo: st ? st.start : 0,
                    ease: "power2.inOut"
                });
                return;
            }

            gsap.to(window, {
                duration: 1,
                scrollTo: target,
                ease: "power2.inOut"
            });
        });
    </script>
@endpush
