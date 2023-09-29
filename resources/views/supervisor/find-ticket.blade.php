<x-app-layout>
        <div class="min-h-screen bg-gray-100">
            <main>
                <div class="py-12">
                    <div class="lg:w-1/3 m-auto">
                        <div class="bg-white shadow-2xl rounded-md text-center pb-6">
                            <h2 class="text-center text-gray-800 text-2xl font-bold pt-6">Buscar boleto</h2>
                            <div class="mx-8 mt-10 mb-4">
                                <form action="{{ route('supervisor.find.post') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-3 grid-cols-2">
                                        <p for="id" class="ml-12 mt-3 text-lg font-medium text-[#07074D]">Folio</p>
                                        <input name="id" type="text" id="id" class="appearance-none uppercase rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required autofocus>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <input type="submit" class="bg-teal-500 w-72 lg:w-5/6 m-auto mt-6 p-2 hover:bg-teal-600 rounded-2xl cursor-pointer text-white text-center shadow-xl shadow-bg-blue-700" value="Ingresar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
</x-app-layout>