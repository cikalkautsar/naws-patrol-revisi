<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foster Accepted - Naw's Patrol</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8 m-4">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="mt-4 text-xl font-bold text-gray-900">Permintaan Foster Diterima!</h2>
                <p class="mt-2 text-gray-600">{{ $message }}</p>
                
                <div class="mt-6">
                    <a href="{{ route('foster.needs') }}" class="inline-block bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">
                        Kembali ke Daftar Foster
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 