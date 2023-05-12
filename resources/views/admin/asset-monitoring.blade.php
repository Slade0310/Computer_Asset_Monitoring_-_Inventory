@include('admin.partials.header')

<main data-theme="light" class="pb-10">
    <div class="p-10 text-5xl font-bold text-center text-black">Asset Monitoring</div>
    <div class="flex justify-center mx-16 border-4 border-black rounded-lg bg-slate-300">
        <div class="items-center p-3">
            <div class="grid grid-cols-1 gap-28 md:gap-48 md:grid-cols-3">
                {{-- * GROUP INTO ONE DESIGNATED PC AND DISPLAY INTO ONE * --}}
                @foreach ($computerDesignationNumbers->groupBy('computer_designation_id') as $computerDesignationNumber => $subComputerAssets)
                    <div class="text-4xl font-bold text-black">
                        <div class="font-bold">
                            <div class="underline">{{ $computerDesignationNumber }}</div>
                            {{-- * DISPLAY THE SUB DETAILS OF THE DESIGNATED PC IN COMPUTER ASSETS TABLE * --}}
                            @foreach ($subComputerAssets as $subComputerAsset)
                                <div class="pt-3 text-3xl font-semibold text-black">
                                    {{ $subComputerAsset->asset_category_id }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

{{-- * LOADER JS * --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- <script src="{{ asset('js/refresh.js') }}"></script> --}}

@include('admin.partials.footer')
