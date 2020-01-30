<a href="https://accounts.google.com/o/oauth2/auth?client_id=838816967914-1vjcnpk6d906ha2rld0s5qcaemrvupug.apps.googleusercontent.com&redirect_uri=http://yourexchangeonline.develop.minh.jp/googleplus/gfriends/friendEmail&scope=https://www.google.com/m8/feeds/&response_type=code" rel="0" class="newWindow" >click me</a>
<script type="text/javascript">
	var windowSizeArray = [ "width=200,height=200",
							"width=300,height=400,scrollbars=yes" ];

	$(document).ready(function(){
		$('.newWindow').click(function (event){
			var url = $(this).attr("href");
			var windowName = "popUp";
			var windowSize = windowSizeArray[  $(this).attr("rel")  ];
			var win = window.open(url, windowName, windowSize);
			var interval = window.setInterval(function() {
				try {
					if (win == null || win.closed) {
						window.clearInterval(interval);
						$.ajax({
							url: 'http://yourexchangeonline.develop.minh.jp/googleplus/gfriends/getSessionData',
							success: function(response) {
								var jsonResponse = $.parseJSON(response);
								console.log(jsonResponse);
							}
						});
					}
				}
				catch (e) {
				}
			}, 1000);
			event.preventDefault();
		});
	});
</script>
