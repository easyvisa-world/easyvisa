import { EV_CONFIG } from "./config.js";

const qs = sel => document.querySelector(sel);
const qsa = sel => document.querySelectorAll(sel);
const storage = {
  get(key, def) { try { return localStorage.getItem(key) || def; } catch { return def; } },
  set(key, val) { try { localStorage.setItem(key, val); } catch {} }
};

let lang     = storage.get("ev_lang",     EV_CONFIG.defaultLang);
let country  = storage.get("ev_country",  EV_CONFIG.defaultCountry);
let currency = storage.get("ev_currency", EV_CONFIG.defaultCurrency);
let visa     = null;

function closeAllDropdowns() {
  qsa(".country-list,.visa-list,.biz-list,.lang-list,.currency-list").forEach(menu => menu.classList.remove("show"));
}

function updateAll() {
  buildCountryList();
  buildVisaList();
  buildBizList();
  buildLangList();
  buildCurrencyList();
  updateButtons();
  initSideMenu();
  attachDropdowns();
}

// 1. Строим списки — сразу цепляем обработчики
function buildCountryList() {
  const list = qs("#country-list");
  list.innerHTML = "";
  EV_CONFIG.countries.forEach(c => {
    const div = document.createElement("div");
    div.dataset.country = c.code;
    div.dataset.flag = c.flag;
    div.textContent = c.name[lang];
    div.onclick = function(e) {
      country = c.code;
      storage.set("ev_country", country);
      buildVisaList();
      buildBizList();
      updateButtons();
      buildSideCountryList(); 
      buildSideVisaList();
      updateSideMenuBtns();
      closeAllDropdowns();
      e.stopPropagation();
    };
    list.appendChild(div);
  });
}
function buildVisaList() {
  const list = qs("#visa-list");
  list.innerHTML = "";
  (EV_CONFIG.visas[country] || []).forEach(v => {
    const a = document.createElement("a");
    a.dataset.visa = v.code;
    a.textContent = v.labels[lang];
    a.href = v.url || "#";
    a.style.textDecoration = "none";
    a.style.color = "#fff";
    a.onclick = function(e) {
      // если нужна ещё и логика по кнопке, тут обработка
      closeAllDropdowns();
      // если нужна навигация без reload — e.preventDefault(); window.location = v.url;
    };
    list.appendChild(a);
    updateSideMenuBtns();
  });
}
function buildBizList() {
  const wrap = qs("#biz-drop");
  const list = qs("#biz-list");
  list.innerHTML = "";
  const bizArr = (EV_CONFIG.biz[country] || []);
  const runArr = (EV_CONFIG.vizarun && EV_CONFIG.vizarun[country]) ? EV_CONFIG.vizarun[country] : [];
  const arr    = bizArr.length ? bizArr : runArr; // если нет бизнеса, показываем визараны
  if (!arr.length) {
    wrap.style.display = "none";
    return;
  }
  wrap.style.display = "inline-block";
  arr.forEach(b => {
    const a = document.createElement("a");
    a.dataset.biz = b.code;
    a.textContent = b.labels[lang];
    a.href = b.url || "#";
    a.style.textDecoration = "none";
    a.style.color = "#fff";
    a.onclick = function(e) {
      closeAllDropdowns();
    };
    list.appendChild(a);
  });
}
function buildLangList() {
  const list = qs("#lang-list");
  list.innerHTML = "";
  EV_CONFIG.langs.forEach(l => {
    const div = document.createElement("div");
    div.dataset.lang = l;
    div.textContent = l;
    div.onclick = function(e) {
      lang = l;
      storage.set("ev_lang", lang);
      updateAll();
      buildSideCountryList();
      buildSideVisaList();
      updateSideMenuBtns();
      closeAllDropdowns();
      e.stopPropagation();
    };
    list.appendChild(div);
  });
}
function buildCurrencyList() {
  const list = qs("#currency-list");
  list.innerHTML = "";
  EV_CONFIG.currencies.forEach(c => {
    const div = document.createElement("div");
    div.dataset.currency = c;
    div.textContent = c;
    div.onclick = function(e) {
      currency = c;
      storage.set("ev_currency", currency);
      updateButtons();
      closeAllDropdowns();
      e.stopPropagation();
    };
    list.appendChild(div);
  });
}

function updateButtons() {
  const cObj = EV_CONFIG.countries.find(c => c.code === country);
  qs("#current-flag").src = cObj.flag;
  qs("#country-name").textContent = cObj.name[lang];
  qs("#lang-code").textContent = lang;
  qs("#currency-code").textContent = currency;
  qs("#visa-label").textContent = visa
    ? visa.labels[lang]
    : (lang === "RU" ? "Визы" : "Visas");
  const hasBiz = (EV_CONFIG.biz[country] && EV_CONFIG.biz[country].length > 0);
  const hasRun = (EV_CONFIG.vizarun && EV_CONFIG.vizarun[country] && EV_CONFIG.vizarun[country].length > 0);
  qs("#biz-label").textContent = hasBiz
    ? (lang === "RU" ? "Бизнес" : "Business")
    : hasRun
      ? (lang === "RU" ? "Визараны" : "Visa Runs")
      : "";
}

function initSideMenu() {
  const side = document.getElementById("side-main");
  side.innerHTML = "";

  // Теперь не добавляем страну и визы!

  // Добавляем только обычные пункты меню
  const menuItems = [
    { href: "/", label: lang === "RU" ? "Главная" : "Home" },
    { href: "/data.php", label: lang === "RU" ? "Калькулятор визы" : "Visa calculator" },
    { href: "/bali-guide.php", label: lang === "RU" ? "Бали-гайд" : "Bali guide" },
    { href: "/visa-quiz.php", label: lang === "RU" ? "Бали-виза тест" : "Bali Visa test" },
    { href: "/faq.php", label: "FAQ" },
    { href: "/doc.php", label: lang === "RU" ? "Документы" : "Documents" },
    { href: "/about.php", label: lang === "RU" ? "О нас" : "About us" }
  ];
  menuItems.forEach(item => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    a.href = item.href;
    a.textContent = item.label;
    li.appendChild(a);
    side.appendChild(li);
  });
}

function attachDropdowns() {
  const DROPS = [
    ["#country-btn",  "#country-list"],
    ["#visa-btn",     "#visa-list"],
    ["#biz-btn",      "#biz-list"],
    ["#lang-btn",     "#lang-list"],
    ["#currency-btn", "#currency-list"]
  ];
  DROPS.forEach(([btnSel, listSel]) => {
    const btn = qs(btnSel);
    const lst = qs(listSel);
    if (btn && lst) {
      btn.onclick = e => {
        e.stopPropagation();
        // Скрыть ВСЕ выпадашки кроме своей
        qsa(".country-list,.visa-list,.biz-list,.lang-list,.currency-list").forEach(menu => {
          if (menu !== lst) menu.classList.remove("show");
        });
        lst.classList.toggle("show");
      };
      lst.onclick = e => e.stopPropagation();
    }
  });
  // Клик вне закрывает всё
  window.onclick = () => closeAllDropdowns();
}

// ——— Бургер-меню (слева)
function attachSideMenu() {
  const burger  = qs("#burger-btn");
  const overlay = qs("#side-menu-overlay");
  const side    = qs("#side-menu");
  const close   = qs("#side-menu-close");
  burger && (burger.onclick = () => {
    side.style.display = "block";
    overlay.style.display = "block";
  });
  close && (close.onclick = overlay.onclick = () => {
    side.style.display = "none";
    overlay.style.display = "none";
  });
}
document.querySelectorAll('.submenu-toggle').forEach(el => {
  el.onclick = function() {
    this.parentElement.classList.toggle('open');
  };
});
function updateSideMenuBtns() {
  // Обновляет кнопки страны и визы в бургер-меню
  const cObj = EV_CONFIG.countries.find(c => c.code === country);
  document.getElementById('side-current-flag').src = cObj.flag;
  document.getElementById('side-country-name').textContent = cObj.name[lang];
  document.getElementById('side-visa-label').textContent = visa
    ? visa.labels[lang]
    : (lang === "RU" ? "Визы" : "Visas");
}
function buildSideCountryList() {
  const list = document.getElementById('side-country-list');
  list.innerHTML = '';
  EV_CONFIG.countries.forEach(c => {
    const div = document.createElement('div');
    div.dataset.country = c.code;
    div.innerHTML = `<img src="${c.flag}" class="country-flag" style="height:16px;margin-right:7px;vertical-align:middle;">${c.name[lang]}`;
    div.onclick = function(e) {
      country = c.code;
      storage.set("ev_country", country);
      // Перестроить все меню и визы
      buildSideCountryList();
      buildSideVisaList();
      updateButtons();
      updateSideMenuBtns();
      document.getElementById('side-country-list').classList.remove('show');
    };
    list.appendChild(div);
  });
}
function buildSideVisaList() {
  const list = document.getElementById('side-visa-list');
  list.innerHTML = '';
  (EV_CONFIG.visas[country] || []).forEach(v => {
    const div = document.createElement('div');
    div.dataset.visa = v.code;
    div.textContent = v.labels[lang];
    div.onclick = function(e) {
      visa = v;
      updateButtons();
      updateSideMenuBtns();
      document.getElementById('side-visa-list').classList.remove('show');
      if (v.url) window.location = v.url;
    };
    list.appendChild(div);
  });
}
// Открытие/закрытие списков
document.getElementById('side-country-btn').onclick = function(e) {
  e.stopPropagation();
  document.getElementById('side-country-list').classList.toggle('show');
  document.getElementById('side-visa-list').classList.remove('show');
};
document.getElementById('side-visa-btn').onclick = function(e) {
  e.stopPropagation();
  document.getElementById('side-visa-list').classList.toggle('show');
  document.getElementById('side-country-list').classList.remove('show');
};
// Клик вне меню закрывает выпадашки
window.addEventListener('click', () => {
  document.getElementById('side-country-list').classList.remove('show');
  document.getElementById('side-visa-list').classList.remove('show');
});

document.addEventListener('DOMContentLoaded', function() {
  const banner = document.getElementById('gta-visa-banner');
  const tooltip = document.getElementById('gta-tooltip');
  let shown = false;
  if (window.innerWidth < 768) {
    banner.addEventListener('click', () => {
      shown = !shown;
      tooltip.style.opacity = shown ? '1' : '0';
      tooltip.style.pointerEvents = shown ? 'auto' : 'none';
    });
    // Скрывать тултип при клике вне баннера
    document.addEventListener('click', e => {
      if (!banner.contains(e.target)) {
        shown = false;
        tooltip.style.opacity = '0';
        tooltip.style.pointerEvents = 'none';
      }
    });
  }
});

// При запуске:
buildSideCountryList();
buildSideVisaList();
// ——— Старт ———
updateAll();
attachSideMenu();
