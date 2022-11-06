<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAIM</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
    @vite('resources/css/app.css')
</head>

<body data-theme="dark">

    <div class="bg-blue-900 navbar">
        <div class="flex-1">

            <img src="{{ asset('img/logo.png') }}" class="md:h-16 h-11" alt="SPCC_CIT_LOGO">
            <a href="#" class="p-3 font-semibold text-white md:text-2xl hover:cursor-pointer text-md">
                Computer Assets Inventory & Monitoring
            </a>
        </div>
        <div class="flex-none font-semibold text-white">
            <ul class="p-0 menu menu-horizontal">
                <li tabindex="0" class="rounded-md hover:bg-warning hover:duration-300">
                    <a>
                        {{ $adminEmail['name'] }}
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </a>
                    <ul class="p-1 bg-blue-900">
                        <li class="hover:bg-warning hover:duration-300"">
                            <a>Submenu 1</a>
                        </li>
                        <hr>
                        <li class="hover:bg-warning hover:duration-300"">
                            <a href="{{ route('admin-logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


