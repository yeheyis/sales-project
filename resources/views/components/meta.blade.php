<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add,arrow_forward_ios,attach_money,calendar_month,delete,edit" >
    
    
    

    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add_2" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" w-full">

    <div class="w-full flex flex-col">
        <div class="w-full ">
            <x-navbar />
        </div>

        <div class=" w-full flex">
            <div class="  w-0 md:w-[15%] h-screen">
                <x-sidebar />
            </div>

            <div class=" w-full md:w-[85%] h-full">
                <main class=" w-full h-screen p-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    </div>
</body>

<script>
    console.log('Script loaded');
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        document.getElementById('datepicker-autohide')
            .addEventListener('input', function(e) {
                console.log('Selected date:', e.target.value);
                let rawDate = new Date(e.target.value);
                let formatted = rawDate.toISOString().split('T')[0];
                console.log('Formatted date:', formatted);
                fetch('/sales/filter?date=' + formatted)
                    .then(response => response.json())
                    .then(data => {
                        let tbody = document.getElementById('sales-table-body');
                        tbody.innerHTML = '';

                        if (data.length === 0) {
                            tbody.innerHTML = `
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
                                No sales found.
                            </th>
                        </tr>`;
                        } else {
                            data.forEach(sale => {
                                tbody.innerHTML += `
                            <tr class="border-b border-default">
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
                                    <a href="/sales/${sale.id}">${sale.product.code}</a>
                                </th>
                                <td class="px-6 py-4">${sale.quantity}</td>
                                <td class="px-6 py-4 bg-neutral-secondary-soft">${sale.price}</td>
                                <td class="px-6 py-4">${sale.payment_type}</td>
                            </tr>`;
                            });
                        }
                    });
            });

    });
</script>

</html
