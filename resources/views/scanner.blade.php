<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fabolous Ticket</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                <div class="py-12">
                    <div class="lg:w-1/3 m-auto">
                        <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                            @if ($ticket != 'undefined')
                                <div class="max-w-7xl mx-auto">
                                    @if ($isScanned == 'scanned')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-exclamation-mark mx-auto mb-4 max-h-48 bg-yellow-400 rounded-full" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 19v.01" />
                                            <path d="M12 15v-10" />
                                        </svg>
                                        <div class="flex bg-yellow-200 rounded-lg text-sm" role="alert">
                                            <div class="max-w-3xl mx-auto p-4">
                                                <p class="text-3xl font-bold tracking-wider text-gray-600 m-2">Este boleto ya se encuentra dentro del evento</p>
                                            </div>
                                        </div>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4BB543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="#4BB543" />
                                        </svg>
                                        <div class="flex bg-green-200 rounded-lg text-sm" role="alert">
                                            <div class="max-w-3xl mx-auto p-4">
                                                <p class="text-3xl font-bold tracking-wider text-gray-600 m-2">Escaneado con éxito</p>
                                            </div>
                                        </div>
                                    @endif
                                    <p class="text-xl font-bold tracking-wider text-gray-600 m-2">Este boleto es una preventa o cortesía</p>
                                </div>
                            @endif
                            @if ($sale != 'undefined')
                                <div class="max-w-7xl mx-auto">
                                    <div>
                                        @if ($isScanned == 'scanned')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-exclamation-mark mx-auto mb-4 max-h-48 bg-yellow-400 rounded-full" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 19v.01" />
                                                <path d="M12 15v-10" />
                                            </svg>
                                            <div class="flex bg-yellow-200 rounded-lg text-sm" role="alert">
                                                <div class="max-w-3xl mx-auto p-4">
                                                    <p class="text-3xl font-bold tracking-wider text-gray-600 m-2">Este boleto ya se encuentra dentro del evento</p>
                                                </div>
                                            </div>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4BB543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="#4BB543" />
                                            </svg>
                                            <div class="flex bg-green-200 rounded-lg text-sm" role="alert">
                                                <div class="max-w-3xl mx-auto p-4">
                                                    <p class="text-3xl font-bold tracking-wider text-gray-600 m-2">Escaneado con éxito</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="scale-100 my-6">
                                            <div class="text-center">
                                                <b>Folio: {{ $sale->id }}</b>

                                                    @if ($sale->adult)
                                                        <p class="mt-4 text-gray-700 leading-relaxed">
                                                            {{ $sale->adult }} x Adultos
                                                        </p>
                                                    @endif
                        
                                                    @if ($sale->kid)
                                                        <p class="mt-1 text-gray-700 leading-relaxed">
                                                            {{ $sale->kid }} x Niños
                                                        </p>
                                                    @endif
                        
                                                    @if ($sale->senior)
                                                        <p class="mt-1 text-gray-700 leading-relaxed">
                                                            {{ $sale->senior }} x Adultos Mayores
                                                        </p>
                                                    @endif
                        
                                                    @if ($sale->disabled)
                                                        <p class="mt-1 text-gray-700 leading-relaxed">
                                                            {{ $sale->disabled }} x Capacidades Diferentes
                                                        </p>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            @if ($sale->birthday)
                                                <p class="my-6 text-gray-500 text-center text-2xl font-bold leading-relaxed">
                                                    Cumpleañero
                                                </p>
                                            @endif
                                    </div>
                        
                                </div>
                            @else
                            @endif
                            @if ($ticket == 'undefined' && $sale == 'undefined')
                                <div class="flex bg-red-500 rounded-lg p-4 mb-4 text-sm" role="alert">
                                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                                        <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-gray-100 mt-4">Este boleto no existe en nuestros registros.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="bg-white shadow-2xl rounded-3xl text-center pb-6">
                            <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">Escanee su boleto</h2>
                            <div class="mx-8 mt-10 mb-4">
                                <form action="ret" method="POST">
                                    @csrf
                                    <div class="grid gap-3 grid-cols-2">
                                        <p for="id" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">QR</p>
                                        <input name="id" type="text" id="id" class="appearance-none uppercase rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required autofocus>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <input type="submit" class="bg-teal-500 w-72 lg:w-5/6 m-auto mt-6 p-2 hover:bg-teal-600 rounded-2xl cursor-pointer text-white text-center shadow-xl shadow-bg-blue-700" value="Ingresar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
