<x-app-layout>

    <div class ="overflow-y-auto overflow-x-hidden pt-6">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-indigo-400 dark:hover:text-white">
                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clipRule="evenodd"></path>
                        </svg>
                        <a href="{{ route('users.index') }}"
                            class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-indigo-400 dark:hover:text-white">Users</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="rounded-t mb-0 px-4 border-0">
            <div class="mt-4 flex flex-wrap gap-2 items-center justify-end">
                <button
                    class="bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="showDiv('AddUserModal')">Add New</button>
            </div>
        </div>

        <div class=" pb-3 mt-4">
            @if ($users->isEmpty())
                <div class="text-center py-3">
                    <span class="font-semibold">No User found</span>
                </div>
            @else
                <div class="relative overflow-x-auto ">
                    <table
                        class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-indigo-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-indigo-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap font-medium">
                                        {{ $user->name }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->email }}
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap uppercase">

                                        {{ $user->getRoleNames()->first() }}
                                    </td>

                                    <td class="flex items-center px-6 py-4">

                                        <span class="edit_user_btn mr-4 cursor-pointer" data-id="{{ $user->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24" color="#417505" fill="none">
                                                <path
                                                    d="M16.4249 4.60509L17.4149 3.6151C18.2351 2.79497 19.5648 2.79497 20.3849 3.6151C21.205 4.43524 21.205 5.76493 20.3849 6.58507L19.3949 7.57506M16.4249 4.60509L9.76558 11.2644C9.25807 11.772 8.89804 12.4078 8.72397 13.1041L8 16L10.8959 15.276C11.5922 15.102 12.228 14.7419 12.7356 14.2344L19.3949 7.57506M16.4249 4.60509L19.3949 7.57506"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                <path
                                                    d="M18.9999 13.5C18.9999 16.7875 18.9999 18.4312 18.092 19.5376C17.9258 19.7401 17.7401 19.9258 17.5375 20.092C16.4312 21 14.7874 21 11.4999 21H11C7.22876 21 5.34316 21 4.17159 19.8284C3.00003 18.6569 3 16.7712 3 13V12.5C3 9.21252 3 7.56879 3.90794 6.46244C4.07417 6.2599 4.2599 6.07417 4.46244 5.90794C5.56879 5 7.21252 5 10.5 5"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        @if ($user->id !== auth()->id())
                                            <span class="delete_user_btn cursor-pointer" data-id="{{ $user->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="24" height="24" color="#d0021b" fill="none">
                                                    <path
                                                        d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path d="M9.5 16.5L9.5 10.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M14.5 16.5L14.5 10.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        @endif


                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endif


        </div>
    </div>

    <div id="AddUserModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="AddUserForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div
                    class="flex z-50 flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Create User</h3>
                        <button type="button" onclick="hideDiv('AddUserModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start  py-6 pt-0">
                            <div class="flex flex-wrap">
                                <div class="w-full  px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="name">
                                            Name
                                        </label>
                                        <input type="text" name="name" id="name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="email">
                                            Email
                                        </label>
                                        <input type="text" name="email" id="email"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="password">
                                            Password
                                        </label>
                                        <input type="text" name="password" id="password"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring ease-linear w-full transition-all duration-150"
                                            required>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="role">
                                            Role
                                        </label>
                                        <div class="space-y-2">
                                            @foreach ($roles as $role)
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                        class="form-checkbox text-indigo-600">
                                                    <span class="ml-2">{{ $role->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('AddUserModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="editUserModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form method="POST" id="EditUserForm">
                @csrf
                @method('PUT')
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Edit User</h3>
                        <button type="button" onclick="hideDiv('editUserModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start  py-6 pt-0">
                            <div class="flex flex-wrap">
                                <div class="w-full  px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_name">
                                            Name
                                        </label>
                                        <input type="text" name="name" id="edit_name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_email">
                                            Email
                                        </label>
                                        <input type="text" name="email" id="edit_email"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                </div>


                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_role">
                                            Role
                                        </label>
                                        <div id="edit_roles" class="space-y-2">
                                            @foreach ($roles as $role)
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="roles[]"
                                                        value="{{ $role->name }}"
                                                        class="form-checkbox text-indigo-600"
                                                        id="role_{{ $role->name }}">
                                                    <span class="ml-2">{{ $role->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('editUserModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>



    <x-slot name="script">
        <script>
            $(document).ready(function() {

                $('#AddUserForm').submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success === true) {
                                alert(response.msg);
                                $('#AddUserModal').addClass('hidden');
                                location.reload();
                            } else {
                                alert(response.msg);
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });

                $('.edit_user_btn').on('click', function() {
                    const userId = $(this).data('id');
                    $('#EditUserForm').attr('action', `{{ url('users') }}/${userId}`);
                    var url = '{{ route('users.edit', ':userId') }}';
                    url = url.replace(':userId', userId);
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(data) {
                            if (data.success == true) {
                                console.log(data.data);
                                var user = data.data;
                                $("#edit_name").val(user['name']);
                                $("#edit_email").val(user['email']);
                                var roleNames = user['roles'].map(function(role) {
                                    return role.name;
                                });
                                @foreach ($roles as $role)
                                    if (roleNames.includes('{{ $role->name }}')) {
                                        $('#role_{{ $role->name }}').prop('checked',
                                            true);
                                    } else {
                                        $('#role_{{ $role->name }}').prop('checked',
                                            false);
                                    }
                                @endforeach
                            } else {
                                alert(data.msg);
                            }
                        }
                    })
                    $('#editUserModal').removeClass('hidden');
                });

                $('#EditUserForm').submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success === true) {
                                alert(response.msg);
                                $('#EditUserModal').addClass('hidden');
                                location.reload();
                            } else {
                                alert(response.msg);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });

                $('.delete_user_btn').on('click', function() {
                    const userId = $(this).data('id');
                    if (confirm('Are you sure you want to delete this user?')) {
                        $.ajax({
                            url: `/users/${userId}`,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    alert(response.msg);
                                    location.reload();
                                } else {
                                    alert('Failed to delete the user.');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                                alert('An error occurred while deleting the company.');
                            }
                        });
                    }

                });

            });
        </script>
    </x-slot>
</x-app-layout>
