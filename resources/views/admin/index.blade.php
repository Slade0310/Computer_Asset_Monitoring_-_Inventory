@include('admin.partials.header')

{{-- ! ERROR MESSAGE ! --}}
@if ($errors->any())
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        background :'#f64341',
        color: '#ffff',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.resumeTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        Toast.fire({
        icon: 'error',
        title: "There's something wrong..."
        })
    </script>
@endif

@if (Session::has('error'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        background :'#f64341',
        color: '#ffff',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.resumeTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        Toast.fire({
        icon: 'error',
        title: "{{ Session::get('error') }}"
        })
    </script>
@endif

{{-- * SUCCESS MESSAGE * --}}
@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        background : '#59b259',
        color: '#ffff',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.resumeTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        Toast.fire({
        icon: 'success',
        title: "{{ session()->get('success') }}"
        })
    </script>
@endif

<main data-theme="light">
    <div class="grid grid-cols-2 gap-5 pt-16 mx-10 lg:grid-cols-2">
        <div class="bg-blue-900 card text-primary-content">
            <div class="card-body">
                <h2 class="text-xl font-semibold text-center">ACTIVE COMPUTER ASSETS</h2>
                <h2 class="text-2xl font-semibold text-center">
                    No.: {{ $computerAssetsStatusOn->count() }}
                </h2>
                <div class="justify-center pt-3 card-actions">
                    <button class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</button>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 card text-primary-content">
            <div class="card-body">
                <h2 class="text-xl font-semibold text-center">INACTIVE COMPUTER ASSETS</h2>
                <h2 class="text-2xl font-semibold text-center">
                    No.: {{ $computerAssetsStatusOff->count() }}
                </h2>
                <div class="justify-center pt-3 card-actions">
                    <button class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</button>
                </div>
            </div>
        </div>
    </div>

    <div class="w-auto mx-10 mt-10 lg:mx-44">
        <table class="table px-3 row-border hover order-column stripe" id="dataTable" style="width: 100%">
            <thead>
                <tr class="text-lg">
                    <th></th>
                    <th>Tag ID</th>
                    <th>Asset Category</th>
                    <th>Active/Inactive</th>
                </tr>
            </thead>
            <tbody class="bg-warning">
                @foreach ($computerAssets as $computerAsset)
                    <tr>
                        {{-- * FOR AUTO-NUMBERING (INCREMENTAL/DECREMENTAL) * --}}
                        <th scope="row" class="text-right">{{ $loop->iteration }}.</th>
                        <th>{{ $computerAsset->tag_id }}</th>
                        <th>{{ $computerAsset->asset_category_id }}</th>
                        <th>
                            @if ($computerAsset->status == 1)
                                <div class="badge badge-success">Active</div>
                            @else
                                <div class="badge badge-error">Inactive</div>
                            @endif
                            {{-- <input type="checkbox" name="status" value="" class="toggle-success toggle" {{  ($computerAsset->status == 1 ? ' checked' : '')}}/> --}}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable( {
            responsive: true
        });
    });
</script>
@include('admin.partials.footer')
