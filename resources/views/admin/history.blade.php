<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mt-6">Historial de ventas</h2>

    <div class="w-1/2 p-6 mt-4 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="table-auto w-3/4 mx-auto">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Cajero</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Descripción</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Cantidad</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Fecha de transacción</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->user_fullname }}</td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-lg font-medium text-gray-800">
                                        {{ ($sale->adult)? $sale->adult . ' Adultos':'' }}
                                        {{ ($sale->kid)? '| ' . $sale->kid . ' Niños | ':'' }}
                                        {{ ($sale->senior)? $sale->senior . ' Adultos Mayores ':'' }}
                                        {{ ($sale->disabled)? '| ' . $sale->disabled . ' Capacidades Diferentes':'' }}
                                        {{ ($sale->birthday)?'Cumpleañero':'' }}
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-green-700 font-bold">$ {{ number_format($sale->amount, '2') }}</div>
                            </td>
                            <td>{{ $sale->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>