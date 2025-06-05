<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals That Need Foster Homes - Naw's Patrol</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fosterHome/fosterNeeds.css') }}">
</head>
<body class="bg-gray-100">
    <!-- Header with Navigation -->
    <div class="header-bg">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex space-x-6 text-white">
                <a href="{{ route('profile.home') }}" class="hover:text-yellow-400">Profile</a>
                <a href="{{ route('adopt.index') }}" class="hover:text-yellow-400">Adoption</a>
                <a href="{{ route('fosterHome.form') }}" class="hover:text-yellow-400">Foster</a>
                <a href="{{ route('reports.create') }}" class="hover:text-yellow-400">Stray Animal Report</a>
                <a href="{{ route('donation.form') }}" class="hover:text-yellow-400">Donation</a>
                <a href="{{ route('education.index') }}" class="hover:text-yellow-400">Educations</a>
            </div>
        </nav>
        <div class="container mx-auto px-4 pt-8">
            <h1 class="text-3xl font-bold text-white">Kelompok 6</h1>
            <p class="text-gray-300 mt-2">A system designed to address the issue of stray animals in Indonesia<br>especially cats and dogs.</p>
        </div>
        <img src="{{ asset('images/paw.png') }}" alt="Paw Print" class="paw-print">
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Animals That Need Foster Homes</h2>

        <!-- Grid of Animals -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Animal Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 1]) }}">
                    <img src="{{ asset('images/cats/cat1.jpg') }}" alt="Daisy" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Daisy</h3>
                        <span class="text-sm text-gray-500">Female</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>2 years old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => 1]) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>

            <!-- Animal Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 2]) }}">
                    <img src="{{ asset('images/cats/cat2.jpg') }}" alt="Luna" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Luna</h3>
                        <span class="text-sm text-gray-500">Female</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>1 year old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => 2]) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>

            <!-- Animal Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 3]) }}">
                    <img src="{{ asset('images/cats/cat3.jpg') }}" alt="Oliver" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Oliver</h3>
                        <span class="text-sm text-gray-500">Male</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>1.5 years old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => 3]) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>

            <!-- Animal Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 4]) }}">
                    <img src="{{ asset('images/cats/cat4.jpg') }}" alt="Milo" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Milo</h3>
                        <span class="text-sm text-gray-500">Male</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>8 months old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => 4]) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>

            <!-- Animal Card 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 5]) }}">
                    <img src="{{ asset('images/cats/cat5.jpg') }}" alt="Charlie" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Charlie</h3>
                        <span class="text-sm text-gray-500">Male</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>2 years old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => 5]) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>

            <!-- Animal Card 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('foster.form', ['id' => 6]) }}">
                    <img src="{{ asset('images/cats/cat6.jpg') }}" alt="Bella" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">Bella</h3>
                        <span class="text-sm text-gray-500">Female</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>1 year old</span>
                    </div>
                    <a href="{{ route('foster.form', ['id' => '']) }}" class="text-yellow-400 hover:text-yellow-500 text-sm">Peliharaan fostering</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/fosterHome/fosterNeeds.js') }}"></script>
</body>
</html> 