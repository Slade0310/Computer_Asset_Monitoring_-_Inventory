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

        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <table class="divide-y divide-gray-300" id="dataTable" width="100%">
                        <thead class="bg-blue-900 ">
                            <tr>
                                <th class="px-6 py-2 text-xs text-white">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-white">
                                    Name
                                </th>
                                <th class="px-6 py-2 text-xs text-white">
                                    Email
                                </th>
                                <th class="px-6 py-2 text-xs text-white">
                                    Created_at
                                </th>
                                <th class="px-6 py-2 text-xs text-white">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-white">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-500">
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    1
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                                </td>
                            </tr>
                            <tr class="bg-gray-50 whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 2
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe2@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-red-400 rounded-full">Delete</a>
                                </td>
                            </tr>
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    3
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 3
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe3@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                                </td>
                            </tr>


                            <tr class="bg-gray-50 whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    4
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900">
                                        Jon doe 4
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-500">jhondoe4@example.com</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="px-4 py-1 text-sm text-red-400 rounded-full">Delete</a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
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
