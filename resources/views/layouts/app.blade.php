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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   


    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class = "body bg-white ">
    <div class = "fixed w-full z-30 flex bg-white p-2 items-center justify-center h-16 px-10">
        <a href="{{ route('dashboard') }}"
            class = "font-bold logo ml-12 transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
            <img src="{{ asset('assets/img/JS_Books_Logo.png') }}" alt="" class="w-[30vw] sm:w-[10vw]">
        </a>
        <!-- SPACER -->
        <div class = "grow h-full flex items-center justify-center"></div>
       
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 "
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
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 ">{{ Auth::user()->name }}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate ">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">

                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                out</a>
                        </form>
                    </li>
                </ul>
            </div>
            
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                            toastr.clear(); toastr.error('An error occurred while fetching country details.');
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
