{{-- IF YOU LOOK TO OTHERS FOR FULFILLMENT, YOU WILL NEVER TRULY BE FULFILLED. --}}

<div class="object-cover rounded-lg drop-shadow-2xl">
    <div class="p-2 px-10 py-4 text-right bg-blue-900 rounded-t-lg md:px-10">
        <h1 class="pt-3 text-2xl font-bold text-center text-white">EDIT COMPUTER ASSET</h1>
    </div>

    <div class="px-6 pb-6">
        <form action="{{ url('/a/update/'.$getComputerAssets->id) }}" method="POST" autocomplete="off">
            @method('PUT')
            @csrf
            <br>
            <div class="grid grid-cols-1 gap-2">
                <div>
                    <label for="tag_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tag ID:
                        <input type="text" name="tag_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $getComputerAssets->tag_id }}">
                    </label>
                    <span class="py-2 text-sm font-medium text-red-600">@error('tag_id') {{ $message }} @enderror</span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Choose Types of Assets:
                        <select name="asset_category_id" id="asset_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option disabled selected>Choose Category</option>
                            <option value="{{ $getComputerAssets->asset_category_id}}" selected>
                                {{ $getComputerAssets->asset_category_id}}
                            </option>
                            <option disabled>-- Select New Update --</option>
                            @foreach ($assetCategories as $assetCategory)
                                <option value="{{ $assetCategory->name }}"  {{ (old('asset_category_id') == $assetCategory->name)? 'selected' : '' }}>
                                    {{ $assetCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <span class="py-2 text-sm font-medium text-red-400">@error('asset_category_id') {{ $message }} @enderror</span>
                </div>
            </div>
            <br>
            {{-- <div>
                <div class="flex gap-2 cursor-pointer">
                    <span class="font-semibold text-black text-md label-text">
                        Set this Active?
                    </span>
                    <input type="checkbox" name="status" value="{{ old($getComputerAssets->status) }}" class="toggle-success toggle" />
                </div>
            </div>
            <br> --}}
            <input type="hidden" name="id" value="{{ $getComputerAssets->id }}">
            <button type="submit" name="submit" id="submit" class="w-full text-white bg-blue-900 hover:bg-warning hover:duration-300 focus:outline-none font-medium rounded-lg text-md px-5 py-2.5 text-center duration-300">Update Computer Asset</button>
        </form>
    </div>
</div>
