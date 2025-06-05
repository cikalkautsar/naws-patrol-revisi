<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Foster - Naw's Patrol</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fosterHome/fosterForm.css') }}">
</head>
<body class="bg-gray-100">
    <!-- Header with Navigation -->
    <nav class="bg-yellow-400 py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-6 text-white">
            <a href="{{ route('profile.home') }}" class="active">Profile</a>
            <a href="{{ route('adopt.index') }}">Adoption</a>
            <a href="{{ route('fosterHome.form') }}">Foster</a>
            <a href="{{ route('donation.form') }}">Donations</a>
            <a href="{{ route('education.index') }}">Educations</a>
            <a href="{{ route('reports.create') }}">Stray Animal Report</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('foster.needs') }}" class="text-yellow-400 hover:text-yellow-500">← Kembali</a>
        </div>

        <h1 class="text-2xl font-bold mb-6">Formulir Pemfosteran</h1>

        <!-- Warning Message -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        Jangan lupa untuk merawat seluruh anak anjing dengan baik, Update selalu status seluruh anak agar kami dapat memantau seluruh sisa dari kejadian
                    </p>
                </div>
            </div>
        </div>

        <!-- Pet Info Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 max-w-2xl mx-auto">
            <div class="relative">
                <img src="{{ asset($pet->image_url) }}" alt="{{ $pet->name }}" class="w-full h-64 object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <h2 class="text-white text-xl font-bold">{{ $pet->name }}</h2>
                    <div class="bg-yellow-400 w-full h-2 rounded-full mt-2">
                        <div class="bg-white w-11/12 h-full rounded-full"></div>
                    </div>
                    <p class="text-white mt-1">Status Kesehatan: {{ $pet->health_status }}%</p>
                </div>
            </div>
            
            <!-- Pet Details -->
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Nama Hewan</p>
                            <p class="font-medium">{{ $pet->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Jenis & Ras</p>
                            <p class="font-medium">{{ $pet->breed }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Kelamin</p>
                            <p class="font-medium">{{ $pet->gender }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Usia</p>
                            <p class="font-medium">{{ $pet->age }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Status Kesehatan</p>
                            <p class="font-medium">{{ $pet->health_status }}%</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500">Deskripsi Singkat</p>
                            <p class="font-medium">{{ $pet->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foster Form -->
        <div class="bg-yellow-100 rounded-lg p-6 max-w-2xl mx-auto">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('foster.accept') }}" method="POST" class="space-y-6" id="fosterForm">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Estimasi Durasi Penampungan:</label>
                    <input type="text" name="duration" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Lokasi Penampungan:</label>
                    <input type="text" name="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Catatan Tambahan (Opsional):</label>
                    <textarea name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"></textarea>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-700 mb-4">Komitmen Foster:</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <input type="checkbox" name="commitment[]" value="tempat_layak" class="mt-1 h-4 w-4 rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                            <label class="ml-3 text-sm text-gray-600">
                                Saya bersedia memberikan tempat tinggal yang layak
                            </label>
                        </div>
                        <div class="flex items-start">
                            <input type="checkbox" name="commitment[]" value="laporan_berkala" class="mt-1 h-4 w-4 rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                            <label class="ml-3 text-sm text-gray-600">
                                Saya akan mengisi laporan perkembangan secara berkala
                            </label>
                        </div>
                        <div class="flex items-start">
                            <input type="checkbox" name="commitment[]" value="tidak_memberikan" class="mt-1 h-4 w-4 rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                            <label class="ml-3 text-sm text-gray-600">
                                Saya tidak akan memberikan hewan ini kepada pihak lain tanpa izin shelter
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Ajukan Sebagai Foster
                    </button>
                    <button type="button" onclick="window.history.back()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('input[name="commitment[]"]');
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            
            if (!allChecked) {
                e.preventDefault();
                alert('Anda harus menyetujui semua komitmen foster untuk melanjutkan.');
                return;
            }

            // Disable submit button to prevent double submission
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Memproses...';
        });
    </script>
</body>
</html> 