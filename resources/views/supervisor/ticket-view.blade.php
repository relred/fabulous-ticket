<x-app-layout>
    <div class="mt-12 w-1/2 mx-auto">
        <div class="mt-16">
            @if ($sale->state == 'scanned')
                <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700 w-1/3 mx-auto" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">Este boleto ya a sido utilizado para entrar al evento.</span>
                    </div>
                </div>
            @else
                <div class="flex bg-green-200 rounded-lg p-4 mb-4 text-sm text-green-700 w-1/3 mx-auto" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">Este boleto NO ha sido utilizado para entrar al evento.</span>
                    </div>
                </div>
            @endif
            <div class="scale-100 flex my-6">
                <div class="mx-auto">
                    <p class="text-center">
                        Cantidad de venta
                    </p>
                    <p class="my-6 text-center text-2xl font-bold">
                        $ {{ $sale->amount }}
                    </p>
                    <b>Folio: {{ $sale->id }}</b>
                        @if ($sale->card_voucher)
                        <p>
                            <b class="text-sm">Voucher: {{ strtoupper($sale->card_voucher) }}</b>
                        </p>
                        @endif
                    <p>Cajero: {{ $sale->user_fullname }}</p>
                    <p>Número de Caja: {{ $sale->stall }}</p>

                        @if ($sale->adult)
                            <p class="mt-4 font-bold text-lg leading-relaxed">
                                {{ $sale->adult }} x Adultos
                            </p>
                        @endif

                        @if ($sale->kid)
                            <p class="mt-1 font-bold text-lg leading-relaxed">
                                {{ $sale->kid }} x Niños
                            </p>
                        @endif

                        @if ($sale->senior)
                            <p class="mt-1 font-bold text-lg leading-relaxed">
                                {{ $sale->senior }} x Adultos Mayores
                            </p>
                        @endif

                        @if ($sale->disabled)
                            <p class="mt-1 font-bold text-lg leading-relaxed">
                                {{ $sale->disabled }} x Capacidades Diferentes
                            </p>
                        @endif
                        
                        @if (!$sale->adult && !$sale->kid && !$sale->senior && !$sale->disabled)
                            <p class="text-cenetr">Boleto VIP</p>
                        @endif
                        
                    </div>
                </div>
                @if (!$sale->adult && !$sale->kid && !$sale->senior && !$sale->disabled && !$sale->birthday)
                    <p class="my-6 text-gray-500 text-center text-2xl font-bold leading-relaxed">
                        {{ $sale->dollar_change }} Entradas VIP
                    </p>
                @endif
                @if ($sale->birthday)
                    <p class="my-6 text-gray-500 text-center text-2xl font-bold leading-relaxed">
                        Cumpleañero
                    </p>
                @endif
                <p class="mb-2 text-center">
                    Fecha y hora: <br> {{ $sale->created_at }}
                </p>
                <p class="text-center">
                    {{ $sale->created_at->diffForHumans() }}
                </p>
                <div class="mx-auto w-1/3 mt-12">
                    @if (!$sale->cancelled_by)
                        <a href="{{ route('supervisor.find.cancel', $sale->id) }}" class="bg-red-500 p-2 mx-6 hover:bg-red-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                            <span classs="px-12 px-2">
                                Cancelar compra
                            </span>
                        </a>
                        <a href="{{ route('print', $sale->cluster_id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                            <span classs="px-12 px-2">
                                Reimprimir
                            </span>
                        </a>
                    @else
                        <p class="text-center my-4">
                            Este boleto ya esta cancelado
                        </p>

                        <a href="{{ route('supervisor.find.cancel.print', $sale->id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                            <span classs="px-12 px-2">
                                Reimprimir comprobante de cancelación
                            </span>
                        </a>
                    @endif
                </div>
    
        </div>

    </div>
</x-app-layout>
