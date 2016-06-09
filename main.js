if ('serviceWorker' in navigator) {
    console.log('Service Worker is supported');
    navigator.serviceWorker.register('sw.js').then(function(reg) {
        console.log(':^)', reg);
        reg.pushManager.subscribe({
            userVisibleOnly: true
        }).then(function(sub) {
            console.log('endpoint:', sub.endpoint);
            //TODO 
            //Send subscription endpoid to the server and save it to send push message at later date/
        });
    }).catch(function(error) {
        console.log(':^(', error);
    });
}