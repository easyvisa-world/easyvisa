<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Калькулятор даты выезда — EasyVisa</title>
  <meta name="description" content="Современный калькулятор расчёта срока визы для Индонезии, Таиланда и Вьетнама. Напоминание о выезде через Telegram.">
  <meta property="og:title" content="Калькулятор даты выезда — EasyVisa">
  <meta property="og:description" content="Быстро рассчитайте срок действия вашей визы и настройте напоминание в Telegram, чтобы не пропустить выезд!">
  <meta property="og:image" content="https://easyvisa.world/img/og-image.jpg">
  <meta property="og:url" content="https://data.easyvisa.world/">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="theme-color" content="#14fff1">
  <link rel="icon" href="https://easyvisa.world/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
  <link rel="stylesheet" href="/css/styles-data.css">

  
  
    <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>

</head>

<body>
  <div id="visa-bg-flag" class="visa-bg-flag"></div>

  <div class="visa-container">
    <div class="visa-header-row">
      <img src="/logo-visa.png" alt="EasyVisa" class="visa-logo" />
      <a href="https://contact.easyvisa.world" target="_blank" class="visa-link-btn">На сайт EasyVisa</a>
    </div>
    <div class="visa-title">Расчёт даты выезда</div>
    <form id="visaForm" autocomplete="off">
      <div class="visa-form-grid">
        <div>
          <label class="visa-label">Дата прилёта</label>
          <input type="date" id="arrival-date" class="visa-input" required />
        </div>
        <div>
          <label class="visa-label">Страна</label>
          <select id="country" class="visa-select-data" required>
            <option value="">—</option>
            <option value="indonesia">Индонезия</option>
            <option value="thailand">Таиланд</option>
            <option value="vietnam">Вьетнам</option>
          </select>
        </div>
        <div class="md:col-span-2" style="grid-column: 1 / -1;">
          <label class="visa-label">Тип визы</label>
          <select id="visa-type" class="visa-select-data" required>
            <option value="">Сначала выберите страну</option>
          </select>
        </div>
      </div>
      <div id="error" class="visa-error" style="display:none"></div>
      <div class="visa-btn-row">
        <button type="button" class="visa-btn-data" onclick="calculateExitDate()">
          <svg width="20" height="20" fill="none" class="mr-1 -ml-1"><path stroke="#fff" stroke-width="2" d="M3 10.5h10M13 8.5l2 2-2 2"/></svg>
          Рассчитать
        </button>
        <a id="tg-remind" href="#" target="_blank" style="display:none" class="visa-btn tg">
          <svg width="20" height="20" fill="none" class="mr-1 -ml-1"><path stroke="#fff" stroke-width="2" d="M2 10l7 6 9-13"/></svg>
          Напомнить в Telegram
        </a>
      </div>
      <div id="visa-hint" class="visa-hint" style="display:none">
        Telegram-бот <b>EasyVisa</b> напомнит заранее — не пропустите дату выезда!
      </div>
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
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
  <script>
    // ===== JS FOR CALC AND SELECTS =====
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
</body>
</html>
