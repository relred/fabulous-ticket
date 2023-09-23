<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingresar Cajero') }}
        </h2>
    </x-slot>

    <br>
    <div class="w-3/4 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="mx-auto w-full max-w-[550px]">
            <h2 class="text-center mb-5 text-xl font-bold">Espere a ser validado por un supervisor</h2>
            @if (session('roleError'))
                <p class="text-red-500">Este usuario no es un supervisor</p>
            @endif

            <form action="{{ route('session.generate') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="stall" class="mb-3 block text-base font-medium text-[#07074D]">
                        Número de caja
                    </label>
                    <input
                        type="number"
                        name="stall"
                        id="stall"
                        placeholder="Ej. 23"
                        required
                        value="{{ old('stall') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                    @if (session('stallError'))
                        <p class="text-red-500">{{ session('stallError') }}</p>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="cash" class="mb-3 block text-base font-medium text-[#07074D]">
                        Fondo de caja
                    </label>
                    <input
                        type="number"
                        name="cash"
                        id="cash"
                        placeholder="Ej. 500"
                        required
                        value="{{ old('cash') }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre de Usuario
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
                        <p class="text-red-500">{{ session('usernameError') }}</p>
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