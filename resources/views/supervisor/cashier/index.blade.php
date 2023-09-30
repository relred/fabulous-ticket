<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Acciones') }}
      </h2>
  </x-slot>

    <div class="grid grid-cols-4 w-3/4 p-6 mt-12 mx-auto">
        <div class=" mt-4 w-full px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Dinero en caja</h5>
                            <span class="font-semibold text-xl text-blueGray-700">$ {{ number_format($cashInRegister, '2') }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-green-600">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 w-full px-5 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Venta Total Tarjeta</h5>
                            <span class="font-semibold text-xl text-blueGray-700">$ {{ number_format($cardTotal, '2') }}</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-orange-400">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 w-full px-5 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Dolares en caja</h5>
                            <span class="font-semibold text-xl text-blueGray-700">US$ {{ number_format($dollarTotal, '2') }}</span>
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


        <div class=" mt-4 w-full px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Cantidad de venta total</h5>
                            <span class="font-semibold text-xl text-blueGray-700">$ {{ number_format($salesTotal, '2') }}</span>
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
    </div>

    <div class='bg-slate-100 grid grid-cols-4 mt-8 m-auto w-2/3'>
        @if (auth()->user()->session != 'unset')
        
                <!-- Retiro Efectivo -->
                <a href="{{ route('supervisor.cashier.withdraw.cash') }}" class='break-inside bg-green-700 rounded-xl p-4 m-4'>
                  <div class='flex items-center space-x-4'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-dollar" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M6 4v4" />
                      <path d="M6 12v8" />
                      <path d="M13.366 14.54a2 2 0 1 0 -.216 3.097" />
                      <path d="M12 4v10" />
                      <path d="M12 18v2" />
                      <path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M18 4v1" />
                      <path d="M18 9v1" />
                      <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                      <path d="M19 21v1m0 -8v1" />
                    </svg>
                    <span class='text-base font-medium text-white'>Retiro de efectivo</span>
                  </div>
                </a>
        
                <!-- Retiro Efectivo -->
                <a href="{{ route('supervisor.cashier.withdraw.dollar') }}" class='break-inside bg-gray-500 rounded-xl p-4 m-4'>
                  <div class='flex items-center space-x-4'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-dollar" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                      <path d="M12 3v3m0 12v3" />
                    </svg>
                    <span class='text-base font-medium text-white'>Retiro de dolares</span>
                  </div>
                </a>

                <!-- Retiro Efectivo -->
                <a href="{{ route('supervisor.cashier.card-audit') }}" class='break-inside bg-orange-400 rounded-xl p-4 m-4'>
                    <div class='flex items-center space-x-4'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                            <path d="M3 10l18 0" />
                            <path d="M7 15l.01 0" />
                            <path d="M11 15l2 0" />
                        </svg>
                        <span class='text-base font-medium text-white'>Imprimir reporte de tarjeta</span>
                    </div>
                </a>
                  
                <!-- Retiro Efectivo -->
                <a href="{{ route('supervisor.cashier.audit') }}" class='break-inside bg-yellow-600 rounded-xl p-4 m-4'>
                  <div class='flex items-center space-x-4'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-dollar" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                      <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                      <path d="M12 17v1m0 -8v1" />
                    </svg>
                    <span class='text-base font-medium text-white'>Generar Arqueo</span>
                  </div>
                </a>
        
                <!-- Tira final -->
                <a href="{{ route('supervisor.cashier.final-cut') }}" class='break-inside bg-red-600 rounded-xl p-4 m-4'>
                  <div class='flex items-center space-x-4'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>
                    <span class='text-base font-medium text-white'>Cerrar caja</span>
                  </div>
                </a>
        @else
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class='break-inside bg-gray-600 rounded-xl p-4 m-4'>
                <div class='flex items-center space-x-4'>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" />
                    <path d="M18 15l3 -3" />
                    </svg>
                <span class='text-base font-medium text-white'>Cerrar Sesion</span>
                </div>
            </a>
        </form>
        @endif
  </div>
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
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Reimprimir</div>
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
                                    @elseif($withdraw->type == 'final')
                                        Corte Final
                                    @elseif($withdraw->type == 'card')
                                        Reporte de ventas por tarjeta
                                    @else
                                        Arqueo
                                    @endif
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                @if ($withdraw->type == 'audit' || $withdraw->type == 'final' || $withdraw->type == 'card')
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
                            <td class="p-2 whitespace-nowrap text-center">
                                @if ($withdraw->type == 'cash' || $withdraw->type == 'dollar')
                                    <a href="{{ route('print.withdraw', $withdraw->id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                                        <span classs="px-12 px-2">
                                            Reimprimir
                                        </span>
                                    </a>
                                @endif
                                @if ($withdraw->type == 'audit')
                                    <a href="{{ route('print.audit', $withdraw->id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                                        <span classs="px-12 px-2">
                                            Reimprimir
                                        </span>
                                    </a>
                                @endif
                                @if ($withdraw->type == 'card')
                                    <a href="{{ route('print.card-audit', $withdraw->id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                                        <span classs="px-12 px-2">
                                            Reimprimir
                                        </span>
                                    </a>
                                @endif
                                @if ($withdraw->type == 'final')
                                    <a href="{{ route('print.final', $withdraw->id) }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
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