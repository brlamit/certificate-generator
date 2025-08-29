<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CertiNepal') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-color: #2d3748; /* Dark gray-blue */
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }
        .certificate-preview {
            background-color: #edf2f7; /* Light gray */
            border: 2px solid #4a5568; /* Medium gray border */
            min-height: 300px;
            color: #2d3748;
        }
        .navbar {
            background-color: #4a5568; /* Medium gray */
            color: #e2e8f0;
        }
        .navbar a {
            color: #a0aec0;
        }
        .navbar a:hover {
            color: #ffffff;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased leading-relaxed">

    <!-- Navbar -->
    <nav class="navbar shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-2xl font-bold navbar-text">
                        {{ config('app.name', 'CertiNepal') }}
                    </a>
                </div>
                <div class="flex space-x-4 items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-sm font-medium navbar-text hover:bg-gray-700 transition">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 animate-fadeInUp">Welcome to {{ config('app.name', 'CertiNepal') }}</h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 animate-fadeInUp" style="animation-delay: 0.2s;">Generate professional certificates with ease.</p>
            <div class="animate-fadeInUp" style="animation-delay: 0.4s;">
                <a href="#preview" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">View Sample</a>
            </div>
        </div>
    </section>

    <!-- Certificate Preview Section -->
    <section class="py-20 bg-gray-100" id="preview">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 text-center mb-12 animate-fadeInUp">Certificate Sample</h2>
            <div class="certificate-preview p-6 rounded-lg text-center animate-fadeInUp" style="animation-delay: 0.2s;">
                <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Certificate of Achievement</h3>
                <p class="text-xl font-bold mb-2">John Doe</p>
                <p class="text-md mb-2">For Excellence in Web Development</p>
                <p class="text-md">Date: August 29, 2025</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-lg">&copy; {{ date('Y') }} {{ config('app.name', 'CertiNepal') }}. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>