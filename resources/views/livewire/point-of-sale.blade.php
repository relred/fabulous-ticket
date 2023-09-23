<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="m-auto" id="summary">
            {{-- Step 1 --}}
            @if ($step == 1)
            <div class="lg:w-3/5 m-auto">
                <img src="{{ asset('assets/dashboard.jpg') }}" alt=""class="rounded-t-2xl  shadow-2xl w-full 2xl:h-44 object-cover"/>
                <div class="bg-white shadow-2xl rounded-b-3xl text-center pb-6">
                    <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">Seleccione los boletos a cobrar</h2>
                    <div class="mx-8 mt-10 mb-4">
                        <div class="grid gap-3 grid-cols-2">
                            <p for="adult" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Adulto</p>
                            <input wire:model="adult" type="number" id="adult" class="appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" autofocus>
    
                            <p for="kid" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Niño</p>
                            <input wire:model="kid" type="number" id="kid" class="appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
    
                            <p for="senior" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Adulto Mayor</p>
                            <input wire:model="senior" type="number" id="senior" class="appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
    
                            <p for="disabled" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Capacidades Diferentes</p>
                            <input wire:model="disabled" type="number" id="disabled" class="appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
    
                        </div>
                        <div class="grid grid-cols-1">
                                <button wire:click="stepPlus" class="bg-teal-500 w-72 lg:w-5/6 m-auto mt-6 p-2 hover:bg-teal-600 rounded-t-2xl  text-white text-center shadow-xl shadow-bg-blue-700">
                                    <a href="#" classs="lg:text-sm text-lg font-bold px-12 px-2">
                                        Siguiente Paso
                                    </a>
                                </button>
                                <kbd class="px-2 py-1.5 text-center m-auto text-xl w-72 lg:w-5/6 font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Espacio</kbd>

                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Step 2 --}}
            @if ($step == 2)
            <div class="lg:w-1/2 m-auto">
                <img src="{{ asset('assets/dashboard.jpg') }}" alt=""class="rounded-t-2xl  shadow-2xl w-full 2xl:h-44 object-cover"/>
                <div class="bg-white shadow-2xl rounded-b-3xl text-center pb-6">
                    <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">{{ $ticketsTotal }} Personas en total</h2>
                    <div class="mx-8 mt-10 mb-4">
                        <div class="grid gap-3 grid-cols-2">
                            <p for="male" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Hombre</p>
                            <input type="hidden" autofocus>

                            <div class="grid grid-cols-1 gap-0">
                                <input wire:model="genderMale" type="number" id="male" class="appearance-none rounded-t-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <kbd class="px-2 py-1.5 text-center m-auto text-xl lg:w-full font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg">Tab</kbd>
                            </div>
    
                            <p for="female" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Mujer</p>
                            <input wire:model="genderFemale" type="number" id="female" class="appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        </div>
                        <div class="grid grid-cols-1">
                            @if ($genderTotal == $ticketsTotal)
                                <button wire:click="stepPlus" class="bg-teal-500 w-72 lg:w-5/6 m-auto mt-6 p-2 hover:bg-teal-600 rounded-t-2xl  text-white text-center shadow-xl shadow-bg-blue-700">
                                    <a href="#" classs="lg:text-sm text-lg font-bold px-12 px-2">
                                        Proceder al Pago
                                    </a>
                                </button>
                                <kbd class="px-2 py-1.5 text-center m-auto text-xl w-72 lg:w-5/6 font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Espacio</kbd>
                            @else
                            <hr class="mt-9">
                                <h2 class="text-center text-green-700 text-xl font-bold pt-6">{{ $ticketsTotal - $genderTotal }} Personas restantes</h2>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @endif

            {{-- Step 3 --}}
            @if ($step == 3)
            <div class="h-screen bg-gray-100 pt-20">
                <h1 class="mb-10 text-center text-2xl font-bold">Completar transacción</h1>
                <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                    <div class="rounded-lg md:w-1/2">
                        @if ($adult)
                            <div class="justify-between mb-3 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="{{ asset('assets/tickets/1.png') }}" alt="product-image" class="w-full rounded-lg sm:w-14" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-1">
                                    <h2 class="text-xl font-bold text-gray-900">Adulto</h2>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="flex items-center space-x-4">
                                    <div class="flex items-center border-gray-100">
                                        <span class="font-extrabold bg-gray-100 py-1 px-3.5"> {{ $adult }} </span>
                                    </div>
                                    <p class="text-sm">$ {{ number_format($adultTotal, 2) }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif
                        
                        @if ($kid)
                            <div class="justify-between mb-3 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="{{ asset('assets/tickets/2.png') }}" alt="product-image" class="w-full rounded-lg sm:w-14" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-1">
                                    <h2 class="text-xl font-bold text-gray-900">Niño</h2>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="flex items-center space-x-4">
                                    <div class="flex items-center border-gray-100">
                                        <span class="font-extrabold bg-gray-100 py-1 px-3.5"> {{ $kid }} </span>
                                    </div>
                                    <p class="text-sm">$ {{ number_format($kidTotal, 2) }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif

                        @if ($senior)
                        <div class="justify-between mb-3 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="{{ asset('assets/tickets/3.png') }}" alt="product-image" class="w-full rounded-lg sm:w-14" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-1">
                                <h2 class="text-xl font-bold text-gray-900">Adulto Mayor</h2>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center space-x-4">
                                <div class="flex items-center border-gray-100">
                                    <span class="font-extrabold bg-gray-100 py-1 px-3.5"> {{ $senior }} </span>
                                </div>
                                <p class="text-sm">$ {{ number_format($seniorTotal, 2) }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif

                    @if ($disabled)
                        <div class="justify-between mb-3 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="{{ asset('assets/tickets/4.png') }}" alt="product-image" class="w-full rounded-lg sm:w-14" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-1">
                                <h2 class="text-xl font-bold text-gray-900">Capacidades Diferentes</h2>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center space-x-4">
                                <div class="flex items-center border-gray-100">
                                    <span class="font-extrabold bg-gray-100 py-1 px-3.5"> {{ $disabled }} </span>
                                </div>
                                <p class="text-sm">$ {{ number_format($disabledTotal, 2) }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif

                    </div>
                  <!-- Sub total -->
                  <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/2">
                    <div class="mt-2 flex justify-between">
                        <p class="font-bold text-2xl">Total</p>
                        <p class="font-bold text-2xl">$ {{ number_format($total, 2) }}</p>
                    </div>
                    <div class="mb-6 flex justify-between">
                        <p class="font-bold text-base">En Dolares</p>
                        <p class="font-bold text-base">US ${{ number_format($totalDollar, 2) }}</p>
                    </div>
  
                    <div class="grid grid-cols-3 gap-1 mb-6">
                        <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-t-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Q</kbd>
                        <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-t-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">W</kbd>
                        <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-t-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">E</kbd>
                        <button wire:click="openCashModal" class=" w-full rounded-b-md bg-green-500 py-1.5 font-medium text-blue-50 hover:bg-green-600">Efectivo</button>
                        <button wire:click="openCardModal" class=" w-full rounded-b-md bg-red-500 py-1.5 font-medium text-blue-50 hover:bg-red-600">Tarjeta</button>
                        <button wire:click="openDollarModal" class=" w-full rounded-b-md bg-gray-500 py-1.5 font-medium text-blue-50 hover:bg-gray-600">Dolares</button>
                    </div>

                    <div class="flex justify-between">
                      <p class="text-gray-700">Pagado con Efectivo</p>
                      <p class="text-red-600">-${{ number_format((float)$cash, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Pagado con Tarjeta</p>
                        <p class="text-red-600">-${{ number_format((float)$card, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Pagado con Dolares</p>
                        <p class="text-red-600">-${{ number_format((float)$dollarConverted, 2) }}</p>
                    </div>

                    <hr class="my-4" />
                    @if ($totalRemaining > 0)
                        <div class="flex justify-between">
                            <p class="text-2xl font-bold">Restante</p>
                            <p class="text-2xl font-bold">${{ number_format($totalRemaining, 2) }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-base font-bold">En Dolares</p>
                            <p class="mb-1 text-base font-bold">US ${{ number_format($totalDollarRemaining, 2) }}</p>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <p class="text-2xl font-bold">Cambio</p>
                            <p class="text-2xl font-bold text-green-600">${{ number_format(abs($totalRemaining), 2) }}</p>
                        </div>
                    @endif
  
                    <hr class="my-4" />

                    <div class="grid grid-cols-1 gap-0 mt-7">
                        <button class="mt-6 w-full rounded-t-md bg-teal-500 py-1.5 font-medium text-blue-50 hover:bg-teal-600">Finalizar</button>
                        <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Espacio</kbd>
                    </div>
                  </div>
                </div>
              </div>
            @endif

            @if ($modalCash)
                <div id="cash-modal" class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden justify-center items-center animated fadeIn faster flex"
                style="background: rgba(0,0,0,.7);">
                    <div class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Efectivo</p>
                            </div>
                            <!--Body-->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-dollar" width="104" height="104" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                            </div>
                            <div class="my-5 grid grid-cols-1 gap-0">
                                <input wire:model="cash" id="modal-input" type="number" placeholder="Cantidad en Pesos" class="appearance-none rounded-md border border-[#000000] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full">
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-md dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">F</kbd>
                            </div>
                            <!--Footer-->
                            <div class="grid grid-cols-1 gap-0 mt-7">
                                <button class="mt-6 w-full rounded-t-md bg-green-600 py-1.5 font-medium text-blue-50 hover:bg-green-500">Ingresar</button>
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Intro</kbd>
                            </div>
                        </div>
                        </div>
                </div>
            @endif
    
            @if ($modalCard)
                <div id="card-modal" class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden justify-center items-center animated fadeIn faster flex"
                style="background: rgba(0,0,0,.7);">
                    <div class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Tarjeta</p>
                            </div>
                            <!--Body-->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="104" height="104" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                    <path d="M3 10l18 0" />
                                    <path d="M7 15l.01 0" />
                                    <path d="M11 15l2 0" />
                                </svg>
                            </div>
                            <div class="my-5 grid grid-cols-1 gap-0">
                                <input wire:model="card" id="modal-input" type="number" placeholder="Pago de Tarjeta" class="appearance-none rounded-t-md border border-[#000000] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full">
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-md dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">F</kbd>
                            </div>
                            <div class="my-5 grid grid-cols-1 gap-0">
                                <input wire:model="card_voucher" id="card-voucher" type="text" placeholder="Voucher Tarjeta" class="appearance-none rounded-t-md border border-[#000000] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full uppercase">
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-md dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Tab</kbd>
                            </div>

                            <!--Footer-->
                            <div class="grid grid-cols-1 gap-0 mt-7">
                                <button class="mt-6 w-full rounded-t-md bg-red-600 py-1.5 font-medium text-blue-50 hover:bg-red-500">Ingresar</button>
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Intro</kbd>
                            </div>
                        </div>
                        </div>
                </div>
            @endif

            @if ($modalDollar)
                <div id="card-Dollar" class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden justify-center items-center animated fadeIn faster flex"
                style="background: rgba(0,0,0,.7);">
                    <div class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Dollar</p>
                            </div>
                            <!--Body-->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash-banknote" width="104" height="104" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M3 6m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M18 12l.01 0" />
                                    <path d="M6 12l.01 0" />
                                </svg>
                            </div>
                            <div class="my-5 grid grid-cols-1 gap-0">
                                <input wire:model="dollar" id="modal-input" type="number" placeholder="Cantidad en Dolares" class="appearance-none rounded-md border border-[#000000] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full">
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-md dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">F</kbd>
                            </div>
                            <!--Footer-->
                            <div class="grid grid-cols-1 gap-0 mt-7">
                                <button class="mt-6 w-full rounded-t-md bg-gray-600 py-1.5 font-medium text-blue-50 hover:bg-gray-500">Ingresar</button>
                                <kbd class="px-2 py-1.5 text-center text-xl font-bold text-gray-800 bg-gray-100 border border-gray-200 rounded-b-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">Intro</kbd>
                            </div>
                        </div>
                        </div>
                </div>
            @endif

    </div>
</div>


<script>
    cashModal = document.getElementById('cash-modal');
    cashModalInput = document.getElementById('cash-input');

    cardModal = document.getElementById('card-modal');

    dollarModal = document.getElementById('dollar-modal');

    document.addEventListener('keydown', function(event) {
        if (event.key === ' ') {
            event.preventDefault();
            Livewire.emit('stepPlus');
        }

        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            Livewire.emit('stepOne');
        }
        
        if (event.key === 'q') {
            event.preventDefault();
            Livewire.emit('openCashModal');
        }

        if (event.key === 'f') {
            event.preventDefault();
            document.getElementById("modal-input").focus();
        }
        
        if (event.key === 'w') {
            event.preventDefault();
            Livewire.emit('openCardModal');
        }

        if (event.key === 'e') {
            event.preventDefault();
            Livewire.emit('openDollarModal');
        }

        if (event.key === 'Enter') {
            event.preventDefault();
            Livewire.emit('inputModals');
        }
    });
</script>
