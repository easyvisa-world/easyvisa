const CACHE = 'easyvisa-v1';
const PRECACHE = [
  '/',            // index.html
  '/css/variables.css',
  '/css/styles.css',
  '/js/main.js',
  '/manifest.json',
  '/favicon.ico',
];

self.addEventListener('install', e=>{
  e.waitUntil(caches.open(CACHE).then(c=>c.addAll(PRECACHE)));
});

self.addEventListener('fetch', e=>{
  e.respondWith(
    caches.match(e.request).then(r=> r || fetch(e.request))
  );
});