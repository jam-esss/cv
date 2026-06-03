@extends('layouts.public.app')

@section('title', 'James Pink-Gyett_')

@push('styles')
@endpush

@section('content')
    <section class="relative min-h-screen overflow-hidden bg-black" id="landing">

        <!-- Content -->
        <div class="relative z-10 flex min-h-screen items-center px-8 lg:px-24">
            <div>
                <h1 class="jamespg-font-boldest leading-none uppercase text-[var(--light-cyan)] text-[clamp(4rem,12vw,12rem)]">
                    James
                    <br>
                    Pink-Gyett
                </h1>

                <h2 class="jamespg-font-boldest mt-4 text-xl md:text-3xl uppercase tracking-[0.3em] text-[var(--dark-cyan)]">
                    Junior Web Developer_
                </h2>

                <div
                    class="mt-8 h-1 w-60 bg-gradient-to-r from-[var(--light-cyan)] via-[var(--pink)] to-[var(--dark-cyan)]"></div>

                <a href="#about" class="group mt-8 inline-flex items-stretch overflow-hidden border border-[var(--dark-cyan)] transition-all duration-300">
                    <span
                        class="jamespg-font-boldest flex items-center px-8 py-4 text-md font-bold uppercase tracking-[0.25em] text-[var(--dark-cyan)] transition-colors duration-300 group-hover:bg-[var(--pink)] group-hover:text-white">
                        About Me_
                    </span>

                    <span
                        class="flex w-14 items-center text-lg justify-center bg-[var(--dark-cyan)] text-black transition-all duration-300">
                        🡣
                    </span>
                </a>

                <div class="mt-8 flex">
                    <div class="flex mr-10">
                        <div class="w-0.5 bg-[var(--dark-cyan)]"></div>

                        <div class="ml-4 flex flex-col gap-1">
                        <span
                            class="uppercase text-[var(--dark-cyan)] tracking-widest text-sm md:text-base">
                            Location
                        </span>
                            <span
                                class="uppercase text-[var(--dark-cyan)] tracking-widest text-sm md:text-base">
                            UK / GMT
                        </span>
                        </div>
                    </div>

                    <div class="flex mr-10">
                        <div class="w-0.5 bg-[var(--dark-cyan)]"></div>

                        <div class="ml-4 flex flex-col gap-1">
                        <span
                            class="uppercase text-[var(--dark-cyan)] tracking-widest text-sm md:text-base">
                            Age
                        </span>
                            <span
                                class="uppercase text-[var(--dark-cyan)] tracking-widest text-sm md:text-base">
                            <?= (new DateTime())->diff(new DateTime("2004-01-01"))->y; ?>
                        </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
