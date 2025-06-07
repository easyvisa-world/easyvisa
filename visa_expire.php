<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GTA Visa Calculator — EasyVisa</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
  <style>
    body { background: #252228; min-height: 100vh;}
    .visa-bg-flag {
      position: absolute; inset: 0; z-index: 0;
      background-repeat: no-repeat;
      background-size: 80% auto;
      background-position: center 42%;
      opacity: 0.12;
      filter: grayscale(0.1) blur(0.5px);
      transition: background-image 0.4s;
      pointer-events: none;
    }
    .visa-container {
      position: relative;
      z-index: 2;
      max-width: 480px;
      margin: 48px auto 0 auto;
      padding: 2.3rem 1.2rem 1.7rem 1.2rem;
      background: rgba(24, 26, 36, 0.97);
      border-radius: 28px;
      border: 3px solid #fff;
      box-shadow: 0 0 48px 0 #14fff199, 0 2px 30px #00d8ff50;
      overflow: hidden;
    }
    .visa-header-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }
    .visa-logo {
      height: 48px;
      border-radius: 12px;
      box-shadow: 0 2px 10px #0ff3f99a;
      background: #fff;
    }
    .visa-link-btn {
      border-radius: 9999px;
      background: linear-gradient(90deg, #14fff1 0%, #9747ff 100%);
      color: #222;
      font-weight: 800;
      font-size: 1rem;
      padding: 0.8em 1.7em;
      border: none;
      margin-left: 10px;
      transition: background 0.22s, color 0.13s, box-shadow 0.12s;
      box-shadow: 0 0 18px #14fff169;
      text-shadow: 0 1px 6px #fff8;
    }
    .visa-link-btn:hover {
      background: linear-gradient(90deg, #9747ff 0%, #14fff1 100%);
      color: #fff;
      box-shadow: 0 0 24px #9747ff55;
    }
    .visa-title {
      font-family: 'Arial Black', Impact, sans-serif;
      font-size: 2.1rem;
      color: #fff;
      text-shadow: 0 3px 24px #00d8ffcc, 2px 2px 0 #000a;
      letter-spacing: 0.04em;
      margin-bottom: 1.7rem;
      text-align: center;
      text-transform: uppercase;
    }
    .visa-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem; }
    @media (max-width: 600px) { .visa-form-grid { grid-template-columns: 1fr; gap: 0.9rem; } }
    .visa-label {
      color: #ffe36e;
      font-family: 'Arial Black', Impact, sans-serif;
      text-shadow: 0 2px 8px #000b;
      font-size: 1.01rem;
      margin-bottom: 0.28em;
      letter-spacing: 0.03em;
    }
    .visa-input, .visa-select {
      width: 100%;
      background: #232332;
      color: #fff;
      border: none;
      border-radius: 13px;
      font-size: 1.13rem;
      padding: 0.89em 1.1em;
      outline: none;
      font-family: inherit;
      box-shadow: 0 0 0 2.5px #14fff1;
      transition: box-shadow 0.18s, background 0.19s;
      margin-bottom: 0.11em;
      appearance: none;
      position: relative;
    }
    .visa-select {
      background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 0.8em center;
      background-size: 1.3em;
      cursor: pointer;
    }
    .visa-input:focus, .visa-select:focus {
      box-shadow: 0 0 0 3.5px #ff36e6;
      background: #191b22;
    }
    .visa-btn-row {
      display: flex;
      gap: 1.2rem;
      justify-content: center;
      margin: 1.7rem 0 0.7rem 0;
      flex-wrap: wrap;
    }
    .visa-btn {
      display: flex;
      align-items: center;
      gap: 0.4em;
      font-family: 'Arial Black', Impact, sans-serif;
      font-size: 1.14rem;
      text-shadow: 0 2px 12px #000c;
      padding: 0.7em 2em;
      border-radius: 1.2em;
      border: none;
      cursor: pointer;
      background: linear-gradient(92deg,#0ff3f9 0%,#ff36e6 100%);
      color: #fff;
      font-weight: 800;
      box-shadow: 0 0 10px #00d8ff55;
      transition: filter 0.13s, background 0.13s, color 0.12s, transform 0.13s;
    }
    .visa-btn:active { transform: scale(0.97);}
    .visa-btn:hover {
      filter: brightness(1.14) saturate(1.22);
      background: linear-gradient(92deg,#ff36e6 0%,#0ff3f9 100%);
      color: #ffe36e;
      box-shadow: 0 0 22px #ff36e655;
    }
    .visa-btn.tg {
      background: linear-gradient(90deg,#3dd6f9 0%,#5e72eb 100%);
      color: #fff;
    }
    .visa-result-block {
      margin-top: 1.2rem;
      background: #191b28ea;
      border-radius: 17px;
      padding: 1.1rem 1.2rem;
      box-shadow: 0 0 10px #00d8ff44;
      text-align: center;
    }
    .visa-result-label {
      color: #fff;
      font-family: 'Arial Black', Impact, sans-serif;
      letter-spacing: 0.02em;
      font-size: 1.11rem;
      text-shadow: 0 2px 7px #000b;
    }
    .visa-result-date {
      color: #00d8ff;
      font-size: 2.09rem;
      font-family: 'Arial Black', Impact, sans-serif;
      text-shadow: 0 2px 20px #ff36e6cc;
      margin-top: 0.4em;
      letter-spacing: 0.03em;
      font-weight: 900;
    }
    .visa-footer {
      margin: 1.6rem auto 1.1rem auto;
      max-width: 480px;
      text-align: center;
      background: #13141d;
      border-radius: 17px;
      box-shadow: 0 0 14px #00d8ff38;
      padding: 1.19em 0.6em 1.05em 0.6em;
    }
    .visa-footer-text {
      color: #fff;
      font-size: 1.09rem;
      font-family: 'Arial Black', Impact, sans-serif;
      text-shadow: 0 1px 10px #00d8ff55;
      margin-bottom: 0.8em;
    }
    .visa-footer-btns {
      display: flex;
      gap: 1.2rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 0.3em;
    }
    .visa-footer-btn {
      display: flex;
      align-items: center;
      gap: 0.5em;
      font-size: 1.09rem;
      font-weight: 700;
      padding: 0.69em 1.44em;
      border-radius: 0.9em;
      text-decoration: none;
      background: linear-gradient(90deg,#28d146 0%,#25f8c5 100%);
      color: #191d2b;
      box-shadow: 0 0 8px #14fff138;
      transition: background 0.11s, color 0.11s, transform 0.09s;
      margin: 0.14em;
    }
    .visa-footer-btn:hover {
      filter: brightness(1.18) saturate(1.3);
      color: #fff;
      transform: scale(1.04);
    }
    .visa-footer-btn.tg { background: linear-gradient(90deg,#2e87ff 0%,#30f2ff 100%);}
    .visa-footer-btn.wa { background: linear-gradient(90deg,#28d146 0%,#25f8c5 100%);}
    .visa-error {
      color: #ff36e6;
      font-weight: 800;
      text-align: center;
      margin: 1rem 0 0.4rem 0;
      text-shadow: 0 2px 8px #ff36e6b2;
      font-family: 'Arial Black', Impact, sans-serif;
    }
    .visa-hint {
      color: #00d8ff;
      background: #191b28;
      font-size: 1rem;
      font-family: 'Arial Black', Impact, sans-serif;
      text-shadow: 0 2px 16px #00d8ff77;
      padding: 0.59em 0.9em;
      border-radius: 12px;
      text-align: center;
      margin: 1.12em 0 0.9em 0;
      box-shadow: 0 2px 6px #00d8ff18;
      letter-spacing: 0.01em;
    }
  </style>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/head_links.php'; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php'; ?>

  <div id="visa-bg-flag" class="visa-bg-flag"></div>
  <div class="visa-container">
    <div class="visa-header-row">
      <img src="https://easyvisa.world/logo192.png" alt="EasyVisa" class="visa-logo" />
      <a href="https://easyvisa.world" target="_blank" class="visa-link-btn">На сайт EasyVisa</a>
    </div>
    <div class="visa-title">Расчёт даты выезда</div>
    <form id="visaForm" autocomplete="off">
      <div class="visa-form-grid">
        <div>
          <div class="visa-label">Дата прилёта</div>
          <input type="date" id="arrival-date" class="visa-input" required />
        </div>
        <div>
          <div class="visa-label">Страна</div>
          <select id="country" class="visa-select" required>
            <option value="">—</option>
            <option value="indonesia">Индонезия</option>
            <option value="thailand">Таиланд</option>
            <option value="vietnam">Вьетнам</option>
          </select>
        </div>
        <div style="grid-column: 1/3;">
          <div class="visa-label">Тип визы</div>
          <select id="visa-type" class="visa-select" required>
            <option value="">Сначала выберите страну</option>
          </select>
        </div>
      </div>
      <div id="error" class="visa-error" style="display:none"></div>
      <div class="visa-btn-row">
        <button type="button" class="visa-btn" onclick="calculateExitDate()">
          <svg width="20" height="20" fill="none" class="mr-1 -ml-1"><path stroke="#fff" stroke-width="2" d="M3 10.5h10M13 8.5l2 2-2 2"/></svg>
          Рассчитать
        </button>
        <a id="tg-remind" href="#" target="_blank" style="display:none" class="visa-btn tg">
          <svg width="20" height="20" fill="none" class="mr-1 -ml-1"><path stroke="#fff" stroke-width="2" d="M2 10l7 6 9-13"/></svg>
          Напомнить в Telegram
        </a>
      </div>
      <div id="visa-hint" class="visa-hint" style="display:none">Telegram-бот EasyVisa напомнит заранее — не пропустите дату выезда!</div>
      <div id="result-block" class="visa-result-block" style="display:none">
        <div class="visa-result-label">Ваша последняя дата пребывания:</div>
        <div id="result-date" class="visa-result-date"></div>
      </div>
    </form>
  </div>
  <div class="visa-footer">
    <div class="visa-footer-text">Нужно продлить или оформить визу? Напиши нам!</div>
    <div class="visa-footer-btns">
      <a href="https://wa.me/84776739907" target="_blank" class="visa-footer-btn wa">WhatsApp</a>
      <a href="https://t.me/evisa_support" target="_blank" class="visa-footer-btn tg">Telegram</a>
    </div>
  </div>
  <script>
    const flagMap = {
      indonesia: "https://upload.wikimedia.org/wikipedia/commons/9/9f/Flag_of_Indonesia.svg",
      thailand: "https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg",
      vietnam: "https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg"
    };
    const visas = {
      indonesia: [
        { name: "B1 (30 дней)", days: 30 },
        { name: "C1 (60 дней)", days: 60 },
        { name: "D1 (60 дней)", days: 60 },
        { name: "D12 (180 дней)", days: 180 },
        { name: "E33G (360 дней)", days: 360 }
      ],
      thailand: [
        { name: "Single Entry (60 дней)", days: 60 }
      ],
      vietnam: [
        { name: "On Arrival (45 дней)", days: 45 },
        { name: "Tourist (90 дней)", days: 90 }
      ]
    };
    const visaBgFlag = document.getElementById('visa-bg-flag');
    const countrySelect = document.getElementById('country');
    const visaSelect = document.getElementById('visa-type');
    const resultBlock = document.getElementById('result-block');
    const resultDate = document.getElementById('result-date');
    const errorDiv = document.getElementById('error');
    const tgBtn = document.getElementById('tg-remind');
    const visaHint = document.getElementById('visa-hint');

    function updateFlag() {
      const c = countrySelect.value;
      if (c && flagMap[c]) {
        visaBgFlag.style.backgroundImage = `url('${flagMap[c]}')`;
      } else {
        visaBgFlag.style.backgroundImage = "none";
      }
    }

    countrySelect.addEventListener('change', function() {
      visaSelect.innerHTML = '';
      updateFlag();
      const country = countrySelect.value;
      if (!country || !visas[country]) {
        visaSelect.innerHTML = '<option value="">Сначала выберите страну</option>';
        return;
      }
      visas[country].forEach(visa => {
        const opt = document.createElement('option');
        opt.value = visa.days;
        opt.textContent = visa.name;
        visaSelect.appendChild(opt);
      });
    });

    function calculateExitDate() {
      errorDiv.style.display = 'none';
      resultBlock.style.display = 'none';
      tgBtn.style.display = 'none';
      visaHint.style.display = 'none';

      const arrival = document.getElementById('arrival-date').value;
      const country = countrySelect.value;
      const visaDays = parseInt(visaSelect.value);

      if (!arrival || !country || isNaN(visaDays)) {
        errorDiv.textContent = "Пожалуйста, заполните все поля.";
        errorDiv.style.display = 'block';
        return;
      }

      const arrDate = dayjs(arrival);
      if (!arrDate.isValid()) {
        errorDiv.textContent = "Некорректная дата прилёта.";
        errorDiv.style.display = 'block';
        return;
      }

      // Вычисляем дату последнего дня
      const exitDate = arrDate.add(visaDays - 1, 'day');
      const formatted = exitDate.format('DD.MM.YYYY');

      resultDate.textContent = formatted;
      resultBlock.style.display = 'block';

      tgBtn.href = `https://t.me/easyvisa_appbot?start=${formatted}`;
      tgBtn.style.display = 'flex';

      visaHint.style.display = 'block';
    }
    // init
    updateFlag();
  </script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
</body>
</html>