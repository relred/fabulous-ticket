<x-app-layout>
    <div class="w-3/5 mx-auto mt-10">
        @if ($configuration->current_session == 'closed')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-2">Iniciar sesión de venta</h2>
            @if (session('success'))
                <div class="flex bg-green-200 rounded-lg p-4 mb-4 text-sm text-green-700 w-3/4 mx-auto mt-5" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            <div class="w-3/4 mx-auto mt-5">
                <form action="{{ route('admin.session.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-2 block text-base font-medium text-[#07074D]">
                            Ingrese un apodo con el que identificar este día
                        </label>
                        <div class="flex bg-gray-300 rounded-lg p-4 mb-3 text-sm text-gray-700 mx-auto" role="alert">
                            <svg class="w-5 h-5 inline mr-3 mt-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div class="mt-2">
                                <span class="font-medium">Este identificador aparecerá en el reporte impreso del día.</span>
                            </div>
                        </div>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Ej. Día 5 Fiestas del Sol"
                            required
                            value="{{ old('name') }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                    <div>
                        <button class="hover:shadow-form hover:bg-teal-600 rounded-md bg-teal-500 py-3 px-8 text-base font-semibold text-white outline-none">
                            Iniciar sesión
                        </button>
                    </div>
                </form>
            </div>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-2">Finalizar sesión de venta</h2>
            @if (session('users'))
                <div class="flex bg-yellow-200 rounded-lg p-4 mb-4 text-sm text-yellow-700 w-3/4 mx-auto mt-5" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <p class="mb-5">No se puede cerrar la sesión global porque los siguientes usuarios no han cerrado su sesión en caja:</p>
                        @foreach (session('users') as $user)
                            <li class="font-medium">{{ $user->name }}</li>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="flex bg-green-200 rounded-lg p-4 mb-4 text-sm text-green-700 w-3/4 mx-auto mt-5" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="flex bg-gray-300 rounded-lg p-4 mb-4 text-sm text-gray-700 w-3/4 mx-auto mt-5" role="alert">
                <svg class="w-5 h-5 inline mr-3 mt-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="mt-2">
                    <span class="font-medium">Sólo podrá cerrar la sesión global una vez todos los cajeros hayan cerrado su sesión de caja.</span>
                </div>
                <a href="{{ route('admin.session.close') }}" class="bg-teal-500 p-2 mx-6 hover:bg-teal-600 rounded-md text-white text-center shadow-xl shadow-bg-blue-700 text-sm font-bold">
                    <span>
                        Cerrar sesión
                    </span>
                </a>
            </div>
        @endif
    </div>

</x-app-layout>