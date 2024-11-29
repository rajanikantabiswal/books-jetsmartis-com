<x-app-layout>
    <div class ="overflow-y-auto overflow-x-hidden">
        <!--Candidate exam status filter-->


        <div class = "flex flex-wrap my-5 mt-10 -mx-2">

            <a href="{{ route('candidates.index') }}" class = "w-full lg:w-1/5 p-2">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r   from-green-900 to-green-500 rounded-md p-3">
                    <div
                        class = "flex text-green-900 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500">
                            <path
                                d="M15 8C15 9.65685 13.6569 11 12 11C10.3431 11 9 9.65685 9 8C9 6.34315 10.3431 5 12 5C13.6569 5 15 6.34315 15 8Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 4C17.6568 4 19 5.34315 19 7C19 8.22309 18.268 9.27523 17.2183 9.7423"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M13.7143 14H10.2857C7.91876 14 5.99998 15.9188 5.99998 18.2857C5.99998 19.2325 6.76749 20 7.71426 20H16.2857C17.2325 20 18 19.2325 18 18.2857C18 15.9188 16.0812 14 13.7143 14Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17.7143 13C20.0812 13 22 14.9188 22 17.2857C22 18.2325 21.2325 19 20.2857 19"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8 4C6.34315 4 5 5.34315 5 7C5 8.22309 5.73193 9.27523 6.78168 9.7423"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3.71429 19C2.76751 19 2 18.2325 2 17.2857C2 14.9188 3.91878 13 6.28571 13"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Total Candidates
                        </div>
                        <div id="totalCandidate" class = "">
                            {{ $totalCandidate }}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </a>

            <div class = "status-div w-full md:w-1/2 lg:w-1/5 p-2 cursor-pointer" data-status="passed">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r from-green-900 to-green-500 rounded-md p-3 @if (request()->has('status') && request()->status == 'passed') ring-offset-2 ring-4 ring-green-300 @endif">
                    <div
                        class = "flex text-green-900 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500 ">
                            <path
                                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Passed
                        </div>
                        <div id="passedCandidate" class = "">
                            {{ $passedCandidate }}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>

            <div class = "status-div w-full md:w-1/2 lg:w-1/5 p-2 cursor-pointer" data-status="failed">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500  from-green-900 to-green-500 rounded-md p-3 @if (request()->has('status') && request()->status == 'failed') ring-offset-2 ring-4 ring-green-300 @endif">
                    <div
                        class = "flex text-green-900 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500 ">
                            <path d="M14.9994 15L9 9M9.00064 15L15 9" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>

                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Failed
                        </div>
                        <div id="failedCandidate" class = "">
                            {{ $failedCandidate }}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>

            <div class = "status-div w-full md:w-1/2 lg:w-1/5 p-2 cursor-pointer" data-status="on-hold">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500  from-green-900 to-green-500 rounded-md p-3 @if (request()->has('status') && request()->status == 'on-hold') ring-offset-2 ring-4 ring-green-300 @endif">
                    <div
                        class = "flex text-green-900 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500">
                            <path
                                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path
                                d="M12.2422 17V12C12.2422 11.5286 12.2422 11.2929 12.0957 11.1464C11.9493 11 11.7136 11 11.2422 11"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11.992 8H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            On-Hold
                        </div>
                        <div id="onHoldCandidate" class = "">
                            {{ $onHoldCandidate }}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>

            <div class = "status-div w-full md:w-1/2 lg:w-1/5 p-2 cursor-pointer" data-status="rescheduled">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500  from-green-900 to-green-500 rounded-md p-3 @if (request()->has('status') && request()->status == 'rescheduled') ring-offset-2 ring-4 ring-green-300 @endif">
                    <div
                        class = "flex text-green-900 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                            <path
                                d="M14.4 7.5L15.3153 8.67019C15.8415 9.34278 15.7447 9.54545 14.8973 9.54545L9.6 9.54545C8.13846 9.54545 8 10.3125 8 11.5909M9.6 16.5L8.68465 15.3298C8.15854 14.6572 8.25535 14.4545 9.10274 14.4545H14.4C15.8615 14.4545 16 13.6875 16 12.4091"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Re-Scheduled
                        </div>
                        <div id="rescheduledCandidate" class = "">
                            {{ $rescheduledCandidate }}
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <!--Candidate table master filter-->
            <div class="rounded-t mb-0 px-4 border-0">
                <div class="flex flex-wrap gap-2 items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <form id="filter_form" action="{{ route('candidates.index') }}" method="GET">
                            <input type="hidden" id="status_filter" name="status"
                                value="{{ request()->get('status') }}">


                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                type="text" id="search" name="search" value="{{ request()->get('search') }}"
                                placeholder="Search candidates..." onkeyup="this.form.submit()">
                        </form>
                        @if (request()->filled('exam_code') ||
                                request()->filled('vendor_id') ||
                                request()->filled('search') ||
                                request()->filled('exam_id') ||
                                request()->filled('status') ||
                                request()->filled('conducted_by') ||
                                request()->filled('client_id') ||
                                (request()->filled('from') || request()->filled('to')))
                            <a href="{{ route('candidates.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 border border-1 border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white">
                                Remove Filter
                            </a>
                        @endif

                        <button data-tooltip-target="tooltip-right" data-tooltip-placement="right" type="button"
                            onclick="showDiv('filterModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" class="text-green-800" fill="none">
                                <path d="M13 4L3 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11 19L3 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M21 19L17 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 11.5L11 11.5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 4L19 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5 11.5L3 11.5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M14.5 2C14.9659 2 15.1989 2 15.3827 2.07612C15.6277 2.17761 15.8224 2.37229 15.9239 2.61732C16 2.80109 16 3.03406 16 3.5L16 4.5C16 4.96594 16 5.19891 15.9239 5.38268C15.8224 5.62771 15.6277 5.82239 15.3827 5.92388C15.1989 6 14.9659 6 14.5 6C14.0341 6 13.8011 6 13.6173 5.92388C13.3723 5.82239 13.1776 5.62771 13.0761 5.38268C13 5.19891 13 4.96594 13 4.5L13 3.5C13 3.03406 13 2.80109 13.0761 2.61732C13.1776 2.37229 13.3723 2.17761 13.6173 2.07612C13.8011 2 14.0341 2 14.5 2Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12.5 17C12.9659 17 13.1989 17 13.3827 17.0761C13.6277 17.1776 13.8224 17.3723 13.9239 17.6173C14 17.8011 14 18.0341 14 18.5L14 19.5C14 19.9659 14 20.1989 13.9239 20.3827C13.8224 20.6277 13.6277 20.8224 13.3827 20.9239C13.1989 21 12.9659 21 12.5 21C12.0341 21 11.8011 21 11.6173 20.9239C11.3723 20.8224 11.1776 20.6277 11.0761 20.3827C11 20.1989 11 19.9659 11 19.5L11 18.5C11 18.0341 11 17.8011 11.0761 17.6173C11.1776 17.3723 11.3723 17.1776 11.6173 17.0761C11.8011 17 12.0341 17 12.5 17Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.5 9.5C9.96594 9.5 10.1989 9.5 10.3827 9.57612C10.6277 9.67761 10.8224 9.87229 10.9239 10.1173C11 10.3011 11 10.5341 11 11L11 12C11 12.4659 11 12.6989 10.9239 12.8827C10.8224 13.1277 10.6277 13.3224 10.3827 13.4239C10.1989 13.5 9.96594 13.5 9.5 13.5C9.03406 13.5 8.80109 13.5 8.61732 13.4239C8.37229 13.3224 8.17761 13.1277 8.07612 12.8827C8 12.6989 8 12.4659 8 12L8 11C8 10.5341 8 10.3011 8.07612 10.1173C8.17761 9.87229 8.37229 9.67761 8.61732 9.57612C8.80109 9.5 9.03406 9.5 9.5 9.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div id="tooltip-right" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-green-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            More filters
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    <button
                        class="bg-green-900 text-white active:bg-green-500 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="showDiv('AddCandidateModal')">Add New</button>

                </div>
            </div>
            <!--Candidate table-->
            <div id="candidate-table">
                @include('candidate.partials.candidate-table', compact('candidates'))
            </div>
        </div>

    </div>

    <div id="AddCandidateModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="AddCandidateForm">
                @csrf
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-3xl">

                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 id="defaultModalTitle"
                            class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                            New Entry</h3>

                        <button type="button" onclick="hideDiv('AddCandidateModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start px-4 lg:px-10 py-6 pt-0">
                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Candidate Information
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="first_name">
                                            First Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="first_name" id="first_name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_first_name" class="error-text text-red-500 text-xs"></span>
                                    </div>

                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="last_name">
                                            Last Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="last_name" id="last_name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_last_name" class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4 relative">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                            Phone No
                                        </label>
                                        <div
                                            class="phone-input-container flex flex-col border-0 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 cursor-pointer">

                                            <div class="flex items-center">
                                                <div data-dropdown-toggle="dropdown-phone"
                                                    class="country-code-button flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900">
                                                    <input type="hidden" value="+91"
                                                        class="country-code-input-field" name="country_code">
                                                    <input type="button" value="+91"
                                                        class="country-code-input cursor-pointer">
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
                                                    <input name="phone" type="text"
                                                        class="phone-input border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                        placeholder="123-456-7890" />
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
                                                <ul class="country-list py-2 text-sm text-gray-700 dark:text-gray-200">
                                                </ul>
                                            </div>
                                        </div>
                                        <span id="error_phone" class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="email_id">
                                            Email address
                                        </label>
                                        <input type="email" name="email_id" id="email_id"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <span id="error_email_id" class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <!-- Company Field -->
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="company_name">
                                            Company Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" name="company_id" data-dropdown-input>
                                        <input type="button" value="Select Company" data-dropdown-button
                                            class="companyDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_company_id" class="error-text text-red-500 text-xs"></span>
                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list companyName">

                                            </ul>
                                        </div>
                                        <p class="text-xs text-gray-500 w-full">Please select "Unknown" if the company
                                            is not listed in the dropdown</p>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Exam Information
                            </h6>

                            <div class="flex flex-wrap">
                                <div class="w-full px-4">
                                    <!-- Search input field -->
                                    <div class="relative mb-4">
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path d="M14 14L16.5 16.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                    <path
                                                        d="M16.4333 18.5252C15.8556 17.9475 15.8556 17.0109 16.4333 16.4333C17.0109 15.8556 17.9475 15.8556 18.5252 16.4333L21.5667 19.4748C22.1444 20.0525 22.1444 20.9891 21.5667 21.5667C20.9891 22.1444 20.0525 22.1444 19.4748 21.5667L16.4333 18.5252Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M16 9C16 5.13401 12.866 2 9 2C5.13401 2 2 5.13401 2 9C2 12.866 5.13401 16 9 16C12.866 16 16 12.866 16 9Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </div>
                                            <input type="text" id="examSearch"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search exam code..." />
                                        </div>

                                        <ul id="examDropdown"
                                            class="absolute w-full mt-1 bg-white border rounded-lg shadow-lg max-h-60 overflow-auto hidden z-50">
                                        </ul>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4 ">
                                    <!-- Vendor Field -->
                                    <div class="relative group mb-4 dropdownBlock vendor">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="vendor_name">
                                            Vendor<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" id="vendor_id" name="vendor_id" data-dropdown-input>
                                        <input type="button" value="Select Vendor" name="vendor_name"
                                            data-dropdown-button
                                            class="vendorDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_vendor_id" class="error-text text-red-500 text-xs"></span>
                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list vendor">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_name">
                                            Exam Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" name="exam_id" data-dropdown-input>
                                        <input type="button" value="Select Exam" name="exam_name"
                                            data-dropdown-button
                                            class="examDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_exam_id" class="error-text text-red-500 text-xs"></span>
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

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Additional Information
                            </h6>

                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">Conducted
                                            Date<span class="text-red-500 text-lg">*</span></label>
                                        <input id="conducted_date" type="date" name="conducted_date"
                                            class="disable-future-date border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_conducted_date"
                                            class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">Exam
                                            Status<span class="text-red-500 text-lg">*</span></label>
                                        <select name="status" id="exam_status"
                                            class="border-0 px-3 py-3 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="passed" selected>Passed</option>
                                            <option value="failed">Failed</option>
                                            <option value="on-hold">On-Hold</option>
                                            <option value="rescheduled">Rescheduled
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full px-4 ">
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="conducted_by">
                                            Conducted By<span class="text-red-500 text-lg">*</span>
                                        </label>

                                        <input type="hidden" name="conducted_by" data-dropdown-input>
                                        <input type="button" value="Select User" data-dropdown-button
                                            class="conductedByDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_conducted_by" class="error-text text-red-500 text-xs"></span>

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

                                <div class="w-full px-4 dropdownBlock">
                                    <div class="relative group mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="client_name">
                                            Client<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" name="client_id" data-dropdown-input>
                                        <input type="button" value="Select Client" data-dropdown-button
                                            class="clientDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_client_id" class="error-text text-red-500 text-xs"></span>
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

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full my-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">Remark</label>
                                        <textarea name="remark" placeholder="(Optional)"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            rows="4">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('AddCandidateModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="submitButton cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="EditCandidateModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div>
            <!-- Modal Dialog -->
            <form id="EditCandidateForm">
                @csrf
                <input type="hidden" id="edit_candidate_id" name="candidate_id">
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[70vh] max-w-3xl">

                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 id="defaultModalTitle"
                            class="font-semibold tracking-wide text-neutral-900 dark:text-white">Edit Entry</h3>

                        <button type="button" onclick="hideDiv('EditCandidateModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start px-4 lg:px-10 py-6 pt-0">
                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Candidate Information
                            </h6>
                            <div class="flex flex-wrap">

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_first_name">
                                            First Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="first_name" id="edit_first_name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_edit_first_name"
                                            class="error-text text-red-500 text-xs"></span>
                                    </div>

                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_last_name">
                                            Last Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="last_name" id="edit_last_name"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_edit_last_name"
                                            class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4 relative">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">
                                            Phone No
                                        </label>
                                        <div
                                            class="phone-input-container flex flex-col border-0 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 cursor-pointer">

                                            <div class="flex items-center">
                                                <div data-dropdown-toggle="dropdown-phone"
                                                    class="country-code-button flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900">
                                                    <input type="hidden" value="+91"
                                                        class="country-code-input-field" name="country_code"
                                                        id="edit_country_code">
                                                    <input type="button" value="+91"
                                                        class="country-code-input cursor-pointer"
                                                        id="edit_country_code_btn">
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
                                                    <input name="phone" id="edit_phone" type="text"
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
                                                <ul class="country-list py-2 text-sm text-gray-700 dark:text-gray-200">
                                                </ul>
                                            </div>
                                        </div>
                                        <span id="error_edit_phone" class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_email_id">
                                            Email address
                                        </label>
                                        <input type="email" name="email_id" id="edit_email_id"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <span id="error_edit_email_id" class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                                <div class="w-full px-4">
                                    <!-- Company Field -->
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="edit_company_name">
                                            Company Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" id="edit_company_id" name="company_id"
                                            data-dropdown-input>
                                        <input type="button" id="edit_company_id_btn" value="Select Company"
                                            data-dropdown-button
                                            class="companyDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_edit_company_id"
                                            class="error-text text-red-500 text-xs"></span>

                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list companyName">

                                            </ul>
                                        </div>
                                        <p class="text-xs text-gray-500 w-full">Please select "Unknown" if the company
                                            is not listed in the dropdown</p>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Exam Information
                            </h6>

                            <div class="flex flex-wrap">
                                <div class="w-full px-4">
                                    <!-- Search input field -->
                                    <div class="relative mb-4">
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path d="M14 14L16.5 16.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linejoin="round" />
                                                    <path
                                                        d="M16.4333 18.5252C15.8556 17.9475 15.8556 17.0109 16.4333 16.4333C17.0109 15.8556 17.9475 15.8556 18.5252 16.4333L21.5667 19.4748C22.1444 20.0525 22.1444 20.9891 21.5667 21.5667C20.9891 22.1444 20.0525 22.1444 19.4748 21.5667L16.4333 18.5252Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M16 9C16 5.13401 12.866 2 9 2C5.13401 2 2 5.13401 2 9C2 12.866 5.13401 16 9 16C12.866 16 16 12.866 16 9Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </div>
                                            <input type="text" id="examSearch"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search exam code..." />
                                        </div>

                                        <ul id="examDropdown"
                                            class="absolute w-full mt-1 bg-white border rounded-lg shadow-lg max-h-60 overflow-auto hidden z-50">
                                        </ul>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <!-- Vendor Field -->
                                    <div class="relative group mb-4 dropdownBlock vendor">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="vendor_name">
                                            Vendor<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" id="edit_vendor_id" name="vendor_id"
                                            data-dropdown-input>
                                        <input type="button" id="edit_vendor_id_btn" value="Select Vendor"
                                            name="vendor_name" data-dropdown-button
                                            class="vendorDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_edit_vendor_id"
                                            class="error-text text-red-500 text-xs"></span>
                                        <div data-dropdown-menu
                                            class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                            <!-- Search input -->
                                            <input data-search-input
                                                class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                                type="text" placeholder="Search items" autocomplete="off">
                                            <!-- Dropdown content goes here -->
                                            <ul class="dropdown-items-list vendor">

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="exam_name">
                                            Exam Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" name="exam_id" data-dropdown-input id="edit_exam_id">
                                        <input type="button" value="Select Exam" name="exam_name"
                                            id="edit_exam_id_btn" data-dropdown-button
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_edit_exam_id" class="error-text text-red-500 text-xs"></span>

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

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">
                                Additional Information
                            </h6>

                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">Conducted
                                            Date<span class="text-red-500 text-lg">*</span></label>
                                        <input id="edit_conducted_date" type="date" name="conducted_date"
                                            class="disable-future-date border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span id="error_edit_conducted_date"
                                            class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2">Exam
                                            Status<span class="text-red-500 text-lg">*</span></label>
                                        <select name="status" id="edit_exam_status"
                                            class="border-0 px-3 py-3 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="passed" selected>Passed</option>
                                            <option value="failed">Failed</option>
                                            <option value="on-hold">On-Hold</option>
                                            <option value="rescheduled">Rescheduled
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full px-4 ">
                                    <div class="relative group mb-4 dropdownBlock">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="conducted_by">
                                            Conducted By<span class="text-red-500 text-lg">*</span>
                                        </label>

                                        <input type="hidden" name="conducted_by" data-dropdown-input
                                            id="edit_conducted_by">
                                        <input type="button" value="Select User" data-dropdown-button
                                            id="edit_conducted_by_btn"
                                            class="conductedByDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_edit_conducted_by"
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

                                <div class="w-full px-4 dropdownBlock">
                                    <div class="relative group mb-4">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="client_name">
                                            Client<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="hidden" name="client_id" data-dropdown-input
                                            id="edit_client_id">
                                        <input type="button" value="Select Client" data-dropdown-button
                                            id="edit_client_id_btn"
                                            class="clientDropdownBtn border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150 text-left">
                                        <span id="error_edit_client_id"
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

                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">

                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full my-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">Remark</label>
                                        <textarea name="remark" placeholder="(Optional)" id="edit_remark"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            rows="4">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('EditCandidateModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="submitButton cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="filterModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">

        <!-- Modal Dialog -->
        <form class="w-[50vw]" action="{{ route('candidates.index') }}" method="GET">
            @csrf
            <div
                class=" z-50 p-5 overflow-auto rounded-md border border-neutral-300 bg-white text-neutral-600 max-h-[70vh] relative">
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b border-neutral-300 mb-4 pb-4">
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                        Filters</h3>
                    <button type="button" onclick="hideDiv('filterModal')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex gap-4 w-full">

                    <div class="w-full lg:w-6/12 px-4">
                        <!-- Vendor Field -->
                        <div class="relative group mb-4 dropdownBlock">
                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2" for="vendor_name">
                                Exam Code
                            </label>
                            <input type="hidden" name="exam_code" data-dropdown-input>
                            <input type="button" value="Select exam code" data-dropdown-button
                                class="examCodeDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <div data-dropdown-menu
                                class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                <!-- Search input -->
                                <input data-search-input
                                    class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                    type="text" placeholder="Search items" autocomplete="off">
                                <!-- Dropdown content goes here -->
                                <ul class="dropdown-items-list vendor">

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4 vendor">
                        <!-- Vendor Field -->
                        <div class="relative group mb-4 dropdownBlock">
                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2" for="vendor_name">
                                Vendor
                            </label>
                            <input type="hidden" id="filterVendorId" name="vendor_id" data-dropdown-input>
                            <input type="button" value="Select Vendor" name="vendor_name" data-dropdown-button
                                class="vendorDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <div data-dropdown-menu
                                class="hidden w-full absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1 z-50">
                                <!-- Search input -->
                                <input data-search-input
                                    class="block w-full px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none"
                                    type="text" placeholder="Search items" autocomplete="off">
                                <!-- Dropdown content goes here -->
                                <ul class="dropdown-items-list vendor">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative group mb-4 dropdownBlock">
                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2" for="exam_name">
                                Exam Name
                            </label>
                            <input type="hidden" name="exam_id" data-dropdown-input>
                            <input type="button" value="Select Exam" name="exam_name" data-dropdown-button
                                class="filterExamDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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
                </div>

                <div class="flex gap-4 w-full">
                    <div class="w-full px-4">
                        <label for="" class="block uppercase text-gray-600 text-xs font-semibold mb-2">Exam
                            Status</label>
                        <select name="status"
                            class="text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <option value="">Select</option>
                            <option value="passed" {{ request()->get('status') == 'passed' ? 'selected' : '' }}>
                                Passed
                            </option>
                            <option value="failed" {{ request()->get('status') == 'failed' ? 'selected' : '' }}>
                                Failed
                            </option>
                            <option value="on-hold" {{ request()->get('status') == 'on-hold' ? 'selected' : '' }}>
                                On-Hold</option>
                            <option value="rescheduled"
                                {{ request()->get('status') == 'rescheduled' ? 'selected' : '' }}>Rescheduled</option>
                        </select>
                    </div>


                    <div class="w-full px-4 ">
                        <!-- Company Field -->
                        <div class="relative group mb-4 dropdownBlock">
                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                for="conducted_by">
                                Conducted By
                            </label>

                            <input type="hidden" name="conducted_by" data-dropdown-input>
                            <input type="button" value="Select User" data-dropdown-button
                                class="conductedByDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">

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
                    <div class="w-full px-4 dropdownBlock">
                        <!-- Company Field -->
                        <div class="relative group mb-4">
                            <label class="block uppercase text-gray-600 text-xs font-semibold mb-2" for="client_name">
                                Client
                            </label>
                            <input type="hidden" name="client_id" data-dropdown-input>
                            <input type="button" value="Select Client" data-dropdown-button
                                class="clientDropdownBtn text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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





                </div>

                <div class="flex gap-4 w-full">
                    <div class="mb-3 w-full lg:w-4/12 px-3">
                        <label for=""
                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">From</label>
                        <input type="date" name="from_date"
                            class="disable-future-date text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ request()->get('from_date') }}" />
                    </div>
                    <div class="mb-3 w-full lg:w-4/12 px-3">
                        <label for=""
                            class="block uppercase text-gray-600 text-xs font-semibold mb-2">To</label>
                        <input type="date" name="to_date"
                            class="disable-future-date text-left cursor-pointer px-3 py-4 placeholder-blueGray-300 text-gray-500 bg-white text-sm border border-gray-200 rounded focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ request()->get('to_date') }}" />
                    </div>
                </div>

                <!-- Dialog Footer -->
                <div
                    class="mt-6 flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 pt-4 sm:flex-row sm:items-center md:justify-end">
                    <button type="button" onclick="hideDiv('filterModal')"
                        class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                    <button type="submit"
                        class="cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Apply
                        Filter</button>
                </div>

            </div>

        </form>

    </div>

    <x-slot name="script">
        <script>
            // if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            //     const dataTable = new simpleDatatables.DataTable("#filter-table", {
            //         perPage: 10,
            //         perPageSelect: false,
            //         searchable: false,
            //         sortable: true,
            //         responsive: true,
            //         scrollX: true,

            //     });
            // }
            
            document.addEventListener("DOMContentLoaded", function() {
                const dateInput = document.getElementById('conducted_date');
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
            });

            document.querySelectorAll('.status-div').forEach(div => {
                div.addEventListener('click', () => {
                    const status = div.getAttribute('data-status');
                    document.getElementById('status_filter').value = status;
                    document.querySelector('#filter_form').submit();
                });
            });


            $(document).ready(function() {
                const searchField = $('#search');
                if (searchField.val()) {
                    searchField.focus();
                    searchField[0].setSelectionRange(searchField.val().length, searchField.val().length);
                }

                $('[data-dropdown-button]').on('click', function() {
                    const $dropdownItemList = $('.dropdown-items-list');
                    $dropdownItemList.empty();
                    const $dropdownMenu = $(this).siblings('[data-dropdown-menu]');
                    $dropdownMenu.toggleClass('hidden'); // Toggle visibility
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
                                    `<li data-id="${vendor.id}" class="dropdown-item block px-4 py-2 text-gray-700  hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${vendor.vendor_name}</li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data');
                        }
                    });
                });

                $('.examDropdownBtn').on('click', function() {
                    let $vendorId = $('#vendor_id').val();
                    let url = $vendorId ? `{{ route('api.getExams', ':vendorId') }}`.replace(':vendorId',
                            $vendorId) :
                        `{{ route('api.getExams') }}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            if (response.success === false) {
                                toastr.clear(); toastr.success(response.msg);
                            } else {
                                const $dropdownItemList = $('.dropdown-items-list');
                                $dropdownItemList.empty();
                                response.forEach(function(exam) {

                                    const listItem =
                                        `<li data-id="${exam.id}" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${exam.exam_name}</li>`;
                                    $dropdownItemList.append(listItem);


                                });
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('#edit_exam_id_btn').on('click', function() {
                    let $vendorId = $('#edit_vendor_id').val();
                    let url = $vendorId ? `{{ route('api.getExams', ':vendorId') }}`.replace(':vendorId',
                            $vendorId) :
                        `{{ route('api.getExams') }}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            if (response.success === false) {
                                toastr.clear(); toastr.success(response.msg);
                            } else {
                                const $dropdownItemList = $('.dropdown-items-list');
                                $dropdownItemList.empty();
                                response.forEach(function(exam) {

                                    const listItem =
                                        `<li data-id="${exam.id}" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${exam.exam_name}</li>`;
                                    $dropdownItemList.append(listItem);


                                });
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('.filterExamDropdownBtn').on('click', function() {

                    let $vendorId = $('#filterVendorId').val();

                    let url = $vendorId ? `{{ route('api.getExams', ':vendorId') }}`.replace(':vendorId',
                            $vendorId) :
                        `{{ route('api.getExams') }}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(exam) {

                                const listItem =
                                    `<li data-id="${exam.id}" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${exam.exam_name}</li>`;
                                $dropdownItemList.append(listItem);


                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('.examCodeDropdownBtn').on('click', function() {

                    $.ajax({
                        url: "{{ route('api.getExamCodes') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(examCode) {
                                const listItem =
                                    `<li data-id="${examCode}" class="dropdown-item block px-4 py-2 text-gray-700  hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${examCode}</li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('.companyDropdownBtn').on('click', function() {

                    $.ajax({
                        url: "{{ route('api.getCompanyDetails') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');

                            $dropdownItemList.empty();
                            response.forEach(function(company) {
                                const displayName = company.display_name ?
                                    ` (${company.display_name})` : '';
                                const listItem =
                                    `<li  data-id="${company.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">${company.company_name} ${displayName}</li>`;

                                $dropdownItemList.append(listItem);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('.conductedByDropdownBtn').on('click', function() {
                    $.ajax({
                        url: "{{ route('api.getUserList') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(user) {
                                const listItem = `
                    <li data-id="${user.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">
                        ${user.name}
                    </li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });

                $('.clientDropdownBtn').on('click', function() {
                    $.ajax({
                        url: "{{ route('api.getClients') }}",
                        type: 'GET',
                        success: function(response) {
                            const $dropdownItemList = $('.dropdown-items-list');
                            $dropdownItemList.empty();
                            response.forEach(function(client) {
                                const listItem = `<li data-id="${client.id}"
                        class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">
                        ${client.client_name}
                    </li>`;
                                $dropdownItemList.append(
                                    listItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            toastr.clear(); toastr.error('An error occurred while fetching data.');
                        }
                    });
                });




                $("#AddCandidateForm").submit(function(e) {
                    e.preventDefault();
                    const submitButton = $(this).find(".submitButton");
                    toggleSubmitButton(submitButton, true);
                    $('.error-text').text('');
                    var formData = $(this).serialize();

                    $.ajax({
                        url: "{{ route('candidates.store') }}",
                        type: "POST",
                        data: formData,
                        success: function(data) {
                            toggleSubmitButton(submitButton, false);
                            toastr.clear(); toastr.info(data.msg);
                            $('#AddCandidateModal').addClass('hidden');
                            fetchTableData("{{ route('candidates.index') }}");
                            //location.reload();
                        },
                        error: function(error) {
                            toggleSubmitButton(submitButton, false);
                            if (error.responseJSON && error.responseJSON.errors) {
                                $.each(error.responseJSON.errors, function(key, value) {
                                    $(`#error_${key}`).text(value[0]);
                                });
                            } else {
                                toastr.clear(); toastr.error('An error occurred while creating the candidate.');
                            }
                        }
                    });


                });

                $(document).on('click', '.edit-button',function() {
                    var candidateId = $(this).attr('data-id');
                    $("#edit_candidate_id").val(candidateId);

                    var url = '{{ route('getCandidate', ':cId') }}';
                    url = url.replace(':cId', candidateId);


                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(data) {
                            if (data.success == true) {
                                var candidate = data.data;
                                $("#edit_first_name").val(candidate[0].first_name);
                                $("#edit_last_name").val(candidate[0].last_name);
                                $("#edit_country_code").val(candidate[0].country_code);
                                $("#edit_country_code_btn").val(candidate[0].country_code);
                                $("#edit_phone").val(candidate[0].phone);
                                $("#edit_email_id").val(candidate[0].email_id);
                                $("#edit_company_id").val(candidate[0].company_id);
                                $("#edit_company_id_btn").val(candidate[0].company['company_name']);
                                $("#edit_examCode").val(candidate[0].exam_code);
                                $("#edit_vendor_id").val(candidate[0].vendor_id);
                                $("#edit_vendor_id_btn").val(candidate[0].vendor['vendor_name']);
                                $("#edit_exam_id").val(candidate[0].exam_id);
                                $("#edit_exam_id_btn").val(candidate[0].exam['exam_name']);
                                $("#edit_conducted_date").val(candidate[0].conducted_date);
                                $("#edit_conducted_by").val(candidate[0].conducted_by);
                                $("#edit_conducted_by_btn").val(candidate[0].conducted_user[
                                    'name']);
                                $("#edit_client_id").val(candidate[0].client_id);
                                $("#edit_client_id_btn").val(candidate[0].client['client_name']);
                                $("#edit_exam_status").val(candidate[0].status).change();
                                $("#edit_remark").val(candidate[0].remark);
                            } else {
                                toastr.clear(); toastr.info(data.msg);
                            }
                        }
                    })
                });

                $("#EditCandidateForm").submit(function(e) {
                    e.preventDefault();
                    const submitButton = $(this).find(".submitButton");
                    toggleSubmitButton(submitButton, true);
                    $('.error-text').text('');
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "{{ url('candidates/update') }}",
                        type: "PUT",
                        data: formData,
                        success: function(data) {
                            toggleSubmitButton(submitButton, false);
                            toastr.clear(); toastr.info(data.msg);
                            $('#EditCandidateModal').addClass('hidden');
                            fetchTableData("{{ route('candidates.index') }}");
                        },
                        error: function(error) {
                            toggleSubmitButton(submitButton, false);
                            if (error.responseJSON && error.responseJSON.errors) {
                                $.each(error.responseJSON.errors, function(key, value) {
                                    $(`#error_edit_${key}`).text(value[0]);
                                });
                            } else {
                                toastr.clear(); toastr.error('An error occurred while updating the candidate.');
                            }
                        }
                    });
                });

                $(document).on('click', '.delete-button',function() {
                    var candidateId = $(this).attr('data-id');

                    if (!confirm("Please confirm to delete?")) {
                        return; // Stop if the user does not confirm
                    }

                    $.ajax({
                        url: "{{ url('candidates') }}/" + candidateId, // Construct the delete URL
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success === true) {
                                toastr.clear(); toastr.success(response.msg);
                                fetchTableData("{{ route('candidates.index') }}");
                            } else {
                                toastr.clear(); toastr.error(response.msg);
                            }
                        }
                    });
                });


                $('#examSearch').on('input', function() {
                    let searchTerm = $(this).val().trim();

                    if (searchTerm.length > 0) {
                        // Show the dropdown
                        $('#examDropdown').removeClass('hidden');

                        // Make the AJAX request to fetch exam codes
                        $.ajax({
                            url: "{{ route('api.searchExamCodes') }}", // Your endpoint to fetch exam codes
                            method: 'GET',
                            data: {
                                term: searchTerm
                            },
                            success: function(response) {
                                $('#examDropdown').empty();
                                if (response.length > 0) {
                                    // Loop through the exams and append to the dropdown
                                    response.forEach(function(exam) {
                                        $('#examDropdown').append(`
                                <li class="cursor-pointer p-2 hover:bg-gray-200 hover:text-blue-600" data-exam-code="${exam.exam_code}">
                                    ${exam.exam_code}
                                </li>
                            `);
                                    });
                                } else {
                                    $('#examDropdown').append(
                                        '<li class="p-2 text-gray-500">No exams found</li>');
                                }
                            }
                        });
                    } else {
                        // Hide dropdown if input is empty
                        $('#examDropdown').addClass('hidden');
                    }
                });

                $(document).on('click', '#examDropdown li', function() {
                    let examCode = $(this).data('exam-code');
                    $('#examSearch').val(examCode);
                    $('#examDropdown').addClass('hidden');
                    fetchExamData(examCode);
                });

                function fetchExamData(examCode) {
                    $.ajax({
                        url: "{{ route('api.getExamByCode') }}", // Your endpoint to fetch exam details by exam code
                        method: 'GET',
                        data: {
                            exam_code: examCode
                        },
                        success: function(response) {
                            $('input[name="vendor_id"]').val(response.vendor_id);
                            $('input[name="vendor_name"]').val(response.vendor.vendor_name);
                            $('input[name="exam_id"]').val(response.id);
                            $('input[name="exam_name"]').val(response.exam_name);
                        }
                    });
                }

                $(document).on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    const url = $(this).attr('href');
                    fetchTableData(url);
                });

                function fetchTableData(url) {
                    showLoader();
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $('#candidate-table').html(response.candidateTable);
                            $('#totalCandidate').text(response.totalCandidate);
                            $('#passedCandidate').text(response.passedCandidate);
                            $('#failedCandidate').text(response.failedCandidate);
                            $('#onHoldCandidate').text(response.onHoldCandidate);
                            $('#rescheduledCandidate').text(response.rescheduledCandidate);
                            hideLoader();
                        },
                        error: function() {
                            alert('Something went wrong!');
                        }
                    });
                }

            });
        </script>


    </x-slot>
</x-app-layout>
