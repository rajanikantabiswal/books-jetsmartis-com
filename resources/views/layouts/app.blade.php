<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ config('app.name', 'SmartBooks') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class = "body bg-white dark:bg-[#0F172A]">
    <div class = "fixed w-full z-30 flex bg-white dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
        <a href="{{ route('dashboard') }}"
            class = "font-bold logo ml-12 dark:text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
            <img src="{{ asset('assets/img/JS_Books_Logo.png') }}" alt="" class="w-[30vw] sm:w-[10vw]">
        </a>
        <!-- SPACER -->
        <div class = "grow h-full flex items-center justify-center"></div>
        {{-- <div class = "flex-none h-full text-center flex items-center justify-center">
            <div class = "text-left">
                <!-- User Pic -->
                <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
                    class="relative flex items-center">
                    <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                        @keydown.space.prevent="openWithKeyboard = true"
                        @keydown.enter.prevent="openWithKeyboard = true" @keydown.down.prevent="openWithKeyboard = true"
                        class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                        aria-controls="userMenu">
                        <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="User Profile"
                            class="size-10 rounded-full object-cover" />
                    </button>
                    <!-- User Dropdown -->
                    <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity
                         @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
                        @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                        id="userMenu"
                        class="absolute right-0 top-12 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900">
                        <li class="border-b border-neutral-300 dark:border-neutral-700">
                            <div class="flex flex-col px-4 py-2">
                                <span class="text-sm font-medium text-neutral-900 dark:text-white">{{Auth::user()->name}}</span>
                                <p class="text-xs text-neutral-600 dark:text-neutral-300">{{Auth::user()->user_type}}</p>
                            </div>
                        </li>
                        <li><a href="{{route('profile.edit')}}"
                                class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Profile</a>
                        </li>
                        <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                        class= "block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Sign
                                        Out</a>
                                </form>
                            </li>
                    </ul>
                </li>
            </div>

        </div> --}}

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if (Auth::user()->roles->contains('name', 'admin'))
                    <img src="{{ asset('assets/img/admin-avatar.png') }}" alt="User Profile"
                        class="size-10 rounded-full object-cover" />
                @else
                    <img src="{{ asset('assets/img/user-avatar.png') }}" alt="User Profile"
                        class="size-10 rounded-full object-cover" />
                @endif
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">

                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button> --}}
        </div>
    </div>
    @include('layouts.navigation')
    <!-- CONTENT -->
    <main class="content h-screen ml-12 transform ease-in-out duration-500 pt-10 px-2 md:px-5 pb-4 flex flex-col">
        {{ $slot }}
    </main>

    <script>
        const baseUrl = @json(url('/'));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    @isset($script)
        {{ $script }}
    @endisset

    <script>
        $(document).ready(function() {
            
            $(document).on('click', '.dropdown-item', function() {
                const $dropdownBlock = $(this).closest('.dropdownBlock');
                const id = $(this).data('id');
                const name = $(this).text().trim();

                $dropdownBlock.find('[data-dropdown-input]').val(id);
                $dropdownBlock.find('[data-dropdown-button]').val(name);
                $dropdownBlock.find('[data-dropdown-menu]').addClass('hidden');

                if ($dropdownBlock.find('.vendor').length) {
                    // Set the vendor field
                    $dropdownBlock.find('[data-dropdown-input]').val(id);
                    $dropdownBlock.find('[data-dropdown-button]').val(name);

                    // Reset the exam field if the vendor is changed
                    $('input[name="exam_id"]').val(''); // Clear the exam ID
                    $('input[name="exam_name"]').val('Select Exam'); // Reset the exam button value

                }
            });

            $('.country-code-button').on('click', function() {
                const $dropdown = $(this).closest('.phone-input-container').find('.country-dropdown');

                // Toggle visibility
                $dropdown.toggleClass('hidden');

                // Fetch country details if not already loaded
                if ($dropdown.find('.country-list').children().length === 0) {
                    $.ajax({
                        url: "{{ route('api.getCountryDetails') }}",
                        type: 'GET',
                        success: function(response) {
                            const $countryList = $dropdown.find('.country-list');
                            response.forEach(function(country) {
                                const listItem = `<li>
                        <button type="button"
                        class="country-option inline-flex text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-country-code="${country.country_code}">
                        <span class="inline-flex items-center">${country.country_name} (${country.country_code})</span>
                        </button>
                        </li>`;
                                $countryList.append(listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while fetching country details.');
                        }
                    });
                }
            });

            // Handle Country Search
            $('.country-search').on('input', function() {
                const searchInput = $(this).val().toLowerCase();
                $(this).closest('.country-dropdown').find('.country-list li').each(function() {
                    const countryText = $(this).text().toLowerCase();
                    $(this).toggle(countryText.includes(searchInput));
                });
            });

            // jQuery version
            $('input[data-search-input]').on('input', function() {
                const query = $(this).val().toLowerCase();
                $('.dropdown-items-list .dropdown-item').each(function() {
                    const itemText = $(this).text().toLowerCase();
                    if (itemText.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Handle Country Selection
            $(document).on('click', '.country-option', function() {
                const countryCode = $(this).data('country-code');
                $(this).closest('.phone-input-container').find('.country-code-input').val(countryCode);
                $(this).closest('.phone-input-container').find('.country-code-input-field').val(
                    countryCode);
                $(this).closest('.country-dropdown').addClass('hidden');
            });
        });
    </script>
</body>

</html>
