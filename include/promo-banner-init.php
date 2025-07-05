
<!-- Прomo Banner Script - подключается в самом низу страницы -->
<script src="/js/gta-promo-banner.js"></script>
<script>
// Инициализируем баннер после полной загрузки страницы
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
      if (typeof GTAPromoBanner !== 'undefined') {
        new GTAPromoBanner();
      }
    }, 100);
  });
} else {
  setTimeout(() => {
    if (typeof GTAPromoBanner !== 'undefined') {
      new GTAPromoBanner();
    }
  }, 100);
}
</script>
