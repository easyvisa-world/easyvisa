// main.js

// Здесь могут быть функции для других страниц, не связанных с header/footer или FAQ

// Пример: плавный скролл к якорю
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href.length > 1 && document.querySelector(href)) {
        e.preventDefault();
        document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});

// Пример: автозакрытие всплывающих уведомлений
function autoHideAlerts() {
  document.querySelectorAll('.alert').forEach(alert => {
    setTimeout(() => alert.classList.add('hide'), 4000);
  });
}
document.addEventListener('DOMContentLoaded', autoHideAlerts);

// Место для расширения: формы, попапы, обработка событий
// ...добавляй свои скрипты, чтобы не смешивать с логикой header/footer/faq