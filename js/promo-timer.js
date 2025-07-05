
// GTA5 Promo Timer
class GTAPromoTimer {
  constructor() {
    this.endDate = new Date();
    this.endDate.setDate(this.endDate.getDate() + 7);
    this.init();
  }

  init() {
    this.createTimer();
    this.createModal();
    this.updateTimer();
    this.startTimer();
  }

  createTimer() {
    const timerHTML = `
      <div class="gta-promo-widget" id="gta-promo-widget">
        <div class="gta-promo-icon">
          <div class="gta-promo-text">🔥 АКЦИЯ</div>
          <div class="gta-promo-timer" id="promo-timer">00:00:00</div>
        </div>
      </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', timerHTML);
    
    document.getElementById('gta-promo-widget').addEventListener('click', () => {
      this.openModal();
    });
  }

  createModal() {
    const modalHTML = `
      <div class="promo-modal-overlay" id="promo-modal-overlay">
        <div class="promo-modal">
          <button class="promo-modal-close" id="promo-modal-close">×</button>
          <div class="promo-modal-content">
            <h2 class="promo-modal-title">🔥 СПЕЦИАЛЬНАЯ АКЦИЯ!</h2>
            <div class="promo-modal-discount">СКИДКА 30%</div>
            <div class="promo-modal-description">
              <p>Получите скидку 30% на оформление любой визы!</p>
              <ul>
                <li>✅ Быстрое оформление документов</li>
                <li>✅ Персональная поддержка 24/7</li>
                <li>✅ Гарантия результата</li>
                <li>✅ Без скрытых платежей</li>
              </ul>
            </div>
            <div class="promo-modal-timer">
              <div class="promo-modal-timer-title">Акция действует ещё:</div>
              <div class="promo-modal-timer-display">
                <div class="timer-unit-modal">
                  <span class="timer-number-modal" id="modal-days">00</span>
                  <span class="timer-label-modal">Дни</span>
                </div>
                <div class="timer-unit-modal">
                  <span class="timer-number-modal" id="modal-hours">00</span>
                  <span class="timer-label-modal">Часы</span>
                </div>
                <div class="timer-unit-modal">
                  <span class="timer-number-modal" id="modal-minutes">00</span>
                  <span class="timer-label-modal">Мин</span>
                </div>
                <div class="timer-unit-modal">
                  <span class="timer-number-modal" id="modal-seconds">00</span>
                  <span class="timer-label-modal">Сек</span>
                </div>
              </div>
            </div>
            <div class="promo-modal-actions">
              <a href="/contact.php" class="promo-btn-primary">Написать нам</a>
              <a href="/pay.php" class="promo-btn-secondary">Оформить визу</a>
            </div>
          </div>
        </div>
      </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    document.getElementById('promo-modal-close').addEventListener('click', () => {
      this.closeModal();
    });
    
    document.getElementById('promo-modal-overlay').addEventListener('click', (e) => {
      if (e.target.id === 'promo-modal-overlay') {
        this.closeModal();
      }
    });
    
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeModal();
      }
    });
  }

  openModal() {
    const modal = document.getElementById('promo-modal-overlay');
    if (modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  }

  closeModal() {
    const modal = document.getElementById('promo-modal-overlay');
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  updateTimer() {
    const now = new Date().getTime();
    const distance = this.endDate.getTime() - now;

    if (distance < 0) {
      this.endDate = new Date();
      this.endDate.setDate(this.endDate.getDate() + 7);
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    const timerElement = document.getElementById('promo-timer');
    if (timerElement) {
      timerElement.textContent = `${days.toString().padStart(2, '0')}:${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
    }

    const modalDaysEl = document.getElementById('modal-days');
    const modalHoursEl = document.getElementById('modal-hours');
    const modalMinutesEl = document.getElementById('modal-minutes');
    const modalSecondsEl = document.getElementById('modal-seconds');

    if (modalDaysEl) modalDaysEl.textContent = days.toString().padStart(2, '0');
    if (modalHoursEl) modalHoursEl.textContent = hours.toString().padStart(2, '0');
    if (modalMinutesEl) modalMinutesEl.textContent = minutes.toString().padStart(2, '0');
    if (modalSecondsEl) modalSecondsEl.textContent = seconds.toString().padStart(2, '0');
  }

  startTimer() {
    this.timerInterval = setInterval(() => {
      this.updateTimer();
    }, 1000);
  }
}

// Инициализация таймера
document.addEventListener('DOMContentLoaded', () => {
  new GTAPromoTimer();
});
