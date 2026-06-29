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

    <section
        class="landing-section relative flex min-h-screen items-center overflow-hidden bg-[var(--yellow)] pb-24 pt-16"
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
                    <span
                        class="jamespg-font-boldest flex items-center px-8 py-4 text-md font-bold uppercase tracking-[0.25em] text-black transition-colors duration-300 group-hover:bg-black group-hover:text-white">
                        {{ __('enums.about_me') }}_
                    </span>
                    <span
                        class="flex w-14 items-center text-lg justify-center bg-black text-white transition-all duration-300">
                        🡣
                    </span>
                </a>

                <div class="mt-8 flex select-none">
                    <div class="flex mr-10">
                        <div class="w-0.5 bg-black"></div>

                        <div class="ml-4 flex flex-col gap-1">
                            <span class="uppercase text-black tracking-widest text-sm md:text-base">
                                {{ __('enums.location') }}_
                            </span>
                            <span class="uppercase text-black tracking-widest text-sm md:text-base">
                                UK / GMT
                            </span>
                        </div>
                    </div>

                    <div class="flex mr-10">
                        <div class="w-0.5 bg-black"></div>

                        <div class="ml-4 flex flex-col gap-1">
                            <span class="uppercase text-black tracking-widest text-sm md:text-base">
                                {{ __('enums.age') }}_
                            </span>
                            <span class="uppercase text-black tracking-widest text-sm md:text-base">
                                {{ (new DateTime())->diff(new DateTime("2004-01-01"))->y }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="min-h-screen bg-zinc-950 text-white flex items-center justify-center p-8">
        <div class="max-w-3xl text-center">
            <h2 class="text-4xl font-bold text-[var(--light-cyan)] uppercase tracking-wider mb-4">
                // About Me_
            </h2>
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
