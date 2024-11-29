<x-app-layout>

    <div class ="overflow-y-auto overflow-x-hidden pt-6">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="/"
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
                        <a href="{{ route('leads.index') }}"
                            class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-indigo-400 dark:hover:text-white">Leads</a>
                    </div>
                </li>
            </ol>
        </nav>

        <section class="mt-4">
            <div class="rounded-t mb-0 px-4 border-0">
                <div class="flex flex-wrap gap-2 items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <form id="leadFilter" action="{{ route('leads.index') }}" method="GET">
                            <input type="hidden" id="statusFilter" name="status"
                                value="{{ request()->get('status') }}">
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                type="text" id="search" name="search" value="{{ request()->get('search') }}"
                                placeholder="Search leads..." onkeyup="this.form.submit()">
                        </form>
                        @if (request()->filled('search'))
                            <a href="{{ route('leads.index') }}"
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
                        type="button" onclick="showDiv('leadModal')">Add New</button>

                </div>
            </div>

            <div id="leadTable">
            @include('lead.partials.lead-table')
            </div>
        </section>
    </div>

    <div id="leadModal"
        class="absolute top-0 left-0 w-full h-[100vh] bg-[#30373cb5] p-4 z-100 flex justify-center items-center hidden">
        <div class="w-[55vw]">
            <!-- Modal Dialog -->
            <form id="leadForm">
                @csrf
                <div
                    class="flex z-50  flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 max-h-[70vh]">
                    <!-- Dialog Header -->
                    <div
                        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 id="leadModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Add New Lead</h3>

                        <button type="button" onclick="hideDiv('leadModal')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Dialog Body -->
                    <div class="px-4 overflow-y-auto ">
                        <div class="text-start px-4 py-6 pt-0">
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="firstName">
                                            First Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="first_name" id="firstName"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span class="error-text text-red-500 text-xs"></span>
                                    </div>

                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-600 text-xs font-semibold mb-2"
                                            for="lastName">
                                            Last Name<span class="text-red-500 text-lg">*</span>
                                        </label>
                                        <input type="text" name="last_name" id="lastName"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-gray-500 bg-white rounded text-sm shadow   focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            required>
                                        <span class="error-text text-red-500 text-xs"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Dialog Footer -->
                    <div
                        class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button type="button" onclick="hideDiv('leadModal')"
                            class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Close</button>
                        <button type="submit"
                            class="submitButton cursor-pointer whitespace-nowrap rounded-md bg-green-900 text-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</x-app-layout>