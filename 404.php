<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>404 — Страница не найдена | EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <style>
    body {
      font-family: 'Russo One', Arial, sans-serif;
      margin: 0;
      color: #fff;
      padding-top: 80px;
      overflow-x: hidden;
    }

    .gta-404-main {
      max-width: 1100px;
      margin: 60px auto 30px auto;
      background: linear-gradient(120deg, #212b36ee 88%, #1fa96c33 100%);
      border-radius: 2.5rem;
      box-shadow: 0 0 60px 8px #29fc9444, 0 0 0 4px #29fc94;
      padding: 2.8rem 1.1rem 2.3rem 1.1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      position: relative;
    }

    .game-layout {
      display: flex;
      gap: 2rem;
      align-items: flex-start;
      justify-content: center;
      width: 100%;
      max-width: 1000px;
    }

    .gta-404-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 4.2rem;
      color: #ffe95d;
      letter-spacing: 0.15em;
      text-shadow: 0 4px 28px #151f2bcc, 0 0 2px #000;
      margin-bottom: 0.2em;
      text-align: center;
    }

    .gta-404-sub {
      text-align: center;
      font-size: 1.25rem;
      color: #29fc94;
      margin-bottom: 2.4rem;
      font-family: 'Russo One', Arial, sans-serif;
      text-shadow: 0 2px 18px #2cffd9a6;
    }

    /* Game 2048 Styles */
    .game-2048-container {
      background: linear-gradient(135deg, #202a37 0%, #1a2430 100%);
      border-radius: 1.7rem;
      box-shadow: 0 0 30px #29fc9440, 0 0 0 3px #29fc94 inset;
      padding: 2rem;
      width: 420px;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }

    /* Sidebar Styles */
    .game-sidebar {
      width: 280px;
      background: linear-gradient(135deg, #1a2430 0%, #151f2b 100%);
      border-radius: 1.7rem;
      box-shadow: 0 0 20px #29fc9430, 0 0 0 2px #29fc94 inset;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      height: fit-content;
    }

    .sidebar-section {
      background: rgba(41, 252, 148, 0.1);
      border-radius: 1rem;
      padding: 1.2rem;
      border: 1px solid rgba(41, 252, 148, 0.3);
    }

    .sidebar-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.5rem;
      color: #ffe95d;
      margin-bottom: 0.8rem;
      text-align: center;
      letter-spacing: 0.05em;
      text-shadow: 0 2px 8px #ffe95d66;
    }

    .achievement-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.8rem;
      background: linear-gradient(90deg, rgba(41, 252, 148, 0.15), rgba(255, 233, 93, 0.15));
      border-radius: 0.8rem;
      margin-bottom: 0.5rem;
      border: 1px solid rgba(41, 252, 148, 0.2);
      transition: all 0.3s ease;
    }

    .achievement-item.unlocked {
      background: linear-gradient(90deg, #29fc94, #ffe95d);
      color: #151f1c;
      font-weight: 900;
      box-shadow: 0 0 15px rgba(41, 252, 148, 0.5);
      animation: achievement-glow 2s ease-in-out infinite alternate;
    }

    .achievement-points {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.1rem;
      font-weight: 900;
    }

    .achievement-reward {
      font-size: 0.9rem;
      color: #29fc94;
      font-weight: 700;
    }

    .achievement-item.unlocked .achievement-reward {
      color: #151f1c;
    }

    .rules-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .rules-list li {
      padding: 0.5rem 0;
      border-bottom: 1px solid rgba(41, 252, 148, 0.2);
      font-size: 0.9rem;
      color: #ccc;
      line-height: 1.4;
    }

    .rules-list li:last-child {
      border-bottom: none;
    }

    .rules-list li strong {
      color: #29fc94;
    }

    .discount-info {
      text-align: center;
      background: linear-gradient(135deg, #ffe95d, #29fc94);
      color: #151f1c;
      padding: 1rem;
      border-radius: 1rem;
      font-weight: 900;
      margin-top: 1rem;
      box-shadow: 0 0 20px rgba(255, 233, 93, 0.4);
    }

    .discount-value {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 2rem;
      display: block;
      margin-bottom: 0.3rem;
      text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .game-2048-title {
      color: #ffe95d;
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 2.8rem;
      margin-bottom: 0.5em;
      letter-spacing: 0.08em;
      text-shadow: 0 2px 12px #ffe95d66, 0 0 20px #ffe95d;
      text-align: center;
      animation: title-glow 3s ease-in-out infinite alternate;
    }

    .game-header {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 1.5rem;
      gap: 1rem;
    }

    .score-container {
      background: linear-gradient(135deg, #29fc94 0%, #20d47a 100%);
      border-radius: 1rem;
      padding: 0.7rem 1.2rem;
      color: #151f1c;
      font-family: 'Russo One', Arial, sans-serif;
      font-weight: 900;
      text-align: center;
      min-width: 80px;
      position: relative;
      overflow: hidden;
    }

    .score-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      animation: score-shine 2s infinite;
    }

    .score-label {
      display: block;
      font-size: 0.8rem;
      margin-bottom: 0.2rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .score-value {
      font-size: 1.2rem;
      font-weight: 900;
    }

    .game-board {
      width: 320px;
      height: 320px;
      background: #151f2b;
      border-radius: 1.2rem;
      padding: 0.8rem;
      position: relative;
      border: 3px solid #29fc94;
      box-shadow: 0 0 20px #29fc9450, inset 0 0 20px rgba(0,0,0,0.5);
    }

    .grid-container {
      position: absolute;
      top: 0.8rem;
      left: 0.8rem;
      width: calc(100% - 1.6rem);
      height: calc(100% - 1.6rem);
    }

    .grid-row {
      display: flex;
      margin-bottom: 0.5rem;
    }

    .grid-row:last-child {
      margin-bottom: 0;
    }

    .grid-cell {
      width: 70px;
      height: 70px;
      background: rgba(41, 252, 148, 0.1);
      border-radius: 0.5rem;
      margin-right: 0.5rem;
      border: 1px solid rgba(41, 252, 148, 0.2);
    }

    .grid-cell:last-child {
      margin-right: 0;
    }

    .tile {
      position: absolute;
      width: 70px;
      height: 70px;
      border-radius: 0.5rem;
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.8rem;
      font-weight: 900;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.15s ease-in-out;
      animation: tile-appear 0.2s ease-out;
      text-shadow: 0 1px 3px rgba(0,0,0,0.5);
      box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .tile-2 { background: linear-gradient(135deg, #29fc94, #20d47a); color: #151f1c; }
    .tile-4 { background: linear-gradient(135deg, #ffe95d, #ffd700); color: #151f1c; }
    .tile-8 { background: linear-gradient(135deg, #ff6b6b, #ff5252); color: #fff; }
    .tile-16 { background: linear-gradient(135deg, #4ecdc4, #26a69a); color: #fff; }
    .tile-32 { background: linear-gradient(135deg, #45b7d1, #3498db); color: #fff; }
    .tile-64 { background: linear-gradient(135deg, #96ceb4, #2ecc71); color: #fff; }
    .tile-128 { background: linear-gradient(135deg, #feca57, #ff9ff3); color: #151f1c; font-size: 1.5rem; }
    .tile-256 { background: linear-gradient(135deg, #ff9ff3, #f368e0); color: #fff; font-size: 1.5rem; }
    .tile-512 { background: linear-gradient(135deg, #ff6348, #e55039); color: #fff; font-size: 1.5rem; }
    .tile-1024 { background: linear-gradient(135deg, #3742fa, #2f3542); color: #fff; font-size: 1.2rem; }
    .tile-2048 { background: linear-gradient(135deg, #ffd700, #ffb347); color: #151f1c; font-size: 1.2rem; 
                 animation: tile-2048-glow 1s ease-in-out infinite alternate; }

    .tile-new {
      animation: tile-spawn 0.3s ease-out;
    }

    .tile-merged {
      animation: tile-merge 0.2s ease-out;
    }

    .game-controls {
      margin-top: 1.5rem;
      text-align: center;
    }

    .control-btn {
      background: linear-gradient(90deg, #29fc94 18%, #ffe95d 82%);
      color: #151f1c;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1rem;
      border: none;
      border-radius: 1rem;
      padding: 0.8rem 1.5rem;
      cursor: pointer;
      font-weight: 900;
      letter-spacing: 0.05em;
      box-shadow: 0 4px 15px rgba(41, 252, 148, 0.4);
      transition: all 0.2s ease;
      margin: 0 0.5rem;
    }

    .control-btn:hover {
      background: linear-gradient(90deg, #ffe95d 40%, #29fc94 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(41, 252, 148, 0.6);
    }

    .control-btn:active {
      transform: translateY(0);
    }

    .game-message {
      color: #ffe95d;
      background: linear-gradient(135deg, #171a0c, #2a2d20);
      border-radius: 1rem;
      padding: 1rem 1.5rem;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1rem;
      margin: 1rem auto 0.5rem auto;
      text-align: center;
      text-shadow: 0 2px 12px #ffe95d77;
      letter-spacing: 0.02em;
      border: 1px solid rgba(255, 233, 93, 0.3);
    }

    .game-over-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(21, 31, 43, 0.95);
      border-radius: 1.7rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .game-over-overlay.show {
      opacity: 1;
      visibility: visible;
    }

    .game-over-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 3rem;
      color: #ff6b6b;
      margin-bottom: 1rem;
      text-shadow: 0 2px 10px #ff6b6b66;
    }

    .win-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255, 233, 93, 0.95), rgba(41, 252, 148, 0.95));
      border-radius: 1.7rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .win-overlay.show {
      opacity: 1;
      visibility: visible;
    }

    .win-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 3rem;
      color: #151f1c;
      margin-bottom: 1rem;
      animation: win-celebration 1s ease-in-out infinite alternate;
    }

    /* Particle Effects */
    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: #29fc94;
      border-radius: 50%;
      pointer-events: none;
      animation: particle-float 3s linear infinite;
    }

    .particle.gold {
      background: #ffe95d;
      box-shadow: 0 0 6px #ffe95d;
    }

    .particle.green {
      background: #29fc94;
      box-shadow: 0 0 6px #29fc94;
    }

    /* Animations */
    @keyframes title-glow {
      0% { text-shadow: 0 2px 12px #ffe95d66, 0 0 20px #ffe95d; }
      100% { text-shadow: 0 2px 12px #ffe95d99, 0 0 30px #ffe95d, 0 0 40px #ff9f43; }
    }

    @keyframes score-shine {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    @keyframes tile-appear {
      0% { transform: scale(0) rotate(180deg); opacity: 0; }
      100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }

    @keyframes tile-spawn {
      0% { transform: scale(0.8); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    @keyframes tile-merge {
      0% { transform: scale(1); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
    }

    @keyframes tile-2048-glow {
      0% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 20px #ffd700; }
      100% { box-shadow: 0 2px 8px rgba(0,0,0,0.3), 0 0 30px #ffd700, 0 0 40px #ff9f43; }
    }

    @keyframes win-celebration {
      0% { transform: scale(1) rotate(-2deg); }
      100% { transform: scale(1.1) rotate(2deg); }
    }

    @keyframes particle-float {
      0% {
        transform: translateY(0) translateX(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) translateX(50px) rotate(360deg);
        opacity: 0;
      }
    }

    @keyframes achievement-glow {
      0% { box-shadow: 0 0 15px rgba(41, 252, 148, 0.5); }
      100% { box-shadow: 0 0 25px rgba(255, 233, 93, 0.7), 0 0 35px rgba(41, 252, 148, 0.5); }
    }

    @media (max-width: 800px) {
      .game-layout {
        flex-direction: column;
        align-items: center;
      }

      .game-sidebar {
        width: 100%;
        max-width: 420px;
        order: 2;
      }

      .game-2048-container {
        width: 100%;
        max-width: 420px;
        order: 1;
      }
    }

    @media (max-width: 600px) {
      body { padding-top: 60px; }
      .gta-404-main { max-width: 95vw; margin: 30px auto; padding: 1.5rem 1rem 2rem 1rem; }
      .game-2048-container { max-width: 350px; padding: 1.5rem; width: 350px; }
      .game-board { width: 280px; height: 280px; }
      .grid-cell, .tile { width: 60px; height: 60px; }
      .tile { font-size: 1.5rem; }
      .tile-128, .tile-256, .tile-512 { font-size: 1.2rem; }
      .tile-1024, .tile-2048 { font-size: 1rem; }
      .game-sidebar { width: 350px; }
    }
  </style>
</head>
<body>
<div class="main-header-container-all-page">

<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
<div class="gta-404-main">
  <div class="gta-404-title" data-translate="error404.title">404</div>
  <div class="gta-404-sub" data-translate="error404.subtitle">Страница не найдена. Пока вы тут — сыграйте в 2048! ✨</div>

  <div class="game-layout">
    <div class="game-sidebar">
        <div class="sidebar-section">
          <div class="sidebar-title" data-translate="error404.howToPlay">Как играть:</div>
          <ul class="rules-list">
            <li data-translate="error404.howToPlayText">Используйте стрелки или WASD для перемещения плиток. Когда две плитки с одинаковыми числами касаются друг друга, они сливаются в одну!</li>
            <li><strong>Цель:</strong> Достичь плитки 2048</li>
            <li><strong>Управление:</strong> ← → ↑ ↓ или WASD</li>
          </ul>
        </div>

        <div class="sidebar-section">
          <div class="sidebar-title">🏆 Достижения</div>
          <div id="achievements-list">
            <!-- Динамически загружается JavaScript -->
          </div>
          <div class="discount-info">
            <span class="discount-value" id="total-discount">0%</span>
            <div data-translate="error404.discount">За каждые 10 000 очков получите 1% скидки на любую визу!</div>
          </div>
        </div>

        <div class="sidebar-section">
          <a href="/" class="control-btn" style="display: block; text-align: center; text-decoration: none; margin-top: 1rem;" data-translate="error404.backHome">← Вернуться на главную</a>
        </div>
      </div>

    <div class="game-2048-container">
      <div class="game-2048-title" data-translate="error404.gameTitle">2048</div>

      <div class="game-header">
        <div class="score-container">
          <span class="score-label" data-translate="error404.score">Счёт</span>
          <span class="score-value" id="score">0</span>
        </div>
        <div class="score-container">
          <span class="score-label" data-translate="error404.best">Лучший</span>
          <span class="score-value" id="best-score">0</span>
        </div>
      </div>

    <div class="game-board" id="game-board">
      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="game-over-overlay" id="game-over">
        <div class="game-over-title">Игра окончена!</div>
        <button class="control-btn" onclick="restartGame()">Заново</button>
      </div>

      <div class="win-overlay" id="win-overlay">
        <div class="win-title">Победа! 🎉</div>
        <button class="control-btn" onclick="continueGame()">Продолжить</button>
        <button class="control-btn" onclick="restartGame()">Заново</button>
      </div>
    </div>

    <div class="game-controls">
      <button class="control-btn" onclick="restartGame()" data-translate="error404.newGame">Новая игра</button>
      <button class="control-btn" onclick="undoMove()" id="undo-btn" data-translate="error404.undo">Отменить</button>
    </div>

    <div class="game-message" id="game-message">
      Используйте стрелки или WASD для перемещения плиток
    </div>
    </div>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
</div>

<script>
// Функция для безопасной инициализации
function safeInitialize() {
  // Проверяем, что переводы загружены
  if (typeof window.TRANSLATIONS === 'undefined') {
    setTimeout(safeInitialize, 100);
    return;
  }
  
  // Применяем переводы
  if (typeof applyTranslations === 'function') {
    applyTranslations();
  }
  
  // Инициализируем игру
  if (typeof Game2048 !== 'undefined') {
    window.game = new Game2048();
  }
}

class Game2048 {
  constructor() {
    this.board = Array(4).fill().map(() => Array(4).fill(0));
    this.score = 0;
    this.bestScore = localStorage.getItem('best-score-2048') || 0;
    this.previousState = null;
    this.hasWon = false;
    this.gameOver = false;
    this.achievements = [];
    this.totalDiscount = 0;

    this.initAchievements();
    this.updateDisplay();
    this.addRandomTile();
    this.addRandomTile();
    this.updateBoard();

    this.setupEventListeners();
    this.createParticles();
  }

  initAchievements() {
    this.achievements = [
      { points: 10000, discount: 1, unlocked: false, name: "Новичок" },
      { points: 20000, discount: 2, unlocked: false, name: "Игрок" },
      { points: 30000, discount: 3, unlocked: false, name: "Мастер" },
      { points: 40000, discount: 4, unlocked: false, name: "Эксперт" },
      { points: 50000, discount: 5, unlocked: false, name: "Легенда" },
      { points: 75000, discount: 7, unlocked: false, name: "Чемпион" },
      { points: 100000, discount: 10, unlocked: false, name: "Гроссмейстер" }
    ];

    // Load saved achievements
    const savedAchievements = localStorage.getItem('achievements-2048');
    if (savedAchievements) {
      const parsed = JSON.parse(savedAchievements);
      this.achievements.forEach((achievement, index) => {
        if (parsed[index]) {
          achievement.unlocked = parsed[index].unlocked;
        }
      });
    }

    this.updateAchievements();
  }

  updateAchievements() {
    // Check for new achievements based on current score
    let newAchievements = false;
    this.achievements.forEach(achievement => {
      if (!achievement.unlocked && this.score >= achievement.points) {
        achievement.unlocked = true;
        newAchievements = true;
        this.showAchievementNotification(achievement);
      }
    });

    if (newAchievements) {
      this.saveAchievements();
    }

    // Calculate total discount
    this.totalDiscount = this.achievements
      .filter(a => a.unlocked)
      .reduce((total, a) => total + a.discount, 0);

    this.renderAchievements();
  }

  saveAchievements() {
    localStorage.setItem('achievements-2048', JSON.stringify(this.achievements));
  }

  renderAchievements() {
    const container = document.getElementById('achievements-list');
    container.innerHTML = '';

    this.achievements.forEach(achievement => {
      const item = document.createElement('div');
      item.className = `achievement-item ${achievement.unlocked ? 'unlocked' : ''}`;

      item.innerHTML = `
        <div>
          <div class="achievement-points">${achievement.points.toLocaleString()}</div>
          <div style="font-size: 0.8rem; color: ${achievement.unlocked ? '#151f1c' : '#999'};">${achievement.name}</div>
        </div>
        <div class="achievement-reward">${achievement.discount}% скидка</div>
      `;

      container.appendChild(item);
    });

    document.getElementById('total-discount').textContent = `${this.totalDiscount}%`;
  }

  showAchievementNotification(achievement) {
    // Create achievement notification
    const notification = document.createElement('div');
    notification.style.cssText = `
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(135deg, #ffe95d, #29fc94);
      color: #151f1c;
      padding: 1.5rem 2rem;
      border-radius: 1rem;
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.5rem;
      font-weight: 900;
      text-align: center;
      z-index: 10000;
      box-shadow: 0 0 30px rgba(255, 233, 93, 0.8);
      animation: achievement-popup 3s ease-out forwards;
    `;

    notification.innerHTML = `
      🎉 АЧИВКА РАЗБЛОКИРОВАНА! 🎉<br>
      <div style="font-size: 1.2rem; margin-top: 0.5rem;">
        ${achievement.name} - ${achievement.discount}% скидка!
      </div>
    `;

document.body.appendChild(notification);

    // Add animation style
    const style = document.createElement('style');
    style.textContent = `
      @keyframes achievement-popup {
        0% { opacity: 0; transform: translate(-50%, -50%) scale(0.5); }
        20% { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }
        30% { transform: translate(-50%, -50%) scale(1); }
        90% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        100% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
      }
    `;
    document.head.appendChild(style);

    setTimeout(() => {
      notification.remove();
      style.remove();
    }, 3000);
  }

  setupEventListeners() {
    document.addEventListener('keydown', (e) => this.handleInput(e));

    // Touch support
    let startX, startY;
    const gameBoard = document.getElementById('game-board');

    gameBoard.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      startY = e.touches[0].clientY;
      e.preventDefault();
    });

    gameBoard.addEventListener('touchend', (e) => {
      if (!startX || !startY) return;

      const endX = e.changedTouches[0].clientX;
      const endY = e.changedTouches[0].clientY;

      const diffX = startX - endX;
      const diffY = startY - endY;

      const minSwipeDistance = 50;

      if (Math.abs(diffX) > Math.abs(diffY)) {
        if (Math.abs(diffX) > minSwipeDistance) {
          if (diffX > 0) this.move('left');
          else this.move('right');
        }
      } else {
        if (Math.abs(diffY) > minSwipeDistance) {
          if (diffY > 0) this.move('up');
          else this.move('down');
        }
      }

      startX = null;
      startY = null;
      e.preventDefault();
    });
  }

  handleInput(e) {
    if (this.gameOver) return;

    switch(e.key) {
      case 'ArrowUp':
      case 'w':
      case 'W':
        e.preventDefault();
        this.move('up');
        break;
      case 'ArrowDown':
      case 's':
      case 'S':
        e.preventDefault();
        this.move('down');
        break;
      case 'ArrowLeft':
      case 'a':
      case 'A':
        e.preventDefault();
        this.move('left');
        break;
      case 'ArrowRight':
      case 'd':
      case 'D':
        e.preventDefault();
        this.move('right');
        break;
    }
  }

  saveState() {
    this.previousState = {
      board: this.board.map(row => [...row]),
      score: this.score
    };
  }

  move(direction) {
    this.saveState();

    let moved = false;
    const newBoard = this.board.map(row => [...row]);

    switch(direction) {
      case 'left':
        moved = this.moveLeft(newBoard);
        break;
      case 'right':
        moved = this.moveRight(newBoard);
        break;
      case 'up':
        moved = this.moveUp(newBoard);
        break;
      case 'down':
        moved = this.moveDown(newBoard);
        break;
    }

    if (moved) {
      this.board = newBoard;
      this.addRandomTile();
      this.updateBoard();
      this.updateDisplay();

      if (this.checkWin() && !this.hasWon) {
        this.showWin();
        this.hasWon = true;
      }

      if (this.checkGameOver()) {
        this.showGameOver();
      }
    }
  }

  moveLeft(board) {
    let moved = false;

    for (let i = 0; i < 4; i++) {
      const row = board[i].filter(val => val !== 0);

      for (let j = 0; j < row.length - 1; j++) {
        if (row[j] === row[j + 1]) {
          row[j] *= 2;
          this.score += row[j];
          row[j + 1] = 0;
          this.createMergeEffect(i, j);
        }
      }

      const newRow = row.filter(val => val !== 0);
      while (newRow.length < 4) {
        newRow.push(0);
      }

      for (let j = 0; j < 4; j++) {
        if (board[i][j] !== newRow[j]) {
          moved = true;
        }
        board[i][j] = newRow[j];
      }
    }

    return moved;
  }

  moveRight(board) {
    let moved = false;

    for (let i = 0; i < 4; i++) {
      const row = board[i].filter(val => val !== 0);

      for (let j = row.length - 1; j > 0; j--) {
        if (row[j] === row[j - 1]) {
          row[j] *= 2;
          this.score += row[j];
          row[j - 1] = 0;
          this.createMergeEffect(i, 3 - (row.length - 1 - j));
        }
      }

      const newRow = row.filter(val => val !== 0);
      while (newRow.length < 4) {
        newRow.unshift(0);
      }

      for (let j = 0; j < 4; j++) {
        if (board[i][j] !== newRow[j]) {
          moved = true;
        }
        board[i][j] = newRow[j];
      }
    }

    return moved;
  }

  moveUp(board) {
    let moved = false;

    for (let j = 0; j < 4; j++) {
      const column = [];
      for (let i = 0; i < 4; i++) {
        if (board[i][j] !== 0) {
          column.push(board[i][j]);
        }
      }

      for (let i = 0; i < column.length - 1; i++) {
        if (column[i] === column[i + 1]) {
          column[i] *= 2;
          this.score += column[i];
          column[i + 1] = 0;
          this.createMergeEffect(i, j);
        }
      }

      const newColumn = column.filter(val => val !== 0);
      while (newColumn.length < 4) {
        newColumn.push(0);
      }

      for (let i = 0; i < 4; i++) {
        if (board[i][j] !== newColumn[i]) {
          moved = true;
        }
        board[i][j] = newColumn[i];
      }
    }

    return moved;
  }

  moveDown(board) {
    let moved = false;

    for (let j = 0; j < 4; j++) {
      const column = [];
      for (let i = 0; i < 4; i++) {
        if (board[i][j] !== 0) {
          column.push(board[i][j]);
        }
      }

      for (let i = column.length - 1; i > 0; i--) {
        if (column[i] === column[i - 1]) {
          column[i] *= 2;
          this.score += column[i];
          column[i - 1] = 0;
          this.createMergeEffect(3 - (column.length - 1 - i), j);
        }
      }

      const newColumn = column.filter(val => val !== 0);
      while (newColumn.length < 4) {
        newColumn.unshift(0);
      }

      for (let i = 0; i < 4; i++) {
        if (board[i][j] !== newColumn[i]) {
          moved = true;
        }
        board[i][j] = newColumn[i];
      }
    }

    return moved;
  }

  addRandomTile() {
    const emptyCells = [];

    for (let i = 0; i < 4; i++) {
      for (let j = 0; j < 4; j++) {
        if (this.board[i][j] === 0) {
          emptyCells.push({i, j});
        }
      }
    }

    if (emptyCells.length > 0) {
      const randomCell = emptyCells[Math.floor(Math.random() * emptyCells.length)];
      this.board[randomCell.i][randomCell.j] = Math.random() < 0.9 ? 2 : 4;
    }
  }

  updateBoard() {
    const gameBoard = document.getElementById('game-board');
    const existingTiles = gameBoard.querySelectorAll('.tile');
    existingTiles.forEach(tile => tile.remove());

    for (let i = 0; i < 4; i++) {
      for (let j = 0; j < 4; j++) {
        if (this.board[i][j] !== 0) {
          this.createTile(i, j, this.board[i][j]);
        }
      }
    }
  }

  createTile(row, col, value, isNew = false) {
    const tile = document.createElement('div');
    tile.className = `tile tile-${value}`;
    if (isNew) tile.classList.add('tile-new');

    tile.textContent = value;
    tile.style.left = `${col * 75 + 13}px`;
    tile.style.top = `${row * 75 + 13}px`;

    document.getElementById('game-board').appendChild(tile);
  }

  createMergeEffect(row, col) {
    // Create particle burst effect
    for (let i = 0; i < 8; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.left = `${col * 75 + 35}px`;
      particle.style.top = `${row * 75 + 35}px`;
      particle.style.animationDelay = `${i * 0.1}s`;
      particle.style.transform = `rotate(${i * 45}deg)`;

      document.getElementById('game-board').appendChild(particle);

      setTimeout(() => particle.remove(), 3000);
    }
  }

  updateDisplay() {
    document.getElementById('score').textContent = this.score;

    if (this.score > this.bestScore) {
      this.bestScore = this.score;
      localStorage.setItem('best-score-2048', this.bestScore);
    }

    document.getElementById('best-score').textContent = this.bestScore;

    // Update achievements
    this.updateAchievements();

    // Update message based on score
    const messageEl = document.getElementById('game-message');
    if (this.score === 0) {
      messageEl.textContent = 'Используйте стрелки или WASD для перемещения плиток';
    } else if (this.score < 100) {
      messageEl.textContent = 'Отличное начало! Продолжайте объединять плитки! 🔥';
    } else if (this.score < 500) {
      messageEl.textContent = 'Прекрасно! Вы на правильном пути! ⚡';
    } else if (this.score < 1000) {
      messageEl.textContent = 'Wow! Вы становитесь мастером! 🚀';
    } else if (this.score < 2000) {
      messageEl.textContent = 'Невероятно! Продолжайте в том же духе! 💎';
    } else {
      messageEl.textContent = 'Легендарный результат! Вы чемпион! 👑';
    }
  }

  checkWin() {
    for (let i = 0; i < 4; i++) {
      for (let j = 0; j < 4; j++) {
        if (this.board[i][j] === 2048) {
          return true;
        }
      }
    }
    return false;
  }

  checkGameOver() {
    // Check for empty cells
    for (let i = 0; i < 4; i++) {
      for (let j = 0; j < 4; j++) {
        if (this.board[i][j] === 0) {
          return false;
        }
      }
    }

    // Check for possible merges
    for (let i = 0; i < 4; i++) {
      for (let j = 0; j < 4; j++) {
        const current = this.board[i][j];
        if (
          (j < 3 && current === this.board[i][j + 1]) ||
          (i < 3 && current === this.board[i + 1][j])
        ) {
          return false;
        }
      }
    }

    return true;
  }

  showWin() {
    document.getElementById('win-overlay').classList.add('show');
    this.createCelebrationParticles();
  }

  showGameOver() {
    this.gameOver = true;
    document.getElementById('game-over').classList.add('show');
  }

  createCelebrationParticles() {
    for (let i = 0; i < 20; i++) {
      setTimeout(() => {
        const particle = document.createElement('div');
        particle.className = `particle ${Math.random() > 0.5 ? 'gold' : 'green'}`;
        particle.style.left = Math.random() * 300 + 'px';
        particle.style.top = Math.random() * 300 + 'px';
        particle.style.animationDuration = (2 + Math.random() * 2) + 's';

        document.getElementById('game-board').appendChild(particle);

        setTimeout(() => particle.remove(), 4000);
      }, i * 100);
    }
  }

  createParticles() {
    setInterval(() => {
      if (Math.random() > 0.7) {
        const particle = document.createElement('div');
        particle.className = `particle ${Math.random() > 0.5 ? 'gold' : 'green'}`;
        particle.style.left = Math.random() * 400 + 'px';
        particle.style.top = '100%';
        particle.style.animationDuration = (3 + Math.random() * 2) + 's';

        document.querySelector('.game-2048-container').appendChild(particle);

        setTimeout(() => particle.remove(), 5000);
      }
    }, 1000);
  }

  restart() {
    this.board = Array(4).fill().map(() => Array(4).fill(0));
    this.score = 0;
    this.hasWon = false;
    this.gameOver = false;
    this.previousState = null;

    // Reset achievements for new game (but keep unlocked ones)
    this.achievements.forEach(achievement => {
      achievement.unlocked = false;
    });

    document.getElementById('game-over').classList.remove('show');
    document.getElementById('win-overlay').classList.remove('show');

    this.addRandomTile();
    this.addRandomTile();
    this.updateBoard();
    this.updateDisplay();
  }

  undo() {
    if (this.previousState && !this.gameOver) {
      this.board = this.previousState.board;
      this.score = this.previousState.score;
      this.updateBoard();
      this.updateDisplay();
      this.previousState = null;
    }
  }
}

// Global functions
let game;

function initGame() {
  if (typeof Game2048 !== 'undefined') {
    game = new Game2048();
  }
}

function restartGame() {
  if (game && typeof game.restart === 'function') {
    game.restart();
  }
}

function continueGame() {
  const overlay = document.getElementById('win-overlay');
  if (overlay) {
    overlay.classList.remove('show');
  }
}

function undoMove() {
  if (game && typeof game.undo === 'function') {
    game.undo();
  }
}

// Безопасная инициализация
document.addEventListener('DOMContentLoaded', function() {
  // Ждем загрузки переводов
  if (typeof window.TRANSLATIONS !== 'undefined') {
    safeInitialize();
  } else {
    // Проверяем каждые 100мс
    const checkTranslations = setInterval(() => {
      if (typeof window.TRANSLATIONS !== 'undefined') {
        clearInterval(checkTranslations);
        safeInitialize();
      }
    }, 100);
  }
});
</script>
</body>
</html>