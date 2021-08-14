var staticCacheName = `${self.location.hostname}-pwa-v17`;

var filesToCache = [
    '/offline',
    '/sells',
    '/src/vendor/bootstrap/css/bootstrap.css',
    '/src/css/custom.css',
    '/src/vendor/jquery/jquery-3.5.1.slim.min.js',
    '/src/vendor/feather/feather.min.js',
    '/src/vendor/dashboard/dashboard.js',
    '/src/vendor/jquery/jquery-3.5.1.min.js',
    '/src/vendor/bootstrap/js/bootstrap.bundle.js',
    '/src/vendor/bootstrap/js/bootstrap.js',
    '/src/js/scripts.js',
    '/src/pwa/promise.js',
    '/src/pwa/fetch.js',
    '/src/pwa/idb.js',
    '/src/pwa/dao.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    // this.skipWaiting();
    // event.waitUntil(
    //     caches.open(staticCacheName)
    //         .then(cache => {
    //             return cache.addAll(filesToCache);
    //         })
    // )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});