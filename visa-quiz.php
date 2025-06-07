<?php
// visa-quiz.php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Какая виза на Бали вам подходит? — EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <style>
    .quiz-main { max-width: 540px; margin: 38px auto 0 auto; background: rgba(20, 30, 40, 0.96); border-radius: 2.2rem; box-shadow: 0 8px 48px 8px #14b8a660, 0 0 0 3px #2cffd9 inset; padding: 2.4rem 1.3rem 2.4rem 1.3rem; font-family: 'Russo One', Arial, sans-serif; color: #fff; letter-spacing: 0.02em; position: relative; z-index: 1;}
    .quiz-title { font-family: 'Bebas Neue', 'Russo One', Arial, sans-serif; font-size: 2.3rem; letter-spacing: 0.06em; color: #29fc94; margin-bottom: 0.8rem; font-weight: 900; text-shadow: 0 2px 16px #29fc94a6; text-align: center;}
    .quiz-agency { color: #ffe95d; }
    .quiz-desc { font-size: 1.17rem; color: #fff; margin-bottom: 1.2rem; font-family: 'Russo One', Arial, sans-serif; font-weight: 700; text-align: center;}
    .quiz-tip { display: block; color: #ffe95d; font-size: 1.03rem; margin-top: 0.5em;}
    .quiz-form { margin-top: 1.7rem;}
    .quiz-step { display: none; flex-direction: column; align-items: center; animation: fadein 0.6s;}
    .quiz-step.active { display: flex; }
    .quiz-q { font-size: 1.16rem; color: #29fc94; font-family: 'Russo One', Arial, sans-serif; margin-bottom: 1.25rem; font-weight: 700; text-align: center;}
    .quiz-btn { width: 100%; margin-bottom: 0.95em; background: linear-gradient(90deg, #29fc94 12%, #ffe95d 100%); color: #151f1c; font-family: 'Russo One', Arial, sans-serif; border: none; border-radius: 17px; font-size: 1.13rem; padding: 1.03em 1em; cursor: pointer; font-weight: 900; letter-spacing: .07em; box-shadow: 0 1px 16px #29fc94a0, 0 0 18px #ffe95d60; outline: none; transition: .14s; text-shadow: 0 1px 10px #fff48c44; position: relative; z-index: 1; animation: pulsebtn 2.7s infinite alternate; margin-top: 0;}
    .quiz-btn:hover { background: linear-gradient(90deg, #ffe95d 25%, #29fc94 100%); color: #15191c; filter: brightness(1.07);}
    .quiz-result-title { color: #ffe95d; font-family: 'Bebas Neue', Arial, sans-serif; font-size: 1.39rem; text-align: center; margin-bottom: 0.5em;}
    .quiz-result-text { text-align: center; color: #fff; font-size: 1.1rem; font-family: 'Russo One', Arial, sans-serif;}
    .quiz-cta { display: block; margin-top: 1.2em; color: #29fc94; font-weight: bold; font-size: 1.14em;}
    .quiz-input { width: 100%; padding: 0.95em 1em; border-radius: 13px; font-size: 1.15rem; border: 2px solid #29fc94; margin-bottom: 1.1em; font-family: 'Russo One', Arial, sans-serif; background: #181c20; color: #fff; outline: none; transition: border-color .15s;}
    .quiz-input.quiz-error { border-color: #e85151; background: #2b1414; }
    @media (max-width: 600px) { .quiz-main { padding: 1.2em 0.5em 1.1em 0.5em; } .quiz-title { font-size: 1.18rem; } .quiz-q { font-size: 1.06rem;} .quiz-btn { font-size: 0.98rem; }}
    @keyframes fadein {0%{opacity:0;transform:scale(0.97) translateY(22px);}100%{opacity:1;transform:scale(1) translateY(0);}}
    @keyframes pulsebtn {0%{box-shadow:0 0 14px #29fc94b3,0 0 14px #ffe95d60;}100%{box-shadow:0 0 30px #ffe95d,0 0 28px #29fc94bb;}}
 
  </style>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
<main class="quiz-main">
  <section class="quiz-hero">
    <div class="quiz-title"><span class="quiz-agency">EasyVisa World</span> · Какую визу выбрать для Бали?</div>
    <div class="quiz-desc">Планируете незабываемый отдых на Бали и не хотите тратить время на лишние формальности? Пройдите наш чек-лист — и узнайте, какая виза подходит вам!<br><span class="quiz-tip">Все визовые сборы уже включены — никаких скрытых платежей. Подписывайтесь на канал <a href="https://t.me/evisa_world" target="_blank">@evisa_world</a> для спец-предложений!</span></div>
  </section>
  <form id="visa-quiz" class="quiz-form" autocomplete="off">
    <div class="quiz-step active"><div class="quiz-q">1. Как долго вы планируете остаться на Бали?</div><button type="button" class="quiz-btn" data-value="до 30 дней">До 30 дней</button><button type="button" class="quiz-btn" data-value="свыше 30 дней">Свыше 30 дней</button></div>
    <div class="quiz-step"><div class="quiz-q">2. Вам нужна одноразовая или многократная виза?</div><button type="button" class="quiz-btn" data-value="single">Одноразовая (single entry)</button><button type="button" class="quiz-btn" data-value="multiple">Многократная (multiple entry)</button></div>
    <div class="quiz-step"><div class="quiz-q">3. Как хотите оформить визу?</div><button type="button" class="quiz-btn" data-value="онлайн">Онлайн (e-VOA, сразу)</button><button type="button" class="quiz-btn" data-value="по прилету">В аэропорту (VOA при прилёте)</button></div>
    <div class="quiz-step"><div class="quiz-q">4. Хотите продлить визу без выезда?</div><button type="button" class="quiz-btn" data-value="да">Да, хочу продлить онлайн</button><button type="button" class="quiz-btn" data-value="нет">Нет, не планирую продлевать</button></div>
    <div class="quiz-step"><div class="quiz-q">5. У вас есть обратный билет?</div><button type="button" class="quiz-btn" data-value="есть">Да, есть бронь</button><button type="button" class="quiz-btn" data-value="нужна бронь">Нет, нужна бесплатная бронь через EasyVisa</button></div>
    <div class="quiz-step"><div class="quiz-q">6. Какой у вас бюджет на визу?</div><button type="button" class="quiz-btn" data-value="e-VOA">e-VOA — от $35</button><button type="button" class="quiz-btn" data-value="C1">C1 — от $189</button><button type="button" class="quiz-btn" data-value="D1">D1 — $329</button><button type="button" class="quiz-btn" data-value="D12">D12 — от $499 (без вылета $649)</button><button type="button" class="quiz-btn" data-value="VOA">KITAS E33G — от $990</button></div>
    <div class="quiz-step"><div class="quiz-q">7. Готовы предоставить селфи и разворот паспорта?</div><button type="button" class="quiz-btn" data-value="да">Да, легко</button><button type="button" class="quiz-btn" data-value="затрудняюсь">Понадобится помощь</button></div>
    <div class="quiz-step"><div class="quiz-q">8. Какой срок оформления для вас важен?</div><button type="button" class="quiz-btn" data-value="e-VOA">e-VOA — моментально</button><button type="button" class="quiz-btn" data-value="C1/D12">C1/D12 — 3-5 рабочих дней</button></div>
    <div class="quiz-step"><div class="quiz-q">9. Вас беспокоят риски визарана?</div><button type="button" class="quiz-btn" data-value="да">Да, хочу надёжный вариант</button><button type="button" class="quiz-btn" data-value="нет">Нет, готов к повторному въезду</button></div>
    <div class="quiz-step"><div class="quiz-q">10. Нужна поддержка агента в процессе оформления?</div><button type="button" class="quiz-btn" data-value="да">Да, 24/7 поддержка нужна</button><button type="button" class="quiz-btn" data-value="нет">Нет, разберусь сам</button></div>
    <div class="quiz-step"><div class="quiz-q">Оставьте ваш Telegram или WhatsApp для связи:</div><input type="text" id="contact-input" class="quiz-input" placeholder="@username или номер"><button type="button" class="quiz-btn quiz-send-btn">Отправить ответы</button></div>
    <div class="quiz-step"><div class="quiz-result-title">Наш консультант проанализирует ваши ответы и в ближайшее время свяжется с вами!</div><div class="quiz-result-text" id="quiz-result-text">Анализируем ваши ответы...<br><span class="quiz-cta">Для финальной рекомендации напишите нам в Telegram — <a href="https://t.me/evisa_world" target="_blank">@evisa_world</a><br>или оставьте заявку на <a href="https://easyvisa.world" target="_blank">easyvisa.world</a></span></div></div>
  </form>
</main>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const steps = Array.from(document.querySelectorAll('.quiz-step'));
  const form = document.getElementById('visa-quiz');
  let answers = [];
  let current = 0;

  function showStep(idx) {
    steps.forEach((el, i) => el.classList.toggle('active', i === idx));
  }

  form.addEventListener('click', function(e) {
    // Обычные ответы (1-10)
    if (e.target.classList.contains('quiz-btn') && !e.target.classList.contains('quiz-send-btn')) {
      answers[current] = e.target.dataset.value;
      current++;
      showStep(current);
    }
    // Отправка контакта (последний шаг, только тут!)
    if (e.target.classList.contains('quiz-send-btn')) {
      const contact = document.getElementById('contact-input').value.trim();
      if (!contact) {
        document.getElementById('contact-input').classList.add('quiz-error');
        return;
      }
      document.getElementById('contact-input').classList.remove('quiz-error');
      answers[current] = contact;

      // Вопросы — строго как в форме
      const quizQuestions = [
        "1. Как долго вы планируете остаться на Бали?",
        "2. Вам нужна одноразовая или многократная виза?",
        "3. Как хотите оформить визу?",
        "4. Хотите продлить визу без выезда?",
        "5. У вас есть обратный билет?",
        "6. Какой у вас бюджет на визу?",
        "7. Готовы предоставить селфи и разворот паспорта?",
        "8. Какой срок оформления для вас важен?",
        "9. Вас беспокоят риски визарана?",
        "10. Нужна поддержка агента в процессе оформления?"
      ];

      let msg = "🟩 [QUIZ] Заполнен опрос на сайте EasyVisa:\n";
      quizQuestions.forEach((q, i) => {
        msg += `${q}\nОтвет: ${answers[i] || '-'}\n\n`;
      });
      msg += `Контакт клиента: ${contact}`;

      fetch('/api/send-to-tg.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ msg })
      })
      .then(response => response.json())
      .then(data => {
        current++;
        showStep(current);
        document.getElementById('quiz-result-text').innerHTML = `
          Спасибо! Ваши ответы отправлены.<br>
          Мы свяжемся с вами в Telegram или WhatsApp в ближайшее время.<br>
          <a href="/" target="_blank">Вернуться на главную</a>
        `;
      })
      .catch(() => {
        current++;
        showStep(current);
        document.getElementById('quiz-result-text').innerHTML = `
          Спасибо! Ваши ответы записаны.<br>
          Если не получили отклик — напишите <a href="https://t.me/evisa_world" target="_blank">@evisa_world</a>
        `;
      });
    }
  });

  showStep(0);
});
</script>
</body>
</html>