<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto p-6 lg:p-8">

            <div class="flex justify-center">
                <img src="{{ asset('assets/logo-print.png') }}" alt="">
            </div>

            <div class="mt-16">
                <h2 class="my-6 text-2xl font-semibold text-gray-900 text-center" style="font-size: 2em;">Fiestas del Sol</h2>
                <hr class="mb-1">
                <div class="scale-100 flex my-6">
                    <div>
                        <p class="mb-6 font-bold text-lg text-center">Retiro de caja</p>
                        <p class="mb-2 font-bold">Folio de retiro: {{ $withdraw->id }}</p>
                        <p>Cajero: {{ $withdraw->user_fullname }}</p>
                        <p>Supervisor: {{ $withdraw->supervisor_fullname }}</p>
                        <p>Tipo de retiro: <span class="font-bold">{{ ($withdraw->type == 'cash') ? 'Efectivo (Pesos)' : 'Dólares' }}</span></p>
                        <br>
                        <p class="text-center">Cantidad de retiro:</p>
                        <p class="text-center text-lg font-bold">
                            {{ ($withdraw->type == 'cash') ?'$' : 'US$' }} {{ number_format($withdraw->amount) }}
                        </p>
                        <br>
                        <p class="mb-7 text-center">
                            Fecha y hora: <br> {{ $withdraw->created_at }}
                        </p>
                        <p>----------------------------------</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        window.print();
        window.location.href = "/cashier/supervisor/withdraw-success";
    </script>
</body>
</html>