<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In – PustakaHub</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans antialiased text-gray-800 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background gradient (same as welcome page) -->
    <div class="fixed inset-0 -z-10 bg-gradient-to-br from-indigo-50 via-white to-purple-50/60"></div>
    <!-- Decorative blur circles -->
    <div class="fixed w-96 h-96 bg-indigo-200/30 rounded-full blur-3xl top-[-80px] right-[-80px] -z-10"></div>
    <div class="fixed w-80 h-80 bg-purple-200/30 rounded-full blur-3xl bottom-[-60px] left-[-60px] -z-10"></div>

    <!-- Login Card -->
    <div class="w-full max-w-md relative z-10">

        <!-- Brand -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center space-x-2 text-3xl font-bold text-gray-800">
                <i class="fas fa-book-open text-indigo-600"></i>
                <span>Pustaka<span class="text-indigo-600">Hub</span></span>
            </a>
            <p class="text-gray-500 text-sm mt-1">Sign in to your library account</p>
        </div>

        <!-- Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl shadow-indigo-100/40 border border-white/80 p-8 sm:p-10 transition-transform duration-300 hover:scale-[1.01]">

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-5 p-3 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-2">
                    <i class="fas fa-check-circle text-green-500"></i>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors (global) -->
            @if ($errors->any())
                <div class="mb-5 p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-start gap-2">
                    <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div class="relative">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500"></i>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Email address"
                        class="block w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50/70 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition placeholder:text-gray-400"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <i class="fas fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="relative">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500"></i>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                        class="block w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50/70 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition placeholder:text-gray-400"
                    >
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <i class="fas fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 transition"
                        >
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button (gradient matches welcome page) -->
                <button type="submit" class="w-full text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg shadow-indigo-200/50 flex items-center justify-center gap-2 text-lg transition-transform duration-200 hover:scale-[1.02] active:scale-[0.98] bg-gradient-to-r from-indigo-600 to-purple-600 hover:shadow-indigo-300/40">
                    <i class="fas fa-arrow-right-to-bracket"></i>
                    Log In
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-500 mt-2">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:text-indigo-800 hover:underline transition">
                        Join Library
                    </a>
                </p>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            &copy; {{ date('Y') }} PustakaHub &bull; Secure &bull; Private
        </p>
    </div>

</body>
</html>
