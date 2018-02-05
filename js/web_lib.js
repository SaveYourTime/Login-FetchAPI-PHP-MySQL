/*
	Copyright Aaron Lu
	Created by Aaron Lu
*/

function easyPost(url, objData, callback, errorCallback, timeout) {
	timeout = timeout > 0 && timeout != undefined ? timeout : 5000;
	$.ajax({
		type: 'POST',
		url: url,
		data: {
			json: JSON.stringify(objData)
		},
		dataType: 'json',
		success: function (xhr) {
			if (callback!==undefined) callback(xhr);
		},
		error: function (xhr, status, error) {
			console.log({'errorMsg': status, 'readyStatus': xhr['readyState'], 'status': xhr['status'], 'statusText': xhr['statusText']});
			if (errorCallback!==undefined) errorCallback(error);
		},
		timeout: timeout
	});
}
function easyFetch(url, objData, successCallback, errorCallback) {
	fetch(url, {
		method: 'POST',
		headers: new Headers({
			'Accept': 'application/json',
			'Content-Type': 'application/json',
		}),
		body: JSON.stringify(objData),
	})
		.then(response => response.json())
		.then(data => {
			successCallback(data);
		})
		.catch(error => {
			console.log('catched error!');
			if (errorCallback!==undefined) errorCallback(error);
		});
}
