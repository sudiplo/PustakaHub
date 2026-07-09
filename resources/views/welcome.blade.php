<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PustakaHub – Library Management</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }
        #mobile-menu.open {
            max-height: 400px;
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        .float-animation-delayed {
            animation: float 6s ease-in-out infinite 2s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }
        .book-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-white font-sans antialiased text-gray-800">

    <!-- == NAVBAR == -->
    <nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200/60 shadow-sm transition-shadow duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2">
                    <i class="fas fa-book-open text-3xl text-indigo-600"></i>
                    <span class="text-xl font-bold text-gray-800">Pustaka<span class="text-indigo-600">Hub</span></span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600">
                    <a href="#books" class="hover:text-indigo-600 transition">Books</a>
                    <a href="#features" class="hover:text-indigo-600 transition">Features</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 transition font-medium">Log In</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition shadow-md shadow-indigo-200 font-medium">Join Library</a>
                </div>

                <!-- Mobile Menu-->
                <button id="menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition" aria-label="Toggle menu">
                    <i class="fas fa-bars text-xl text-gray-700"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white/95 backdrop-blur-sm px-4 pb-5 border-b border-gray-200">
            <div class="flex flex-col space-y-3 text-sm font-medium text-gray-600">
                <a href="#books" class="hover:text-indigo-600 transition py-1">Books</a>
                <a href="#features" class="hover:text-indigo-600 transition py-1">Features</a>
                <!-- Removed Testimonials and Membership -->
                <div class="flex flex-col space-y-2 pt-3 border-t border-gray-200">
                    <a href="{{ route('login') }}" class="text-center text-indigo-600 font-medium py-2">Log In</a>
                    <a href="{{ route('register') }}" class="text-center bg-indigo-600 text-white py-2 rounded-full font-medium">Join Library</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- == HERO SECTION == -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Hero Text -->
                <div class="text-center md:text-left">
                    <span class="inline-block bg-indigo-100 text-indigo-700 text-sm font-semibold px-4 py-1 rounded-full mb-4">
                        <i class="fas fa-book-reader mr-1"></i> Your Digital Library
                    </span>
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">
                        Discover, Borrow, <br />
                        <span class="gradient-text">Read Forever</span>
                    </h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-lg mx-auto md:mx-0">
                        Explore thousands of books, track your reading, and manage your library effortlessly all in one place.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 font-medium">
                            <i class="fas fa-user-plus mr-2"></i> Get Library Card
                        </a>
                        <a href="#books" class="bg-white text-gray-700 px-8 py-3 rounded-full border border-gray-300 hover:bg-gray-50 transition shadow-sm font-medium">
                            <i class="fas fa-search mr-2"></i> Browse Books
                        </a>
                    </div>
                    <!-- == BOOK OF THE DAY == -->
                    <div class="mt-12 max-w-md mx-auto md:mx-0 animate-fade-in-up animation-delay-500">
                        <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl shadow-lg border border-indigo-100/50 flex items-start space-x-4 hover:shadow-xl transition">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white text-3xl float-animation">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-left">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs font-semibold text-indigo-600 uppercase tracking-wider">📖 Book of the Day</span>
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                                    </span>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800 mt-1">The Midnight Library</h4>
                                <p class="text-sm text-gray-500">by Matt Haig</p>
                                <p class="text-xs text-gray-400 mt-1 line-clamp-2">A dazzling novel about all the lives we could have lived.</p>
                                <a href="{{ route('login') }}" class="mt-2 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                                    Borrow Now →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Illustration -->
                <div class="relative flex justify-center">
                    <div class="w-full max-w-sm md:max-w-md p-4 bg-white/60 backdrop-blur-sm rounded-3xl shadow-2xl shadow-indigo-100/40 border border-white/80">
                        <svg viewBox="0 0 400 320" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                            <rect x="20" y="40" width="360" height="240" rx="24" fill="#EEF2FF" stroke="#C7D2FE" stroke-width="2" />
                            <!-- Bookshelves -->
                            <rect x="50" y="80" width="300" height="8" rx="4" fill="#A5B4FC" />
                            <rect x="50" y="120" width="300" height="8" rx="4" fill="#A5B4FC" />
                            <rect x="50" y="160" width="300" height="8" rx="4" fill="#A5B4FC" />

                            <rect x="70" y="60" width="20" height="40" rx="2" fill="#818CF8" />
                            <rect x="95" y="50" width="16" height="50" rx="2" fill="#4F46E5" />
                            <rect x="116" y="65" width="22" height="35" rx="2" fill="#6366F1" />
                            <rect x="150" y="55" width="18" height="45" rx="2" fill="#A5B4FC" />
                            <rect x="176" y="70" width="24" height="30" rx="2" fill="#818CF8" />
                            <rect x="70" y="100" width="28" height="40" rx="2" fill="#4F46E5" />
                            <rect x="105" y="110" width="20" height="30" rx="2" fill="#6366F1" />
                            <rect x="132" y="95" width="16" height="45" rx="2" fill="#A5B4FC" />
                            <rect x="160" y="105" width="22" height="35" rx="2" fill="#818CF8" />

                            <rect x="70" y="140" width="24" height="40" rx="2" fill="#6366F1" />
                            <rect x="100" y="150" width="18" height="30" rx="2" fill="#4F46E5" />
                            <rect x="126" y="145" width="22" height="35" rx="2" fill="#818CF8" />
                            <rect x="156" y="155" width="16" height="25" rx="2" fill="#A5B4FC" />

                            <path d="M200 180 Q220 160 240 180 Q220 200 200 180 Z" fill="#4F46E5" opacity="0.3" />
                            <circle cx="200" cy="180" r="20" fill="#818CF8" opacity="0.2" />
                        </svg>
                    </div>

                    <div class="absolute top-4 -right-4 hidden lg:flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-lg border border-gray-100 float-animation">
                        <i class="fas fa-book text-indigo-500"></i>
                        <span class="text-sm font-medium">2,500+ Titles</span>
                    </div>
                    <div class="absolute bottom-8 -left-6 hidden lg:flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-lg border border-gray-100 float-animation-delayed">
                        <i class="fas fa-calendar-check text-indigo-500"></i>
                        <span class="text-sm font-medium">Easy Borrowing</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-200/20 rounded-full blur-3xl -z-0"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl -z-0"></div>
    </section>

    <!-- == FEATURES SECTION == -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Library Features</span>
                <h2 class="text-3xl sm:text-4xl font-bold mt-2">Everything for <span class="gradient-text">Book Lovers</span></h2>
                <p class="mt-4 text-gray-500 text-lg">Tools to discover, borrow, and manage your reading journey.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Smart Search</h3>
                    <p class="mt-2 text-gray-500">Find books by title, author, or genre instantly.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Borrow & Track</h3>
                    <p class="mt-2 text-gray-500">Check availability, borrow, and get due‑date reminders.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Reviews & Ratings</h3>
                    <p class="mt-2 text-gray-500">Share your thoughts and see what other readers think.</p>
                </div>
                <!-- Feature 4 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Reading History</h3>
                    <p class="mt-2 text-gray-500">Keep track of books you've borrowed and read.</p>
                </div>
                <!-- Feature 5 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Due‑Date Alerts</h3>
                    <p class="mt-2 text-gray-500">Get notifications before your borrowed books are overdue.</p>
                </div>
                <!-- Feature 6 -->
                <div class="bg-gray-50/80 p-8 rounded-3xl border border-gray-200/70 hover:border-indigo-300 hover:shadow-xl transition group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl group-hover:bg-indigo-600 group-hover:text-white transition mb-5">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Mobile Friendly</h3>
                    <p class="mt-2 text-gray-500">Manage your library anywhere, on any device.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- == POPULAR BOOKS SECTION == -->
    <section id="books" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Trending</span>
                <h2 class="text-3xl sm:text-4xl font-bold mt-2">Popular <span class="gradient-text">Books</span></h2>
                <p class="mt-4 text-gray-500 text-lg">Most borrowed titles this month.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Book Card 1 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden book-card">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center text-white text-4xl">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold">The Art of Thinking</h3>
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded-full">Bestseller</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-1">By John Clear</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-indigo-600 font-bold">Available: 4 copies</span>
                            <div class="flex items-center space-x-1 text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="#" class="mt-4 block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Borrow Now</a>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden book-card">
                    <div class="h-48 bg-gradient-to-br from-pink-400 to-rose-400 flex items-center justify-center text-white text-4xl">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold">The Last Chapter</h3>
                            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-1">By Emma Watson</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-indigo-600 font-bold">Available: 2 copies</span>
                            <div class="flex items-center space-x-1 text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                        <a href="#" class="mt-4 block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Borrow Now</a>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden book-card">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-emerald-400 flex items-center justify-center text-white text-4xl">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold">Designing Tomorrow</h3>
                            <span class="bg-purple-100 text-purple-700 text-xs font-semibold px-2 py-1 rounded-full">Featured</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-1">By Sarah Johnson</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-indigo-600 font-bold">Available: 3 copies</span>
                            <div class="flex items-center space-x-1 text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                        <a href="#" class="mt-4 block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Borrow Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- == CALL TO ACTION == -->
    <section class="bg-indigo-600 py-16 text-center text-white rounded-t-[3rem] md:rounded-t-[5rem]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-4xl font-bold">Join the Reading Community</h2>
            <p class="mt-3 text-indigo-100 text-lg">Get your free library card and start borrowing today.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-full hover:bg-gray-100 transition shadow-lg font-medium">
                    <i class="fas fa-user-plus mr-2"></i> Sign Up Free
                </a>
                <a href="{{ route('login') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white/10 transition font-medium">
                    Log In
                </a>
            </div>
        </div>
    </section>

    <!-- == FOOTER == -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <a href="#" class="flex items-center space-x-2 text-2xl font-bold text-white">
                        <i class="fas fa-book-open text-indigo-400"></i>
                        <span>Pustaka<span class="text-indigo-400">Hub</span></span>
                    </a>
                    <p class="text-sm text-gray-500 mt-3">Your digital gateway to a world of books and knowledge.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3">Library</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Catalog</a></li>
                        <li><a href="#" class="hover:text-white transition">Authors</a></li>
                        <li><a href="#" class="hover:text-white transition">Genres</a></li>
                        <li><a href="#" class="hover:text-white transition">New Arrivals</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3">Support</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-3">Connect</h4>
                    <div class="flex space-x-4 text-lg">
                        <a href="https://www.facebook.com/sudip.lo.bon" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/lo_sudip/?hl=en" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/sudip-lo-467bba382/" class="hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://github.com/sudiplo" class="hover:text-white transition"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-10 pt-6 border-t border-gray-800 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} PustakaHub • All rights reserved • Sudip Lo
            </div>
        </div>
    </footer>

    <!-- == MOBILE MENU == -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('open');
            });

            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('open');
                });
            });

            const navbar = document.querySelector('nav');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    navbar.classList.add('shadow-md');
                } else {
                    navbar.classList.remove('shadow-md');
                }
            });
        });
    </script>
</body>
</html>
