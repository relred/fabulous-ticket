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
                        <p class="mb-6 font-bold text-lg text-center">Arqueo de caja</p>
                        <p class="mb-2 font-bold">Folio de retiro: {{ $withdraw->id }}</p>
                        <p>Cajero: {{ $withdraw->user_fullname }}</p>
                        <p>Supervisor: {{ $withdraw->supervisor_fullname }}</p>
                        <p>---------------------------------</p>

                        <p class="text-center">Efectivo contado:</p>
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->amount, 2) }}
                        </p>

                        <p class="text-center">Efectivo esperado:</p>
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->cash_in_register, 2) }}
                        </p>
                        @if ($withdraw->amount <= $withdraw->cash_in_register)
                            <p class="text-center">Faltante:</p>                            
                        @else
                            <p class="text-center">Sobrante:</p>
                        @endif
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->amount - $withdraw->cash_in_register, 2) }}
                        </p>
                        <p>---------------------------------</p>

                        <p class="text-center">Dolares contados:</p>
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->dollars, 2) }}
                        </p>

                        <p class="text-center">Dolares esperados:</p>
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->dollars_in_register, 2) }}
                        </p>

                        @if ($withdraw->dollars <= $withdraw->dollars_in_register)
                            <p class="text-center">Faltante:</p>                            
                        @else
                            <p class="text-center">Sobrante:</p>
                        @endif
                        <p class="text-center text-lg font-bold">
                            $ {{ number_format($withdraw->dollars - $withdraw->dollars_in_register, 2) }}
                        </p>

                        <br>
                        <p class="mb-7 text-center">
                            Fecha y hora: <br> {{ $withdraw->created_at }}
                        </p>
                        <p>---------------------------------</p>
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