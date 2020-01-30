jQuery(document).ready(function(){
    var exchange_from_text;
    var exchange_to_text;
    var from_id;
    var to_id;
    
	jQuery('.draggable-item').draggable({
	    start: function(){},
        drag: function(){
            //selector exchange_from_text	   
            exchange_from_text = $(this).children('div.timeline-item').children('h3.timeline-header');
            from_id = $(this).children('div.timeline-item').children('input[type="hidden"]').val();
        },
        stop: function(){},
		revert: function(event, ui) {
			$('.droppable-item').removeClass('border-rotate');
			return true;
		}
	});
	jQuery('.droppable-item').droppable({
		over: function(event, ui) {
			$(this).addClass('border-rotate');
		},
		out: function(event, ui) {
			$(this).removeClass('border-rotate');
		},
		drop: function(event, ui) {            
			jQuery('#dialog-box').dialog({width:426, draggable: false});
            //selector exchange_to_text
            to_id = $(this).children('.post_content').children('div').children('input[type="hidden"]').val();
            
            exchange_to_text = $(this).children('.post_content').children('div').children('.main_content');
            if (exchange_to_text != undefined && exchange_to_text != undefined) {
                $('.exchange_intro').text(exchange_from_text.text() + ' <--> ' + exchange_to_text.text());
            }            
            //set title
            $('.ui-dialog-title').text('Exchange');
		}
	});
    
    $('.exchange-execute').click(function() { 
        //save exchange
        postExchangeAjax('dialog-box');
    });
    
    $('.exchange-execute-2').click(function() {
        //save exchange
        postExchangeAjax('dialog-box-2');
    });
     
    showDialog2 = function(tid) {
        //show dialog
        jQuery('#dialog-box-2').dialog({width:426, draggable: false});
        $('.exchange_intro_2').val('Exchange this items with your items.');
        //set params
        from_id = $('#fid').val();
        to_id = tid;
    };
    
    $('#fid').change(function(){
        from_id = $(this).val();
    });
    
    postExchangeAjax = function(dialogName) {
        //check params
        if (from_id == 'undefined' || to_id == 'undefined') {
            return false;
        }
        //post ajax
        $.ajax({
            url: 'exchanges/addAjax/',
            method: 'post',
            cache: false,
            dataType: 'html',
            data: {
                fid:    from_id,
                tid:    to_id,
                note:   $('#' + dialogName + ' .dialog-note').val(),
            },
        })
        .fail(function(result){
            alert('error occur when process your exchange. Please refresh page and try again.');
        })
        .success(function(result){
            $('#' + dialogName).dialog('close');
            if (result == 'existed') {
                alert('This exchange is existed!');
            } else if (result == 'invalid1' || result == 'fail') {
                alert('Error occur when process your exchange. Please refresh page and try again.');
            } else if (result == 'invalid2' || result == 'invalid3') {
                alert('You can not exchange yourself items.');
            } else {
                alert('save successful!');
            }
        });
    }
    
});
