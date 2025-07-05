// GTA Promo Banner Modal Implementation
function safeInitialize(fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
}

class GTAPromoBanner {
  constructor() {
    this.endDate = new Date('2025-06-30T23:59:59');
    this.timerInterval = null;
    this.mouseX = 0;
    this.mouseY = 0;
    this.init();
  }

  init() {
    this.createStyles();
    this.createBanner();
    this.createModal();
    this.setupEventListeners();
    this.startTimer();
    this.setupMorphismEffects();
  }

  createStyles() {
    // Подключаем красивые шрифты
    if (!document.querySelector('link[href*="fonts.googleapis.com/css2"][href*="Inter"]')) {
      const fontLink = document.createElement('link');
      fontLink.href = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Russo+One&display=swap';
      fontLink.rel = 'stylesheet';
      document.head.appendChild(fontLink);
    }

    const style = document.createElement('style');
    style.textContent = `
      /* GTA Promo Banner Styles */
      .gta-promo-banner {
        position: fixed !important;
        bottom: 20px !important;
        left: 20px !important;
        z-index: 999999 !important;
        font-family: 'Bebas Neue', Arial, sans-serif;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        animation: floating-banner 3s ease-in-out infinite;
      }

      .gta-promo-widget {
        background: rgba(25, 31, 38, 0.9);
        backdrop-filter: blur(20px);
        border: 2px solid rgba(41, 252, 148, 0.6);
        border-radius: 20px;
        padding: 15px 20px;
        box-shadow: 
          0 8px 32px rgba(41, 252, 148, 0.3),
          0 0 60px rgba(41, 252, 148, 0.2),
          inset 0 2px 20px rgba(255, 233, 93, 0.1);
        position: relative;
        overflow: hidden;
        min-width: 200px;
        transform-style: preserve-3d;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        font-family: 'Inter', 'SF Pro Display', 'Segoe UI', system-ui, -apple-system, sans-serif;
      }

      .gta-promo-widget.minimized {
        min-width: 120px;
        padding: 8px 12px;
      }

      .gta-promo-widget.minimized .gta-promo-content {
        display: none;
      }

      .gta-promo-widget.minimized .gta-promo-timer {
        font-size: 14px;
        margin: 0;
      }

      .gta-promo-hide-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        background: rgba(255, 233, 93, 0.1);
        border: 1px solid rgba(255, 233, 93, 0.3);
        color: rgba(255, 233, 93, 0.8);
        font-size: 18px;
        cursor: pointer;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border-radius: 50%;
        font-weight: bold;
      }

      .gta-promo-hide-btn:hover {
        color: #ffe95d;
        background: rgba(255, 233, 93, 0.2);
        border-color: rgba(255, 233, 93, 0.5);
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(255, 233, 93, 0.3);
      }

      .gta-promo-widget::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #29fc94, transparent);
        animation: border-glow 2s ease-in-out infinite;
      }

      .gta-promo-widget::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(
          from 0deg,
          transparent 0deg,
          rgba(41, 252, 148, 0.1) 90deg,
          transparent 180deg,
          rgba(255, 233, 93, 0.1) 270deg,
          transparent 360deg
        );
        opacity: 0;
        animation: rotate-glow 4s linear infinite;
        pointer-events: none;
        z-index: -1;
      }

      .gta-promo-fire {
        font-size: 24px;
        margin-bottom: 5px;
        text-align: center;
        animation: fire-flicker 1.5s ease-in-out infinite;
      }

      .gta-promo-title {
        color: #ffe95d;
        font-size: 20px;
        font-weight: 800;
        font-family: 'Russo One', 'Bebas Neue', 'Oswald', 'Inter', sans-serif;
        text-shadow: 
          0 0 10px #ffe95d,
          0 0 20px #ffe95d,
          0 2px 4px rgba(0,0,0,0.8);
        margin-bottom: 10px;
        text-align: center;
        letter-spacing: 0.05em;
        line-height: 1.1;
        text-transform: uppercase;
        animation: neon-pulse 2s ease-in-out infinite;
      }

      .gta-promo-timer {
        color: #29fc94;
        font-size: 18px;
        font-weight: 700;
        font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', 'Consolas', monospace;
        text-shadow: 
          0 0 10px #29fc94,
          0 0 20px #29fc94,
          0 1px 3px rgba(0,0,0,0.5);
        text-align: center;
        margin-bottom: 8px;
        letter-spacing: 0.1em;
        font-variant-numeric: tabular-nums;
      }

      .gta-promo-subtitle {
        color: #e4ffe9;
        font-size: 12px;
        font-weight: 500;
        font-family: 'Inter', 'SF Pro Text', 'Segoe UI', system-ui, sans-serif;
        text-align: center;
        opacity: 0.9;
        text-shadow: 0 1px 2px rgba(0,0,0,0.8);
        letter-spacing: 0.02em;
        line-height: 1.3;
      }

      /* Hover Effects */
      .gta-promo-banner:hover .gta-promo-widget {
        transform: translateY(-5px) rotateX(5deg) rotateY(-2deg) scale(1.05);
        border-color: #ffe95d;
        box-shadow: 
          0 15px 40px rgba(41, 252, 148, 0.4),
          0 0 80px rgba(255, 233, 93, 0.3),
          inset 0 2px 30px rgba(255, 233, 93, 0.2);
      }

      .gta-promo-banner:hover .gta-promo-widget::after {
        opacity: 0.3;
      }

      .gta-promo-banner:active .gta-promo-widget {
        transform: translateY(-2px) rotateX(2deg) rotateY(-1deg) scale(0.98);
        animation: mega-bounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      }

      /* Modal Styles */
      .gta-promo-modal {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100vh !important;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(10px);
        z-index: 999999 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-y: auto;
        padding: 20px;
        box-sizing: border-box;
      }

      .gta-promo-modal.show {
        opacity: 1;
        visibility: visible;
      }

      .gta-promo-modal-content {
        background: rgba(25, 31, 38, 0.95);
        backdrop-filter: blur(25px);
        border: 2px solid rgba(41, 252, 148, 0.6);
        border-radius: 24px;
        padding: 40px;
        max-width: 500px;
        width: 90%;
        max-height: 85vh;
        position: relative;
        transform: scale(0.7) rotateX(-10deg);
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        box-shadow: 
          0 20px 60px rgba(41, 252, 148, 0.3),
          0 0 100px rgba(41, 252, 148, 0.2);
        overflow-y: auto;
        margin: auto;
        box-sizing: border-box;
      }

      .gta-promo-modal.show .gta-promo-modal-content {
        transform: scale(1) rotateX(0deg);
      }

      .gta-promo-modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
        background: none;
        border: none;
        color: #ffe95d;
        font-size: 24px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .gta-promo-modal-close:hover {
        color: #29fc94;
        transform: scale(1.2) rotate(90deg);
      }

      .gta-promo-modal h2 {
        color: #ffe95d;
        font-size: 28px;
        font-weight: 800;
        font-family: 'Russo One', 'Bebas Neue', 'Oswald', 'Inter', sans-serif;
        margin-bottom: 20px;
        text-align: center;
        text-shadow: 0 0 20px #ffe95d;
        letter-spacing: 0.03em;
        line-height: 1.2;
        text-transform: uppercase;
      }

      .gta-promo-modal p {
        color: #e4ffe9;
        font-size: 16px;
        font-weight: 400;
        font-family: 'Inter', 'SF Pro Text', 'Segoe UI', system-ui, sans-serif;
        line-height: 1.6;
        margin-bottom: 15px;
        text-align: center;
        letter-spacing: 0.01em;
      }

      .gta-promo-cta {
        background: linear-gradient(145deg, rgba(41, 252, 148, 0.8), rgba(41, 252, 148, 0.6));
        border: 2px solid #29fc94;
        border-radius: 16px;
        color: #0c0c15;
        padding: 15px 30px;
        font-family: 'Russo One', 'Bebas Neue', 'Oswald', 'Inter', sans-serif;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        display: block;
        margin: 20px auto 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        text-align: center;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        line-height: 1.1;
      }

      .gta-promo-cta:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 30px rgba(41, 252, 148, 0.4);
        background: linear-gradient(145deg, #29fc94, rgba(41, 252, 148, 0.8));
      }

      /* Animations */
      @keyframes floating-banner {
        0%, 100% { transform: translateY(-50%) translateX(0); }
        50% { transform: translateY(-50%) translateX(-5px); }
      }

      @keyframes border-glow {
        0%, 100% {
          opacity: 0.6;
          background: linear-gradient(90deg, transparent, #29fc94, transparent);
        }
        50% {
          opacity: 1;
          background: linear-gradient(90deg, transparent, #ffe95d, transparent);
        }
      }

      @keyframes rotate-glow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

      @keyframes fire-flicker {
        0%, 100% { transform: scale(1) rotate(0deg); }
        25% { transform: scale(1.1) rotate(-2deg); }
        50% { transform: scale(0.9) rotate(2deg); }
        75% { transform: scale(1.05) rotate(-1deg); }
      }

      @keyframes neon-pulse {
        0%, 100% { 
          text-shadow: 
            0 0 10px #ffe95d,
            0 0 20px #ffe95d,
            0 2px 4px rgba(0,0,0,0.8);
        }
        50% { 
          text-shadow: 
            0 0 20px #ffe95d,
            0 0 40px #ffe95d,
            0 0 60px #ffe95d,
            0 2px 4px rgba(0,0,0,0.8);
        }
      }

      @keyframes mega-bounce {
        0% { transform: translateY(-2px) rotateX(2deg) rotateY(-1deg) scale(0.98); }
        25% { transform: translateY(-10px) rotateX(10deg) rotateY(-5deg) scale(1.08); }
        50% { transform: translateY(-15px) rotateX(15deg) rotateY(-8deg) scale(1.12); }
        75% { transform: translateY(-8px) rotateX(8deg) rotateY(-4deg) scale(1.05); }
        100% { transform: translateY(-5px) rotateX(5deg) rotateY(-2deg) scale(1.05); }
      }

      /* Responsive */
      @media (max-width: 768px) {
        .gta-promo-banner {
          bottom: 15px !important;
          left: 15px !important;
        }

        .gta-promo-widget {
          min-width: 180px;
          padding: 12px 16px;
        }

        .gta-promo-widget.minimized {
          min-width: 140px;
          padding: 10px 14px;
        }

        .gta-promo-title {
          font-size: 18px;
        }

        .gta-promo-timer {
          font-size: 16px;
        }

        .gta-promo-widget.minimized .gta-promo-timer {
          font-size: 16px;
        }

        .gta-promo-modal {
          padding: 10px !important;
          align-items: flex-start !important;
          padding-top: 5vh !important;
        }

        .gta-promo-modal-content {
          padding: 25px 15px !important;
          max-width: 95% !important;
          width: 95% !important;
          max-height: 90vh !important;
          margin-top: 0 !important;
          border-radius: 20px !important;
        }

        .gta-promo-modal h2 {
          font-size: 24px !important;
          margin-bottom: 15px !important;
        }

        .gta-promo-modal p {
          font-size: 14px !important;
          margin-bottom: 12px !important;
        }

        .gta-promo-cta {
          padding: 12px 25px !important;
          font-size: 16px !important;
        }

        .gta-promo-hide-btn {
          width: 28px;
          height: 28px;
          font-size: 16px;
        }
      }
    `;
    document.head.appendChild(style);
  }

  createBanner() {
    const banner = document.createElement('div');
    banner.className = 'gta-promo-banner';
    banner.innerHTML = `
      <div class="gta-promo-widget" id="gta-promo-widget">
        <button class="gta-promo-hide-btn" id="gta-promo-hide-btn">−</button>
        <div class="gta-promo-content">
          <div class="gta-promo-fire">🔥</div>
          <div class="gta-promo-title">АКЦИЯ 10%</div>
          <div class="gta-promo-subtitle">до конца скидки</div>
        </div>
        <div class="gta-promo-timer" id="gta-promo-timer">00:00:00</div>
      </div>
    `;
    document.body.appendChild(banner);
  }

  createModal() {
    const modal = document.createElement('div');
    modal.className = 'gta-promo-modal';
    modal.id = 'gta-promo-modal';
    modal.innerHTML = `
      <div class="gta-promo-modal-content">
        <button class="gta-promo-modal-close" id="gta-promo-modal-close" aria-label="Закрыть модальное окно">&times;</button>
        <h2>🔥 СУПЕР АКЦИЯ!</h2>
        <p>Успейте оформить визу со скидкой <strong style="color: #29fc94;">10%</strong>!</p>
        <p>⚡ Быстрое оформление за 1-3 дня</p>
        <p>📋 Минимум документов</p>
        <p>🎯 Гарантия одобрения</p>
        <p>💰 Фиксированная цена без доплат</p>
        <div class="gta-promo-timer" id="gta-promo-modal-timer">00:00:00</div>
        <a href="/contact.php" class="gta-promo-cta">ПОЛУЧИТЬ СКИДКУ</a>
      </div>
    `;

    // Делаем модальное окно фокусируемым
    modal.setAttribute('tabindex', '-1');
    modal.setAttribute('role', 'dialog');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-labelledby', 'modal-title');
    document.body.appendChild(modal);
  }

  setupEventListeners() {
    const banner = document.querySelector('.gta-promo-banner');
    const widget = document.getElementById('gta-promo-widget');
    const modal = document.getElementById('gta-promo-modal');
    const closeBtn = document.getElementById('gta-promo-modal-close');
    const hideBtn = document.getElementById('gta-promo-hide-btn');

    banner.addEventListener('click', (e) => {
      if (e.target !== hideBtn) {
        this.openModal();
        this.createClickRipple(e);
        this.triggerScreenShake();
      }
    });

    hideBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      this.toggleMinimize();
    });

    closeBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      this.closeModal();
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        this.closeModal();
      }
    });

    // ESC key to close modal
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeModal();
      }
    });
  }

  setupMorphismEffects() {
    const banner = document.querySelector('.gta-promo-banner');
    const widget = document.querySelector('.gta-promo-widget');

    document.addEventListener('mousemove', (e) => {
      this.mouseX = e.clientX;
      this.mouseY = e.clientY;

      const rect = banner.getBoundingClientRect();
      const centerX = rect.left + rect.width / 2;
      const centerY = rect.top + rect.height / 2;

      const deltaX = e.clientX - centerX;
      const deltaY = e.clientY - centerY;
      const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);

      if (distance < 200) {
        const intensity = (200 - distance) / 200;
        const rotateX = (deltaY / 100) * 10 * intensity;
        const rotateY = (deltaX / 100) * -10 * intensity;
        const translateZ = intensity * 20;

        widget.style.transform = `
          perspective(1000px) 
          rotateX(${rotateX}deg) 
          rotateY(${rotateY}deg) 
          translateZ(${translateZ}px)
          scale(${1 + intensity * 0.1})
        `;

        widget.style.boxShadow = `
          0 ${8 + intensity * 10}px ${32 + intensity * 20}px rgba(41, 252, 148, ${0.3 + intensity * 0.2}),
          0 0 ${60 + intensity * 40}px rgba(41, 252, 148, ${0.2 + intensity * 0.3})
        `;
      } else {
        widget.style.transform = '';
        widget.style.boxShadow = '';
      }
    });

    banner.addEventListener('mouseenter', () => {
      this.createHoverParticles(widget);
    });
  }

  createClickRipple(event) {
    const banner = document.querySelector('.gta-promo-widget');
    const rect = banner.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);

    const ripple = document.createElement('div');
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.cssText = `
      position: absolute;
      width: ${size}px;
      height: ${size}px;
      left: ${x}px;
      top: ${y}px;
      background: radial-gradient(circle, rgba(255, 233, 93, 0.6) 0%, transparent 70%);
      border-radius: 50%;
      transform: scale(0);
      animation: ripple-expand 0.8s ease-out;
      pointer-events: none;
      z-index: 1000;
    `;

    const rippleStyle = document.createElement('style');
    rippleStyle.textContent = `
      @keyframes ripple-expand {
        to {
          transform: scale(2);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(rippleStyle);

    banner.style.position = 'relative';
    banner.appendChild(ripple);

    setTimeout(() => ripple.remove(), 800);
  }

  createHoverParticles(element) {
    const rect = element.getBoundingClientRect();

    for (let i = 0; i < 3; i++) {
      const particle = document.createElement('div');
      particle.style.cssText = `
        position: absolute;
        width: 4px;
        height: 4px;
        background: #29fc94;
        border-radius: 50%;
        left: ${Math.random() * rect.width}px;
        top: ${Math.random() * rect.height}px;
        pointer-events: none;
        animation: particle-float 2s ease-out forwards;
        box-shadow: 0 0 10px #29fc94;
        z-index: 1001;
      `;

      const particleStyle = document.createElement('style');
      particleStyle.textContent = `
        @keyframes particle-float {
          0% {
            transform: translateY(0) scale(1);
            opacity: 0.8;
          }
          100% {
            transform: translateY(-40px) scale(0);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(particleStyle);

      element.appendChild(particle);
      setTimeout(() => particle.remove(), 2000);
    }
  }

  triggerScreenShake() {
    const shakeStyle = document.createElement('style');
    shakeStyle.textContent = `
      @keyframes screen-shake {
        0%, 100% { transform: translateX(0) translateY(0); }
        10% { transform: translateX(-2px) translateY(1px); }
        20% { transform: translateX(2px) translateY(-1px); }
        30% { transform: translateX(-1px) translateY(2px); }
        40% { transform: translateX(1px) translateY(-2px); }
        50% { transform: translateX(-2px) translateY(1px); }
        60% { transform: translateX(2px) translateY(-1px); }
        70% { transform: translateX(-1px) translateY(2px); }
        80% { transform: translateX(1px) translateY(-2px); }
        90% { transform: translateX(-1px) translateY(1px); }
      }
    `;
    document.head.appendChild(shakeStyle);

    document.body.style.animation = 'screen-shake 0.3s ease-in-out';
    setTimeout(() => {
      document.body.style.animation = '';
    }, 300);
  }

  startTimer() {
    this.updateTimer();
    this.timerInterval = setInterval(() => {
      this.updateTimer();
    }, 1000);
  }

  updateTimer() {
    const now = new Date().getTime();
    const timeLeft = this.endDate.getTime() - now;

    if (timeLeft > 0) {
      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      const timeString = days > 0 
        ? `${days}д ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`
        : `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

      const timerElement = document.getElementById('gta-promo-timer');
      if (timerElement) {
        timerElement.textContent = timeString;
      }
      const modalTimer = document.getElementById('gta-promo-modal-timer');
      if (modalTimer) {
        modalTimer.textContent = timeString;
      }
    } else {
      const timerElement = document.getElementById('gta-promo-timer');
      if (timerElement) {
        timerElement.textContent = "00:00:00";
      }
      const modalTimer = document.getElementById('gta-promo-modal-timer');
      if (modalTimer) {
        modalTimer.textContent = "АКЦИЯ ЗАВЕРШЕНА";
      }
      clearInterval(this.timerInterval);

      // Скрываем баннер после завершения акции
      const banner = document.querySelector('.gta-promo-banner');
      if (banner) {
        banner.style.display = 'none';
      }
    }
  }

  openModal() {
    const modal = document.getElementById('gta-promo-modal');

    // Блокируем скролл страницы
    document.body.style.overflow = 'hidden';
    document.documentElement.style.overflow = 'hidden';

    // Прокручиваем модальное окно наверх
    modal.scrollTop = 0;

    modal.classList.add('show');

    // Фокусируем модальное окно для лучшей доступности
    setTimeout(() => {
      modal.focus();
    }, 100);
  }

  closeModal() {
    const modal = document.getElementById('gta-promo-modal');
    modal.classList.remove('show');

    // Восстанавливаем скролл страницы
    document.body.style.overflow = '';
    document.documentElement.style.overflow = '';
  }

  toggleMinimize() {
    const widget = document.getElementById('gta-promo-widget');
    const hideBtn = document.getElementById('gta-promo-hide-btn');

    if (widget.classList.contains('minimized')) {
      widget.classList.remove('minimized');
      hideBtn.textContent = '−';
      hideBtn.title = 'Скрыть';
    } else {
      widget.classList.add('minimized');
      hideBtn.textContent = '+';
      hideBtn.title = 'Показать';
    }
  }
}

// Banner class ready for manual initialization