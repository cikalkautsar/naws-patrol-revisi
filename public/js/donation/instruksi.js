// Payment instruction steps for each method
const paymentSteps = {
    BCA: [
        "Buka aplikasi BCA Mobile",
        "Pilih menu 'Scan QR'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN BCA Mobile",
        "Transaksi selesai"
    ],
    BRI: [
        "Buka aplikasi BRImo",
        "Pilih menu QRIS",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN BRImo",
        "Transaksi selesai"
    ],
    BNI: [
        "Buka aplikasi BNI Mobile",
        "Pilih menu 'Scan QR'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN BNI Mobile",
        "Transaksi selesai"
    ],
    Mandiri: [
        "Buka aplikasi Livin' by Mandiri",
        "Pilih menu 'QR Payment'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN Livin'",
        "Transaksi selesai"
    ],
    DANA: [
        "Buka aplikasi DANA",
        "Pilih menu 'Scan'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN DANA",
        "Transaksi selesai"
    ],
    OVO: [
        "Buka aplikasi OVO",
        "Pilih menu 'Scan'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN OVO",
        "Transaksi selesai"
    ],
    GoPay: [
        "Buka aplikasi Gojek",
        "Pilih menu 'Scan QR'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN GoPay",
        "Transaksi selesai"
    ],
    Shopeepay: [
        "Buka aplikasi Shopee",
        "Pilih menu 'Scan'",
        "Scan QR code yang tersedia",
        "Masukkan nominal donasi",
        "Periksa detail transaksi",
        "Masukkan PIN ShopeePay",
        "Transaksi selesai"
    ]
};

document.addEventListener('DOMContentLoaded', function() {
    // Get payment method from span
    const method = document.getElementById('paymentMethod').textContent;
    
    // Populate payment steps
    const stepsContainer = document.getElementById('paymentSteps');
    const steps = paymentSteps[method] || [];
    
    steps.forEach(step => {
        const li = document.createElement('li');
        li.textContent = step;
        stepsContainer.appendChild(li);
    });

    // Start countdown
    startCountdown();
});

function startCountdown() {
    const countdownElement = document.getElementById('countdown');
    let hours = 0;
    let minutes = 10;
    let seconds = 0;

    const timer = setInterval(() => {
        if (seconds > 0) {
            seconds--;
        } else if (minutes > 0) {
            minutes--;
            seconds = 59;
        } else if (hours > 0) {
            hours--;
            minutes = 59;
            seconds = 59;
        } else {
            clearInterval(timer);
            alert('Waktu pembayaran telah habis');
            window.location.href = '/donasi';
            return;
        }

        countdownElement.textContent = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }, 1000);
}

function downloadQR() {
    const qrImage = document.getElementById('qrCode');
    const link = document.createElement('a');
    link.href = qrImage.src;
    link.download = 'qr-code-pembayaran.png';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function checkPaymentStatus() {
    // Simulate payment check
    const randomSuccess = Math.random() > 0.5;
    if (randomSuccess) {
        window.location.href = '/donasi/sukses/1';
    } else {
        alert('Pembayaran belum terdeteksi. Mohon tunggu beberapa saat atau periksa kembali pembayaran Anda.');
    }
}

function cancelPayment() {
    if (confirm('Apakah Anda yakin ingin membatalkan pembayaran?')) {
        window.location.href = '/donasi';
    }
} 