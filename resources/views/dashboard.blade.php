<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
</head>
    <body class="bg-gray-200 font-sans">
        <div id="app">
            <header class="mb-12 bg-white py-3 px-8">
                <div class="container flex justify-between items-center mx-auto w-base">
                    <div class="w-12"><img src="/img/logo.png" alt="Logo"></div>
                    <nav>
                        <ul class="flex list-reset items-center">
                            <li class="mx-6">
                                <a href="#">Payments</a>
                            </li>
                            <li class="mx-6">
                                <a href="#">Contacts</a>
                            </li>
                            <li class="ml-6">
                                <a href="#">
                                    <svg class="w-6 h-6 stroke-current text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <div class="px-8">
                <h1 class="mb-8 text-gray-600 uppercase text-xl font-normal">Payments</h1>

                <dashboard-payments></dashboard-payments>
            </div>
        </div>
    <script src="/js/app.js"></script>
    </body>
</html>
