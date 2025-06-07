<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>EasyVisa World — Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #151f2b 75%, #283754 100%);
      font-family: 'Russo One', Arial, sans-serif;
      margin: 0; min-height: 100vh; color: #fff;
    }
    .gta-main-container {
      margin: 3.5rem auto 2rem auto;
      max-width: 900px;
      padding: 2.5rem 1.1rem 2.3rem 1.1rem;
      border-radius: 2.5rem;
      background: linear-gradient(120deg, #212b36ee 88%, #1fa96c33 100%);
      box-shadow: 0 0 60px 8px #29fc9444, 0 0 0 4px #29fc94;
      display: flex; flex-direction: column; align-items: center;
      position: relative;
    }
    .gta-main-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 2.7rem;
      color: #ffe95d;
      letter-spacing: 0.11em;
      margin-bottom: 1.2rem;
      text-shadow: 0 4px 28px #151f2bcc, 0 0 2px #000;
      text-align: center;
    }
    .gta-main-sub {
      text-align: center;
      font-size: 1.21rem;
      color: #29fc94;
      margin-bottom: 2.2rem;
      font-family: 'Russo One', Arial, sans-serif;
      text-shadow: 0 2px 18px #2cffd9a6;
    }
    .gta-country-list {
      display: flex;
      gap: 2.2rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 2.7rem;
    }
    .gta-main-country-btn  {
      background: linear-gradient(90deg, #29fc94 10%, #ffe95d 90%);
      color: #171f1c;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.45rem;
      font-weight: 900;
      border: none;
      border-radius: 1.6em;
      padding: 1.25em 2.25em;
      cursor: pointer;
      box-shadow: 0 2px 16px #29fc94a0, 0 0 10px #ffe95d77;
      margin-bottom: 0.12em;
      letter-spacing: .06em;
      position: relative;
      transition: background .17s, color .17s, box-shadow .19s, transform .16s;
      text-shadow: 0 1px 12px #fff48c88;
      outline: none;
      z-index: 2;
    }
    .gta-main-country-btn:hover, .gta-main-country-btn.active {
      background: linear-gradient(90deg, #ffe95d 25%, #29fc94 100%);
      color: #171f1c;
      box-shadow: 0 3px 40px #ffe95dbb, 0 0 8px #29fc94cc;
      transform: scale(1.045);
    }
    .gta-country-menu {
      position: absolute;
      min-width: 320px;
      background: #171f1ceb;
      border-radius: 1.6rem;
      box-shadow: 0 6px 18px #29fc9444, 0 0 0 2px #29fc94;
      padding: 2rem 2.2rem 1.6rem 2.2rem;
      z-index: 22;
      left: 50%; top: 47%;
      transform: translate(-50%, 0) scale(1.02);
      display: none;
      flex-direction: column;
      gap: 1.15em;
      animation: fadeIn .29s;
      backdrop-filter: blur(2.5px);
    }
    .gta-country-menu.active { display: flex; }
    .gta-country-menu-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      color: #ffe95d;
      font-size: 1.7rem;
      margin-bottom: 0.8em;
      font-weight: 900;
      text-align: center;
      letter-spacing: .02em;
      text-shadow: 0 2px 12px #ffe95d77;
    }
    .gta-country-menu-links {
      display: flex;
      flex-direction: column;
      gap: 19px;
      padding: 3px 0 3px 0;
    }
    .gta-menu-link {
      background: linear-gradient(90deg, #29fc94 10%, #ffe95d 90%);
      color: #171f1c;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.17rem;
      font-weight: 900;
      padding: 1.05em 2.1em;
      border: none;
      border-radius: 1.4em;
      text-decoration: none;
      transition: background .17s, color .15s, box-shadow .12s;
      text-shadow: 0 1px 10px #fff48c44;
      box-shadow: 0 2px 14px #29fc94a0, 0 0 12px #ffe95d33;
      display: block;
      text-align: left;
      margin: 0;
      line-height: 1.1;
      letter-spacing: .02em;
      outline: none;
    }
    .gta-menu-link:hover {
      background: linear-gradient(90deg, #ffe95d 38%, #29fc94 100%);
      color: #15191c;
      filter: brightness(1.10);
      box-shadow: 0 6px 28px #29fc94b6, 0 0 18px #ffe95d88;
    }
    @keyframes fadeIn { from { opacity: 0; transform: scale(0.96);} to { opacity: 1; transform: scale(1.02);} }
    .gta-bottom-links {
      margin-top: 2.7rem;
      display: flex;
      gap: 2.3rem;
      justify-content: center;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.16rem;
      font-weight: 900;
      text-shadow: 0 2px 11px #2cffd9a4;
      letter-spacing: .02em;
    }
    .gta-bottom-links a {
      color: #29fc94;
      text-decoration: none;
      padding: 0.4em 1em;
      border-radius: 1em;
      background: #222f3a88;
      transition: background .16s, color .13s;
    }
    .gta-bottom-links a:hover { background: #ffe95d; color: #191c1f; }
    @media (max-width: 700px) {
      .gta-main-container { padding: 1.2rem 0.2rem 2.1rem 0.2rem; border-radius: 1.4rem;}
      .gta-main-title { font-size: 1.5rem;}
      .gta-main-country-btn  { font-size: 1.07rem; padding: 0.6em 1.3em; border-radius: 1.1em;}
      .gta-country-menu { min-width: 170px; padding: 0.8rem 0.5rem;}
      .gta-country-menu-title { font-size: 1.1rem;}
      .gta-menu-link { font-size: 0.93rem; padding: 0.95em 1.15em; border-radius: 1em;}
      .gta-bottom-links { font-size: 0.97rem; gap: 1.2rem;}
    }
  </style>
</head>
<body>
<div class="main-header-container-all-page">


<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>

<div class="gta-main-container">
  <div class="gta-main-title">EASYVISA WORLD</div>
  <div class="gta-main-sub">Визы и бизнес-иммиграция в Азии!</div>
  <div class="gta-country-list">
    <button class="gta-main-country-btn" data-country="Индонезия">Индонезия</button>
    <button class="gta-main-country-btn" data-country="Вьетнам">Вьетнам</button>
    <button class="gta-main-country-btn" data-country="Таиланд">Таиланд</button>
    <button class="gta-main-country-btn" data-country="Камбоджа">Камбоджа</button>
    <button class="gta-main-country-btn" data-country="Сингапур">Сингапур</button>
  </div>

  <div class="gta-country-menu" id="gta-country-menu">
    <div class="gta-country-menu-title" id="gta-country-menu-title"></div>
    <div class="gta-country-menu-links" id="gta-country-menu-links"></div>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
 </div>
<script>
const visasByCountry = {
  "Индонезия": [
    {label: "e-VOA — 30 + 30 дней", link: "/id-b1.php"},
    {label: "Продление e-VOA — 30 дней", link: "/id-extend-b1.php"},
    {label: "D12 (Pre-Investment, 1 год)", link: "/id-d12.php"},
    {label: "KITAS (Фрилансер)", link: "/id-kitas-e33g.php"},
    {label: "Регистрация PT PMA", link: "/id-reg-pt-pma.php"}
  ],
  "Вьетнам": [
    {label: "Single - 90 дней", link: "/vn-tour-single.php"},
    {label: "Multi - 90 дней", link: "/vn-tour-multi.php"}
  ],
  "Таиланд": [
    {label: "DTV - 5 лет", link: "/th-dtv.php"},
  ],
  "Камбоджа": [
    {label: "Tourist - 30 дней", link: "/kh-tourist.php"}
  ],
  "Сингапур": [
    {label: "Tourist - 30 дней", link: "/sg-tourist.php"},
  ]
};

const countryBtns = document.querySelectorAll('.gta-main-country-btn');
const menu = document.getElementById('gta-country-menu');
const menuTitle = document.getElementById('gta-country-menu-title');
const menuLinks = document.getElementById('gta-country-menu-links');

countryBtns.forEach(btn => {
  btn.addEventListener('mouseenter', () => showCountryMenu(btn));
  btn.addEventListener('click', (e) => { showCountryMenu(btn); e.stopPropagation(); });
});

function showCountryMenu(btn) {
  const c = btn.getAttribute('data-country');
  menuTitle.textContent = `Услуги: ${c}`;
  menuLinks.innerHTML = "";
  (visasByCountry[c]||[]).forEach(item=>{
    const link = document.createElement('a');
    link.href = item.link;
    link.textContent = item.label;
    link.className = "gta-menu-link";
    menuLinks.appendChild(link);
  });
  // Позиционируем меню под кнопкой
  const rect = btn.getBoundingClientRect();
  const contRect = document.querySelector('.gta-main-container').getBoundingClientRect();
  menu.style.left = (rect.left-contRect.left+rect.width/2) + "px";
  menu.style.top = (rect.top-contRect.top+rect.height+6) + "px";
  menu.classList.add("active");
  document.querySelectorAll('.gta-main-country-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
}
function hideMenu() {
  menu.classList.remove("active");
  document.querySelectorAll('.gta-main-country-btn').forEach(b=>b.classList.remove('active'));
}
menu.addEventListener("mouseleave", hideMenu);
document.body.addEventListener("click", hideMenu);
</script>
</body>
</html>