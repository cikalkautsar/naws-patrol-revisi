document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const petName = params.get("nama");
  
    if (petImages[petName]) {
      document.getElementById("petImage").src = petImages[petName];
    } else {
      document.getElementById("petImage").src = petImages["Daisy"];
    }
  
    const submitBtn = document.getElementById("submitButton");
    const targetUrl = submitBtn.dataset.url; // ← ambil URL dari atribut data-url
  
    submitBtn.addEventListener("click", function () {
      const params = new URLSearchParams();
  
      params.set("nama", petName);
      const inputTexts = document.querySelectorAll('input[type="text"]');
      params.set("user_nama", inputTexts[0].value);
      params.set("user_umur", document.querySelector('input[type="number"]').value);
      params.set("user_alamat", inputTexts[1].value);
      params.set("user_rumah", inputTexts[2].value);
      params.set("user_aktivitas", inputTexts[3].value);
      params.set("user_alasan", document.querySelector("textarea").value);
  
      window.location.href = `${targetUrl}?${params.toString()}`;
    });
  });