<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Бали Гайд | EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="/include/hfstyle.css?v=<?php echo time(); ?>">
  <script type="module" src="/include/config.js?v=<?php echo time(); ?>"></script>
  <script type="module" src="/include/hfstyle.js?v=<?php echo time(); ?>" defer></script>
  <link rel="stylesheet" href="/css/gta-guide.css?v=<?php echo time(); ?>">
  <style>
    body { color: #fff; font-family: 'Russo One', Arial, sans-serif; }
  </style>
</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>

<div class="gta-guide-main">
  <div class="gta-guide-sidebar">
    <div class="gta-guide-logo">
      <img src="/img/easyvisa-gta.png" alt="EasyVisa GTA" style="width:54px;">
    </div>
    <ul id="gta-guide-tabs"></ul>
  </div>
  <div class="gta-guide-content">
    <div id="gta-guide-title" class="gta-guide-title"></div>
    <div id="gta-guide-img" class="gta-guide-img"></div>
    <div id="gta-guide-body" class="gta-guide-body"></div>

    <div class="gta-guide-nav">
  <button id="gta-guide-prev" class="gta-guide-nav-btn">← Предыдущая</button>
  <button id="gta-guide-next" class="gta-guide-nav-btn">Следующая →</button>
</div>

  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>

</body>
</html>
<script src="/js/bali-guide-content.js?v=<?php echo time(); ?>"></script>
<script>
const chapters = window.BALI_GUIDE_CONTENT;
const tabs = document.getElementById('gta-guide-tabs');
const title = document.getElementById('gta-guide-title');
const body = document.getElementById('gta-guide-body');
const img = document.getElementById('gta-guide-img');
const prevBtn = document.getElementById('gta-guide-prev');
const nextBtn = document.getElementById('gta-guide-next');

tabs.innerHTML = chapters.map((c,i) =>
  `<li${i===0?' class="active"':''} onclick="setTab(${i})"><span>${c.tab}</span></li>`
).join('');

function setTab(idx) {
  tabs.querySelectorAll('li').forEach((li,i) => li.classList.toggle('active', i===idx));
  title.innerHTML = chapters[idx].title;
  body.innerHTML = chapters[idx].body;
  img.innerHTML = chapters[idx].img ? `<img src="${chapters[idx].img}" alt="">` : '';
  // Прокрутка к началу
  setTimeout(() => {
    const guideTitle = document.querySelector('.gta-guide-title');
    if (guideTitle) {
      guideTitle.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }, 80);
  // Кнопки след/пред
  prevBtn.disabled = idx === 0;
  nextBtn.disabled = idx === chapters.length - 1;
  prevBtn.onclick = () => setTab(idx - 1);
  nextBtn.onclick = () => setTab(idx + 1);
}
window.setTab = setTab;
setTab(0);
</script>
</body>
</html>