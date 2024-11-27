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
                        <a href="{{ route('admin.master') }}"
                            class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-indigo-400 dark:hover:text-white">Control
                            Panel</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div>
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-green-600 hover:text-green-600 dark:text-green-500 dark:hover:text-green-500 border-green-600 dark:border-green-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg " id="companies-styled-tab"
                            data-tabs-target="#styled-companies" type="button" role="tab" aria-controls="companies"
                            aria-selected="{{ session('activeTab') == 'companies' ? 'true' : 'false' }}">Companies</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg " id="clients-styled-tab"
                            data-tabs-target="#styled-clients" type="button" role="tab" aria-controls="clients"
                            aria-selected="{{ session('activeTab') == 'clients' ? 'true' : 'false' }}">Clients</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="vendors-styled-tab"
                            data-tabs-target="#styled-vendors" type="button" role="tab" aria-controls="vendors"
                            aria-selected="{{ session('activeTab') == 'vendors' ? 'true' : 'false' }}">Vendors</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg " id="exams-styled-tab"
                            data-tabs-target="#styled-exams" type="button" role="tab" aria-controls="exams"
                            aria-selected="{{ session('activeTab') == 'exams' ? 'true' : 'false' }}">Exams</button>
                    </li>

                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden" id="styled-companies" role="tabpanel" aria-labelledby="companies-tab">
                    <div class="rounded-t mb-0 px-4 border-0">
                        <div class="mt-4 flex flex-wrap gap-2 items-center justify-end">
                            <button
                                class="addCompanyBtn bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" onclick="showDiv('addCompanyModal')">Add Company</button>
                        </div>
                    </div>
                    <!-- Companies table will be loaded here -->
                    <div id="companies-table">

                    </div>

                </div>
                <div class="hidden" id="styled-clients" role="tabpanel" aria-labelledby="clients-tab">
                    <div class="rounded-t mb-0 px-4 border-0">
                        <div class="mt-4 flex flex-wrap gap-2 items-center justify-end">
                            <button
                                class="addClientBtn bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" onclick="showDiv('ClientModal')">Add Client</button>
                            {{-- <a href="{{ route('clients.create') }}"
                                class="bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Add
                                Client</a> --}}
                        </div>
                    </div>
                    <!-- Companies table will be loaded here -->
                    <div id="clients-table">

                    </div>

                </div>
                <div class="hidden" id="styled-vendors" role="tabpanel" aria-labelledby="vendors-tab">
                    <div class="rounded-t mb-0 px-4 border-0">
                        <div class="mt-4 flex flex-wrap gap-2 items-center justify-end">
                            <button
                                class="bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" onclick="showDiv('addVendorModal')">Add Vendor</button>
                        </div>
                    </div>
                    <!-- Vendor table will be loaded here -->
                    <div id="vendors-table">

                    </div>

                </div>
                <div class="hidden" id="styled-exams" role="tabpanel" aria-labelledby="exams-tab">
                    <div class="rounded-t mb-0 px-4 border-0">
                        <div class="mt-4 flex flex-wrap gap-2 items-center justify-end">
                            <button
                                class="AddExamFormBtn bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" onclick="showDiv('AddExamModal')">Add Exam</button>
                        </div>
                    </div>
                    <!-- Exam table will be loaded here -->
                    <div id="exams-table">

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--Add Vendor Modal-->
    <div id="addVendorModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="addVendor" action="{{ route('vendors.store') }}" method="POST">
                @csrf
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Create New Vendor</h3>
                        <button type="button" onclick="hideDiv('addVendorModal')">
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

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="vendor_name">
                                            Vendor Name
                                        </label>
                                        <input type="text" name="vendor_name" id="vendor_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Dialog Footer -->
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button type="button" onclick="hideDiv('addVendorModal')"
                                class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                            <button type="submit"
                                class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Edit Vendor Modal-->
    <div id="editVendorModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="editVendor" method="POST">
                @csrf
                @method('PUT')
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Edit Vendor</h3>
                        <button type="button" onclick="hideDiv('editVendorModal')">
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

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-4">
                                        <input type="hidden" name="vendor_id" id="edit_vendor_id">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_vendor_name">
                                            Vendor Name
                                        </label>
                                        <input type="text" name="vendor_name" id="edit_vendor_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>

                                </div>


                            </div>

                        </div>
                        <!-- Dialog Footer -->
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button type="button" onclick="hideDiv('editVendorModal')"
                                class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                            <button type="submit"
                                class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Add Exam Modal-->
    <div id="AddExamModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="AddExamForm" action="{{ route('exams.store') }}" method="POST">
                @csrf
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Create New Exam</h3>
                        <button type="button" onclick="hideDiv('AddExamModal')">
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

                                <div class="w-full px-4">

                                    <div class="relative group w-full mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="vendor_name">
                                            Vendor
                                        </label>
                                        <input type="hidden" name="vendor_id" data-dropdown-input required>
                                        <input type="button" value="Select Vendor" data-dropdown-button
                                            class="vendorDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list">

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="relative group w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_name">
                                            Exam
                                        </label>
                                        <input type="text" name="exam_name" placeholder="Type exam name.."
                                            class="text-left px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>

                                    <div class="relative group w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_code">
                                            Exam Code (If available)
                                        </label>
                                        <input type="text" name="exam_code" placeholder="Type exam code.."
                                            class="text-left px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('AddExamModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Edit Exam Modal-->
    <div id="EditExamModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="EditExamForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="exam_id" id="edit_exam_id" data-dropdown-input required>
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Edit exam</h3>
                        <button type="button" onclick="hideDiv('EditExamModal')">
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

                                <div class="w-full px-4">

                                    <div class="relative group w-full mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="vendor_name">
                                            Vendor
                                        </label>
                                        <input id="edit_exam_vendor_id" type="hidden" name="vendor_id"
                                            data-dropdown-input required>
                                        <input id="edit_exam_vendor_name" type="button" value="Select exam"
                                            data-dropdown-button
                                            class="vendorDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list">

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="relative group w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_name">
                                            Exam
                                        </label>
                                        <input id="edit_exam_name" type="text" name="exam_name"
                                            placeholder="Type exam name.."
                                            class="text-left px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>

                                    <div class="relative group w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_code">
                                            Exam Code (If available)
                                        </label>
                                        <input id="edit_exam_code" type="text" name="exam_code"
                                            placeholder="Type exam code.."
                                            class="text-left px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('EditExamModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Add Company Modal-->
    <div id="addCompanyModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden"
        onclick="hideOnClickOutside(event, 'addCompanyModal')">
        <div>
            <!-- Modal Dialog -->
            <form id="addCompany" action="{{ route('company.store') }}" method="POST">
                @csrf

                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Create New company</h3>
                        <button type="button" onclick="hideDiv('addCompanyModal')">
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
                                <div class="w-full px-4">
                                    <div class="relative w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="company_name">
                                            company Name
                                        </label>
                                        <input type="text" name="company_name" id="company_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>
                                    <div class="relative w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="display_name">
                                            Display Name (Optional)
                                        </label>
                                        <input type="text" name="display_name" id="display_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- Dialog Footer -->
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button type="button" onclick="hideDiv('addCompanyModal')"
                                class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                            <button type="submit"
                                class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Edit Company Modal-->
    <div id="editCompanyModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="editCompany" method="POST">
                @csrf
                @method('PUT')
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Edit company</h3>
                        <button type="button" onclick="hideDiv('editCompanyModal')">
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

                                <div class="w-full px-4">
                                    <div class="relative w-full mb-4">
                                        <input type="hidden" name="company_id" id="edit_company_id">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_company_name">
                                            company Name
                                        </label>
                                        <input type="text" name="company_name" id="edit_company_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>

                                    <div class="relative w-full mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_display_name">
                                            Display Name
                                        </label>
                                        <input type="text" name="display_name" id="edit_display_name"
                                            class=" px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded    focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- Dialog Footer -->
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button type="button" onclick="hideDiv('editCompanyModal')"
                                class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                            <button type="submit"
                                class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Add Client Modal-->
    <div id="ClientModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="ClientForm" method="POST">
                @csrf
                <input type="hidden" id="client_id" value="">
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-xl w-[70vw]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            Create New client</h3>
                        <button type="button" onclick="hideDiv('ClientModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start  py-6 pt-0">

                            <div class="flex gap-4 mb-4">
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full">
                                    <input checked id="company-radio" type="radio" value="0"
                                        name="is_individual"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="company-radio"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company</label>
                                </div>
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full">
                                    <input id="individual-radio" type="radio" value="1" name="is_individual"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="individual-radio"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Individual</label>
                                </div>
                            </div>

                            <div class="py-6 pt-0">
                                <div class="flex flex-wrap">

                                    <div class="w-full px-4 client-fields">
                                        <div class="relative w-full mb-4">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Organisation Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input type="text" name="client_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                id="client_name">
                                            <span id="error_client_name"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>

                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 individual-fields">
                                        <div class="relative w-full mb-3 individual-fields">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                First Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input type="text" name="individual_first_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                id="individual_first_name">
                                            <span id="error_individual_first_name"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 individual-fields">
                                        <div class="relative w-full mb-3 individual-fields">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Last Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input type="text" name="individual_last_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                id="individual_last_name">
                                            <span id="error_individual_last_name"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 relative">
                                        <div class="relative w-full mb-3 ">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                                Phone No
                                            </label>
                                            <div
                                                class="phone-input-container flex flex-col border-0 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 cursor-pointer">
                                                <!-- Input Section -->
                                                <div class="flex items-center">
                                                    <!-- Country Code Dropdown Button -->
                                                    <div data-dropdown-toggle="dropdown-phone"
                                                        class="country-code-button flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900">
                                                        <input type="hidden" value="+91"
                                                            class="country-code-input-field" name="country_code"
                                                            id="country_code">
                                                        <input type="button" value="+91"
                                                            class="country-code-input cursor-pointer"
                                                            id="country_code_btn">
                                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </div>
                                                    <!-- Phone Input Field -->
                                                    <div class="relative w-full">
                                                        <input id="phone" name="phone" type="text"
                                                            class="phone-input border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            pattern="[0-9]{10}" placeholder="123-456-7890" />
                                                    </div>
                                                </div>

                                                <!-- Dropdown Menu -->
                                                <div
                                                    class="country-dropdown hidden absolute top-full left-0 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-full dark:bg-gray-700 max-h-48 overflow-y-auto z-10">
                                                    <!-- Search Input -->
                                                    <div class="p-2">
                                                        <input type="text" placeholder="Search Country..."
                                                            class="country-search w-full px-2 py-1 text-sm text-gray-900 border border-gray-300 rounded dark:bg-gray-600 dark:text-white" />
                                                    </div>
                                                    <!-- Country List -->
                                                    <ul
                                                        class="country-list py-2 text-sm text-gray-700 dark:text-gray-200">
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Email
                                            </label>
                                            <input id="email" type="email" name="email"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">

                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Whatsapp
                                            </label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 19 18">
                                                        <path
                                                            d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                                    </svg>
                                                </div>
                                                <input id="whatsapp" name="whatsapp" type="text"
                                                    aria-describedby="helper-text-explanation"
                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 ps-10 p-2.5"
                                                    pattern="[0-9]{10}" placeholder="1234567890" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Address
                                            </label>
                                            <textarea id="address" rows="3" name="address"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                placeholder="Your address here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative group mb-4 dropdownBlock">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Country<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="country_id" type="hidden" name="country_id"
                                                data-dropdown-input>
                                            <input id="country_id_btn" type="button" value="Select Country"
                                                data-dropdown-button
                                                class="countryDropdownBtn text-left border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_country_id"
                                                class="error-text text-red-500 text-xs"></span>
                                            <div data-dropdown-menu
                                                class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                                <!-- Search input -->
                                                <input data-search-input
                                                    class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                    type="text" placeholder="Search items" autocomplete="off">
                                                <!-- Dropdown content goes here -->
                                                <ul class="dropdown-items-list">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative group mb-4 dropdownBlock">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                State<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="state_id" type="hidden" name="state_id" data-dropdown-input>
                                            <input id="state_id_btn" type="button" value="Select state"
                                                data-dropdown-button
                                                class="stateDropdownBtn text-left border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_state_id" class="error-text text-red-500 text-xs"></span>
                                            <div data-dropdown-menu
                                                class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                                <!-- Search input -->
                                                <input data-search-input
                                                    class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                    type="text" placeholder="Search items" autocomplete="off">
                                                <!-- Dropdown content goes here -->
                                                <ul class="dropdown-items-list">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative group mb-4 dropdownBlock">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                City
                                            </label>
                                            <input id="city_id" type="hidden" name="city_id" data-dropdown-input>
                                            <input id="city_id_btn" type="button" value="Select city"
                                                data-dropdown-button
                                                class="cityDropdownBtn text-left border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <div data-dropdown-menu
                                                class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                                <!-- Search input -->
                                                <input data-search-input
                                                    class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                    type="text" placeholder="Search items" autocomplete="off">
                                                <!-- Dropdown content goes here -->
                                                <ul class="dropdown-items-list">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                ZIP Code
                                            </label>
                                            <input id="zip_code" type="text" name="zip_code"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        </div>
                                    </div>

                                    <div class="w-full px-4 client-fields">
                                        <div class="relative w-full mb-3 client-fields">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                                Registration Type<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <select id="registration_type" name="registration_type"
                                                class="registration-type border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                <option value="" disabled selected>Select registration type
                                                </option>
                                                <option value="registered">Registered</option>
                                                <option value="unregistered">Unregistered</option>
                                                <option value="composition">Composition</option>
                                            </select>
                                            <span id="error_registration_type"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 gst-field client-fields">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                                GST No.<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="gst_no" type="text" name="gst_no"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_gst_no" class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 state-code-field client-fields">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                                State Code<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="state_code" type="text" name="state_code"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 pan-field">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                                PAN Card<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="pan_card" type="text" name="pan_card"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_pan_card" class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full px-4">
                                        <hr class="mt-6 border-b-1 border-blueGray-300">

                                        <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                            Bank Details
                                        </h6>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Bank Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="bank_name" type="text" name="bank_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_bank_name" class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Account Number<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="account_number" type="text" name="account_number"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_account_number"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                IFSC<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="ifsc" type="text" name="ifsc"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_ifsc" class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Beneficiary Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="beneficiary" type="text" name="beneficiary"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_beneficiary"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full px-4 client-fields">
                                        <hr class="mt-6 border-b-1 border-blueGray-300">

                                        <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                            Primary Person
                                        </h6>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3 client-fields">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                First Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="first_name" type="text" name="first_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_first_name"
                                                class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                    <div class="w-full lg:w-6/12 px-4 ">
                                        <div class="relative w-full mb-3 client-fields">
                                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                                for="">
                                                Last Name<span class="text-red-500 text-lg">*</span>
                                            </label>
                                            <input id="last_name" type="text" name="last_name"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <span id="error_last_name" class="error-text text-red-500 text-xs"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('ClientModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="submitButton cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>



    <x-slot name="script">



        <script>
            $(document).ready(function() {

                $('#addClientBtn').on('click', function() {
                    $("#individual-radio").prop("checked", false);
                    $("#company-radio").prop("checked", true);
                    $("#client_name").val("");
                    $("#individual_first_name").val("");
                    $("#individual_last_name").val("");
                    $("#country_code").val("+91");
                    $("#country_code_btn").val("+91");
                    $("#phone").val("");
                    $("#email").val("");
                    $("#whatsapp").val("");
                    $("#address").val("");
                    $("#country_id").val("");
                    $("#country_id_btn").val("");
                    $("#state_id").val("");
                    $("#state_id_btn").val("");
                    $("#city_id").val("");
                    $("#city_id_btn").val("");
                    $("#zip_code").val("");
                    $("#registration_type")[0].selectedIndex = 0;
                    $("#gst_no").val("");
                    $("#state_code").val("");
                    $("#pan_card").val("");
                    $("#bank_name").val("");
                    $("#account_number").val("");
                    $("#ifsc").val("");
                    $("#beneficiary").val("");
                    $("#first_name").val("");
                    $("#last_name").val("");

                    toggleFields();

                });

                $('select[name="registration_type"]').on('change', function() {
                    $('input[name="gst_no"]').val('');
                    $('input[name="state_code"]').val('');
                    $('input[name="pan_card"]').val('');
                    const selectedValue = $(this).val();

                    if (selectedValue === 'unregistered') {

                        $('.gst-field, .state-code-field').addClass('hidden');

                        $('.pan-field').removeClass('hidden');

                    } else {

                        $('.gst-field, .state-code-field, .pan-field').removeClass('hidden');;
                    }
                });

                // Trigger change event on page load to handle default state
                $('select[name="registration_type"]').trigger('change');

                $('input[name="gst_no"]').on('input', function() {
                    const gstNo = $(this).val().trim();

                    if (gstNo.length >= 12) {
                        const stateCode = gstNo.substring(0, 2);
                        const panCard = gstNo.substring(2, 12);

                        $('input[name="state_code"]').val(stateCode);
                        $('input[name="pan_card"]').val(panCard);
                    } else {
                        $('input[name="state_code"]').val('');
                        $('input[name="pan_card"]').val('');
                    }
                });

                $('[data-dropdown-button]').on('click', function() {
                    const $dropdownItemList = $('.dropdown-items-list');
                    $dropdownItemList.empty();
                    const $dropdownMenu = $(this).siblings('[data-dropdown-menu]');
                    $dropdownMenu.toggleClass('hidden');
                });

                $('.countryDropdownBtn').on('click', function() {
                    $.ajax({
                        url: "{{ route('api.getCountryDetails') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(country) {

                                const listItem = `
                    <li  data-id="${country.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${country.country_name}
                    </li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });

                $('.stateDropdownBtn').on('click', function() {
                    let $countryId = $('input[name="country_id"]').val();
                    let url = $countryId ? `{{ route('api.getStateDetails', ':countryId') }}`.replace(
                            ':countryId',
                            $countryId) :
                        `{{ route('api.getStateDetails') }}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(state) {

                                const listItem = `
                    <li  data-id="${state.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${state.state_name}
                    </li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });

                $('.cityDropdownBtn').on('click', function() {
                    let $stateId = $('input[name="state_id"]').val();
                    let url = $stateId ? `{{ route('api.getCityDetails', ':stateId') }}`.replace(':stateId',
                            $stateId) :
                        `{{ route('api.getCityDetails') }}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(city) {

                                const listItem = `
                    <li  data-id="${city.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${city.city_name}
                    </li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });

                function loadTabContent(tab) {
                    let url;
                    switch (tab) {
                        case 'vendors':
                            url = '{{ route('vendors.index') }}';
                            break;
                        case 'exams':
                            url = '{{ route('exams.index') }}';
                            break;
                        case 'companies':
                            url = '{{ route('company.index') }}';
                            break;
                        case 'clients':
                            url = '{{ route('clients.index') }}';
                            break;
                        default:
                            url = ''; // Fallback case if no match
                            break;
                    }

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $('#' + tab + '-table').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while loading the content.');
                        }
                    });
                }

                let activeTab = "{{ session('activeTab', 'companies') }}";
                loadTabContent(activeTab);

                $('#vendors-styled-tab').on('click', function() {

                    $(this).attr('aria-selected', 'true');

                    loadTabContent('vendors');
                });

                $('#exams-styled-tab').on('click', function() {

                    $(this).attr('aria-selected', 'true');

                    loadTabContent('exams');
                });

                $('#companies-styled-tab').on('click', function() {

                    $(this).attr('aria-selected', 'true');

                    loadTabContent('companies');
                });

                $('#clients-styled-tab').on('click', function() {

                    $(this).attr('aria-selected', 'true');

                    loadTabContent('clients');
                });

                $('#addVendor').submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success === true) {
                                //alert(response.msg);
                                toastr.success(response.msg);
                                $('#addVendorModal').addClass('hidden');
                                $('#vendors-styled-tab').trigger('click');
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

                $('.vendorDropdownBtn').on('click', function() {

                    $.ajax({
                        url: "{{ route('api.getActiveVendors') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(vendor) {
                                const listItem =
                                    `<li data-id="${vendor.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${vendor.vendor_name}</li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form.');
                        }
                    });
                });


                $('#AddExamForm').submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success === true) {
                                toastr.success(response.msg);
                                $('#AddExamModal').addClass('hidden');
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

                $('#addCompany').submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success === true) {
                                toastr.success(response.msg);
                                $('#addCompanyModal').addClass('hidden');
                                $('#companies-styled-tab').trigger('click');
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

                $('#ClientForm').submit(function(event) {
                    event.preventDefault();
                    const submitButton = $(this).find(".submitButton");
                    toggleSubmitButton(submitButton, true);
                    $('.error-text').text('');
                    const clientId = $('#client_id').val();
                    let formAction = clientId ? '{{ route('clients.update', ':clientId') }}' :
                        '{{ route('clients.store') }}';
                    if (clientId) {
                        formAction = formAction.replace(':clientId', clientId);
                    }
                    $(this).attr('action', formAction);
                    const method = clientId ? 'PUT' : 'POST';

                    $.ajax({
                        url: formAction,
                        type: method,
                        data: $(this).serialize(),
                        success: function(data) {
                            toggleSubmitButton(submitButton, false);
                            toastr.info(data.msg);
                            $('#ClientModal').addClass('hidden');
                            $('#clients-styled-tab').trigger('click');
                        },
                        error: function(error) {
                            toggleSubmitButton(submitButton, false);
                            if (error.responseJSON && error.responseJSON.errors) {
                                $.each(error.responseJSON.errors, function(key, value) {
                                    $(`#error_${key}`).text(value[0]);
                                });
                            } else {
                                alert('An error occurred while creating the client.');
                            }
                        }
                    });

                });

                $(document).on('click', '.dropdown-item', function() {
                    const $dropdownBlock = $(this).closest('.dropdownBlock');
                    const id = $(this).data('id');
                    const name = $(this).text().trim();

                    $dropdownBlock.find('[data-dropdown-input]').val(id);
                    $dropdownBlock.find('[data-dropdown-button]').val(name);
                    $dropdownBlock.find('[data-dropdown-menu]').addClass('hidden');
                });

            });
        </script>

        <script>
            const companyRadio = document.getElementById('company-radio');
            const individualRadio = document.getElementById('individual-radio');
            const clientFields = document.querySelectorAll('.client-fields');
            const individualFields = document.querySelectorAll('.individual-fields');
            const registrationType = document.getElementById("registration_type");

            companyRadio.addEventListener('change', function() {
                toggleFields();
            });

            individualRadio.addEventListener('change', function() {
                toggleFields();
            });

            function toggleFields() {
                if (individualRadio.checked) {
                    clientFields.forEach(field => {
                        field.classList.add('hidden');
                        registrationType.value = "unregistered";
                        registrationType.dispatchEvent(new Event("change"));
                    });
                    individualFields.forEach(field => {
                        field.classList.remove('hidden');
                    });

                } else {
                    clientFields.forEach(field => {
                        field.classList.remove('hidden');

                    });

                    individualFields.forEach(field => {
                        field.classList.add('hidden');

                    });
                }
            }

            toggleFields();
        </script>
    </x-slot>
</x-app-layout>
