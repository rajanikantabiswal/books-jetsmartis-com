<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ config('app.name', 'SmartBooks') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div
        class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="relative py-3 sm:w-96 mx-auto text-center">
            <div class="flex justify-center w-full">
                <img class="h-auto w-[40%]" src="{{asset("assets/img/JS_Books_Logo.png")}}" alt="image description">
            </div>
            

            <div class="mt-4 bg-white shadow-md rounded-lg text-left">
                <div class="h-2 bg-green-400 rounded-t-md"></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="px-8 py-6 ">
                        <label class="block font-semibold"> Username or Email </label>
                        <input type="text" placeholder="Email"
                            class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <label class="block mt-3 font-semibold">Password</label>
                        <input type="password" placeholder="Password"
                            class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md"
                            value="{{ old('password') }}" name="password">
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-between items-baseline">
                            <button type="submit"
                                class="mt-4 bg-green-500 text-white py-2 px-6 rounded-md hover:bg-green-600 ">Login</button>
                            <a href="#" class="text-sm hover:underline">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
