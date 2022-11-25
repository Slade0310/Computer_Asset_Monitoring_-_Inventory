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
    <h2 class="p-4 text-4xl font-semibold text-center text-white bg-blue-900">COMPUTER ASSETS ACTIVE</h2>
    <div class="pt-4">
        <div class="w-full rounded-lg">
            <div class="p-5 shadow-lg mx-7 rounded-xl md:p-10 bg-slate-300">
                {{-- * TABLE FOR ALL COMPUTER ASSETS IN ACTIVE * --}}
                <livewire:active-computer-asset-table/>
            </div>
        </div>
    </div>
</main>

{{-- * LOADER JS * --}}
<script src="{{ asset('js/loader.js') }}"></script>

@include('admin.partials.footer')
