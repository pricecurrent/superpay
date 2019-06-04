<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
</head>
<body class="bg-grey-lighter font-sans">
    <div id="app">
        <header class="mb-12 bg-white py-3">
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
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 icon-user"><path class="primary" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/><path class="secondary" d="M21 20v-1a5 5 0 0 0-5-5H8a5 5 0 0 0-5 5v1c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2z"/></svg></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container mx-auto w-base">
            <h1 class="mb-4 text-grey-darker uppercase text-xl font-normal">Payments</h1>

            <dashboard-payments></dashboard-payments>
        </div>
    </div>
<script src="/js/app.js"></script>
</body>
</html>
