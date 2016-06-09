console.log('Started', self);
self.addEventListener('install', function(event) {
  self.skipWaiting();
  console.log('Installed', event);
});
self.addEventListener('activate', function(event) {
  console.log('Activated', event);
});
self.addEventListener('push', function(event) {
  console.log('Push message received', event);
  // TODO
  var title = 'Push message';
  event.waitUntil(
    self.registration.showNotification(title, {
      body: 'The Message',
      icon: 'images/icon.png',
      tag: 'my-tag'
    })
  );

  // var title = 'Notification';  
  // var body = 'There is newly updated content available on the site. Click to see more.';  
  // var icon = 'https://raw.githubusercontent.com/deanhume/typography/gh-pages/icons/typography.png';  
  // var tag = 'simple-push-demo-notification-tag';
  
  // event.waitUntil(  
  //   self.registration.showNotification(title, {  
  //      body: body,  
  //      icon: icon,  
  //      tag: tag  
  //    })  
  //  );  

});
self.addEventListener('notificationclick', function(event) {
    console.log('Notification click: tag ', event.notification.tag);
    event.notification.close();
    var url = 'https://youtu.be/gYMkEMCHtJ4';
    event.waitUntil(
        clients.matchAll({
            type: 'window'
        })
        .then(function(windowClients) {
            for (var i = 0; i < windowClients.length; i++) {
                var client = windowClients[i];
                if (client.url === url && 'focus' in client) {
                    return client.focus();
                }
            }
            if (clients.openWindow) {
                return clients.openWindow(url);
            }
        })
    );
});