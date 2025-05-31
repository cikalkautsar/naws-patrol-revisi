<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hewan Liar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Navigation Tabs -->
            <div class="bg-yellow-400 rounded-t-lg p-4">
                <div class="flex space-x-4 text-white font-medium">
                    <a href="#" class="hover:text-gray-200">Profile</a>
                    <a href="#" class="hover:text-gray-200">Adopsi</a>
                    <a href="#" class="hover:text-gray-200">Foster</a>
                    <a href="#" class="hover:text-gray-200">Laporan Hewan Liar</a>
                    <a href="#" class="hover:text-gray-200">Donasi & Crowdfunding</a>
                    <a href="#" class="hover:text-gray-200">Edukasi</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white shadow-lg rounded-b-lg p-6">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Pelaporan hewan liar</h2>
                    
                    @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Ada beberapa kesalahan:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="reporter_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="reporter_name" id="reporter_name" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                    value="{{ old('reporter_name') }}" required>
                            </div>

                            <!-- Nomor HP -->
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                <input type="text" name="phone_number" id="phone_number" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                    value="{{ old('phone_number') }}" required>
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="address" id="address" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                    value="{{ old('address') }}" required>
                            </div>

                            <!-- Alasan Melapor -->
                            <div>
                                <label for="report_reason" class="block text-sm font-medium text-gray-700">Alasan melapor</label>
                                <textarea name="report_reason" id="report_reason" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                    required>{{ old('report_reason') }}</textarea>
                            </div>

                            <!-- Upload Gambar -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-yellow-50 file:text-yellow-700
                                    hover:file:bg-yellow-100"
                                    accept="image/*">
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" 
                                class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                Laporkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 