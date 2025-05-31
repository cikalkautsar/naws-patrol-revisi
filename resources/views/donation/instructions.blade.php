<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Pembayaran Donasi</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; background-color: #f4f7f6; color: #333; }
        .container { max-width: 650px; margin: 30px auto; padding: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 25px; font-weight: 600; }
        .payment-info { background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; }
        .payment-info p { margin: 10px 0; }
        .payment-amount { font-size: 24px; color: #28a745; font-weight: bold; text-align: center; margin: 20px 0; }
        .steps { margin-top: 30px; }
        .step { margin-bottom: 20px; }
        .step-number { background-color: #28a745; color: white; display: inline-block; width: 25px; height: 25px; text-align: center; border-radius: 50%; margin-right: 10px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .button-home {
            display: inline-block; width: auto; padding: 12px 25px; background-color: #28a745; color: white;
            border: none; border-radius: 5px; cursor: pointer; font-size: 1.05em; font-weight: bold;
            text-align: center; text-decoration: none; transition: background-color 0.2s ease;
            margin-top: 20px;
        }
        .button-home:hover { background-color: #218838; }
        .qr-code-container {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: #fff;
            border: 2px dashed #28a745;
            border-radius: 10px;
        }
        .qr-code {
            max-width: 200px;
            height: auto;
            margin: 0 auto;
        }
        .qr-note {
            margin-top: 15px;
            color: #666;
            font-size: 0.9em;
            font-style: italic;
        }
        .payment-deadline {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert-success">
            Form donasi Anda telah berhasil dikirim! Silakan ikuti instruksi pembayaran di bawah ini.
        </div>

        <h1>Instruksi Pembayaran</h1>

        <div class="payment-info">
            <p><strong>Nama:</strong> {{ $donation->name }}</p>
            <p><strong>Email:</strong> {{ $donation->email }}</p>
            <p><strong>Metode Pembayaran:</strong> 
                @if($donation->payment_method == 'bank')
                    Transfer Bank (Virtual Account)
                @else
                    E-Wallet (QRIS)
                @endif
            </p>
            <div class="payment-amount">
                Rp {{ number_format($donation->amount, 0, ',', '.') }}
            </div>
        </div>

        <div class="payment-deadline">
            Batas waktu pembayaran: 24 jam
        </div>

        <div class="steps">
            @if($donation->payment_method == 'bank')
                <div class="step">
                    <span class="step-number">1</span>
                    <span>Buka aplikasi m-banking atau internet banking Anda</span>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <span>Pilih menu Transfer > Virtual Account</span>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <span>Masukkan nomor Virtual Account: <strong>88{{ str_pad($donation->id, 10, '0', STR_PAD_LEFT) }}</strong></span>
                </div>
                <div class="step">
                    <span class="step-number">4</span>
                    <span>Pastikan nominal transfer sesuai dengan jumlah donasi Anda</span>
                </div>
            @else
                <div class="step">
                    <span class="step-number">1</span>
                    <span>Buka aplikasi e-wallet Anda (OVO, GoPay, DANA, dll)</span>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <span>Pilih menu Scan QRIS</span>
                </div>
                <div class="qr-code-container">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=00020101021226590014ID.NAWS.WWW0215NAWS{{ str_pad($donation->id, 10, '0', STR_PAD_LEFT) }}5204{{ str_pad($donation->amount, 12, '0', STR_PAD_LEFT) }}5802ID6007JAKARTA6105401106304{{ rand(1000, 9999) }}" 
                         alt="QRIS Code" 
                         class="qr-code">
                    <p class="qr-note">Scan QR Code ini menggunakan aplikasi e-wallet Anda</p>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <span>Pastikan nominal pembayaran sesuai dengan jumlah donasi Anda</span>
                </div>
            @endif
            <div class="step">
                <span class="step-number">{{ $donation->payment_method == 'bank' ? '5' : '4' }}</span>
                <span>Setelah pembayaran berhasil, Anda akan menerima email konfirmasi</span>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('home') }}" class="button-home">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html> 