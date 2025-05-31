<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi Anda</title>
    {{-- Ini CSS sederhana aja, nanti kamu bisa percantik lagi pakai CSS framework atau bikinan sendiri --}}
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; background-color: #f4f7f6; color: #333; }
        .container { max-width: 650px; margin: 30px auto; padding: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 25px; font-weight: 600;}
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: #495057; }
        input[type="text"], input[type="email"], input[type="number"], textarea, select {
            width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 5px; box-sizing: border-box;
            font-size: 1rem; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        input:focus, textarea:focus, select:focus { border-color: #007bff; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); outline: none; }
        textarea { resize: vertical; min-height: 80px; }
        .error-message { color: #dc3545; font-size: 0.875em; margin-top: 5px; }
        .button-submit {
            display: inline-block; width: auto; padding: 12px 25px; background-color: #28a745; color: white;
            border: none; border-radius: 5px; cursor: pointer; font-size: 1.05em; font-weight: bold;
            text-align: center; text-decoration: none; transition: background-color 0.2s ease;
        }
        .button-submit:hover { background-color: #218838; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;}
        .alert-danger ul { margin: 0; padding-left: 20px; }
        .payment-methods label { font-weight: normal; margin-left: 5px; }
        .payment-methods input[type="radio"] { margin-right: 5px; vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulir Donasi</h1>
        <p style="text-align:center; margin-bottom: 30px; color: #555;">Silakan isi data di bawah ini untuk melanjutkan donasi Anda.</p>

        @if ($errors->any())
            <div class="alert-danger">
                <strong>Oops! Ada yang salah nih:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('donation.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap Anda</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email Aktif</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon / WhatsApp</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
                @error('phone') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat Lengkap (Opsional)</label>
                <textarea id="address" name="address" rows="3">{{ old('address') }}</textarea>
                @error('address') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="amount">Jumlah Donasi (IDR)</label>
                <input type="number" id="amount" name="amount" value="{{ old('amount') }}" placeholder="Minimal 1000" min="1000" required>
                @error('amount') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Pilih Metode Pembayaran</label>
                <div class="payment-methods">
                    <input type="radio" id="payment_bank" name="payment_method" value="bank" {{ old('payment_method') == 'bank' ? 'checked' : '' }} required>
                    <label for="payment_bank">Transfer Bank (Virtual Account)</label><br>

                    <input type="radio" id="payment_ewallet" name="payment_method" value="ewallet" {{ old('payment_method') == 'ewallet' ? 'checked' : '' }}>
                    <label for="payment_ewallet">E-Wallet (QRIS)</label><br>
                </div>
                @error('payment_method') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div style="text-align: center; margin-top:30px;">
                <button type="submit" class="button-submit">Lanjut ke Pembayaran</button>
            </div>
        </form>
    </div>
</body>
</html>