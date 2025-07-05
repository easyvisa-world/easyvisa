    // Переключение языка
    function switchLanguage(lang) {
      // Скрываем все элементы
      document.querySelectorAll('[lang="ru"], [lang="en"]').forEach(el => {
        el.style.display = 'none';
      });

      // Показываем элементы нужного языка
      document.querySelectorAll(`[lang="${lang}"]`).forEach(el => {
        el.style.display = '';
      });

      // Обновляем lang атрибут html элемента
      document.documentElement.lang = lang === 'en' ? 'en' : 'ru';

      // Сохраняем выбор
      localStorage.setItem('ev_lang', lang.toUpperCase());
    }

    // Lead Form Modal Functions
    function openLeadFormModal() {
      const modal = document.getElementById('leadFormModal');
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
      
      // Reset form if it was previously submitted
      resetLeadForm();
      
      // Add click sound effect
      playClickSound();
    }

    function closeLeadFormModal() {
      const modal = document.getElementById('leadFormModal');
      modal.classList.remove('show');
      document.body.style.overflow = '';
    }

    function resetLeadForm() {
      const form = document.getElementById('leadForm');
      const successDiv = document.getElementById('leadFormSuccess');
      
      form.style.display = 'block';
      successDiv.style.display = 'none';
      form.reset();
      
      // Remove error states
      document.querySelectorAll('.form-input, .form-textarea').forEach(input => {
        input.classList.remove('error');
      });
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
      const modal = document.getElementById('leadFormModal');
      if (event.target === modal || event.target.classList.contains('lead-form-overlay')) {
        closeLeadFormModal();
      }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        closeLeadFormModal();
      }
    });

    // Lead Form Submission
    document.addEventListener('DOMContentLoaded', function() {
      const leadForm = document.getElementById('leadForm');
      
      leadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitLeadForm');
        const formData = new FormData(leadForm);
        
        // Validate required fields
        const name = formData.get('name').trim();
        const contact = formData.get('contact').trim();
        
        // Clear previous errors
        document.querySelectorAll('.form-input, .form-textarea').forEach(input => {
          input.classList.remove('error');
        });
        
        let hasErrors = false;
        
        if (!name) {
          document.getElementById('leadName').classList.add('error');
          hasErrors = true;
        }
        
        if (!contact) {
          document.getElementById('leadContact').classList.add('error');
          hasErrors = true;
        }
        
        if (hasErrors) {
          return;
        }
        
        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="animate-spin">
            <circle cx="12" cy="12" r="10" stroke-width="4" stroke-opacity="0.25"/>
            <path d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" stroke-opacity="0.75"/>
          </svg>
          <span lang="ru">Отправляем...</span>
          <span lang="en" style="display: none;">Sending...</span>
        `;
        
        // Prepare message for Telegram
        const comment = formData.get('comment').trim() || 'Нет дополнительных вопросов';
        
        const message = `🔥 [ЛИДКА] Заявка с сайта - Виза B1

👤 <b>Имя:</b> ${name}
📱 <b>Контакт:</b> ${contact}
💬 <b>Комментарий:</b> ${comment}

📄 <b>Страница:</b> Виза B1 (E-VOA) — 30 дней на Бали
💰 <b>Цена:</b> $59 USD

🕐 <b>Время:</b> ${new Date().toLocaleString('ru-RU', {timeZone: 'Asia/Jakarta'})} (Jakarta)`;

        // Send to Telegram
        fetch('/api/send-to-tg.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            msg: message
          })
        })
        .then(response => response.json())
        .then(data => {
          // Show success state
          leadForm.style.display = 'none';
          document.getElementById('leadFormSuccess').style.display = 'block';
        })
        .catch(error => {
          console.error('Error:', error);
          // Show success anyway for user experience
          leadForm.style.display = 'none';
          document.getElementById('leadFormSuccess').style.display = 'block';
        })
        .finally(() => {
          // Re-enable button
          submitBtn.disabled = false;
          submitBtn.innerHTML = `
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
            <span lang="ru">Отправить заявку</span>
            <span lang="en" style="display: none;">Submit Request</span>
          `;
        });
      });
    });

    // 3D Glass Effects for Step Cards
    function setupStepCardEffects() {
      const stepCards = document.querySelectorAll('.step-card');
      
      stepCards.forEach((card, index) => {
        // Click event to open lead form modal
        card.addEventListener('click', function(event) {
          event.preventDefault();
          openLeadFormModal();
          
          // Add click effect
          card.style.transform = 'perspective(1000px) rotateX(10deg) rotateY(-5deg) translateY(-2px) scale(0.98)';
          setTimeout(() => {
            card.style.transform = '';
          }, 200);
        });

        // Enhanced 3D hover effects
        card.addEventListener('mousemove', function(event) {
          const rect = card.getBoundingClientRect();
          const centerX = rect.left + rect.width / 2;
          const centerY = rect.top + rect.height / 2;

          const deltaX = event.clientX - centerX;
          const deltaY = event.clientY - centerY;

          const rotateX = (deltaY / rect.height) * -15;
          const rotateY = (deltaX / rect.width) * 15;

          card.style.transform = `
            perspective(1000px) 
            rotateX(${rotateX}deg) 
            rotateY(${rotateY}deg) 
            translateY(-8px) 
            translateZ(20px)
          `;
        });

        card.addEventListener('mouseleave', function() {
          card.style.transform = '';
        });

        // Add floating animation with delay
        card.style.animationDelay = `${index * 0.2}s`;
        card.classList.add('floating-element');
      });
    }

    // Simple click sound effect
    function playClickSound() {
      try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();

        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);

        oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
        oscillator.frequency.exponentialRampToValueAtTime(200, audioContext.currentTime + 0.1);

        gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);

        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.1);
      } catch (error) {
        // Ignore audio errors
      }
    }

    // Инициализация при загрузке
    document.addEventListener('DOMContentLoaded', function() {
      const currentLang = (localStorage.getItem('ev_lang') || 'RU').toLowerCase();
      switchLanguage(currentLang);
      setupStepCardEffects();
    });

    // Исправление позиционирования Jivo чата
    (function() {
      function fixJivoPosition() {
        const jivoSelectors = [
          '#jivo-iframe-container',
          '[id*="jivo"]',
          '[class*="jivo"]',
          '.jivo_widget',
          '.jivo-widget',
          '#jivo_chat_widget',
          'div[id^="jivo"]',
          'div[class^="jivo"]'
        ];

        jivoSelectors.forEach(selector => {
          try {
            const elements = document.querySelectorAll(selector);
            elements.forEach(element => {
              if (element && element.style) {
                element.style.setProperty('position', 'fixed', 'important');
                element.style.setProperty('bottom', '20px', 'important');
                element.style.setProperty('right', '20px', 'important');
                element.style.setProperty('z-index', '2147483647', 'important');
                element.style.setProperty('transform', 'none', 'important');
                element.style.setProperty('margin', '0', 'important');
                element.style.setProperty('left', 'auto', 'important');
                element.style.setProperty('top', 'auto', 'important');
                element.style.setProperty('display', 'block', 'important');
                element.style.setProperty('visibility', 'visible', 'important');
              }
            });
          } catch (e) {
            // Игнорируем ошибки
          }
        });
      }

      // Запускаем при загрузке
      document.addEventListener('DOMContentLoaded', fixJivoPosition);
      window.addEventListener('load', fixJivoPosition);

      // Периодически проверяем
      setInterval(fixJivoPosition, 2000);
    })();
