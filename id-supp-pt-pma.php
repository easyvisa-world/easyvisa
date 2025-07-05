
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Поддержка PT PMA — EasyVisa | Бухучет и сопровождение</title>
  <meta name="description" content="Полное сопровождение компании PT PMA в Индонезии. Бухучет, отчетность, юридическая поддержка.">
  <link rel="icon" href="https://easyvisa.world/wp-content/uploads/2023/12/logo2.svg_.svg">

  <style>
    * { box-sizing: border-box; }
    body { 
      font-family: 'Bebas Neue', 'Russo One', 'Arial Narrow', Arial, sans-serif !important;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
      min-height: 100vh;
      color: #ffffff;
      margin: 0;
      padding: 0;
      letter-spacing: 0.03em;
    }

    .service-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 1rem;
    }

    .hero-section {
      background: linear-gradient(135deg, #0891b2 0%, #06b6d4 50%, #67e8f9 100%);
      border-radius: 24px;
      padding: 3rem 2rem;
      margin-bottom: 3rem;
      position: relative;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
    }

    .hero-title {
      font-size: 3rem;
      font-weight: 400;
      margin-bottom: 1rem;
      font-family: 'Bebas Neue', Arial, sans-serif !important;
      letter-spacing: 0.05em;
    }

    .hero-subtitle {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      opacity: 0.9;
      font-family: 'Russo One', Arial, sans-serif !important;
    }

    .price-badge {
      display: inline-block;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 50px;
      padding: 1rem 2rem;
      font-size: 2rem;
      font-weight: 400;
      margin-bottom: 2rem;
      font-family: 'Bebas Neue', Arial, sans-serif !important;
    }

    .btn {
      padding: 1rem 2rem;
      border-radius: 12px;
      font-weight: 400;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-family: 'Bebas Neue', Arial, sans-serif !important;
      letter-spacing: 0.03em;
      font-size: 1.1rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(10px);
    }

    .steps-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .step-card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 2rem;
      position: relative;
    }

    .step-number {
      position: absolute;
      top: -15px;
      left: 2rem;
      background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%);
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 400;
      font-size: 1.25rem;
      border: 3px solid #0f172a;
      font-family: 'Bebas Neue', Arial, sans-serif !important;
    }

    .step-title {
      font-size: 1.5rem;
      font-weight: 400;
      margin-bottom: 1rem;
      margin-top: 1rem;
      color: #06b6d4;
      font-family: 'Bebas Neue', Arial, sans-serif !important;
    }

    .step-content {
      font-family: 'Russo One', Arial, sans-serif !important;
      line-height: 1.6;
    }

    .features-list {
      list-style: none;
      padding: 0;
      margin: 1rem 0;
    }

    .features-list li {
      padding: 0.5rem 0;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-family: 'Russo One', Arial, sans-serif !important;
    }

    .features-list li::before {
      content: '✓';
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      font-weight: bold;
      flex-shrink: 0;
    }

    @media (max-width: 768px) {
      .hero-title { font-size: 2rem; }
      .steps-grid { grid-template-columns: 1fr; }
      .service-container { padding: 1rem 0.5rem; }
    }
  </style>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/include/head_links.php'; ?>
</head>

<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>

  <div class="service-container">
    <section class="hero-section">
      <div class="hero-content">
        <h1 class="hero-title">Поддержка PT PMA — Бухучет под ключ</h1>
        <p class="hero-subtitle">Полное ведение бухгалтерии, отчетности и юридическое сопровождение вашей компании</p>
        <div class="price-badge">от $1,600 USD/год</div>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
          <a href="https://t.me/evisa_support" target="_blank" class="btn btn-primary">Telegram</a>
          <a href="https://wa.me/84776739907" target="_blank" class="btn btn-secondary">WhatsApp</a>
        </div>
      </div>
    </section>

    <div class="steps-grid">
      <div class="step-card">
        <div class="step-number">1</div>
        <h3 class="step-title">Что входит в поддержку?</h3>
        <div class="step-content">
          <ul class="features-list">
            <li>Ведение бухгалтерского учета</li>
            <li>Подача налоговых отчетов</li>
            <li>Ведение корпоративных документов</li>
            <li>Юридическое сопровождение</li>
            <li>Консультации по налогам</li>
          </ul>
          <p>Полный комплекс услуг для работающей компании в Индонезии.</p>
        </div>
      </div>

      <div class="step-card">
        <div class="step-number">2</div>
        <h3 class="step-title">Тарифные планы</h3>
        <div class="step-content">
          <ul class="features-list">
            <li>Нулевая отчетность — $1,600/год</li>
            <li>До 5 операций в месяц — $3,200/год</li>
            <li>До 25 операций в месяц — $5,000/год</li>
            <li>Более 25 операций — индивидуально</li>
            <li>Дополнительные услуги по запросу</li>
          </ul>
        </div>
      </div>

      <div class="step-card">
        <div class="step-number">3</div>
        <h3 class="step-title">Что мы делаем</h3>
        <div class="step-content">
          <ul class="features-list">
            <li>Ведем первичные документы</li>
            <li>Готовим отчеты в налоговую</li>
            <li>Следим за сроками подачи</li>
            <li>Ведем банковские операции</li>
            <li>Готовим справки и выписки</li>
            <li>Представляем интересы в госорганах</li>
          </ul>
        </div>
      </div>

      <div class="step-card">
        <div class="step-number">4</div>
        <h3 class="step-title">Процесс работы</h3>
        <div class="step-content">
          <p><strong>1.</strong> Аудит текущего состояния компании<br>
          <strong>2.</strong> Выбор подходящего тарифа<br>
          <strong>3.</strong> Передача документооборота<br>
          <strong>4.</strong> Ежемесячное ведение учета<br>
          <strong>5.</strong> Своевременная подача отчетов<br>
          <strong>6.</strong> Регулярные отчеты клиенту</p>
        </div>
      </div>

      <!-- Блок гарантий на всю ширину -->
      <div class="step-card" style="grid-column: 1 / -1;">
        <div class="step-number">5</div>
        <h3 class="step-title">Наши гарантии</h3>
        <div class="step-content">
          <ul class="features-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
            <li>Соблюдение всех сроков подачи отчетов</li>
            <li>Профессиональное ведение документооборота</li>
            <li>Поддержка на русском языке 24/7</li>
            <li>Прозрачность всех операций и отчетов</li>
            <li>Возмещение штрафов по нашей вине</li>
          </ul>
        </div>
      </div>
    </div>

    <section style="background: linear-gradient(135deg, #0891b2 0%, #06b6d4 50%, #67e8f9 100%); border-radius: 24px; padding: 3rem 2rem; text-align: center; margin-top: 4rem;">
      <h2 style="font-size: 2rem; margin-bottom: 1rem; font-family: 'Bebas Neue', Arial, sans-serif;">Готовы передать бухучет?</h2>
      <p style="margin-bottom: 2rem; opacity: 0.9; font-family: 'Russo One', Arial, sans-serif;">Освободите время для развития бизнеса</p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="https://t.me/evisa_support" target="_blank" class="btn btn-primary">Написать в Telegram</a>
        <a href="https://wa.me/84776739907" target="_blank" class="btn btn-secondary">WhatsApp</a>
      </div>
    </section>
  </div>

  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
</body>
</html>
