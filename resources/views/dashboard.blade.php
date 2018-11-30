<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container mx-auto w-3/5">
        <header class="flex justify-between items-center mb-24">
            <div class="w-24"><img src="/img/logo.png" alt="Logo"></div>
            <nav>
                <ul class="flex list-reset items-center">
                    <li class="mx-6">
                        <a href="#">Payments</a>
                    </li>
                    <li class="mx-6">
                        <a href="#">Contacts</a>
                    </li>
                    <li class="ml-6">
                        <a href="#"><img src="/img/user.png"></a>
                    </li>
                </ul>
            </nav>
        </header>

        <h1>Payments</h1>

        <nav>
            <ul>
                <li><a href="#">New</a></li>
                <li><a href="#">Sent</a></li>
                <li><a href="#">Paid</a></li>
            </ul>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Code</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> some@email.com </td>
                    <td> $50 </td>
                    <td> 12/11/2018 </td>
                    <td> TESTCODE_1234</td>
                </tr>
                <tr>
                    <td>bradley@cooper.com</td>
                    <td> $150 </td>
                    <td> 01/01/2019 </td>
                    <td> TESTCODE_432</td>
                </tr>
                <tr>
                    <td>jane@cooper.com</td>
                    <td> $150 </td>
                    <td> 01/01/2019 </td>
                    <td> TESTCODE_432</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
