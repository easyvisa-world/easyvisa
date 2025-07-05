<!-- /include/header.php -->
<!-- В head: -->
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
<script src="/include/translations.js"></script>
<script src="/include/hfstyle.js" defer></script>

<link rel="stylesheet" href="/include/hfstyle.css">
<header class="gta-header">
  <div class="header-container">
    <div class="header-row">
      <div class="ev-header-left">

    <button id="burger-btn" class="burger" aria-label="Меню">
      <span></span><span></span><span></span>
    </button>
    <!-- Логотип -->
    <a href="/" class="logo-wrap">
      <img src="https://easyvisa.world/wp-content/uploads/2023/12/logo2.svg_.svg" class="gta-logo" alt="EasyVisa World" />
    </a>

        </div>
    <!-- Основное меню -->
    <nav id="menu-bar" class="gta-menu-bar">
      <!-- Страна -->
      <div class="gta-country-drop">
        <button id="country-btn" class="gta-country-btn">
          <img id="current-flag" class="country-flag" src="" alt="flag" />
          <span id="country-name"></span>
          <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div id="country-list" class="country-list"></div>
      </div>
      <!-- Визы -->
      <div class="gta-visa-drop">
        <button id="visa-btn" class="gta-visa-btn">
          <span id="visa-label"></span>
          <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div id="visa-list" class="visa-list"></div>
      </div>

      <!-- Бизнес -->
      <div id="biz-drop" class="gta-biz-drop">
        <button id="biz-btn" class="gta-biz-btn">
          <span id="biz-label"></span>
          <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div id="biz-list" class="biz-list"></div>
      </div>
      <!-- Язык -->
      <div class="gta-lang-drop" style="display: none;">
        <button id="lang-btn" class="gta-lang-btn">
          <span id="lang-code"></span>
          <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div id="lang-list" class="lang-list"></div>
      </div>
      <!-- Для вас -->
      <div class="gta-foryou-drop">
        <button id="foryou-btn" class="gta-foryou-btn">
          <span data-translate="foryou.title">Для вас</span>
          <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <div id="foryou-list" class="foryou-list"></div>
      </div>
    </nav>
    </div>
  </div>
</header>

<!-- Боковое меню -->
<div id="side-menu-overlay" class="gta-side-menu-overlay"></div>
<aside id="side-menu" class="gta-side-menu">
  <button id="side-menu-close" class="side-menu-close" aria-label="Закрыть меню">×</button>
  <img src="https://easyvisa.world/wp-content/uploads/2023/12/logo2.svg_.svg" class="side-logo" alt="EasyVisa World">
  <div class="side-menu-top-btns">
  <button id="side-country-btn" class="gta-country-btn side-country-btn">
    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/id.svg" class="country-flag" id="side-current-flag" alt="id">
    <span id="side-country-name">Индонезия</span>
    <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
  </button>
  <div class="country-list side-country-list" id="side-country-list"></div>

  <button id="side-visa-btn" class="gta-visa-btn side-visa-btn">
    <span id="side-visa-label">Визы</span>
    <svg width="13" height="7"><path d="M1 1l5.5 5L12 1" stroke="#ffe95d" stroke-width="2.2" fill="none" stroke-linecap="round"/></svg>
  </button>
  <div class="visa-list side-visa-list" id="side-visa-list"></div>
</div>
<ul id="side-main" class="side-main"></ul>
<div class="side-lang-section" style="display: none;">
          <h3>Язык</h3>
          <button class="side-lang-btn" onclick="setLanguage('RU')">Русский</button>
          <button class="side-lang-btn" onclick="setLanguage('EN')">English</button>
        </div>
</aside>