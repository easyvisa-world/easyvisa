<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Оплата — EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="/css/oplata.css">
</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
  <main class="oplata-main">
    <section class="oplata-block">
      <div class="oplata-title">Почему нам можно доверять</div>
      <ol class="oplata-list">
        <li><b>Легальная юр. структура.</b> EasyVisa World Agency IBC №4875283 зарегистрирована на Маршалловых островах, офис — One Pacific Place, Джакарта.</li>
        <li><b>Прозрачная цена.</b> Визовый сбор уже включён, скрытых платежей нет — это прописано в договоре.</li>
        <li><b>Финансовая гарантия.</b> При отказе по нашей вине возвращаем 100% оплаты или бесплатно переделываем заявку.</li>
        <li><b>3 200+ оформленных виз, 87% повторных клиентов.</b> Отзывы публикуем в канале <a href="https://t.me/easyvisa_world" target="_blank">@easyvisa_world</a>.</li>
        <li><b>Поддержка 24/7.</b> Русский и английский — <a href="mailto:manager@easyvisa.world">manager@easyvisa.world</a>, <a href="tel:+84776739907">+84 776 739 907</a>, Telegram <a href="https://t.me/easyvisa_world" target="_blank">@easyvisa_world</a>.</li>
      </ol>
    </section>

    <section class="oplata-block">
      <div class="oplata-title">Как можно оплатить</div>
      <ul class="oplata-pay-list">
        <li>IDR / MYR / VND / RUB</li>
        <li>Wise, Revolut, SEPA-перевод</li>
        <li>SWIFT USD / EUR</li>
        <li>Криптовалюта USDT (TRC-20) / BTC / ETH</li>
        <li>PayPal Invoice</li>
      </ul>
      <div class="oplata-info">
        <span class="highlight">Важно:</span> реквизиты и точную сумму под выбранный способ вышлет менеджер. Напишите нам удобным способом — ответим в среднем за 15 минут.
      </div>
    </section>

    <section class="oplata-block cta-block">
      <div class="cta-title">Готовы начать?</div>
      <div class="cta-text">Сообщите, какой метод вам ближе — и получите счёт прямо сейчас.</div>
    </section>
  </main>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
</body>
</html>
<style>
.oplata-main {
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
.oplata-title {
  font-family: 'Bebas Neue', 'Russo One', Arial, sans-serif;
  font-size: 2.15rem;
  letter-spacing: 0.06em;
  color: #29fc94;
  margin-bottom: 0.65rem;
  font-weight: 900;
  text-shadow: 0 2px 14px #29fc94a6;
}
.oplata-list {
  font-family: 'Russo One', Arial, sans-serif;
  font-size: 1.09rem;
  margin-bottom: 1.3em;
  padding-left: 1.4em;
}
.oplata-list li {
  margin-bottom: 0.5em;
  line-height: 1.48;
}
.oplata-list a { color: #29fc94; text-decoration: underline; }
.oplata-list a:hover { color: #ffe95d; }
.oplata-pay-list {
  font-family: 'Russo One', Arial, sans-serif;
  font-size: 1.09rem;
  margin-bottom: 1.05em;
  padding-left: 1.4em;
}
.oplata-pay-list li { margin-bottom: 0.4em; }
.oplata-info {
  background: rgba(255, 233, 93, 0.10);
  color: #ffe95d;
  font-family: 'Russo One', Arial, sans-serif;
  font-size: 1rem;
  border-left: 3px solid #ffe95d;
  padding: 0.75em 1em;
  border-radius: 0.9em;
  margin-bottom: 1.4em;
}
.oplata-info .highlight { color: #ffe95d; font-weight: bold; }
.cta-block {
  text-align: center;
  margin-top: 2.5em;
  padding: 1.2em 0.6em 1.2em 0.6em;
  background: linear-gradient(120deg, rgba(20,184,166,0.11), rgba(30,41,59,0.94) 88%);
  border-radius: 1.1em;
  box-shadow: 0 0 14px #29fc9480, 0 0 2px #14b8a6 inset;
}
.cta-title {
  font-family: 'Bebas Neue', Arial, sans-serif;
  font-size: 1.33rem;
  color: #29fc94;
  letter-spacing: 0.03em;
  margin-bottom: 0.33em;
}
.cta-text {
  font-family: 'Russo One', Arial, sans-serif;
  color: #fff;
  font-size: 1.07rem;
}
@media (max-width: 600px) {
  .oplata-main { padding: 1.15em 0.6em 1.25em 0.6em; }
  .oplata-title { font-size: 1.17rem; }
  .oplata-list, .oplata-pay-list { font-size: 0.97rem; }
}
</style>