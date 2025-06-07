<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>EasyVisa GTA FAQ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/include/faq.css">

<?php include $_SERVER['DOCUMENT_ROOT'].'/include/head_links.php'; ?>
</head>
<div class="header-container">
  <div class="gta-header">
                 <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
  </div>
</div>
<body>
<br>
<br>

  <main>
    <div class="container-main">

      <div id="faq-grid" class="faq-grid"></div>


    </div>

  </main>

  <!-- Модальное окно для ответов -->
  <div id="faq-modal" class="hidden">
    <div class="modal-content">
      <button class="close-btn" onclick="closeModal()">&times;</button>
      <div id="modal-title"></div>
      <div id="modal-answer"></div>
    </div>
  </div>

  <!-- Ссылки на JS -->
  <script src="/include/menu.js?v=2"></script>
  <script src="/include/faq.js?v=2"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
</body>
</html>