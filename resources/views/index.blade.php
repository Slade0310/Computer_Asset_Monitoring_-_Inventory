@include('partials-front.header')

{{-- ERROR MESSAGE --}}
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
        title: 'Failed to Login as Admin'
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

<main data-theme="light">
    <form action="{{ route('admin-check') }}" method="POST">
        @csrf
        <div class="pt-32 mx-20 lg:mx-96">
            <div class="p-5 px-10 bg-blue-900 rounded-xl">
                <div class="mb-6">
                    <div class="mb-8 text-3xl font-semibold text-center text-white underline">ADMINISTRATOR</div>

                    <label for="email" class="block mb-2 text-sm font-medium text-white">ENTER YOUR EMAIL:</label>
                    <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 font-bold text-lg" placeholder="example@gmail.com" value="{{ old('email') }}">
                    <span class="font-bold text-red-400">@error('email') {{ $message }}  @enderror</span>
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-white">ENTER YOUR PASSWORD:</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg block w-full p-2.5" value="{{ old('password') }}" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    <span class="font-bold text-red-400">@error('password') {{ $message }}  @enderror</span>
                </div>

                <button class="text-white bg-warning hover:bg-yellow-300 hover:duration-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center">Login</button>
            </div>
        </div>
    </form>
</main>

{{-- <script src="sweetalert2.all.min.js"></script> --}}


@include('partials-front.footer')
