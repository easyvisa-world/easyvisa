// Enhanced 3D Morphism Interactive Effects
class AdvancedMorphismEffects {
  constructor() {
    this.mouseX = 0;
    this.mouseY = 0;
    this.isMouseDown = false;
    this.init();
  }

  init() {
    this.setupAdvancedCursorEffects();
    this.setupMegaPixelInteractions();
    this.setupEnhancedScreenShake();
    this.setupAdvancedParallaxEffects();
    this.setupSoundEffects();
    this.setupTiltEffects();
  }

  // Advanced cursor-based morphism effects
  setupAdvancedCursorEffects() {
    document.addEventListener('mousemove', (e) => {
      this.mouseX = e.clientX;
      this.mouseY = e.clientY;

      const morphismElements = document.querySelectorAll('.morphism-interactive');

      morphismElements.forEach((element, index) => {
        const rect = element.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        const deltaX = e.clientX - centerX;
        const deltaY = e.clientY - centerY;
        const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);

        // Enhanced morphism effect with multiple layers
        if (distance < 300) {
          const intensity = (300 - distance) / 300;
          const rotateX = (deltaY / rect.height) * 15 * intensity;
          const rotateY = (deltaX / rect.width) * -15 * intensity;
          const translateZ = intensity * 40;
          const scale = 1 + intensity * 0.08;

          element.style.transform = `
            perspective(1200px) 
            rotateX(${rotateX}deg) 
            rotateY(${rotateY}deg) 
            translateZ(${translateZ}px)
            scale(${scale})
          `;

          // Multi-layered glow effect
          const primaryGlow = 30 + intensity * 40;
          const secondaryGlow = 20 + intensity * 30;
          const shadowBlur = 40 + intensity * 20;

          element.style.boxShadow = `
            0 0 ${primaryGlow}px rgba(41, 252, 148, ${0.3 + intensity * 0.4}),
            0 0 ${secondaryGlow}px rgba(255, 233, 93, ${0.2 + intensity * 0.3}),
            0 ${10 + intensity * 15}px ${shadowBlur}px rgba(41, 252, 148, ${0.15 + intensity * 0.25})
          `;

          // Dynamic filter effects
          element.style.filter = `
            brightness(${1 + intensity * 0.2}) 
            saturate(${1 + intensity * 0.3})
            contrast(${1 + intensity * 0.1})
          `;

          // Animated border color
          element.style.borderColor = intensity > 0.5 ? 
            `rgba(255, 233, 93, ${0.5 + intensity * 0.5})` : 
            `rgba(41, 252, 148, ${0.3 + intensity * 0.4})`;
        } else {
          element.style.transform = '';
          element.style.boxShadow = '';
          element.style.filter = '';
          element.style.borderColor = '';
        }
      });
    });
  }

  // Mega pixel-style interactions with sound
  setupMegaPixelInteractions() {
    document.querySelectorAll('.morphism-interactive').forEach((element, index) => {
      element.addEventListener('click', (e) => {
        // Mega bounce effect
        element.style.animation = 'none';
        element.offsetHeight; // Trigger reflow
        element.style.animation = 'mega-bounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55)';

        // Create multiple ripple effects
        this.createMegaRipple(e.target, e.clientX, e.clientY);

        // Enhanced screen shake
        this.triggerEnhancedScreenShake();

        // Create particle explosion
        this.createParticleExplosion(e.clientX, e.clientY);

        // Play sound effect (if available)
        this.playClickSound();
      });

      element.addEventListener('mouseenter', (e) => {
        element.style.filter = 'brightness(1.15) saturate(1.3) contrast(1.05)';
        element.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';

        // Create hover particles
        this.createHoverParticles(e.target);
      });

      element.addEventListener('mouseleave', () => {
        element.style.filter = '';
        element.style.transform = '';
        element.style.boxShadow = '';
        element.style.borderColor = '';
      });
    });
  }

  // Enhanced screen shake with rotation
  setupEnhancedScreenShake() {
    this.shakeCount = 0;
  }

  triggerEnhancedScreenShake() {
    if (this.shakeCount > 0) return;

    this.shakeCount++;
    document.body.style.animation = 'enhanced-screen-shake 0.3s ease-in-out';

    setTimeout(() => {
      document.body.style.animation = '';
      this.shakeCount = 0;
    }, 300);
  }

  // Advanced ripple effect with multiple waves
  createMegaRipple(element, clientX, clientY) {
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);

    // Create multiple ripples with different sizes and delays
    for (let i = 0; i < 3; i++) {
      const ripple = document.createElement('div');
      const x = clientX - rect.left - (size * (1 + i * 0.3)) / 2;
      const y = clientY - rect.top - (size * (1 + i * 0.3)) / 2;

      ripple.style.cssText = `
        position: absolute;
        width: ${size * (1 + i * 0.3)}px;
        height: ${size * (1 + i * 0.3)}px;
        left: ${x}px;
        top: ${y}px;
        background: radial-gradient(circle, 
          rgba(41, 252, 148, ${0.6 - i * 0.2}) 0%, 
          rgba(255, 233, 93, ${0.4 - i * 0.1}) 30%,
          transparent 70%);
        border-radius: 50%;
        transform: scale(0);
        animation: mega-ripple-expand ${0.8 + i * 0.2}s ease-out;
        animation-delay: ${i * 0.1}s;
        pointer-events: none;
        z-index: 1000;
      `;

      element.style.position = 'relative';
      element.appendChild(ripple);

      setTimeout(() => ripple.remove(), (800 + i * 200));
    }
  }

  // Particle explosion effect
  createParticleExplosion(x, y) {
    const colors = ['#29fc94', '#ffe95d', '#88dafe'];

    for (let i = 0; i < 15; i++) {
      const particle = document.createElement('div');
      const color = colors[Math.floor(Math.random() * colors.length)];
      const angle = (i / 15) * Math.PI * 2;
      const velocity = 50 + Math.random() * 100;
      const size = 2 + Math.random() * 4;

      particle.style.cssText = `
        position: fixed;
        width: ${size}px;
        height: ${size}px;
        background: ${color};
        border-radius: 50%;
        left: ${x}px;
        top: ${y}px;
        pointer-events: none;
        z-index: 10000;
        box-shadow: 0 0 10px ${color};
      `;

      document.body.appendChild(particle);

      // Animate particle
      const animation = particle.animate([
        { 
          transform: 'translate(0, 0) scale(1)', 
          opacity: 1 
        },
        { 
          transform: `translate(${Math.cos(angle) * velocity}px, ${Math.sin(angle) * velocity + 30}px) scale(0)`, 
          opacity: 0 
        }
      ], {
        duration: 1000,
        easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
      });

      animation.onfinish = () => particle.remove();
    }
  }

  // Hover particles effect
  createHoverParticles(element) {
    const rect = element.getBoundingClientRect();

    for (let i = 0; i < 5; i++) {
      const particle = document.createElement('div');
      particle.style.cssText = `
        position: absolute;
        width: 3px;
        height: 3px;
        background: #29fc94;
        border-radius: 50%;
        left: ${Math.random() * rect.width}px;
        top: ${Math.random() * rect.height}px;
        pointer-events: none;
        animation: hover-particle-float 2s ease-out forwards;
        box-shadow: 0 0 8px #29fc94;
      `;

      element.appendChild(particle);
      setTimeout(() => particle.remove(), 2000);
    }
  }

  // Advanced parallax effects with depth layers
  setupAdvancedParallaxEffects() {
    document.addEventListener('mousemove', (e) => {
      const centerX = window.innerWidth / 2;
      const centerY = window.innerHeight / 2;

      // Different layers with different speeds
      const layers = [
        { selector: '.floating-element', speed: 0.02 },
        { selector: '.morphism-panel', speed: 0.01 },
        { selector: '.country-card', speed: 0.015 }
      ];

      layers.forEach((layer, layerIndex) => {
        const elements = document.querySelectorAll(layer.selector);
        elements.forEach((element, index) => {
          const speed = layer.speed + (index * 0.005);
          const deltaX = (e.clientX - centerX) * speed;
          const deltaY = (e.clientY - centerY) * speed;
          const rotateZ = deltaX * 0.01;

          if (!element.style.transform.includes('perspective')) {
            element.style.transform = `translate(${deltaX}px, ${deltaY}px) rotateZ(${rotateZ}deg)`;
          }
        });
      });
    });
  }

  // Tilt effects for cards
  setupTiltEffects() {
    document.querySelectorAll('.morphism-card, .country-card').forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        const deltaX = e.clientX - centerX;
        const deltaY = e.clientY - centerY;

        const rotateX = (deltaY / rect.height) * -20;
        const rotateY = (deltaX / rect.width) * 20;

        card.style.transform = `
          perspective(1000px) 
          rotateX(${rotateX}deg) 
          rotateY(${rotateY}deg) 
          translateZ(10px)
        `;
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  }

  // Sound effects setup (optional)
  setupSoundEffects() {
    try {
      // Create audio context if available
      if (window.AudioContext || window.webkitAudioContext) {
        this.audioContext = new (window.AudioContext || window.webkitAudioContext)();
      }
    } catch (error) {
      // Тихо обрабатываем ошибки аудио
    }
  }

  playClickSound() {
    if (!this.audioContext) return;

    // Create a simple beep sound
    const oscillator = this.audioContext.createOscillator();
    const gainNode = this.audioContext.createGain();

    oscillator.connect(gainNode);
    gainNode.connect(this.audioContext.destination);

    oscillator.frequency.setValueAtTime(800, this.audioContext.currentTime);
    oscillator.frequency.exponentialRampToValueAtTime(200, this.audioContext.currentTime + 0.1);

    gainNode.gain.setValueAtTime(0.1, this.audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, this.audioContext.currentTime + 0.1);

    oscillator.start(this.audioContext.currentTime);
    oscillator.stop(this.audioContext.currentTime + 0.1);
  }
}

// Enhanced Retro Effects
class AdvancedRetroEffects {
  constructor() {
    this.createAdvancedScanlines();
    this.setupEnhancedGlitchEffects();
    this.setupMatrixRain();
  }

  createAdvancedScanlines() {
    const scanlines = document.createElement('div');
    scanlines.style.cssText = `
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        repeating-linear-gradient(
          0deg,
          transparent,
          transparent 2px,
          rgba(41, 252, 148, 0.02) 2px,
          rgba(41, 252, 148, 0.02) 4px
        ),
        repeating-linear-gradient(
          90deg,
          transparent,
          transparent 100px,
          rgba(255, 233, 93, 0.01) 100px,
          rgba(255, 233, 93, 0.01) 102px
        );
      pointer-events: none;
      z-index: 9998;
      opacity: 0.7;
      animation: advanced-scanlines-move 0.1s infinite linear;
    `;

    document.body.appendChild(scanlines);
  }

  setupEnhancedGlitchEffects() {
    setInterval(() => {
      if (Math.random() < 0.05) { // 5% chance
        this.triggerMegaGlitch();
      }
    }, 3000);
  }

  triggerMegaGlitch() {
    const glitchElements = document.querySelectorAll('.neon-text, .hero-title');
    glitchElements.forEach(element => {
      element.style.animation = 'none';
      element.offsetHeight;
      element.style.animation = 'mega-glitch 0.5s ease-in-out';
    });

    // Glitch the entire page briefly
    document.body.style.filter = 'hue-rotate(180deg) contrast(1.5)';
    setTimeout(() => {
      document.body.style.filter = '';
    }, 100);
  }

  setupMatrixRain() {
    // Create subtle matrix rain effect
    const canvas = document.createElement('canvas');
    canvas.style.cssText = `
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
      opacity: 0.1;
    `;

    document.body.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const columns = Math.floor(canvas.width / 20);
    const drops = Array(columns).fill(1);

    const draw = () => {
      ctx.fillStyle = 'rgba(12, 12, 21, 0.05)';
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      ctx.fillStyle = '#29fc94';
      ctx.font = '15px monospace';

      for (let i = 0; i < drops.length; i++) {
        const text = String.fromCharCode(Math.random() * 128);
        ctx.fillText(text, i * 20, drops[i] * 20);

        if (drops[i] * 20 > canvas.height && Math.random() > 0.975) {
          drops[i] = 0;
        }
        drops[i]++;
      }
    };

    setInterval(draw, 100);
  }
}

// Enhanced CSS animations
const advancedStyle = document.createElement('style');
advancedStyle.textContent = `
  @keyframes mega-ripple-expand {
    to {
      transform: scale(2.5);
      opacity: 0;
    }
  }

  @keyframes advanced-scanlines-move {
    0% { transform: translateY(0); }
    100% { transform: translateY(4px); }
  }

  @keyframes mega-glitch {
    0%, 100% { 
      transform: translateX(0); 
      filter: hue-rotate(0deg);
    }
    10% { 
      transform: translateX(-3px); 
      filter: hue-rotate(90deg);
    }
    20% { 
      transform: translateX(3px); 
      filter: hue-rotate(180deg);
    }
    30% { 
      transform: translateX(-2px); 
      filter: hue-rotate(270deg);
    }
    40% { 
      transform: translateX(2px); 
      filter: hue-rotate(360deg);
    }
    50% { 
      transform: translateX(-1px) scaleX(1.1); 
      filter: hue-rotate(180deg) contrast(2);
    }
    60% { 
      transform: translateX(1px) scaleY(1.1); 
      filter: hue-rotate(90deg) brightness(2);
    }
    70% { 
      transform: translateX(-2px); 
      filter: hue-rotate(270deg);
    }
    80% { 
      transform: translateX(2px); 
      filter: hue-rotate(45deg);
    }
    90% { 
      transform: translateX(-1px); 
      filter: hue-rotate(315deg);
    }
  }

  @keyframes hover-particle-float {
    0% {
      transform: translateY(0) scale(1);
      opacity: 0.8;
    }
    100% {
      transform: translateY(-30px) scale(0);
      opacity: 0;
    }
  }
`;
document.head.appendChild(advancedStyle);

// Initialize enhanced effects when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  try {
    new AdvancedMorphismEffects();
    new AdvancedRetroEffects();

    // Enhanced loading animation
    if (document.body) {
      document.body.style.opacity = '0';
      document.body.style.transform = 'scale(0.9) rotateX(10deg)';
      document.body.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
      document.body.style.filter = 'blur(5px)';

      setTimeout(() => {
        document.body.style.opacity = '1';
        document.body.style.transform = 'scale(1) rotateX(0deg)';
        document.body.style.filter = 'blur(0px)';
      }, 100);
    }
  } catch (error) {
    // Тихо обрабатываем ошибки инициализации
  }
});

// Country select functionality handled in hfstyle.js