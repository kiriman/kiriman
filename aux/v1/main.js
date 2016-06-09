if ('serviceWorker' in navigator) { 
	navigator.serviceWorker.register('/sw.js')
	.then(initialiseState);
}

// if(!('PushManager' in window)){
// 	return;
// }

navigator.serviceWorker.ready
.then(function(serviceWorkerRegistration){
	serviceWorkerRegistration.pushManager
	.getSubscription()
		.then(function(pushSubscription){
			if(!pushSubscription){
				return;
			}
			///
		})
		.catch(function(err){
			console.error(err);
		});
});

serviceWorkerRegistration.pushManager
.subscribe({userVisibleOnly: true})
.then(function(subscription){
//the subscruption was successful
	console.log(subscription.endpoint);
})
.catch(function(error){
	console.error('Error subscribing', error);
});

pushSubscription.unsuscribe()
	.then(function(successful){
		console.log('Successful?', successful);
	})
	.catch(function(err){
		console.error(err);
	});