<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Cajero') }}
        </h2>
    </x-slot>

    <br>
    <div class="w-3/4 p-6 mt-12 mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{ route('supervisor.adduser.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label
                      for="name"
                      class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                      Nombre
                    </label>
                    <input
                      type="text"
                      name="name"
                      id="name"
                      placeholder="Ej. Juan Gonzalez"
                      required
                      value="{{ old('name') }}"
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
              <div class="mb-5">
                <label
                  for="username"
                  class="mb-3 block text-base font-medium text-[#07074D]"
                >
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
                    <p class="text-red-500">Este nombre de usuario ya está en uso</p>
                @endif
              </div>
              <div class="mb-5">
                <label
                  for="password"
                  class="mb-3 block text-base font-medium text-[#07074D]"
                >
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
                    <p class="text-red-500">Las contraseñas no coinciden</p>
                @endif
              </div>
              <div class="mb-5">
                <label
                    for="passwordconfirm"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Confrime Contraseña
                </label>
                <input
                    type="password"
                    name="passwordconfirm"
                    id="passwordconfirm"
                    placeholder="***********"
                    required
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />

              </div>

              <div>
                <button
                  class="hover:shadow-form hover:bg-teal-600 rounded-md bg-teal-500 py-3 px-8 text-base font-semibold text-white outline-none"
                >
                  Agregar
                </button>
              </div>
            </form>
          </div>
    </div>
</x-app-layout>
    