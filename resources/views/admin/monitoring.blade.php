<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monitoreo') }}
        </h2>
    </x-slot>

    <br>

    <div class="w-3/4 mx-auto">
        <a href="{{ route('admin.session.open') }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
            <span classs="px-12 px-2">
                Regenerar Sesión
            </span>
        </a>
    </div>
    @if (session('success'))
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700 w-3/4 mx-auto mt-5" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">Sesión regenerada con éxito.</span>
            </div>
        </div>            
    @endif
    <div class="flex flex-wrap w-3/4 mx-auto mt-10">

        <div class=" mt-4 w-full lg:w-6/12 xl:w-3/12 px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Cantidad de venta de hoy</h5>
                            <span class="font-semibold text-xl text-blueGray-700">$ {{ number_format($sessionSalesTotal, 2) }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-green-600">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
{{--                    <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2"><i class="fas fa-arrow-down"></i> 4,01%</span>
                        <span class="whitespace-nowrap"> Since last week </span>
                    </p> --}}
                </div>
            </div>
        </div>

        <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Ventas de hoy</h5>
                            <span class="font-semibold text-xl text-blueGray-700">{{ $sessionSalesCount }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-red-500">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=" mt-4 w-full lg:w-6/12 xl:w-3/12 px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Cantidad de venta total</h5>
                            <span class="font-semibold text-xl text-blueGray-700">$ {{ number_format($salesTotal, 2) }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-pink-500">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Ventas totales</h5>
                            <span class="font-semibold text-xl text-blueGray-700">{{ $salesCount }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-red-500">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/4 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">

        <div class="overflow-x-auto">
            <table class="table-auto w-3/4 mx-auto">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Descripción</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Cantidad</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($sales as $sale)
                        <tr>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

</x-app-layout>
    