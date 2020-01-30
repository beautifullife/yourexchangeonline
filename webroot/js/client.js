jQuery(document).ready(function(){
    $('#chat .title').click(function(){
        $('#chat .content').toggle('slow', function() {
            
        });
    });
});