<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    // 1. TAMPILKAN FORM DONASI
    public function showForm()
    {
        return view('donation.DonationForm');
    }

    // 2. PROSES FORM DONASI
    public function submitDonation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|string',
        ]);

        $invoiceId = 'INV-' . strtoupper(Str::random(10));

        $donation = Donation::create([
            'invoice_id' => $invoiceId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('donation.instructions', $donation->id);
    }

    // 3. TAMPILKAN INSTRUKSI PEMBAYARAN
    public function showInstructions($id)
    {
        $donation = Donation::findOrFail($id);
        
        // Jika sudah dibayar, redirect ke halaman sukses
        if ($donation->status === 'paid' && $donation->paid_at) {
            return redirect()->route('donation.success', $donation->id);
        }
        
        return view('donation.instructions', compact('donation'));
    }

    // 4. CALLBACK DARI PAYMENT GATEWAY
    public function paymentNotification(Request $request)
    {
        Log::info('Notifikasi Payment Gateway Masuk:', $request->all());

        $invoice = $request->input('order_id');
        $status = $request->input('transaction_status');

        $donation = Donation::where('invoice_id', $invoice)->first();

        if (!$donation) {
            Log::warning('Donasi tidak ditemukan:', ['invoice_id' => $invoice]);
            return response()->json(['message' => 'Not Found'], 404);
        }

        if ($donation->status === 'paid') {
            return response()->json(['message' => 'Already Paid']);
        }

        switch (strtolower($status)) {
            case 'settlement':
            case 'capture':
                $donation->status = 'paid';
                $donation->paid_at = now();
                break;
            case 'expire':
                $donation->status = 'expired';
                break;
            case 'cancel':
            case 'failure':
            case 'deny':
                $donation->status = 'failed';
                break;
            default:
                $donation->status = $status;
        }

        $donation->save();

        // Jika pembayaran sukses, arahkan ke halaman sukses
        if ($donation->status === 'paid') {
            return redirect()->route('donation.success', $donation->id);
        }

        return response()->json(['message' => 'Notifikasi diproses'], 200);
    }

    // 5. HALAMAN PEMBAYARAN SUKSES
    public function success($id)
    {
        $donation = Donation::findOrFail($id);
        
        // Pastikan donasi sudah dibayar dan memiliki waktu pembayaran
        if ($donation->status !== 'paid' || !$donation->paid_at) {
            return redirect()->route('donation.form')
                           ->with('error', 'Pembayaran belum berhasil');
        }

        return view('donation.success', compact('donation'));
    }

    // 6. SIMULASI PEMBAYARAN SUKSES (Untuk Testing)
    public function simulatePayment($id)
    {
        $donation = Donation::findOrFail($id);
        
        if ($donation->status === 'paid' && $donation->paid_at) {
            return redirect()->route('donation.success', $id)
                           ->with('info', 'Donasi ini sudah dibayar sebelumnya');
        }

        $donation->status = 'paid';
        $donation->paid_at = now();
        $donation->save();

        return redirect()->route('donation.success', $id)
                       ->with('success', 'Pembayaran berhasil disimulasikan!');
    }
}
