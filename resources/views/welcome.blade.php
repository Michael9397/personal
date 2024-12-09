<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Michael's Personal Mess</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        </div>
                        <livewire:welcome.navigation />
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 mb-5">

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                                <div class="flex size-16 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    M
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Michael's Personal spot</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        This is just a small family website. Not a lot to say!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a
                            href='/wine'
                        >
                            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

                                <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                                    <div class="flex size-16 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                            <path d="M333.85-140v-60H450v-172.46q-86-13.62-139.15-77.5-53.16-63.89-53.16-150.04v-220h444.62v220q0 86.15-53.16 150.04Q596-386.08 510-372.46V-200h116.15v60h-292.3ZM480-430q59.46 0 103.77-40.15 44.31-40.16 54.85-99.85H321.38q10.54 59.69 54.85 99.85Q420.54-430 480-430ZM317.69-630h324.62v-130H317.69v130ZM480-430Z"/>
                                        </svg>
                                    </div>

                                    <div class="pt-3 sm:pt-5">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">Wine App</h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            Tracking the wines we like and don't like.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
