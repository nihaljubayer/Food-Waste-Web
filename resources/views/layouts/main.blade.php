<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Waste Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 16px 24px;
        }

        header h2 {
            margin: 0;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="wrapper">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</div>
</body>
</html>
