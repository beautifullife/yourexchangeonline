<script type="text/javascript">
jQuery(document).ready(function(){

	var timer;
	var timeout = 1100;

	jQuery(".btn-edit-profile").on('click', function(){
		var btnEditProfile = jQuery(this);
		var dataRel = btnEditProfile.attr('data-rel');
		var dataLock = btnEditProfile.attr('data-lock');
		var userInfo = jQuery.parseJSON(jQuery("#userInfo").val());
		var idText = "#" + dataRel;

		if (dataLock == 0) {
			var textData = jQuery(idText).text();
			if (idText == '#birthday') var idBirthday = 'dateTimePicker';
			var inputText = "<input id='" + idBirthday + "' type='text' name='" + dataRel + "' value='" + textData + "' style='width: 85%;'/>";
			jQuery(idText).html(inputText);

			btnEditProfile.attr('data-lock', 1);
			btnEditProfile.text('Save');
		} else if (dataLock == 1) {
			var textData = jQuery(idText + ">input").val();

			userInfo[dataRel] = textData;
			jQuery("#userInfo").val(JSON.stringify(userInfo));

			jQuery(idText).text(textData);
			btnEditProfile.attr('data-lock', 0);
			btnEditProfile.text('Edit');
		} else {
			alert('Server encountered for problem! Please try again!');
		}
	});

	jQuery(".btns-edit-profile").on('click', function(){
		var btnsEditProfile = jQuery(this);
		var dataRel = btnsEditProfile.attr('data-rel');
		var dataLock = btnsEditProfile.attr('data-lock');
		var idText = "#" + dataRel;
		var idTextHid = idText + "Info";
		var dataInfo = jQuery(idTextHid).val();
		jQuery.ajax({
			method: "POST",
			url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'ajaxlocation'], true);?>",
			data: {
				type: dataRel,
				pdata: jQuery("#countryInfo").val()
			}
		}).done(function(response){
			if (dataLock == 0) {
				var resutl = jQuery.parseJSON(response);
				var selectBox = "<select name='" + dataRel + "' id='" + dataRel + "'>";
				jQuery.each(resutl.d, function(key, value){
					var selectedInfo = ' ';
					if (key == dataInfo) {
						selectedInfo = ' selected ';
					}
					selectBox += "<option" + selectedInfo + "value='" + key + "'>" + value + "</option>";
				});
				selectBox += "</select>";
				jQuery(idText).html(selectBox);

				btnsEditProfile.attr('data-lock', 1);
				btnsEditProfile.text('Save');
			} else {
				var selectedVal = jQuery(idText + " option:selected").val();
				var selectedText = jQuery(idText + " option:selected").text();
				var userInfo = jQuery.parseJSON(jQuery("#userInfo").val());

				if (dataRel == 'country' && selectedVal != dataInfo) {
					jQuery("#city").empty();
					jQuery("#cityInfo").attr('value', '');
				}

				jQuery(idTextHid).val(selectedVal);
				jQuery(idText).text(selectedText);

				userInfo[dataRel] = selectedVal;
				jQuery("#userInfo").val(JSON.stringify(userInfo));

				btnsEditProfile.attr('data-lock', 0);
				btnsEditProfile.text('Edit');
			}
		});
	});

	jQuery("#btn_edit_change").on('click', function(){
		var newPassword = jQuery("#new_pass").val();
		var oldPassword = jQuery("#old_pass").val();
		var userInfo = jQuery.parseJSON(jQuery("#userInfo").val());
		if (newPassword != '' && newPassword != undefined) {
			userInfo["new_pass"] = jQuery.base64.encode(newPassword);
		}
		if (oldPassword != '' && oldPassword != undefined) {
			userInfo["old_pass"] = jQuery.base64.encode(oldPassword);
		}

		if (timer) clearTimeout(timer);

		jQuery.ajax({
			method: "POST",
			url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'ajaxprofile'], true);?>",
			data: {
				type: 'edit',
				profileData: JSON.stringify(userInfo)
			}
		}).done(function(response){
			var jsonResult = jQuery.parseJSON(response);
			console.log(response);
			jQuery("#show_dialog").text(jsonResult.m);
			jQuery("#show_dialog").dialog();
		});
	});

	jQuery("#old_pass").on('keyup', function(){
		clearTimeout(timer);
		var getData = jQuery(this);
		var valData = getData.val();
		if (valData) {
			timer = setTimeout(function(){
				var arrData = {old_pass: jQuery.base64.encode(valData)};
				jQuery.ajax({
					method: "POST",
					url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'ajaxprofile'], true);?>",
					data: {
						type: 'check',
						profileData: JSON.stringify(arrData)
					}
				}).done(function(response){
					var jsonResult = jQuery.parseJSON(response);
					if (jsonResult.e == 1) {
						jQuery("#show_dialog").text(jsonResult.m);
						jQuery("#show_dialog").dialog();
					}
				});
			}, timeout);
		}
	});

	jQuery("#del-account").on("click", function(){
		var dataRel = $(this).attr("data-rel");
		jQuery("#show_dialog").html("You want to delete this account. You sure about that. <br> <span style='font-size: 12px'><i>Click 'Ok' to delete account or 'Cancel' to do nothing!</i></span>");
		jQuery("#show_dialog").dialog({
			height: 220,
			width: 380,
			modal: true,
			buttons: {
				Ok: function(){
					jQuery.ajax({
						method: "POST",
						url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'ajaxdelaccount'], true);?>",
						data: {
							profileData: dataRel
						}
					}).done(function(response){
						var jsonResult = jQuery.parseJSON(response);
						if (jsonResult.e == 1) {
							alert(jsonResult.m);
						} else {
							alert(jsonResult.m);
							window.location = "<?= $this->Url->build(['controller' => 'users', 'action' => 'logout'], true);?>";
						}
					});
				},
				Cancel: function(){
					$( this ).dialog( "close" );
				}
			}
		});
	});
});
$(document).on('click', '#dateTimePicker', function(){
	$(this).datepicker();
});
</script>
