<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pdf-title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <style>
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            right: 0px;
            left: 0px;
            height: 50px;
            font-size: 20px !important;
            background-color: blue;
            color: azure;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            right: 0px;
            left: 0px;
            height: 50px;
            font-size: 20px !important;
            background-color: blue;
            color: azure;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
    {{-- header block --}}
    <header>
        {{ $title }}
    </header>
    {{-- footer block --}}
    <footer>
        Created on
        {{ $date}}
    </footer>

    {{-- main block --}}
    <main>
        @yield('mainpdf')

    </main>
</body>

</html>
