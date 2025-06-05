// Fungsi util untuk ambil parameter URL
function getQueryParam(key) {
    const params = new URLSearchParams(window.location.search);
    return params.get(key) || '';
  }
  
  // Ambil parameter dari URL
  const method = getQueryParam("method");
  const number = getQueryParam("number");
  const amount = getQueryParam("amount");
  
  // Validasi awal
  if (!method || !number) {
    alert("Silakan pilih metode pembayaran terlebih dahulu.");
    window.location.href = "/metode-donasi"; // Ganti sesuai rute Blade metodeDonasi
  }
  
  // Tampilkan metode dan nomor rekening
  document.getElementById("paymentMethodText").textContent = method;
  document.getElementById("accountNumber").textContent = number;
  
  // Tampilkan instruksi berdasarkan jenis metode
  const instructionsList = document.getElementById("paymentInstructionsList");
  
  if (method.toLowerCase().includes("bank")) {
    instructionsList.innerHTML = `
      <li>Pastikan jumlah transfer sesuai</li>
      <li>Transfer dari bank selain yang dipilih mungkin membutuhkan waktu lebih lama</li>
    `;
  } else if (method.toLowerCase().includes("e-wallet")) {
    instructionsList.innerHTML = `
      <li>Pastikan nominal top-up sesuai</li>
      <li>Scan QR atau kirim ke nomor yang tersedia</li>
    `;
  } else {
    instructionsList.innerHTML = `<li>Silakan cek kembali metode pembayaran Anda</li>`;
  }
  
  // Format nominal
  const numericAmount = parseInt(amount || "0");
  const formattedAmount = !isNaN(numericAmount)
    ? numericAmount.toLocaleString("id-ID")
    : "Data tidak valid";
  
  document.getElementById("donationAmount").textContent = formattedAmount;
  
  // Hitung batas waktu bayar (24 jam ke depan)
  const deadlineDate = new Date();
  deadlineDate.setHours(deadlineDate.getHours() + 24);
  const formatter = new Intl.DateTimeFormat("id-ID", {
    day: "2-digit", month: "long", year: "numeric",
    hour: "2-digit", minute: "2-digit", hour12: false
  });
  document.getElementById("deadline").textContent = formatter.format(deadlineDate);
  
  // QR Code button handler
  document.getElementById("showQRBtn").addEventListener("click", function () {
    window.location.href = `/qr-code?method=${encodeURIComponent(method)}&number=${encodeURIComponent(number)}&amount=${encodeURIComponent(amount)}`;
  });
  
  document.getElementById('backBtn').addEventListener('click', function() {
      window.location.href = '/donasi';
    });
  
  // Konfirmasi pembayaran
  document.getElementById("confirmPaymentBtn").addEventListener("click", function (e) {
    e.preventDefault(); // Hindari reload
  
    // Sembunyikan instruksi pembayaran, tampilkan halaman sukses
    document.getElementById("paymentInstruction").style.display = "none";
    document.getElementById("successMessage").style.display = "block";
  
    // Format ulang nominal
    document.getElementById("finalAmount").textContent = formattedAmount;
  
    // Buat kode transaksi acak
    const code = 'NPX' + Math.floor(100000000 + Math.random() * 900000000);
    document.getElementById("transactionCode").textContent = code;
  
    // Waktu saat ini
    const now = new Date();
    document.getElementById("transactionDate").textContent = formatter.format(now);
  });