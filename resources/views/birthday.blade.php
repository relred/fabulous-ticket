<x-app-layout>
    <div class="py-12">
        <div class="lg:w-1/3 m-auto">
            <img src="{{ asset('assets/birthday.jpg') }}" alt=""class="rounded-t-2xl  shadow-2xl w-full 2xl:h-44 object-cover"/>
            <div class="bg-white shadow-2xl rounded-b-3xl text-center pb-6">
                <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">Ingrese el identificador del cumpleañero</h2>
                <div class="mx-8 mt-10 mb-4">
                    <form action="{{ route('birthday.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-3 grid-cols-2">
                            <p for="curp" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">CURP</p>
                            <input name="curp" type="text" id="curp" class="appearance-none uppercase rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required autofocus>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="submit" class="bg-teal-500 w-72 lg:w-5/6 m-auto mt-6 p-2 hover:bg-teal-600 rounded-2xl cursor-pointer text-white text-center shadow-xl shadow-bg-blue-700" value="Ingresar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
