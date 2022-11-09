<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAIM</title>
    {{-- * SWEETALERT2 CDN * --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- * TAILWIND CDN TO AVOID DARK MODE * --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- * JQUERY CDN * --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- * DATATABLE CDN * --}}
    <script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    @vite('resources/css/app.css')
</head>

<body data-theme="dark">

    {{-- * NAVBAR * --}}
    <div class="bg-blue-900 navbar">
        <div class="flex-1">
            <img src="{{ asset('img/logo.png') }}" class="md:h-16 h-11" alt="SPCC_CIT_LOGO">
            <a href="#" class="p-3 font-semibold text-white md:text-2xl hover:cursor-pointer text-md">
                Computer Assets Inventory & Monitoring
            </a>
        </div>
        <div class="hidden font-semibold text-white md:flex">
            <ul class="menu menu-horizontal">
                <li>
                    <label for="my_modal" class="rounded-md hover:bg-warning hover:duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                        </svg>
                        Add Asset
                    </label>
                </li>
                <li>
                    <div class="rounded-md indicator hover:bg-warning hover:duration-300" style="z-index: 3">
                        <span class="font-semibold text-white bg-red-600 shadow-2xl badge-outline indicator-item badge">1</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
                <li tabindex="0" class="w-40 rounded-md hover:bg-warning hover:duration-300"  style="z-index: 2">
                    <a>
                        {{ $adminEmail['name'] }}
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/>
                        </svg>
                    </a>
                    <ul class="p-1 bg-blue-900 shadow-2xl w-36">
                        <li class="hover:bg-warning hover:duration-300">
                            <a>Settings</a>
                        </li>
                        <hr>
                        <li class="hover:bg-warning hover:duration-300"">
                            <a href="{{ route('admin-logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        {{-- * FOR SMALL DEVICES * --}}
        <div class="flex text-white md:hidden">
            <ul class="menu menu-horizontal">
                <li>
                    <label for="my_modal" class="rounded-md hover:bg-warning hover:duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </li>
                <li>
                    <div class="rounded-md indicator hover:bg-warning hover:duration-300" style="z-index: 3">
                        <span class="font-semibold text-white bg-red-600 shadow-2xl badge-outline indicator-item badge">1</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
                <li>
                    <div class="rounded-md cursor-pointer dropdown dropdown-hover dropdown-end indicator hover:bg-warning hover:duration-300">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </a>
                        <ul tabindex="0" class="p-2 mt-32 font-semibold text-center text-white bg-blue-900 rounded-lg shadow-xl menu menu-compact dropdown-content w-28">
                            <li class="hover:bg-warning hover:duration-300 hover:rounded-lg">
                                <a>Settings</a>
                            </li>
                            <hr>
                            <li class="hover:bg-warning hover:duration-300 hover:rounded-lg">
                                <a href="{{ route('admin-logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        {{-- * INPUT FOR ADDING RFID STICKERS * --}}
        <form action="{{ route('admin-store') }}" method="POST">
            @csrf
            <input type="checkbox" id="my_modal" class="modal-toggle"/>
            <div class="modal">
                <div class="relative text-white bg-blue-900 modal-box">
                    <label for="my_modal" class="absolute text-white btn btn-sm btn-warning right-2 top-2 hover:bg-yellow-500 hover:duration-300">✕</label>
                    <h3 class="text-lg font-bold">Add new Computer Asset</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="w-full max-w-xs text-white form-control">
                            <label class="mt-2 label">
                                <span class="font-semibold text-white label-text">
                                    Enter the ID:
                                </span>
                            </label>
                            <input type="text" name="tag_id" id="tag_id" placeholder="123XXXXX" class="w-full max-w-xs text-black bg-white input" value="{{ old('tag_id') }}"/>
                            <span class="py-2 text-sm font-medium text-red-400">@error('tag_id') {{ $message }} @enderror</span>
                        </div>

                        <div class="w-full max-w-xs form-control">
                            <label class="mt-2 label">
                              <span class="font-semibold text-white label-text">Choose types of assets:</span>
                            </label>
                            <select name="asset_category_id" id="asset_category_id" class="text-black bg-white select select-bordered">
                                <option disabled selected>Choose Category</option>
                                @foreach ($assetCategories as $assetCategory)
                                    <option value="{{ $assetCategory->name }}"  {{ (old('asset_category_id') == $assetCategory->name)? 'selected' : '' }}>
                                        {{ $assetCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="py-2 text-sm font-medium text-red-400">@error('asset_category_id') {{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-3">
                        <button class="text-white bg-warning hover:bg-yellow-600 hover:duration-300 font-medium rounded-lg text-md w-full sm:w-auto px-4 py-2.5 text-center">Save Asset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>




