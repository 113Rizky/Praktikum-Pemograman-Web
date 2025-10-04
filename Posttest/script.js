const yearSpan = document.getElementById("year");
yearSpan.textContent = new Date().getFullYear();


const form = document.querySelector("form");
form.addEventListener("submit", function (e) {
  e.preventDefault(); 

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();

  if (name === "" || email === "") {
    alert("⚠️ Nama dan Email wajib diisi!");
    return;
  }

  alert("✅ Terima kasih " + name + ", pesanan kamu sudah dikirim!");
  form.reset(); 
});


const pesanBtn = document.querySelector(".btn.btn-primary");
pesanBtn.addEventListener("click", () => {
  alert("📞 Silakan isi form pemesanan di bawah 👇");
});


const darkModeToggle = document.createElement("button");
darkModeToggle.textContent = "🌙 Dark Mode";
darkModeToggle.classList.add("btn");
darkModeToggle.style.margin = "1rem";

document.body.prepend(darkModeToggle);

darkModeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
});

const darkStyle = document.createElement("style");
darkStyle.textContent = `
  .dark-mode {
    background-color: #000;   /* hitam pekat */
    color: #f5f5f5;           /* teks putih abu */
  }
  .dark-mode header, .dark-mode footer {
    background: #111;         /* hampir hitam */
    color: #fff;
  }
  .dark-mode .card {
    background: #1a1a1a;      /* abu gelap */
    border: 1px solid #333;   /* biar card keliatan */
    color: #f5f5f5;
  }
  .dark-mode a {
    color: #42a5f5;           /* biru terang */
  }
  .dark-mode .btn-primary {
    background: #e53935;      /* merah gaming */
    color: #fff;
  }
`;
document.head.appendChild(darkStyle);




function revealOnScroll() {
  const reveals = document.querySelectorAll(".reveal");
  for (let i = 0; i < reveals.length; i++) {
    const windowHeight = window.innerHeight;
    const elementTop = reveals[i].getBoundingClientRect().top;
    const elementVisible = 100; 

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
