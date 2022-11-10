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
                <h2 class="text-2xl font-semibold text-center">No.: 0</h2>
                <div class="justify-center pt-3 card-actions">
                    <button class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</button>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 card text-primary-content">
            <div class="card-body">
                <h2 class="text-xl font-semibold text-center">INACTIVE COMPUTER ASSETS</h2>
                <h2 class="text-2xl font-semibold text-center">No.: 0</h2>
                <div class="justify-center pt-3 card-actions">
                    <button class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</button>
                </div>
            </div>
        </div>

    </div>
    <div class="px-3 mt-10 lg:px-96">
        <table class="table px-3 display" id="dataTable" style="width: 100%">
            <!-- head -->
            <thead class="text-center bg-blue-900">
                <tr>
                    <th>Tag ID</th>
                    <th>Asset Category</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($computerAssets as $computerAsset)
                    <tr>
                        <th>{{ $computerAsset->tag_id }}</th>
                        <th>{{ $computerAsset->asset_category_id }}</th>
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
        } );
    });
</script>
@include('admin.partials.footer')
