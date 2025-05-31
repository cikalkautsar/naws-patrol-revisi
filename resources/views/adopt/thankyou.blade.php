@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md text-center">
        <div class="mb-8">
            <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Terima kasih!</h1>
        <p class="text-gray-600 mb-8">Form pengajuan adopsi Anda sudah kami terima. Tim kami akan meninjau pengajuan Anda dan akan menghubungi Anda segera.</p>
        
        <div class="mt-6">
            <a href="{{ route('adopt.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                Kembali ke Halaman Adopsi
            </a>
        </div>
    </div>
</div>
@endsection