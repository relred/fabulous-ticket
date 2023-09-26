<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sesiones pasadas') }}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mt-6">Historial de sesiones</h2>
    <div class="w-1/2 p-6 mt-4 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">

        <table class="table-auto w-3/4 mx-auto">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Identificador</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Controles</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @foreach ($sessions as $session)
                    <tr>
                        <td>
                            <div>{{ $session->user_id }}</div>
                            @if ($loop->first)
                                <span class="font-bold">(Sesion actual)</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <br>
                            <div>
                                <a href="{{ route('admin.session.history', $session->session) }}" class="hover:shadow-form hover:bg-teal-600 rounded-md bg-teal-500 py-2 px-3 text-sm font-semibold text-white outline-none">
                                    Ver historial de sesión
                                </a>
                                <a href="#" class="hover:shadow-form hover:bg-gray-400 rounded-md bg-gray-700 py-2 px-3 text-sm font-semibold text-white outline-none ml-2">
                                    Imprimir reporte
                                </a>
                            </div>
                            <br>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>