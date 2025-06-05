<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi & Crowdfunding</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/donation/donation.css') }}">
    <script src="{{ asset('js/donation/payment.js') }}" defer></script>
    <script>
        function handleSelectChange(select) {
            const bankSelect = document.getElementById('bankSelect');
            const ewalletSelect = document.getElementById('ewalletSelect');
            const submitBtn = document.getElementById('submitBtn');

            if (select.id === 'bankSelect' && select.value !== 'Bank') {
                ewalletSelect.value = 'E-Wallet';
            } else if (select.id === 'ewalletSelect' && select.value !== 'E-Wallet') {
                bankSelect.value = 'Bank';
            }

            const hasSelection = bankSelect.value !== 'Bank' || ewalletSelect.value !== 'E-Wallet';
            submitBtn.disabled = !hasSelection;
            submitBtn.textContent = hasSelection ? 'Bayar' : 'Pilih metode pembayaran terlebih dahulu';
            submitBtn.style.backgroundColor = hasSelection ? '#2B6ED6' : '#cccccc';
            submitBtn.style.cursor = hasSelection ? 'pointer' : 'not-allowed';
        }

        function handleSubmit() {
            const bankSelect = document.getElementById('bankSelect');
            const ewalletSelect = document.getElementById('ewalletSelect');
            const amount = new URLSearchParams(window.location.search).get('amount');
            const method = bankSelect.value !== 'Bank' ? bankSelect.value : ewalletSelect.value;
            
            window.location.href = `/donasi/instruksi/1?method=${encodeURIComponent(method)}&amount=${amount}`;
        }
    </script>
</head>

<body>
   
    <div class="container">
        <h1>Donasi & Crowdfunding</h1>
        <div class="wrapper">
            <div class="card image-card">
                <img src="{{ asset('img/cuteanimals.png') }}" alt="Hewan donasi" />
            </div>
            <div class="card payment-card">
                <h2><span class="highlight-orange">Ayo</span> <span class="highlight-blue">Berdonasi</span></h2>

                <div class="select-group">
                    <div class="select-wrapper">
                        <select id="bankSelect" onchange="handleSelectChange(this)">
                            <option value="Bank">Bank</option>
                            <option value="BRI">BRI</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="Mandiri">Mandiri</option>
                        </select>
                    </div>

                    <div class="select-wrapper">
                        <select id="ewalletSelect" onchange="handleSelectChange(this)">
                            <option value="E-Wallet">E-Wallet</option>
                            <option value="DANA">DANA</option>
                            <option value="OVO">OVO</option>
                            <option value="GoPay">GoPay</option>
                            <option value="Shopeepay">Shopeepay</option>
                        </select>
                    </div>
                </div>

                <button class="submit-btn" id="submitBtn" onclick="handleSubmit()" disabled>Pilih metode pembayaran terlebih dahulu</button>
            </div>
        </div>
    </div>

    <script>
        function handleSelectChange(select) {
            const bankSelect = document.getElementById('bankSelect');
            const ewalletSelect = document.getElementById('ewalletSelect');
            const submitBtn = document.getElementById('submitBtn');

            if (select.id === 'bankSelect' && select.value !== 'Bank') {
                ewalletSelect.value = 'E-Wallet';
            } else if (select.id === 'ewalletSelect' && select.value !== 'E-Wallet') {
                bankSelect.value = 'Bank';
            }

            const hasSelection = bankSelect.value !== 'Bank' || ewalletSelect.value !== 'E-Wallet';
            submitBtn.disabled = !hasSelection;
            submitBtn.textContent = hasSelection ? 'Bayar' : 'Pilih metode pembayaran terlebih dahulu';
            submitBtn.style.backgroundColor = hasSelection ? '#2B6ED6' : '#cccccc';
            submitBtn.style.cursor = hasSelection ? 'pointer' : 'not-allowed';
        }

        function handleSubmit() {
            const bankSelect = document.getElementById('bankSelect');
            const ewalletSelect = document.getElementById('ewalletSelect');
            const amount = new URLSearchParams(window.location.search).get('amount');
            const method = bankSelect.value !== 'Bank' ? bankSelect.value : ewalletSelect.value;
            
            window.location.href = `/donasi/instruksi/1?method=${encodeURIComponent(method)}&amount=${amount}`;
        }
    </script>
</body>
</html>