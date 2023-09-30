<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervisores') }}
        </h2>
    </x-slot>

    <br>
    
    <h2 class="text-center text-2xl font-bold">Retiros</h2>
    <div class="w-2/3 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="table-auto w-3/4 mx-auto">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Supervisor</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Tipo de retiro</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Cantidad de retiro</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Fecha y hora</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($withdrawHistory as $withdraw)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-lg font-medium text-gray-800">
                                        {{ $withdraw->supervisor_fullname }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-base font-bold">
                                    @if ($withdraw->type == 'cash')
                                        Efectivo
                                    @elseif($withdraw->type == 'dollar')
                                        Dolares
                                    @elseif($withdraw->type == 'card')
                                        Reporte Tarjeta
                                    @else
                                        Arqueo
                                    @endif
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                @if ($withdraw->type == 'audit' || $withdraw->type == 'final' || 'card')
                                <div class="text-lg text-green-700 font-bold">    
                                    $ {{ number_format($withdraw->amount, '2') }}
                                </div>
                                @else
                                <div class="text-lg text-red-700 font-bold">
                                    {{ ($withdraw->type == 'cash') ?'$' : 'US$' }} {{ number_format($withdraw->amount, '2') }}
                                </div>
                                @endif
                            </td>
                            <td class="p-2 whitespace-nowrap text-center">
                                {{ $withdraw->created_at }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <div class="p-4 mt-3 border-t border-gray-100 w-2/3 mx-auto">
        <h2 class="text-center text-2xl font-bold mb-4">Ultimas 100 ventas</h2>
        <div class="p-6 bg-white shadow-lg rounded-sm border border-gray-200">
            <table class="table-auto w-3/4 mx-auto">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Folio</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Descripción</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Costo</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Reimprimir</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($sales as $sale)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                {{ $sale->id }}
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-lg font-medium text-gray-800">
                                        {{ ($sale->adult)? $sale->adult . ' Adultos':'' }}
                                        {{ ($sale->kid)? '| ' . $sale->kid . ' Niños | ':'' }}
                                        {{ ($sale->senior)? $sale->senior . ' Adultos Mayores ':'' }}
                                        {{ ($sale->disabled)? '| ' . $sale->disabled . ' Capacidades Diferentes':'' }}
                                        {{ ($sale->birthday)?'Cumpleañero':'' }}
                                        @if (!$sale->adult && !$sale->kid && !$sale->senior && !$sale->disabled && $sale->dollar_change)
                                            {{ $sale->dollar_change }} Boletos VIP
                                        @endif
        
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-green-700 font-bold">$ {{ number_format($sale->amount, '2') }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap text-center">
                                @if ($loop->first)
                                    <a href="{{ route('print', $sale->cluster_id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                                        <span classs="px-12 px-2">
                                            Reimprimir
                                        </span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
        
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
    