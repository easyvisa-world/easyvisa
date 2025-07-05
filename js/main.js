/* ---------- FAQ ---------- */
document.querySelectorAll('.faq-item').forEach(i=>{
  i.querySelector('.faq-btn').onclick = ()=> i.classList.toggle('open');
});

/* ---------- Add-to-Home (Android only) ---------- */
const banner = document.getElementById('a2hs');
const btn    = document.getElementById('a2hs-btn');
const LS_KEY = 'a2hsDismissed';

let deferredPrompt;

/* Показываем баннер только:
   – устройство c touch (mobile / tablet) 
   – баннер ещё не закрывали        */
const mobile = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;

if (mobile && !localStorage.getItem(LS_KEY)) {
  window.addEventListener('beforeinstallprompt', e=>{
    e.preventDefault();
    deferredPrompt = e;
    show(banner);
  });

  btn.onclick = async () => {
    if (!deferredPrompt) {          // на всякий случай
      hide(banner);
      localStorage.setItem(LS_KEY,'1');
      return;
    }
    deferredPrompt.prompt();
    await deferredPrompt.userChoice; // ждём ответ
    hide(banner);
    localStorage.setItem(LS_KEY,'1');
    deferredPrompt = null;
  };
}

/* helpers */
function show(el){
  el.style.display = 'flex';
  requestAnimationFrame(()=>{
    el.style.opacity='1';
    el.style.pointerEvents='auto';
    el.style.transform='translateY(0)';
  });
}
function hide(el){
  el.style.opacity='0';
  el.style.pointerEvents='none';
  el.style.transform='translateY(80px)';
  setTimeout(()=> el.style.display='none', 350);
}

/* ---------- Service Worker ---------- */
if ('serviceWorker' in navigator)
  window.addEventListener('load', () =>
    navigator.serviceWorker.register('/sw.js'));