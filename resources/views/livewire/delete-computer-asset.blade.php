{{-- NOTHING IN THE WORLD IS AS SOFT AND YIELDING AS WATER. --}}

<div class="object-cover rounded-lg drop-shadow-2xl">
    <div class="p-2 px-10 py-4 text-right bg-blue-900 rounded-t-lg md:px-10">
        <h1 class="pt-3 text-2xl font-bold text-center text-white">DELETE COMPUTER ASSET</h1>
    </div>

    <div class="px-6 pb-6">
        <form action="{{ route('admin-forceDelete', $getComputerAssets->id) }}" method="POST" autocomplete="off">
            @csrf
            <br>
            <span class="flex items-center justify-center text-lg font-semibold text-black">Are you sure you want to delete this Asset forever?</span>
            <div class="flex items-center justify-center px-5 py-2 text-center md:px-10 md:py-2">
                <p class="px-3 mx-2 text-lg font-semibold text-black">
                    Tag ID: | Asset Category: | Status: <br>
                    <span class="font-bold font-italic">
                        @if ($getComputerAssets->status == 1)
                            {{ $getComputerAssets->tag_id }} | {{ $getComputerAssets->asset_category_id }} |
                            <span class="px-2 text-sm text-white bg-green-600 rounded-full">ACTIVE</span>
                        @else
                            {{ $getComputerAssets->tag_id }} | {{ $getComputerAssets->asset_category_id }} |
                            <span class="px-2 text-sm text-white bg-red-600 rounded-full">INACTIVE</span>
                        @endif
                    </span>
                </p>
            </div>
            <br>
            <input type="hidden" name="id" value="{{ $getComputerAssets->id }}">
            <button type="submit" name="submit" id="submit" class="w-full text-white bg-red-600 hover:bg-red-900 hover:duration-300 focus:outline-none font-medium rounded-lg text-md px-5 py-2.5 text-center duration-300">Delete Computer Asset</button>
        </form>
    </div>
</div>

