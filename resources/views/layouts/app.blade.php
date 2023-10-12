<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="/css/styles.css" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
{{--            @include('layouts.navigation')--}}

                <div class="wrapper h100vh flex">
                    <aside class="aside dark-bg">
                        <div class="rectangle flex flex-align-center flex-justify-center">
                            <img src="/images/logo.png" alt="">
                        </div>
                    </aside>
                    <div class="main">
                        <div class="flex-column">
                            <div class="navigation">@include('layouts.navigation')</div>
                            <div class="content">
                                {{ $slot }}
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </body>
</html>
