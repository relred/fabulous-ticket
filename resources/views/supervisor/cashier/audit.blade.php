<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generar Arqueo') }}
        </h2>
    </x-slot>

    <div class="w-3/4 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="mx-auto w-full max-w-[550px]">
            <h2 class="text-center mb-5 text-xl font-bold">Ingrese datos de supervisor</h2>
            <p class="text-center mb-5 font-bold">Ingrese " 0 " en las casillas que no haya en caja</p>
            @if (session('roleError'))
                <p class="text-red-500">Este usuario no es un supervisor</p>
            @endif

            <form action="{{ route('withdraw.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="audit">

                <div class="grid grid-cols-6 gap-3 mb-4">
                    <label for="one_thousand" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 1,000
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="one_thousand"
                        id="one_thousand"
                        placeholder="Ingrese la cantidad de billetes de $ 1,000"
                        required
                        value="{{ old('one_thousand') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="five_hundred" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 500
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="five_hundred"
                        id="five_hundred"
                        placeholder="Ingrese la cantidad de billetes de $ 500"
                        required
                        value="{{ old('five_hundred') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="two_hundred" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 200
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="two_hundred"
                        id="two_hundred"
                        placeholder="Ingrese la cantidad de billetes de $ 200"
                        required
                        value="{{ old('two_hundred') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="one_hundred" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 100
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="one_hundred"
                        id="one_hundred"
                        placeholder="Ingrese la cantidad de billetes de $ 100"
                        required
                        value="{{ old('one_hundred') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="fifty" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 50
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="fifty"
                        id="fifty"
                        placeholder="Ingrese la cantidad de billetes de $ 50"
                        required
                        value="{{ old('fifty') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="twenty" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $ 20
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="twenty"
                        id="twenty"
                        placeholder="Ingrese la cantidad de billetes de $ 20"
                        required
                        value="{{ old('twenty') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="ten" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $10
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="ten"
                        id="ten"
                        placeholder="Ingrese la cantidad de monedas de $ 10"
                        required
                        value="{{ old('ten') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="five" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $5
                    </label>
                    <input
                        autofocus
                        type="number"
                        name="five"
                        id="five"
                        placeholder="Ingrese la cantidad de monedas de $ 5"
                        required
                        value="{{ old('five') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="two" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $2
                    </label>
                    <input
                        
                        type="number"
                        name="two"
                        id="two"
                        placeholder="Ingrese la cantidad de monedas de $ 2"
                        
                        value="{{ old('two') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="one" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $1
                    </label>
                    <input
                        
                        type="number"
                        name="one"
                        id="one"
                        placeholder="Ingrese la cantidad de monedas de $ 1"
                        
                        value="{{ old('one') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                    <label for="cents" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        $0.50 Centavos
                    </label>
                    <input
                        
                        type="number"
                        name="cents"
                        id="cents"
                        placeholder="Ingrese la cantidad de monedas de $ 0.50 centavos"
                        
                        value="{{ old('cents') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />


                    <label for="dollar" class="mt-3 col-start-1 col-end-2 block text-base font-medium text-[#07074D]">
                        Dolares
                    </label>
                    <input
                        
                        type="number"
                        name="dollar"
                        id="dollar"
                        placeholder="Ingrese la cantidad de Dolares"
                        required
                        value="{{ old('dollar') }}"
                        class="col-start-2 col-end-7 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />

                </div>
                <hr class="my-3"/>

                <div class="mb-5">
                    <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre de Usuario (Supervisor)
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Ej. jgonzalez"
                        required
                        value="{{ old('username') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                    @if (session('usernameError'))
                        <p class="text-red-500">Nombre de usuario no encontrado</p>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-3 block text-base font-medium text-[#07074D]">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="***********"
                        required
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                    @if (session('passwordError'))
                        <p class="text-red-500">Contraseña incorrecta</p>
                    @endif
                </div>
                <div>
                    <button class="hover:shadow-form hover:bg-teal-600 rounded-md bg-teal-500 py-3 px-8 text-base font-semibold text-white outline-none">
                    Ingresar
                    </button>
                </div>
            </form>
          </div>
    </div>
</x-app-layout>