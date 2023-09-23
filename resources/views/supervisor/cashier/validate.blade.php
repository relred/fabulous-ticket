<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingresar') }}
        </h2>
    </x-slot>

    <div class="w-3/4 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="mx-auto w-full max-w-[550px]">
            <h2 class="text-center mb-5 text-xl font-bold">Ingrese datos de supervisor</h2>
            @if (session('roleError'))
                <p class="text-red-500">Este usuario no es un supervisor</p>
            @endif

            <form action="{{ route('supervisor.cashier.validate') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="audit">

                <div class="mb-5">
                    <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre de Usuario (Supervisor)
                    </label>
                    <input
                        autofocus
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