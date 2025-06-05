document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded');
    
    const bankSelect = document.getElementById("bankSelect");
    const ewalletSelect = document.getElementById("ewalletSelect");
    const submitBtn = document.getElementById("submitBtn");

    console.log('Elements:', { bankSelect, ewalletSelect, submitBtn });

    const bankAccounts = {
        BCA: "123 456 7890",
        BRI: "789 101 1121",
        BNI: "456 789 0123",
        Mandiri: "321 654 9870"
    };

    const ewalletAccounts = {
        DANA: "0857 0000 1111",
        OVO: "0812 2222 3333",
        GoPay: "0896 3333 4444",
        Shopeepay: "0813 4444 5555"
    };

    function updateButtonState() {
        console.log('Updating button state');
        console.log('Bank value:', bankSelect.value);
        console.log('E-wallet value:', ewalletSelect.value);
        
        const bankSelected = bankSelect.value !== "Bank";
        const ewalletSelected = ewalletSelect.value !== "E-Wallet";

        console.log('Selection state:', { bankSelected, ewalletSelected });

        if (bankSelected || ewalletSelected) {
            submitBtn.textContent = "Bayar";
            submitBtn.disabled = false;
            submitBtn.style.backgroundColor = "#2B6ED6";
            submitBtn.style.cursor = "pointer";
        } else {
            submitBtn.textContent = "Pilih metode pembayaran terlebih dahulu";
            submitBtn.disabled = true;
            submitBtn.style.backgroundColor = "#cccccc";
            submitBtn.style.cursor = "not-allowed";
        }
    }

    bankSelect.addEventListener("change", function(e) {
        console.log('Bank select changed:', e.target.value);
        if (bankSelect.value !== "Bank") {
            ewalletSelect.value = "E-Wallet";
        }
        updateButtonState();
    });

    ewalletSelect.addEventListener("change", function(e) {
        console.log('E-wallet select changed:', e.target.value);
        if (ewalletSelect.value !== "E-Wallet") {
            bankSelect.value = "Bank";
        }
        updateButtonState();
    });

    submitBtn.addEventListener("click", function() {
        console.log('Submit button clicked');
        const amount = new URLSearchParams(window.location.search).get("amount");
        let method = bankSelect.value !== "Bank" ? bankSelect.value : ewalletSelect.value;
        
        console.log('Redirecting with:', { method, amount });
        window.location.href = `/donasi/instruksi/1?method=${encodeURIComponent(method)}&amount=${amount}`;
    });

    // Set initial button state
    console.log('Setting initial button state');
    updateButtonState();
});