<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/smktelkomnew.png')}}" />
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Web Design Mastery | Porsche</title>
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap");

    :root {
      --primary-color: #d9534f; /* Warna merah */
      --text-dark: #232637; /* Warna hitam */
      --white: #ffffff;
      --max-width: 1200px;
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    .btn {
      position: absolute;
      padding: 1rem 2rem;
      outline: none;
      border: none;
      font-weight: 600;
      cursor: pointer;
    }

    a {
      text-decoration: none;
      transition: 0.3s;
    }

    body {
      font-family: "Noto Sans JP", sans-serif;
      background-color: #dbdce0;
    }

    body::after {
      position: fixed;
      content: "";
      height: 100%;
      width: 0;
      top: 0;
      right: 0;
      background-color: var(--text-dark);
      z-index: -1;
      animation: body-bg 1s ease-in-out forwards;
    }

    @keyframes body-bg {
      0% {
        width: 0vw;
      }
      100% {
        width: 50vw;
      }
    }

    body::before {
      position: fixed;
      content: "0";
      top: 0;
      left: 0;
      transform: translate(-50%, -50%);
      font-size: 70rem;
      font-weight: 200;
      color: var(--white);
      z-index: -1;
      opacity: 0.5;
    }

    .container {
      position: relative;
      isolation: isolate;
      min-height: 100vh;
      max-width: var(--max-width);
      margin-inline: auto;
      overflow: hidden;
    }

    nav {
      padding-block: 2rem 0;
      padding-inline: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
    }

    .nav__links {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 2rem;
    }

    .nav__links a {
      font-weight: 500;
    }

    .nav__links .logo {
      font-size: 1.2rem;
      font-weight: 800;
    }

    .nav__left a {
      color: var(--text-dark); /* Tetap hitam */
    }

    .nav__left a:hover {
      color: var(--primary-color); /* Merah saat hover */
    }

    .nav__right a {
      color: var(--white); /* Putih */
    }

    .nav__right a:hover {
      color: var(--primary-color); /* Merah saat hover */
    }

    /* Custom navbar styling */
    .nav__right .dropdown-menu {
      background-color: var(--text-dark);
    }

    .nav__right .dropdown-menu .dropdown-item {
      color: var(--white);
    }

    .nav__right .dropdown-menu .dropdown-item:hover {
      background-color: var(--primary-color);
    }

    .letter-s {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 40rem;
      line-height: 40rem;
      font-weight: 900;
      color: var(--primary-color);
    }

    .container img {
      position: absolute;
      width: 100%;
      max-width: 200px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      filter: drop-shadow(0 0 50px rgba(0, 0, 0, 0.8));
    }

    .container h4 {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 5rem;
      color: var(--white);
      letter-spacing: 25px;
    }

    .text__left {
      transform: translate(calc(-50% - 250px), -50%);
    }

    .text__right {
      transform: translate(calc(-50% + 250px), -50%);
    }

    .container .explore {
      top: 50%;
      left: 50%;
      transform: translate(-50%, calc(-50% + 225px));
      color: var(--text-dark);
      background-color: var(--white);
      box-shadow: 0 0 50px rgba(0, 0, 0, 0.4);
    }

    .container .print {
      top: 50%;
      right: 0;
      transform: translate(0, -50%) rotate(90deg);
      padding: calc(1rem - 4px) calc(2rem - 4px);
      color: var(--white);
      background-color: transparent;
      border: 1px solid var(--white);
    }

    .container .catalog {
      top: 25%;
      left: 0;
      transform: translate(0, -50%) rotate(-90deg);
      padding: calc(1rem - 4px) calc(2rem - 4px);
      color: var(--text-dark);
      background-color: transparent;
      border: 1px solid var(--text-dark);
    }

    .container h5 {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 1.2rem;
      font-weight: 500;
    }

    .container h5::after {
      position: absolute;
      content: "";
      height: 1px;
      width: 100px;
      top: 50%;
    }

    .feature-1 {
      color: var(--text-dark);
      transform: translate(calc(-50% - 300px), calc(-50% - 200px));
    }

    .feature-2 {
      color: var(--white);
      transform: translate(calc(-50% + 300px), calc(-50% - 200px));
    }

    .feature-3 {
      color: var(--text-dark);
      transform: translate(calc(-50% - 300px), calc(-50% + 200px));
    }

    .feature-4 {
      color: var(--white);
      transform: translate(calc(-50% + 300px), calc(-50% + 200px));
    }

    .feature-1::after,
    .feature-3::after {
      right: 0;
      transform: translate(calc(100% + 40px), -50%);
      background-color: var(--text-dark);
    }

    .feature-2::after,
    .feature-4::after {
      left: 0;
      transform: translate(calc(-100% - 40px), -50%);
      background-color: var(--white);
    }

    .footer {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      padding-inline: 1rem;
      bottom: 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
    }

    .footer p {
      font-size: 0.9rem;
      color: var(--text-dark);
    }

    .footer__links {
      list-style: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 2rem;
    }

    .footer__links li {
      opacity: 0;
      animation: fade__in 0.3s ease-in-out forwards;
    }

    .footer__links li:nth-child(1) {
      animation-delay: 6s;
    }
    .footer__links li:nth-child(2) {
      animation-delay: 6.2s;
    }
    .footer__links li:nth-child(3) {
      animation-delay: 6.4s;
    }
    .footer__links li:nth-child(4) {
      animation-delay: 6.6s;
    }
    .footer__links li:nth-child(5) {
      animation-delay: 6.8s;
    }
    .footer__links a {
  color: var(--white); /* Tetap putih */
}

.footer__links a:hover {
  color: var(--primary-color); /* Merah saat hover */
}

    @keyframes fade__in {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }
  </style>
  <body>
    <div class="container">
        <nav>
            <ul class="nav__links nav__left">
              <li><a href="#" class="logo">Buku Saku</a></li>
              <li><a href="https://mylms.telkomschools.sch.id/login/index.php">Mylms</a></li>
              <li><a href="https://igracias.telkomschools.sch.id/ts/login/">Igracias</a></li>
              <li><a href="https://lions.smktelkom-pwt.sch.id/">Lions</a></li>
            </ul>
            <ul class="nav__links nav__right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login/Register
                </a>
                <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                  <li><a class="dropdown-item" href="{{ route('student_login') }}">Login sebagai Siswa</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin_login') }}">Login sebagai Guru</a></li>
                  <li><a class="dropdown-item" href="{{ route('login') }}">Login sebagai Admin</a></li>
                </ul>
              </li>
            </ul>
          </nav>
      <span class="letter-s">K</span>
      <img src="{{asset('assets/images/smktelkomnew.png')}}" alt="header" />
      <h4 class="text__left">BU</h4>
      <h4 class="text__right">US</h4>
      <button class="btn explore">Think Success</button>
      <button class="btn print">BUKUS V2</button>
      <h5 class="feature-1">Pelanggaran</h5>
      <h5 class="feature-2">Berbintang</h5>
      <h5 class="feature-3">Pasal</h5>
      <h5 class="feature-4">Peraturan</h5>
      <footer class="footer">
        <p>Copyright © 2024 Arya and Dika XII PPLG. All rights reserved.</p>
        <div class="footer__links">
          <li><a href="https://www.facebook.com/stematelpwt">Facebook</a></li>
          <li><a href="https://www.instagram.com/stematelpwt/">Instagram</a></li>
          <li><a href="#">TikTok</a></li>
        </div>
      </footer>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".container .letter-s", {
  duration: 1000,
  delay: 1000,
});
ScrollReveal().reveal(".container img", {
  duration: 1000,
  delay: 1500,
});
ScrollReveal().reveal(".container .text__left", {
  ...scrollRevealOption,
  origin: "right",
  delay: 2000,
});
ScrollReveal().reveal(".container .text__right", {
  ...scrollRevealOption,
  origin: "left",
  delay: 2000,
});
ScrollReveal().reveal(".container .explore", {
  duration: 1000,
  delay: 2500,
});
ScrollReveal().reveal(".container h5", {
  duration: 1000,
  interval: 500,
  delay: 3000,
});
ScrollReveal().reveal(".container .catalog", {
  duration: 1000,
  delay: 5000,
});
ScrollReveal().reveal(".container .print", {
  duration: 1000,
  delay: 5500,
});
ScrollReveal().reveal(".footer p", {
  duration: 1000,
  delay: 7000,
});

    </script>
  </body>
</html>
