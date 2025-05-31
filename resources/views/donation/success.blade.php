<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            margin: 0; 
            padding: 20px; 
            background-color: #f4f7f6; 
            color: #333; 
        }
        .container { 
            max-width: 650px; 
            margin: 30px auto; 
            padding: 30px; 
            background-color: #fff; 
            border-radius: 10px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            text-align: center;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            margin: 0 auto 20px;
            position: relative;
        }
        .success-icon::before,
        .success-icon::after {
            content: '';
            position: absolute;
            background-color: white;
        }
        .success-icon::before {
            width: 40px;
            height: 8px;
            transform: rotate(45deg);
            left: 8px;
            top: 38px;
        }
        .success-icon::after {
            width: 20px;
            height: 8px;
            transform: rotate(-45deg);
            left: 32px;
            top: 44px;
        }
        h1 { 
            color: #28a745; 
            margin-bottom: 15px; 
        }
        .donation-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
            text-align: left;
        }
        .donation-amount {
            font-size: 24px;
            color: #28a745;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .button-home {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.2s;
        }
        .button-home:hover {
            background-color: #218838;
        }
        .thank-you-message {
            font-size: 1.1em;
            color: #666;
            margin: 20px 0;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon"></div>
        <h1>Pembayaran Berhasil!</h1>
        
        <p class="thank-you-message">
            Terima kasih atas donasi Anda. Dukungan Anda sangat berarti bagi kami dalam membantu hewan-hewan yang membutuhkan.
        </p>

        <div class="donation-details">
            <p><strong>Invoice ID:</strong> {{ $donation->invoice_id }}</p>
            <p><strong>Nama:</strong> {{ $donation->name }}</p>
            <p><strong>Email:</strong> {{ $donation->email }}</p>
            <p><strong>Metode Pembayaran:</strong> 
                @if($donation->payment_method == 'bank')
                    Transfer Bank
                @else
                    E-Wallet
                @endif
            </p>
            <div class="donation-amount">
                Rp {{ number_format($donation->amount, 0, ',', '.') }}
            </div>
            @if($donation->paid_at)
                <p><strong>Waktu Pembayaran:</strong> {{ $donation->paid_at->format('d M Y H:i') }}</p>
            @endif
        </div>

        <p>Bukti pembayaran telah dikirim ke email Anda.</p>

        <a href="{{ route('home') }}" class="button-home">Kembali ke Beranda</a>
    </div>
</body>
</html> 