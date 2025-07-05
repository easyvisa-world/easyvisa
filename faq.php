<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>EasyVisa GTA FAQ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/include/faq.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/include/hfstyle.css?v=<?php echo time(); ?>">
  <script type="module" src="/include/config.js?v=<?php echo time(); ?>"></script>
  <script type="module" src="/include/hfstyle.js?v=<?php echo time(); ?>" defer></script>
  <style>
    body {
      font-family: 'Russo One', Arial, sans-serif;
      margin: 0;
      color: #ffffff;
      min-height: 100vh;
      padding-top: 80px;
    }

    @media (max-width: 768px) {
      body {
        padding-top: 60px;
      }

      .faq-container {
        padding: 1rem;
      }
    }
  </style>
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
  <script src="/include/faq.js?v=<?php echo time(); ?>"></script>
  
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>

</body>
</html>