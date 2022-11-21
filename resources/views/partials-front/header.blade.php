<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAIM</title>
    {{-- * SWEETALERT2 CDN * --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- * JQUERY CDN * --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- * VITE CSS * --}}
    @vite('resources/css/app.css')
</head>

<body data-theme="dark">
    {{-- * LOADING EFFECT * --}}
    <div class="loader_bg"></div>

    <div class="flex flex-wrap items-center justify-center mx-auto bg-blue-900 navbar">
        <div>
            <img src="{{ asset('img/logo.png') }}" class="md:h-16 h-11" alt="SPCC_CIT_LOGO">
            <a href="{{ route('index-login') }}" class="p-3 font-semibold text-white md:text-3xl hover:cursor-pointer text-md">
                COMPUTER ASSETS INVENTORY & MONITORING
            </a>
        </div>
    </div>

