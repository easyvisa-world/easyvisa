<!DOCTYPE html>
<html lang="ru" class="h-full scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>EasyVisa — мои ссылки</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- внешние файлы -->
  <link rel="stylesheet" href="css/variables.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="manifest" href="manifest.json">
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/head_links.php'; ?>
</head>

<body class="text-[var(--ev-white)] flex items-center justify-center min-h-screen p-4">
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php'; ?>


  <main class="w-full max-w-md relative items-center">

    <section class="glass relative rounded-3xl p-8 space-y-8">
      <!-- brand -->
      <header class="flex flex-col items-center text-center">
        <img src="https://easyvisa.world/wp-content/uploads/2023/12/logo2.svg_.svg"
             alt="EasyVisa World" width="180" height="40" class="mb-5 select-none">
        <p class="text-sm opacity-90">
          Визы и бизнес в Азии <span class="whitespace-nowrap">онлайн 24/7</span>
        </p>
      </header>

      <!-- links -->
      <nav class="space-y-3 [&_a]:block">
        <a href="https://instagram.com/easyvisa_world"
           class="link-btn green">Instagram</a>

        <a href="https://wa.me/+84776739907"
           class="link-btn blue text-[var(--ev-black)]">WhatsApp</a>

        <a href="https://t.me/evisa_support"
           class="link-btn green">Telegram</a>

        <a href="https://t.me/evisa_world"
           class="link-btn blue text-[var(--ev-black)]">Telegram канал</a>

        <a href="https://t.me/easyvisa_appbot"
           class="link-btn green">Оформить визу в EasyVisaApp</a>

        <a href="https://easyvisa.world"
           class="link-btn outline">Наш сайт</a>
      </nav>

      <!-- FAQ -->
      <section id="faq" class="space-y-4 pt-4 border-t border-white/10">
        <h2 class="text-lg font-semibold">Частые вопросы</h2>

        <article class="faq-item">
          <button class="faq-btn"><span>Сколько стоит продление визы B1?</span></button>
          <div class="faq-body">Продление — <b>$59</b>. В цену включён визовый сбор.</div>
        </article>

        <article class="faq-item">
          <button class="faq-btn"><span>Нужен ли обратный билет?</span></button>
          <div class="faq-body">Нет, продлеваем без билета; всё онлайн.</div>
        </article>

        <article class="faq-item">
          <button class="faq-btn"><span>Срок оформления?</span></button>
          <div class="faq-body">От 1 часа, следить за статусом можно в нашем приложении TG.</div>
        </article>
      </section>

      <footer class="pt-6 text-xs text-center opacity-50">
        © 2025 EasyVisa World Agency — visa fee included
      </footer>
    </section>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
    <!-- Android / iOS banners -->
    
    </div>
  </main>

  <script src="js/main.js" defer></script>
  
  <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(101926478, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/101926478" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>