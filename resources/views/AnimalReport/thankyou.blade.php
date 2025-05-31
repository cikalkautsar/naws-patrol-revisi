<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - Laporan Diterima</title>
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
                <div class="max-w-2xl mx-auto text-center py-12">
                    <!-- Progress Steps -->
                    <div class="flex items-center justify-center mb-12">
                        <div class="flex items-center w-full max-w-xl justify-between">
                            <!-- Step 1: Complete -->
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div class="absolute -bottom-8 w-32 text-center" style="left: -32px">
                                    <span class="text-sm font-medium text-yellow-400">Pengisian formulir</span>
                                </div>
                            </div>

                            <!-- Connector 1-2 -->
                            <div class="flex-1 h-1 bg-yellow-400"></div>

                            <!-- Step 2: Current -->
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center">
                                    <span class="text-xl font-bold text-white">2</span>
                                </div>
                                <div class="absolute -bottom-8 w-32 text-center" style="left: -32px">
                                    <span class="text-sm font-medium text-yellow-400">Identifikasi laporan</span>
                                </div>
                            </div>

                            <!-- Connector 2-3 -->
                            <div class="flex-1 h-1 bg-gray-300"></div>

                            <!-- Step 3: Incomplete -->
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center">
                                    <span class="text-xl font-bold text-white">3</span>
                                </div>
                                <div class="absolute -bottom-8 w-32 text-center" style="left: -32px">
                                    <span class="text-sm font-medium text-gray-500">Status laporan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-16">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Terima kasih telah melapor!</h2>
                        <p class="text-gray-600 mb-8">
                            Tim shelter kami akan menghubungi Anda dalam 1-3 hari kerja untuk proses verifikasi lebih lanjut
                        </p>
                        <div class="mt-8">
                            <a href="{{ route('home') }}" 
                               class="bg-yellow-400 text-white px-6 py-2 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 