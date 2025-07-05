(function() {
  'use strict';

  // Защита от повторной инициализации
  if (window.EVHeaderInitialized) {
    return;
  }
  window.EVHeaderInitialized = true;

  // Конфигурация
  const EV_CONFIG = {
    defaultLang: "RU",
    defaultCountry: "id",
    langs: ["RU", "EN"],
    foryou: [
      { name: {RU: "Гайд по Бали", EN: "Bali Guide"}, url: "/bali-guide.php" },
      { name: {RU: "FAQ", EN: "FAQ"}, url: "/faq.php" },
      { name: {RU: "Калькулятор виз", EN: "Visa Calculator"}, url: "/data.php" },
      { name: {RU: "Квиз по визам", EN: "Visa Quiz"}, url: "/visa-quiz.php" }
    ],
    countries: [
      { code: "id", name: {RU: "Индонезия", EN: "Indonesia"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/id.svg" },
      { code: "th", name: {RU: "Таиланд", EN: "Thailand"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/th.svg" },
      { code: "vn", name: {RU: "Вьетнам", EN: "Vietnam"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/vn.svg" },
      { code: "sg", name: {RU: "Сингапур", EN: "Singapore"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/sg.svg" },
      { code: "kh", name: {RU: "Камбоджа", EN: "Cambodia"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kh.svg" },
      { code: "kr", name: {RU: "Южная Корея", EN: "South Korea"}, flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kr.svg" }
    ],
    visas: {
      id: [
        { code: "b1", labels: {RU: "B1 (e-VOA) - 30+30 дн.", EN: "B1 (VOA 30+30)"}, url: "/id-b1.php" },
        { code: "extb1", labels: {RU: "Продление B1 - 30 дн.", EN: "B1 Extend"}, url: "/id-extend-b1.php" },
        { code: "d12", labels: {RU: "D12 - 1 год", EN: "D12 (Pre-Investment)"}, url: "/id-d12.php" },
        { code: "kitas-e33g", labels: {RU: "KITAS E33G - 1 год", EN: "KITAS E33G"}, url: "/id-kitas-e33g.php" },
        { code: "kitas-e28a", labels: {RU: "KITAS E28A - Investor", EN: "KITAS E28A"}, url: "/id-kitas-e28a.php" }
      ],
      th: [
        { code: "dtv", labels: {RU: "DTV - 5 лет", EN: "DTV - 5 years"}, url: "/th-dtv.php" }
      ],
      vn: [
        { code: "tour-single", labels: {RU: "E-visa single - 90 дней", EN: "E-visa single"}, url: "/vn-tour-single.php" },
        { code: "tour-multi", labels: {RU: "E-visa multi - 90 дней", EN: "E-visa multi"}, url: "/vn-tour-multi.php" }
      ],
      sg: [
        { code: "tourist", labels: {RU: "Tourist - 30 дней", EN: "Tourist"}, url: "/sg-tourist.php" }
      ],
      kh: [
        { code: "tourist", labels: {RU: "Туристические визы", EN: "Tourist visas"}, url: "/kh-tourist.php" }
      ],
      kr: [
        { code: "tourist", labels: {RU: "C3 - 90 дней", EN: "Tourist"}, url: "/kor-tourist.php" },
        { code: "nomad", labels: {RU: "F1 - 1 год", EN: "Digital nomad"}, url: "/kor-nomad.php" }
      ]
    },
    biz: {
      id: [
        { code: "reg-pt-pma", labels: {RU: "Регистрация PT PMA", EN: "PT PMA Registration"}, url: "/id-reg-pt-pma.php" },
        { code: "supp-pt-pma", labels: {RU: "Сопровождение PT PMA", EN: "PT PMA Support"}, url: "/id-supp-pt-pma.php" }
      ]
    },
    vizarun: {
      vn: [
        { code: "run-hcm", labels: {RU: "Визаран в Хошимин", EN: "Visa run to Ho Chi Minh"}, url: "/vn-run-hcm.php" }
      ]
    }
  };

  // Глобальные переменные для этого модуля
  let currentLang = localStorage.getItem("ev_lang") || EV_CONFIG.defaultLang;
  let currentCountry = localStorage.getItem("ev_country") || EV_CONFIG.defaultCountry;
  let currentVisa = null;

  // Утилиты
  const $ = (selector) => document.querySelector(selector);
  const $$ = (selector) => document.querySelectorAll(selector);

  // Функция для правильного позиционирования дропдаунов
  function positionDropdown(button, dropdown) {
    if (!button || !dropdown) return;

    try {
      const buttonRect = button.getBoundingClientRect();
      const viewportWidth = window.innerWidth;

      dropdown.style.left = '';
      dropdown.style.right = '';
      dropdown.style.top = 'calc(100% + 8px)';
      dropdown.style.transform = '';

      if (viewportWidth <= 768) {
        dropdown.style.left = '50%';
        dropdown.style.transform = 'translateX(-50%)';
        dropdown.style.minWidth = 'calc(100vw - 32px)';
        dropdown.style.maxWidth = 'calc(100vw - 32px)';
      } else {
        const rightEdge = buttonRect.left + dropdown.offsetWidth;
        if (rightEdge > viewportWidth - 20) {
          dropdown.style.right = '0';
          dropdown.style.left = 'auto';
        } else {
          dropdown.style.left = '0';
          dropdown.style.right = 'auto';
        }
      }
    } catch (error) {
      console.warn('Ошибка позиционирования дропдауна:', error);
    }
  }

  // Закрытие всех дропдаунов
  function closeAllDropdowns() {
    $$('.country-list, .visa-list, .biz-list, .lang-list, .foryou-list, .side-country-list, .side-visa-list').forEach(menu => {
      if (menu) menu.classList.remove('show');
    });
  }

  // Основная функция обновления всего
  function updateAll() {
    try {
      // Используем сохраненную страну из localStorage или определяем по URL
      let detectedCountry = localStorage.getItem("ev_country") || 'id';
      
      // Если не сохранена, определяем по URL
      if (!localStorage.getItem("ev_country")) {
        const path = window.location.pathname;
        if (path.includes('/th-')) detectedCountry = 'th';
        else if (path.includes('/vn-')) detectedCountry = 'vn';
        else if (path.includes('/sg-')) detectedCountry = 'sg';
        else if (path.includes('/kor-')) detectedCountry = 'kr';
        else if (path.includes('/kh-')) detectedCountry = 'kh';
      }
      
      currentCountry = detectedCountry;

      // Обновляем основное меню
      updateCountryButton(currentCountry);
      updateVisaButton(currentCountry);
      updateBizButton();
      updateLangButton();
      updateForYouButton();

      // Обновляем боковое меню
      updateSideCountryButton(currentCountry);
      updateSideVisaButton(currentCountry);

      // Строим списки из централизованных данных
      buildCountryList('#country-list');
      buildCountryList('#side-country-list');
      buildVisaList('#visa-list', currentCountry);
      buildVisaList('#side-visa-list', currentCountry);
      buildBizList();
      buildLangList();
      buildForYouList();
      buildSideCountryList();
      buildSideVisaList();
    } catch (error) {
      console.error('Ошибка обновления меню:', error);
    }
  }

  // Построение списка стран
  function buildCountryList(selector = '#country-list') {
    const list = $(selector);
    if (!list) return;

    list.innerHTML = '';
    EV_CONFIG.countries.forEach(country => {
      const div = document.createElement('div');
      div.innerHTML = `<img src="${country.flag}" class="country-flag">${country.name[currentLang]}`;
      div.addEventListener('click', (e) => {
        e.stopPropagation();
        currentCountry = country.code;
        localStorage.setItem("ev_country", currentCountry);
        
        // Немедленно обновляем отображение
        const currentFlag = $('#current-flag');
        const countryName = $('#country-name');
        if (currentFlag) currentFlag.src = country.flag;
        if (countryName) countryName.textContent = country.name[currentLang];
        
        updateAll();
        closeAllDropdowns();
      });
      list.appendChild(div);
    });
  }

  // Построение списка виз
  function buildVisaList(selector = '#visa-list', country = null) {
    const list = $(selector);
    if (!list) return;

    const visaCountry = country || currentCountry;
    list.innerHTML = '';
    const visas = EV_CONFIG.visas[visaCountry] || [];
    visas.forEach(visa => {
      const a = document.createElement('a');
      a.textContent = visa.labels[currentLang];
      a.href = visa.url || '#';
      a.addEventListener('click', (e) => {
        closeAllDropdowns();
      });
      list.appendChild(a);
    });
  }

  // Построение бизнес списка
  function buildBizList() {
    const wrap = $('#biz-drop');
    const list = $('#biz-list');
    if (!wrap || !list) return;

    list.innerHTML = '';
    const bizArr = EV_CONFIG.biz[currentCountry] || [];
    const runArr = (EV_CONFIG.vizarun && EV_CONFIG.vizarun[currentCountry]) || [];
    const items = bizArr.length ? bizArr : runArr;

    if (!items.length) {
      wrap.style.display = 'none';
      return;
    }

    wrap.style.display = 'inline-block';
    items.forEach(item => {
      const a = document.createElement('a');
      a.textContent = item.labels[currentLang];
      a.href = item.url || '#';
      a.addEventListener('click', (e) => {
        closeAllDropdowns();
      });
      list.appendChild(a);
    });
  }

  // Построение списка языков
  function buildLangList() {
    const list = $('#lang-list');
    if (!list) return;

    list.innerHTML = '';
    EV_CONFIG.langs.forEach(lang => {
      const div = document.createElement('div');
      div.textContent = lang;
      div.addEventListener('click', (e) => {
        e.stopPropagation();
        currentLang = lang;
        localStorage.setItem("ev_lang", lang);
        localStorage.setItem("selectedLang", currentLang);
        updateAll();
        closeAllDropdowns();

        const event = new CustomEvent('languageChanged', { detail: { language: lang } });
        document.dispatchEvent(event);

        if (window.applyTranslations) {
            window.applyTranslations();
        }
      });
      list.appendChild(div);
    });
  }

   // Построение списка "Для вас"
   function buildForYouList() {
    const list = $('#foryou-list');
    if (!list) return;

    list.innerHTML = '';
    EV_CONFIG.foryou.forEach(item => {
      const a = document.createElement('a');
      a.textContent = item.name[currentLang];
      a.href = item.url || '#';
      a.addEventListener('click', (e) => {
        closeAllDropdowns();
      });
      list.appendChild(a);
    });
  }

  // Обновление всех кнопок
  function updateCountryButton(country = 'id') {
    const countryInfo = EV_CONFIG.countries.find(c => c.code === country);
    if (!countryInfo) return;

    const currentFlag = $('#current-flag');
    const countryName = $('#country-name');

    if (currentFlag) currentFlag.src = countryInfo.flag;
    if (countryName) countryName.textContent = countryInfo.name[currentLang];

    // Обновляем также боковое меню
    updateSideCountryButton(country);
  }

  function updateVisaButton(country = 'id') {
    const visaLabel = $('#visa-label');
    if (visaLabel) {
      visaLabel.textContent = currentVisa ? currentVisa.labels[currentLang] : (currentLang === "RU" ? "Визы" : "Visas");
    }
  }

  function updateBizButton() {
    const bizLabel = $('#biz-label');
    const bizWrap = $('#biz-drop');

    if (!bizLabel || !bizWrap) return;

    const hasBiz = (EV_CONFIG.biz[currentCountry] && EV_CONFIG.biz[currentCountry].length > 0);
    const hasRun = (EV_CONFIG.vizarun && EV_CONFIG.vizarun[currentCountry] && EV_CONFIG.vizarun[currentCountry].length > 0);

    if (hasBiz || hasRun) {
      bizWrap.style.display = 'inline-block';
      bizLabel.textContent = hasBiz ? (currentLang === "RU" ? "Бизнес" : "Business") : (currentLang === "RU" ? "Визараны" : "Visa Runs");
    } else {
      bizWrap.style.display = 'none';
    }
  }

  function updateLangButton() {
    const langCode = $('#lang-code');
    if (langCode) langCode.textContent = currentLang;
  }

  function updateForYouButton() {
    // Кнопка "Для вас" статична, обновления не требует
  }

  // Построение бокового списка стран
  function buildSideCountryList() {
    const list = $('#side-country-list');
    if (!list) return;

    list.innerHTML = '';
    EV_CONFIG.countries.forEach(country => {
      const div = document.createElement('div');
      div.innerHTML = `<img src="${country.flag}" class="country-flag">${country.name[currentLang]}`;
      div.addEventListener('click', (e) => {
        e.stopPropagation();
        currentCountry = country.code;
        localStorage.setItem("ev_country", currentCountry);

        // Обновляем отображение в боковом меню
        const sideFlag = $('#side-current-flag');
        const sideName = $('#side-country-name');
        if (sideFlag) sideFlag.src = country.flag;
        if (sideName) sideName.textContent = country.name[currentLang];

        // Обновляем основное меню тоже
        const currentFlag = $('#current-flag');
        const countryName = $('#country-name');
        if (currentFlag) currentFlag.src = country.flag;
        if (countryName) countryName.textContent = country.name[currentLang];

        updateAll();
        closeAllDropdowns();
      });
      list.appendChild(div);
    });
  }

  // Построение бокового меню виз
  function buildSideVisaList() {
    const list = $('#side-visa-list');
    if (!list) return;

    list.innerHTML = '';
    const visas = EV_CONFIG.visas[currentCountry] || [];
    visas.forEach(visa => {
      const div = document.createElement('div');
      div.textContent = visa.labels[currentLang];
      div.addEventListener('click', (e) => {
        e.stopPropagation();
        currentVisa = visa;
        updateAll();
        closeAllDropdowns();
        if (visa.url) window.location = visa.url;
      });
      list.appendChild(div);
    });
  }

  // Обновление кнопок бокового меню
  function updateSideMenuBtns() {
    const country = EV_CONFIG.countries.find(c => c.code === currentCountry);
    if (!country) return;

    const sideFlag = $('#side-current-flag');
    const sideName = $('#side-country-name');
    const sideVisa = $('#side-visa-label');

    if (sideFlag) sideFlag.src = country.flag;
    if (sideName) sideName.textContent = country.name[currentLang];
    if (sideVisa) sideVisa.textContent = currentVisa ? currentVisa.labels[currentLang] : (currentLang === "RU" ? "Визы" : "Visas");

    buildSideMainMenu();
  }

  // Построение основного меню в боковой панели
  function buildSideMainMenu() {
    const sideMain = $('#side-main');
    if (!sideMain) return;

    const menuItems = [
      { name: {RU: "Главная", EN: "Home"}, url: "/" },
      { name: {RU: "Гайд по Бали", EN: "Country Guides"}, url: "/bali-guide.php" },
      { name: {RU: "FAQ", EN: "FAQ"}, url: "/faq.php" },
      { name: {RU: "Калькулятор виз", EN: "Visa Calculator"}, url: "/data.php" },
      { name: {RU: "Квиз по визам", EN: "Visa Quiz"}, url: "/visa-quiz.php" },
      { name: {RU: "Документы", EN: "Documents"}, url: "/doc.php" },
      { name: {RU: "Контакты", EN: "Contacts"}, url: "/contact.php" },
      { name: {RU: "Оплата", EN: "Payment"}, url: "/pay.php" },
      { name: {RU: "О нас", EN: "About"}, url: "/about.php" }      
    ];

    sideMain.innerHTML = '';
    menuItems.forEach(item => {
      const li = document.createElement('li');
      const a = document.createElement('a');
      a.textContent = item.name[currentLang];
      a.href = item.url;
      a.addEventListener('click', () => {
        closeSideMenu();
      });
      li.appendChild(a);
      sideMain.appendChild(li);
    });
  }

  // Переключение бокового меню
  function toggleSideMenu() {
    try {
      const sideMenu = $('#side-menu');
      const overlay = $('#side-menu-overlay');
      const body = document.body;

      if (!sideMenu || !overlay) {
        console.warn('Элементы бокового меню не найдены');
        return;
      }

      const isActive = sideMenu.classList.contains('active');

      if (isActive) {
        sideMenu.classList.remove('active');
        overlay.classList.remove('active');
        overlay.style.display = 'none';
        body.style.overflow = '';
      } else {
        sideMenu.classList.add('active');
        overlay.classList.add('active');
        overlay.style.display = 'block';
        body.style.overflow = 'hidden';
      }
    } catch (error) {
      console.error('Ошибка переключения бокового меню:', error);
    }
  }

  // Закрытие бокового меню
  function closeSideMenu() {
    const sideMenu = $('#side-menu');
    const overlay = $('#side-menu-overlay');

    if (sideMenu && overlay) {
      sideMenu.classList.remove('active');
      overlay.classList.remove('active');
      overlay.style.display = 'none';
      document.body.style.overflow = '';
    }
  }

  // Запуск инициализации
  // Инициализация после загрузки DOM
function safeInitialize(fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
}
  function initializeHeader() {
    if (!document.querySelector('#burger-btn') && !document.querySelector('#country-btn')) {
      setTimeout(initializeHeader, 100);
      return;
    }

    updateAll();
    buildSideMainMenu();

    // Обработчики для основных дропдаунов
    const dropdowns = [
      ['#country-btn', '#country-list'],
      ['#visa-btn', '#visa-list'],
      ['#biz-btn', '#biz-list'],
      ['#lang-btn', '#lang-list'],
      ['#foryou-btn', '#foryou-list']
    ];

    dropdowns.forEach(([btnSel, listSel]) => {
      const btn = $(btnSel);
      const list = $(listSel);
      if (btn && list) {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();

          try {
            $$('.country-list, .visa-list, .biz-list, .lang-list, .foryou-list').forEach(menu => {
              if (menu !== list) menu.classList.remove('show');
            });

            const isShowing = list.classList.contains('show');
            if (!isShowing) {
              list.classList.add('show');
              setTimeout(() => positionDropdown(btn, list), 10);
            } else {
              list.classList.remove('show');
            }
          } catch (error) {
            console.warn('Ошибка обработки клика дропдауна:', error);
          }
        });
      }
    });

    // Обработчики для бокового меню
    const burger = $('#burger-btn');
    const overlay = $('#side-menu-overlay');
    const closeBtn = $('#side-menu-close');

    if (burger) {
      burger.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggleSideMenu();
      });
    }

    if (closeBtn) closeBtn.addEventListener('click', closeSideMenu);
    if (overlay) overlay.addEventListener('click', closeSideMenu);

    // Обработчики для боковых кнопок
    const sideCountryBtn = $('#side-country-btn');
    const sideVisaBtn = $('#side-visa-btn');

    if (sideCountryBtn) {
      sideCountryBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const list = $('#side-country-list');
        if (list) {
          list.classList.toggle('show');
          const visList = $('#side-visa-list');
          if (visList) visList.classList.remove('show');
        }
      });
    }

    if (sideVisaBtn) {
      sideVisaBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const list = $('#side-visa-list');
        if (list) {
          list.classList.toggle('show');
          const countryList = $('#side-country-list');
          if (countryList) countryList.classList.remove('show');
        }
      });
    }

    // Закрытие дропдаунов при клике вне
    document.addEventListener('click', closeAllDropdowns);

    // Предотвращаем закрытие при клике внутри дропдаунов
    $$('.country-list, .visa-list, .biz-list, .lang-list, .foryou-list, .side-country-list, .side-visa-list').forEach(list => {
      if (list) {
        list.addEventListener('click', (e) => e.stopPropagation());
      }
    });

    // Обработчик изменения размера окна
    window.addEventListener('resize', () => {
      $$('.country-list.show, .visa-list.show, .biz-list.show, .lang-list.show, .foryou-list.show').forEach(dropdown => {
        const parent = dropdown.parentElement;
        const button = parent ? parent.querySelector('button') : null;
        if (button) {
          setTimeout(() => positionDropdown(button, dropdown), 10);
        }
      });
    });
  }

  // Основной объект навигации для всех частей сайта
  if (typeof $ === 'undefined') {
    const $ = (sel) => document.querySelector(sel);
    const $$ = (sel) => document.querySelectorAll(sel);
    window.$ = $;
    window.$$ = $$;
  }

  if (typeof currentLang === 'undefined') {
    let currentLang = 'RU';
    window.currentLang = currentLang;
  }

  // Запуск инициализации
  safeInitialize(function() {
    // Селектор страны (если есть)
    const countrySelect = document.getElementById('country-select');
    if (countrySelect) {
      countrySelect.addEventListener('change', function() {
        updateVisaOptions(this.value);
      });
    }
  });
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeHeader);
  } else {
    initializeHeader();
  }

  // Глобальная функция для установки языка
  window.setLanguage = function(lang) {
    localStorage.setItem('selectedLang', lang);
    localStorage.setItem('ev_lang', lang);
    currentLang = lang;
    updateAll();

    const event = new CustomEvent('languageChanged', { detail: { language: lang } });
    document.dispatchEvent(event);

    if (window.applyTranslations) {
        window.applyTranslations();
    }
  };



  function updateSideCountryButton(country = 'id') {
    const sideCurrentFlag = $('#side-current-flag');
    const sideCountryName = $('#side-country-name');

    const countryInfo = EV_CONFIG.countries.find(c => c.code === country);
    if (sideCurrentFlag && sideCountryName && countryInfo) {
      sideCurrentFlag.src = countryInfo.flag;
      sideCurrentFlag.alt = country;
      sideCountryName.textContent = countryInfo.name[currentLang];
    }
  }

  function updateSideVisaButton(country = 'id') {
    const sideVisaLabel = $('#side-visa-label');
    if (sideVisaLabel) {
      sideVisaLabel.textContent = currentVisa ? currentVisa.labels[currentLang] : (currentLang === "RU" ? "Визы" : "Visas");
    }
  }

})();