// ====== script.js ======

// 1. Update tahun otomatis di footer
const yearSpan = document.getElementById("year");
yearSpan.textContent = new Date().getFullYear();

// 2. Validasi form pemesanan
const form = document.querySelector("form");
form.addEventListener("submit", function (e) {
  e.preventDefault(); // cegah submit default

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();

  if (name === "" || email === "") {
    alert("⚠️ Nama dan Email wajib diisi!");
    return;
  }

  alert("✅ Terima kasih " + name + ", pesanan kamu sudah dikirim!");
  form.reset(); // reset form setelah submit
});

// 3. Interaksi tombol "Pesan sekarang"
const pesanBtn = document.querySelector(".btn.btn-primary");
pesanBtn.addEventListener("click", () => {
  alert("📞 Silakan isi form pemesanan di bawah 👇");
});

// 4. Dark Mode (opsional)
const darkModeToggle = document.createElement("button");
darkModeToggle.textContent = "🌙 Dark Mode";
darkModeToggle.classList.add("btn");
darkModeToggle.style.margin = "1rem";

document.body.prepend(darkModeToggle);

darkModeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
});

// 5. Style untuk dark mode (tambahkan via JS)
const darkStyle = document.createElement("style");
darkStyle.textContent = `
  .dark-mode {
    background-color: #121212;
    color: #eee;
  }
  .dark-mode header, .dark-mode footer {
    background: #000;
  }
  .dark-mode .card {
    background: #1e1e1e;
    color: #eee;
  }
`;
document.head.appendChild(darkStyle);

// Fungsi untuk cek apakah elemen terlihat di layar
function revealOnScroll() {
  const reveals = document.querySelectorAll(".reveal");
  for (let i = 0; i < reveals.length; i++) {
    const windowHeight = window.innerHeight;
    const elementTop = reveals[i].getBoundingClientRect().top;
    const elementVisible = 100; // jarak sebelum muncul

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", revealOnScroll);

revealOnScroll();

const backToTop = document.getElementById("backToTop");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    backToTop.style.display = "block";
  } else {
    backToTop.style.display = "none";
  }
});

backToTop.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});
