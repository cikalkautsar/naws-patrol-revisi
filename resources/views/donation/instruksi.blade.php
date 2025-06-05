<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instruksi Pembayaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/donation/donation.css') }}">
    <script src="{{ asset('js/donation/instruksi.js') }}" defer></script>
</head>

<body>
    <div class="container">
        <h1>Instruksi Pembayaran</h1>
        <div class="wrapper">
            <div class="card payment-instruction">
                <h3>Detail Pembayaran</h3>
                <div class="payment-details">
                    <p><strong>Metode Pembayaran:</strong> <span id="paymentMethod">{{ $method }}</span></p>
                    <p><strong>Nomor Rekening/VA:</strong> <span id="accountNumber">{{ $number }}</span></p>
                    <p><strong>Jumlah Donasi:</strong> <span id="amount">Rp {{ number_format($amount, 0, ',', '.') }}</span></p>
                </div>

                <div class="qr-section">
                    <h4>Scan QR Code</h4>
                    <div class="qr-container">
                        <img src="{{ asset('img/qr/' . strtolower($method) . '.png') }}" alt="QR Code" id="qrCode">
                    </div>
                    <button class="qr-btn" onclick="downloadQR()">Download QR</button>
                </div>

                <div class="instruction-steps">
                    <h4>Langkah Pembayaran:</h4>
                    <ol id="paymentSteps">
                        <!-- Steps will be populated by JavaScript -->
                    </ol>
                </div>

                <div class="timer-section">
                    <p>Selesaikan pembayaran dalam:</p>
                    <div class="countdown" id="countdown">00:10:00</div>
                </div>

                <div class="button-group">
                    <button class="submit-btn" onclick="checkPaymentStatus()">Saya Sudah Bayar</button>
                    <button class="cancel-btn" onclick="cancelPayment()">Batalkan</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 