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

<main data-theme="light" class="pb-10">
    <div class="grid grid-cols-1 gap-5 pt-16 mx-10 lg:grid-cols-3">
        <div class="bg-blue-900 card text-primary-content">
            <div class="card-body">
                <h2 class="text-xl font-semibold text-center">ACTIVE COMPUTER ASSETS</h2>
                <h2 class="text-2xl font-semibold text-center">
                    No.: {{ $computerAssetsStatusOn->count() }}
                </h2>
                <div class="justify-center pt-3 card-actions">
                    <a href="{{ route('admin-active') }}" class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</a>
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
                    <a href="{{ route('admin-inactive') }}" class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</a>
                </div>
            </div>
        </div>

        <div class="bg-blue-900 card text-primary-content">
            <div class="card-body">
                <h2 class="text-xl font-semibold text-center">IN ARCHIVE COMPUTER ASSETS</h2>
                <h2 class="text-2xl font-semibold text-center">
                    No.: {{ $computerAssetsOnlyTrashed->count() }}
                </h2>
                <div class="justify-center pt-3 card-actions">
                    <a href="{{ route('admin-archive') }}" class="font-semibold btn bg-warning hover:bg-yellow-500 hover:duration-300">VIEW</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full p-0 mt-2 rounded-lg">
        <div class="p-5 mx-10 mt-4 shadow-lg rounded-xl md:p-12 bg-slate-300">
            {{-- * TABLE FOR ALL COMPUTER ASSETS * --}}
            <livewire:computer-asset-table/>
        </div>
    </div>
</main>

{{-- * LOADER JS * --}}
<script src="{{ asset('js/loader.js') }}"></script>

@include('admin.partials.footer')
