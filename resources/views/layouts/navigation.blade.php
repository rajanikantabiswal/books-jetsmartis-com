<aside
    class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-30 flex h-screen bg-green-950 ">

    <!-- open sidebar button -->
    <div
        class = "max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white dark:border-[#0F172A] bg-green-950  absolute top-2 rounded-full h-12">

        <div
            class = "w-full flex items-center space-x-3 group bg-gradient-to-r from-green-700 via-green-500 to-green-500 pl-4 px-2 py-1 ml-1 rounded-full text-white">
            <div class= "transform ease-in-out duration-300 text-nowrap text-center">
                JetSmart IT Services
            </div>
        </div>
    </div>
    <div onclick="openNav()"
        class = "-right-6 transition transform ease-in-out duration-500 flex border-4 border-white dark:border-[#0F172A] bg-green-950 dark:hover:bg-blue-500 hover:bg-green-500 absolute top-2 p-3 rounded-full text-white hover:rotate-45">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor"
            class="w-4 h-4">
            <path strokeLinecap="round" strokeLinejoin="round"
                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
        </svg>
    </div>
    <!-- MAX SIDEBAR-->
    <div class= "max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)] justify-between">
        <div>

            <a href="{{ route('dashboard') }}"
                class =  "hover:ml-4 w-full text-white hover:text-green-500 dark:hover:text-blue-500 bg-green-950 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
                <div>
                    Dashboard
                </div>
            </a>

            <a href="{{ route('candidates.index') }}"
                class =  "hover:ml-4 w-full text-white hover:text-green-500 dark:hover:text-blue-500 bg-green-950 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-4 h-4">
                    <path d="M14 8.99988H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M14 12.4999H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <rect x="2" y="2.99988" width="20" height="18" rx="5" stroke="currentColor"
                        stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M5 15.9999C6.20831 13.4188 10.7122 13.249 12 15.9999" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M10.5 8.99988C10.5 10.1044 9.60457 10.9999 8.5 10.9999C7.39543 10.9999 6.5 10.1044 6.5 8.99988C6.5 7.89531 7.39543 6.99988 8.5 6.99988C9.60457 6.99988 10.5 7.89531 10.5 8.99988Z"
                        stroke="currentColor" stroke-width="1.5" />
                </svg>

                <div>
                    Exam Activity Log
                </div>
            </a>
            @can('isAdmin')
                <a href="{{ route('users.index') }}"
                    class =  "hover:ml-4 w-full text-white hover:text-green-500 dark:hover:text-blue-500 bg-green-950 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path
                            d="M18.6161 20H19.1063C20.2561 20 21.1707 19.4761 21.9919 18.7436C24.078 16.8826 19.1741 15 17.5 15M15.5 5.06877C15.7271 5.02373 15.9629 5 16.2048 5C18.0247 5 19.5 6.34315 19.5 8C19.5 9.65685 18.0247 11 16.2048 11C15.9629 11 15.7271 10.9763 15.5 10.9312"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path
                            d="M4.48131 16.1112C3.30234 16.743 0.211137 18.0331 2.09388 19.6474C3.01359 20.436 4.03791 21 5.32572 21H12.6743C13.9621 21 14.9864 20.436 15.9061 19.6474C17.7889 18.0331 14.6977 16.743 13.5187 16.1112C10.754 14.6296 7.24599 14.6296 4.48131 16.1112Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M13 7.5C13 9.70914 11.2091 11.5 9 11.5C6.79086 11.5 5 9.70914 5 7.5C5 5.29086 6.79086 3.5 9 3.5C11.2091 3.5 13 5.29086 13 7.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    <div>
                        Users
                    </div>
                </a>

                <a href="{{ route('admin.master') }}"
                    class =  "hover:ml-4 w-full text-white hover:text-green-500 dark:hover:text-blue-500 bg-green-950 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path
                            d="M20 10C19.9641 7.52043 19.7801 6.11466 18.8365 5.17157C17.6643 4 15.7776 4 12.0043 4C8.23106 4 6.34442 4 5.17221 5.17157C4 6.34315 4 8.22876 4 12C4 15.7712 4 17.6569 5.17221 18.8284C6.23545 19.8911 7.88646 19.9899 11 19.9991"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M18 19.7143V21M18 19.7143C16.8432 19.7143 15.8241 19.1461 15.2263 18.2833M18 19.7143C19.1568 19.7143 20.1759 19.1461 20.7737 18.2833M18 13.2857C19.1569 13.2857 20.1761 13.854 20.7738 14.7169M18 13.2857C16.8431 13.2857 15.8239 13.854 15.2262 14.7169M18 13.2857V12M22 13.9286L20.7738 14.7169M14.0004 19.0714L15.2263 18.2833M14 13.9286L15.2262 14.7169M21.9996 19.0714L20.7737 18.2833M20.7738 14.7169C21.1273 15.2271 21.3333 15.8403 21.3333 16.5C21.3333 17.1597 21.1272 17.773 20.7737 18.2833M15.2262 14.7169C14.8727 15.2271 14.6667 15.8403 14.6667 16.5C14.6667 17.1597 14.8728 17.773 15.2263 18.2833"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9.5 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M14.5 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M9.5 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4 9.5L2 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4 14.5L2 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M22 9.5L20 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 8H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <div>
                        Control Panel
                    </div>
                </a>
            @endcan

            <a href="{{ route('enquiries.index') }}"
                class =  "hover:ml-4 w-full text-white hover:text-green-500 dark:hover:text-blue-500 bg-green-950 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-4 h-4">
                    <path d="M16.0001 16.5L20 20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18 11.5C18 15.366 14.866 18.5 11 18.5C7.13401 18.5 4 15.366 4 11.5C4 7.63404 7.13401 4.50003 11 4.50003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.5 3.50003L15.7579 4.19706C16.0961 5.11105 16.2652 5.56805 16.5986 5.90142C16.932 6.2348 17.389 6.4039 18.303 6.74211L19 7.00003L18.303 7.25795C17.389 7.59616 16.932 7.76527 16.5986 8.09864C16.2652 8.43201 16.0961 8.88901 15.7579 9.803L15.5 10.5L15.2421 9.803C14.9039 8.88901 14.7348 8.43201 14.4014 8.09864C14.068 7.76527 13.611 7.59616 12.697 7.25795L12 7.00003L12.697 6.74211C13.611 6.4039 14.068 6.2348 14.4014 5.90142C14.7348 5.56805 14.9039 5.11105 15.2421 4.19706L15.5 3.50003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <div>
                    Enquiries
                </div>
            </a>

        </div>
        <div
            class="min-h-[15vh] pb-[90px] flex justify-center px-10 pt-3 mx-4 border border-5 bg-slate-300 rounded-xl">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-full">
        </div>
    </div>
    <!-- MINI SIDEBAR-->
    <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)] justify-between ">

        <div>

            <a href="{{ route('dashboard') }}"
                class= "hover:ml-4 justify-end pr-5 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
            </a>

            <a href="{{ route('candidates.index') }}"
                class= "hover:ml-4 justify-end pr-5 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-4 h-4">
                    <path d="M14 8.99988H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M14 12.4999H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <rect x="2" y="2.99988" width="20" height="18" rx="5" stroke="currentColor"
                        stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M5 15.9999C6.20831 13.4188 10.7122 13.249 12 15.9999" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M10.5 8.99988C10.5 10.1044 9.60457 10.9999 8.5 10.9999C7.39543 10.9999 6.5 10.1044 6.5 8.99988C6.5 7.89531 7.39543 6.99988 8.5 6.99988C9.60457 6.99988 10.5 7.89531 10.5 8.99988Z"
                        stroke="currentColor" stroke-width="1.5" />
                </svg>

            </a>
            @can('isAdmin')
                <a href="{{ route('users.index') }}"
                    class= "hover:ml-4 justify-end pr-5 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path
                            d="M18.6161 20H19.1063C20.2561 20 21.1707 19.4761 21.9919 18.7436C24.078 16.8826 19.1741 15 17.5 15M15.5 5.06877C15.7271 5.02373 15.9629 5 16.2048 5C18.0247 5 19.5 6.34315 19.5 8C19.5 9.65685 18.0247 11 16.2048 11C15.9629 11 15.7271 10.9763 15.5 10.9312"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path
                            d="M4.48131 16.1112C3.30234 16.743 0.211137 18.0331 2.09388 19.6474C3.01359 20.436 4.03791 21 5.32572 21H12.6743C13.9621 21 14.9864 20.436 15.9061 19.6474C17.7889 18.0331 14.6977 16.743 13.5187 16.1112C10.754 14.6296 7.24599 14.6296 4.48131 16.1112Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M13 7.5C13 9.70914 11.2091 11.5 9 11.5C6.79086 11.5 5 9.70914 5 7.5C5 5.29086 6.79086 3.5 9 3.5C11.2091 3.5 13 5.29086 13 7.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                    </svg>

                </a>

                <a href="{{ route('admin.master') }}"
                    class= "hover:ml-4 justify-end pr-5 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path
                            d="M20 10C19.9641 7.52043 19.7801 6.11466 18.8365 5.17157C17.6643 4 15.7776 4 12.0043 4C8.23106 4 6.34442 4 5.17221 5.17157C4 6.34315 4 8.22876 4 12C4 15.7712 4 17.6569 5.17221 18.8284C6.23545 19.8911 7.88646 19.9899 11 19.9991"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M18 19.7143V21M18 19.7143C16.8432 19.7143 15.8241 19.1461 15.2263 18.2833M18 19.7143C19.1568 19.7143 20.1759 19.1461 20.7737 18.2833M18 13.2857C19.1569 13.2857 20.1761 13.854 20.7738 14.7169M18 13.2857C16.8431 13.2857 15.8239 13.854 15.2262 14.7169M18 13.2857V12M22 13.9286L20.7738 14.7169M14.0004 19.0714L15.2263 18.2833M14 13.9286L15.2262 14.7169M21.9996 19.0714L20.7737 18.2833M20.7738 14.7169C21.1273 15.2271 21.3333 15.8403 21.3333 16.5C21.3333 17.1597 21.1272 17.773 20.7737 18.2833M15.2262 14.7169C14.8727 15.2271 14.6667 15.8403 14.6667 16.5C14.6667 17.1597 14.8728 17.773 15.2263 18.2833"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9.5 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M14.5 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M9.5 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4 9.5L2 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4 14.5L2 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M22 9.5L20 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 8H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>


                </a>
            @endcan

            <a href="{{ route('enquiries.index') }}"
                class= "hover:ml-4 justify-end pr-5 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-4 h-4">
                    <path d="M16.0001 16.5L20 20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18 11.5C18 15.366 14.866 18.5 11 18.5C7.13401 18.5 4 15.366 4 11.5C4 7.63404 7.13401 4.50003 11 4.50003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.5 3.50003L15.7579 4.19706C16.0961 5.11105 16.2652 5.56805 16.5986 5.90142C16.932 6.2348 17.389 6.4039 18.303 6.74211L19 7.00003L18.303 7.25795C17.389 7.59616 16.932 7.76527 16.5986 8.09864C16.2652 8.43201 16.0961 8.88901 15.7579 9.803L15.5 10.5L15.2421 9.803C14.9039 8.88901 14.7348 8.43201 14.4014 8.09864C14.068 7.76527 13.611 7.59616 12.697 7.25795L12 7.00003L12.697 6.74211C13.611 6.4039 14.068 6.2348 14.4014 5.90142C14.7348 5.56805 14.9039 5.11105 15.2421 4.19706L15.5 3.50003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>


        </div>
        <div class="pb-[70px]">
            <a href="{{ route('candidates.index') }}"
                class= "justify-end pr-1 text-white hover:text-green-500 dark:hover:text-blue-500 w-full bg-green-950 p-3 rounded-full transform ease-in-out duration-300 flex">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="" class="w-10 h-10">
            </a>

        </div>
    </div>

</aside>
