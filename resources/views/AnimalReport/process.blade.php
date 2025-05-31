<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Laporan Hewan</title>
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
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Status Laporan Anda</h2>

                    @if($reports->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500">Anda belum memiliki laporan hewan.</p>
                            <a href="{{ route('reports.create') }}" class="mt-4 inline-block bg-yellow-400 text-white px-6 py-2 rounded-md hover:bg-yellow-500">
                                Buat Laporan Baru
                            </a>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($reports as $report)
                            <div class="border rounded-lg overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Laporan #{{ $report->id }}</h3>
                                            <p class="text-sm text-gray-500">{{ $report->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                        <div>
                                            @switch($report->status)
                                                @case('pending')
                                                    <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">
                                                        Menunggu Verifikasi
                                                    </span>
                                                    @break
                                                @case('verified')
                                                    <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                                        Terverifikasi
                                                    </span>
                                                    @break
                                                @case('completed')
                                                    <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-800">
                                                        Selesai
                                                    </span>
                                                    @break
                                            @endswitch
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Lokasi:</p>
                                            <p class="font-medium">{{ $report->address }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Alasan Pelaporan:</p>
                                            <p class="font-medium">{{ Str::limit($report->report_reason, 100) }}</p>
                                        </div>
                                    </div>

                                    <!-- Progress Steps -->
                                    <div class="relative pt-8">
                                        <div class="flex items-center justify-between w-full mb-2">
                                            <div class="w-8 h-8 rounded-full {{ $report->status != 'pending' ? 'bg-green-500' : 'bg-yellow-400' }} flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <div class="w-8 h-8 rounded-full {{ $report->status == 'verified' || $report->status == 'completed' ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center">
                                                @if($report->status == 'verified' || $report->status == 'completed')
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                @else
                                                    <span class="text-white">2</span>
                                                @endif
                                            </div>
                                            <div class="w-8 h-8 rounded-full {{ $report->status == 'completed' ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center">
                                                @if($report->status == 'completed')
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                @else
                                                    <span class="text-white">3</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="absolute top-0 left-0 w-full flex justify-between mt-16">
                                            <span class="text-xs text-gray-600">Laporan Diterima</span>
                                            <span class="text-xs text-gray-600">Verifikasi</span>
                                            <span class="text-xs text-gray-600">Selesai</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $reports->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html> 