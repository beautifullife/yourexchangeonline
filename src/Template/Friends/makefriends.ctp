<script src="https://apis.google.com/js/client.js"></script>
<div>
	<button onclick="auth();">GET CONTACTS FEED</button>
	<br>
	<p id="friendList"></p>
</div>
<script type="text/javascript">
	function auth() {
		var config = {
			'client_id': '838816967914-1vjcnpk6d906ha2rld0s5qcaemrvupug.apps.googleusercontent.com',
			'scope': 'https://www.google.com/m8/feeds'
		};
		gapi.auth.authorize(config, function() {
			fetch(gapi.auth.getToken());
		});
	}

	function fetch(token) {
		$.ajax({
			url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&max-results=100&alt=json",
			dataType: "jsonp",
			success:function(data) {
				// display all your data in console
				$("#friendList").empty();
				var entryData = data.feed.entry;
				var insertData = '';
				$.each(entryData, function(keyEntry, valEntry){
					insertData += valEntry.gd$email[0].address + '<br>';
				});
				$("#friendList").append(insertData);
			}
		});
	}
</script>
