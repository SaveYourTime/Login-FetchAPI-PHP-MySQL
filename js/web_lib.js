function easyPost(url, objData, successCallback, errorCallback) {
	$.ajax({
		type: 'POST',
		url: url,
		data: JSON.stringify(objData),
		dataType: 'json',
		success: function (data) {
			if (successCallback !== undefined) successCallback(data);
		},
		error: function (xhr, status, error) {
			console.log({
				'errorMsg': status,
				'readyStatus': xhr['readyState'],
				'status': xhr['status'],
				'statusText': xhr['statusText']
			});
			if (errorCallback !== undefined) errorCallback(error);
		}
	});
}

function easyFetch(url, objData, successCallback, errorCallback) {
	fetch(url, {
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-Type': 'application/json',
		},
		body: JSON.stringify(objData),
		credentials: 'same-origin'
	})
		.then(response => response.json())
		.then(data => {
			if (successCallback !== undefined) successCallback(data);
		})
		.catch(error => {
			console.log(error);
			if (errorCallback !== undefined) errorCallback(error);
		});
}
