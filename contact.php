
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Контакты | EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="/include/hfstyle.css">
  <link rel="stylesheet" href="/css/styles.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #0c0c15 0%, #1a1f2e 50%, #0f1419 100%);
      overflow-x: hidden;
      padding-top: 80px;
    }

    .main-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 1rem;
      width: 100%;
      box-sizing: border-box;
    }

    .page-title {
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 3rem;
      color: var(--gta-secondary);
      text-align: center;
      margin-bottom: 2rem;
      text-shadow: 0 0 20px var(--gta-secondary);
      letter-spacing: 0.1em;
    }

    .contact-description {
      font-family: 'Russo One', Arial, sans-serif;
      color: rgba(255, 255, 255, 0.9);
      text-align: center;
      font-size: 1.1rem;
      margin-bottom: 3rem;
      line-height: 1.6;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Contact Buttons Grid */
    .ev-contact-buttons {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 2rem 0;
      max-width: 1000px;
      margin-left: auto;
      margin-right: auto;
    }

    .ev-contact-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem 1.5rem;
      border-radius: 20px;
      text-decoration: none;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(20px);
      border: 2px solid transparent;
      text-align: center;
    }

    .ev-contact-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.6s;
    }

    .ev-contact-btn:hover::before {
      left: 100%;
    }

    .ev-contact-icon {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      transition: transform 0.3s ease;
    }

    .ev-contact-text {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 0.3rem;
      letter-spacing: 0.05em;
    }

    .ev-contact-subtitle {
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 0.9rem;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    .ev-contact-btn:hover .ev-contact-icon {
      transform: scale(1.2) rotate(5deg);
    }

    .ev-contact-btn:hover .ev-contact-subtitle {
      opacity: 1;
    }

    .ev-contact-btn-whatsapp {
      background: linear-gradient(145deg, rgba(37, 211, 102, 0.15), rgba(18, 140, 126, 0.15));
      border-color: #25D366;
      color: #25D366;
      box-shadow: 0 8px 32px rgba(37, 211, 102, 0.2);
    }

    .ev-contact-btn-whatsapp:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(37, 211, 102, 0.25), rgba(18, 140, 126, 0.25));
      box-shadow: 0 16px 48px rgba(37, 211, 102, 0.4);
      border-color: #25D366;
    }

    .ev-contact-btn-telegram {
      background: linear-gradient(145deg, rgba(0, 136, 204, 0.15), rgba(0, 102, 170, 0.15));
      border-color: #0088CC;
      color: #0088CC;
      box-shadow: 0 8px 32px rgba(0, 136, 204, 0.2);
    }

    .ev-contact-btn-telegram:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(0, 136, 204, 0.25), rgba(0, 102, 170, 0.25));
      box-shadow: 0 16px 48px rgba(0, 136, 204, 0.4);
      border-color: #0088CC;
    }

    .ev-contact-btn-channel {
      background: linear-gradient(145deg, rgba(41, 252, 148, 0.15), rgba(255, 233, 93, 0.15));
      border-color: var(--gta-primary);
      color: var(--gta-primary);
      box-shadow: 0 8px 32px rgba(41, 252, 148, 0.2);
    }

    .ev-contact-btn-channel:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(41, 252, 148, 0.25), rgba(255, 233, 93, 0.25));
      box-shadow: 0 16px 48px rgba(41, 252, 148, 0.4);
      border-color: var(--gta-secondary);
      color: var(--gta-secondary);
    }

    .ev-contact-btn-website {
      background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
      border-color: rgba(255, 255, 255, 0.3);
      color: white;
      box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1);
    }

    .ev-contact-btn-website:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
      box-shadow: 0 16px 48px rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
    }

    .ev-contact-btn-instagram {
      background: linear-gradient(145deg, rgba(225, 48, 108, 0.15), rgba(131, 58, 180, 0.15));
      border-color: #E1306C;
      color: #E1306C;
      box-shadow: 0 8px 32px rgba(225, 48, 108, 0.2);
    }

    .ev-contact-btn-instagram:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(225, 48, 108, 0.25), rgba(131, 58, 180, 0.25));
      box-shadow: 0 16px 48px rgba(225, 48, 108, 0.4);
      border-color: #E1306C;
    }

    .ev-contact-btn-threads {
      background: linear-gradient(145deg, rgba(0, 0, 0, 0.2), rgba(64, 64, 64, 0.15));
      border-color: #000000;
      color: #ffffff;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .ev-contact-btn-threads:hover {
      transform: translateY(-8px);
      background: linear-gradient(145deg, rgba(0, 0, 0, 0.3), rgba(64, 64, 64, 0.25));
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.5);
      border-color: #333333;
    }

    /* FAQ Styles */
    .ev-faq-container {
      max-width: 800px;
      margin: 4rem auto 0;
    }

    .ev-faq-title {
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 2.5rem;
      color: var(--gta-secondary);
      text-align: center;
      margin-bottom: 2rem;
      text-shadow: 0 0 15px var(--gta-secondary);
    }

    .ev-faq-item {
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 1rem;
    }

    .ev-faq-question {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 0;
      background: none;
      border: none;
      color: white;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.1rem;
      text-align: left;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .ev-faq-question:hover {
      color: var(--gta-primary);
    }

    .ev-faq-icon {
      font-size: 1.5rem;
      transition: transform 0.3s ease;
    }

    .ev-faq-item.active .ev-faq-icon {
      transform: rotate(45deg);
      color: var(--gta-primary);
    }

    .ev-faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      color: rgba(255, 255, 255, 0.8);
      font-family: 'Russo One', Arial, sans-serif;
      line-height: 1.6;
    }

    .ev-faq-item.active .ev-faq-answer {
      max-height: 200px;
      padding-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
      body {
        padding-top: 60px;
      }

      .main-content {
        padding: 1rem;
      }

      .ev-contact-buttons {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        max-width: 100%;
      }

      .ev-contact-btn {
        padding: 1.5rem 1rem;
      }

      .ev-contact-icon {
        font-size: 2rem;
      }

      .ev-contact-text {
        font-size: 1.2rem;
      }

      .page-title {
        font-size: 2.5rem;
      }

      .ev-faq-title {
        font-size: 2rem;
      }
    }

    @media (max-width: 480px) {
      .ev-contact-buttons {
        grid-template-columns: 1fr;
        gap: 1rem;
      }

      .page-title {
        font-size: 2rem;
      }

      .contact-description {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="main-header-container-all-page">
    <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>

    <div class="main-content">
      <h1 class="page-title" data-translate="contacts.title">Связаться с нами</h1>
      <p class="contact-description" data-translate="contacts.description">
        Выберите удобный способ связи. Мы всегда готовы помочь с оформлением виз и ответить на ваши вопросы.
      </p>

      <div class="ev-contact-buttons">
        <a href="https://wa.me/6287777396729" class="ev-contact-btn ev-contact-btn-whatsapp">
          <span class="ev-contact-icon">📱</span>
          <span class="ev-contact-text" data-translate="contacts.whatsapp">WhatsApp</span>
          <span class="ev-contact-subtitle" data-translate="contacts.quick_contact">Быстрая связь</span>
        </a>

        <a href="https://t.me/evisa_support" class="ev-contact-btn ev-contact-btn-telegram">
          <span class="ev-contact-icon">💬</span>
          <span class="ev-contact-text" data-translate="contacts.telegram_support">Telegram поддержка</span>
          <span class="ev-contact-subtitle" data-translate="contacts.personal_help">Персональная помощь</span>
        </a>

        <a href="https://t.me/evisa_world" class="ev-contact-btn ev-contact-btn-channel">
          <span class="ev-contact-icon">📢</span>
          <span class="ev-contact-text" data-translate="contacts.telegram_channel">Telegram канал</span>
          <span class="ev-contact-subtitle" data-translate="contacts.news_offers">Новости и акции</span>
        </a>

        <a href="https://instagram.com/easyvisa_world" class="ev-contact-btn ev-contact-btn-instagram">
          <span class="ev-contact-icon">📸</span>
          <span class="ev-contact-text" data-translate="contacts.instagram">Instagram</span>
          <span class="ev-contact-subtitle" data-translate="contacts.photos_stories">Фото и истории</span>
        </a>

        <a href="https://threads.net/@easyvisa_world" class="ev-contact-btn ev-contact-btn-threads">
          <span class="ev-contact-icon">🧵</span>
          <span class="ev-contact-text" data-translate="contacts.threads">Threads</span>
          <span class="ev-contact-subtitle" data-translate="contacts.discussions">Обсуждения</span>
        </a>

        <a href="https://easyvisa.world" class="ev-contact-btn ev-contact-btn-website">
          <span class="ev-contact-icon">🌐</span>
          <span class="ev-contact-text" data-translate="contacts.website">Наш сайт</span>
          <span class="ev-contact-subtitle" data-translate="contacts.full_info">Полная информация</span>
        </a>
      </div>

      <!-- FAQ Section -->
      <div class="ev-faq-container">
        <h2 class="ev-faq-title" data-translate="contacts.faq_title">Частые вопросы</h2>

        <div class="ev-faq-item">
          <button class="ev-faq-question">
            <span data-translate="contacts.faq_q1">Сколько стоит продление визы B1?</span>
            <span class="ev-faq-icon">+</span>
          </button>
          <div class="ev-faq-answer">
            <p data-translate="contacts.faq_a1" data-translate-html="true">Продление визы B1 стоит <strong>$59</strong>. В цену включён визовый сбор и наши услуги.</p>
          </div>
        </div>

        <div class="ev-faq-item">
          <button class="ev-faq-question">
            <span data-translate="contacts.faq_q2">Нужен ли обратный билет для продления?</span>
            <span class="ev-faq-icon">+</span>
          </button>
          <div class="ev-faq-answer">
            <p data-translate="contacts.faq_a2">Нет, для продления обратный билет не нужен. Всё оформляется онлайн.</p>
          </div>
        </div>

        <div class="ev-faq-item">
          <button class="ev-faq-question">
            <span data-translate="contacts.faq_q3">Как долго делается виза?</span>
            <span class="ev-faq-icon">+</span>
          </button>
          <div class="ev-faq-answer">
            <p data-translate="contacts.faq_a3">Стандартные визы делаются 1-3 рабочих дня. Срочные визы можем сделать в день подачи.</p>
          </div>
        </div>

        <div class="ev-faq-item">
          <button class="ev-faq-question">
            <span data-translate="contacts.faq_q4">Какие документы нужны?</span>
            <span class="ev-faq-icon">+</span>
          </button>
          <div class="ev-faq-answer">
            <p data-translate="contacts.faq_a4">Базово нужен только паспорт. Дополнительные документы зависят от типа визы - мы всё расскажем при консультации.</p>
          </div>
        </div>
      </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
  </div>

  <script src="/include/translations.js"></script>
  <script src="/include/hfstyle.js"></script>
  <script>
    // FAQ functionality
    document.querySelectorAll('.ev-faq-question').forEach(question => {
      question.addEventListener('click', () => {
        const item = question.parentElement;
        const isActive = item.classList.contains('active');

        // Close all FAQ items
        document.querySelectorAll('.ev-faq-item').forEach(faq => {
          faq.classList.remove('active');
        });

        // Open clicked item if it wasn't active
        if (!isActive) {
          item.classList.add('active');
        }
      });
    });
  </script>

</body>
</html>
