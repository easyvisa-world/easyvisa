<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>О нас — EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="/css/about.css">
</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
  <main class="about-main">
    <section class="about-hero">
      <div class="about-title">
        <span class="about-agency">EasyVisa World Agency</span> IBC №4875283
      </div>
      <div class="about-subtitle">
        Команда юристов-иммиграционных экспертов из Индонезии, Сингапура и Европы, объединённая одной целью — делать визы понятными, быстрыми и честными.
      </div>
      <div class="about-bullets">
        <ul>
          <li>Оформляем долгосрочные и краткосрочные визы, KITAS и регистрацию бизнеса «под ключ», беря на себя 100% бумажной работы и сопровождение на всех этапах.</li>
          <li>Оформили 3 200+ документов; 87% клиентов возвращаются за повторными визами и рекомендациями.</li>
        </ul>
      </div>
    </section>

    <section class="about-contacts">
      <div class="contacts-title">Где находимся</div>
      <ul class="contacts-list">
        <li>Штаб-квартира: 24 Namu Atoll North, Marshall Islands</li>
        <li>Операционный офис: One Pacific Place, Jl. Jend. Sudirman Kav., 12190 Jakarta</li>
        <li>Онлайн-поддержка: <a href="mailto:manager@easyvisa.world">manager@easyvisa.world</a>, <a href="tel:+84776739907">+84 776 739 907</a>, <a href="https://t.me/easyvisa_world" target="_blank">@easyvisa_world</a></li>
      </ul>
    </section>

    <section class="about-story">
      <div class="about-story-text">
        Мы появились как ответ на хаос рынка: скрытые платежи, «потерянные» паспорта, молчащие менеджеры.<br>
        <b>EasyVisa World</b> ставит прозрачность и контроль клиента выше всего.
      </div>
    </section>

    <section class="about-table-section">
      <div class="table-title">Частые проблемы и наш подход к решению</div>
      <div class="about-table">
        <div class="about-table-row">
          <div class="about-table-cell bold">Боль клиента</div>
          <div class="about-table-cell bold">Наш контр-подход</div>
        </div>
        <div class="about-table-row">
          <div class="about-table-cell">Скрытые комиссии (52% отзывов)</div>
          <div class="about-table-cell">«Всё включено» — финальная цена с визовым сбором, без доплат.</div>
        </div>
        <div class="about-table-row">
          <div class="about-table-cell">Неразбериха со статусом (37%)</div>
          <div class="about-table-cell">Личный трекер в Telegram: уведомления о каждом шаге 24/7.</div>
        </div>
        <div class="about-table-row">
          <div class="about-table-cell">Задержки и молчание агентств (34%)</div>
          <div class="about-table-cell">SLA-ответа ≤30 минут, договорная пеня за срок &gt;5 раб. дней.</div>
        </div>
        <div class="about-table-row">
          <div class="about-table-cell">Ошибки в документах (23%)</div>
          <div class="about-table-cell">Двойная проверка юрист+AI-скан; покрываем штрафы за наш счёт.</div>
        </div>
        <div class="about-table-row">
          <div class="about-table-cell">Отсутствие помощи после выдачи визы (19%)</div>
          <div class="about-table-cell">Post-Visa Care: помощь в открытии счетов, страховке, продлении.</div>
        </div>
      </div>
    </section>

    <section class="about-values">
      <div class="values-title">Наши ценности</div>
      <ol>
        <li>Прозрачность — одна цена, понятный таймлайн.</li>
        <li>Ответственность — финансовые гарантии соблюдения сроков.</li>
        <li>Человечность — поддержка на русском и английском без скриптов.</li>
        <li>Инновации — автоматизация бэкофиса и трекинг в один клик.</li>
        <li>Рост вместе с клиентом — помогаем в легализации, открытии бизнеса, получении лицензий.</li>
      </ol>
      <div class="about-mission">Наша цель — делать международные переезды такими же простыми, как бронирование авиабилета.</div>
    </section>
  </main>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
</body>
</html>
<style>
.about-main {
  max-width: 740px;
  margin: 38px auto 0 auto;
  background: rgba(20, 30, 40, 0.89);
  border-radius: 2.2rem;
  box-shadow: 0 8px 48px 8px #14b8a660, 0 0 0 3px #2cffd9 inset;
  padding: 2.7rem 2.2rem 2.2rem 2.2rem;
  font-family: 'Russo One', Arial, sans-serif;
  color: #fff;
  letter-spacing: 0.02em;
  position: relative;
  z-index: 1;
}

.about-title {
  font-family: 'Bebas Neue', 'Russo One', Arial, sans-serif;
  font-size: 2.5rem;
  letter-spacing: 0.07em;
  color: #29fc94;
  margin-bottom: 0.6rem;
  font-weight: 900;
  text-shadow: 0 2px 16px #29fc94a6;
}

.about-agency {
  color: #ffe95d;
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: 2.2rem;
}

.about-subtitle {
  font-size: 1.22rem;
  color: #fff;
  margin-bottom: 0.5rem;
  font-family: 'Russo One', Arial, sans-serif;
  font-weight: 700;
}

.about-bullets ul {
  margin: 0 0 1.3rem 0.9rem;
  padding: 0;
}
.about-bullets li {
  margin-bottom: 0.45rem;
  font-size: 1.02rem;
  line-height: 1.48;
  font-family: 'Russo One', Arial, sans-serif;
}

.about-contacts {
  margin: 1.7rem 0 1.1rem 0;
}
.contacts-title {
  font-size: 1.22rem;
  color: #29fc94;
  font-family: 'Bebas Neue', Arial, sans-serif;
  margin-bottom: 0.25rem;
}
.contacts-list {
  list-style: disc;
  padding-left: 1.2em;
  margin: 0;
  color: #fff;
  font-size: 1.05rem;
  font-family: 'Russo One', Arial, sans-serif;
}
.contacts-list li { margin-bottom: 0.33em; }
.contacts-list a { color: #29fc94; text-decoration: underline; }
.contacts-list a:hover { color: #ffe95d; }

.about-story {
  margin-bottom: 1.5rem;
  font-size: 1.08rem;
  color: #fff;
  font-family: 'Russo One', Arial, sans-serif;
}

.table-title {
  color: #ffe95d;
  font-size: 1.14rem;
  font-family: 'Bebas Neue', Arial, sans-serif;
  margin-bottom: 0.9rem;
  letter-spacing: 0.03em;
}
.about-table {
  width: 100%;
  border-collapse: separate;
  border-radius: 1rem;
  background: rgba(32, 44, 60, 0.92);
  overflow: hidden;
  margin-bottom: 1.6rem;
}
.about-table-row {
  display: flex;
  border-bottom: 1px solid #29fc9490;
}
.about-table-row:last-child { border-bottom: none; }
.about-table-cell {
  flex: 1;
  padding: 0.85em 1.1em;
  font-size: 1rem;
  color: #fff;
  font-family: 'Russo One', Arial, sans-serif;
}
.bold { font-weight: bold; color: #ffe95d; }

.values-title {
  font-size: 1.23rem;
  color: #29fc94;
  margin-bottom: 0.35em;
  font-family: 'Bebas Neue', Arial, sans-serif;
  letter-spacing: 0.03em;
}
.about-values ol {
  padding-left: 1.25em;
  margin-bottom: 0.9em;
}
.about-values li {
  font-size: 1.05rem;
  margin-bottom: 0.5em;
  font-family: 'Russo One', Arial, sans-serif;
}
.about-mission {
  margin-top: 0.7em;
  color: #ffe95d;
  font-size: 1.12rem;
  font-family: 'Bebas Neue', Arial, sans-serif;
}

@media (max-width: 600px) {
  .about-main { padding: 1.1em 0.6em 1.4em 0.6em; }
  .about-title { font-size: 1.25rem; }
  .about-agency { font-size: 1.11rem; }
  .about-table-cell { font-size: 0.95em; padding: 0.68em 0.45em; }
  .about-bullets ul { margin-left: 0.5em; }
}
</style>