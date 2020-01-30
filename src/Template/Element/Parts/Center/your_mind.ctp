<!-- Ion Slider -->
<?= $this->Html->css('ion.rangeSlider.css') ?>
<?= $this->Html->css('ion.rangeSlider.skinNice.css') ?>
<!-- ion slider Nice -->

<!--functions-->
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
  <li class=""><a id="firstTab" href="#tab_1" data-toggle="tab" aria-expanded="true"><?= __('Text') ?></a></li>
  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?= __('Upload Image') ?></a></li>
  <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false"><?= __('Wishlist') ?></a></li>
</ul>

<!--content-->

<?= $this->Form->create('Posts',[
    'action'    => '../admin/Posts/publishHtml/',
    'enctype'   => "multipart/form-data",
]) ?>

<div class="tab-content">
  <div class="tab-pane" id="tab_1">
    <?= $this->Html->tag('textarea','',[
        'class'         => 'form-control',
        'placeholder'   => __('What do you want to exchange today?...'),
        'rows'          => 3,
        'name'          => 'content',
        'id'            => 'content',
    ]) ?>
    <!--tags-->
    <?= $this->Form->input('tags', [
        'class'         => 'form-control',
        'label'         => false,
        'placeholder'   => 'Tags example: phone, computer, music, clothes,...',
        'name'            => 'tags',
        'id'            => 'tags',
    ]) ?>
    <!--/tags-->
  </div><!-- /.tab-pane -->
  
  <!-- upload images for item -->
  <div class="tab-pane" id="tab_2">
    <?php //$this->Upload->edit('Images', 0) ?>
    
    <?= $this->Form->input('multiFile[]', [
        'class'         => 'form-control',
        'label'         => false,
        'type'          => 'file',
        'multiple'      => 'multiple',
        'id'            => 'file',
    ]) ?>
  </div><!-- /.tab-pane -->
  
  <div class="tab-pane active" id="tab_3">
    <?= $this->Html->tag('textarea','',[
        'class'         => 'form-control',
        'placeholder'   => __('ex: Iphone 6, Xbox 365, Supper Man clothes'),
        'name'          => 'wishlists',
        'id'          => 'wishlists',
    ]) ?>
    
    <!-- Price range slider -->
        <div class="col-sm-10" id="priceField">
          <input id="price" type="text" name="price" value="" />
        </div> 
        <!-- /Price range slider -->
        
        <?= $this->Form->input(__('currency'),[
            'options'   => $regions,
            'class'     => 'col-xs-2',
            'default'   => '840',
            'label'     => false,
            'id'        => 'currency',
        ]) ?>
  
  </div><!-- /.tab-pane -->

</div><!-- /.tab-content -->

<div class="clearBoth">
<?= $this->Form->submit(__('Exchange'), [ 
                        //'onclick'   => 'addPost()',
                        'type'      => 'submit',
                        'class'     => 'btn btn-success',
                        ]);
?>
</div>

<?= $this->Form->end() ?>

</div>


<!-- Ion Slider -->
<?= $this->Html->script('ion.rangeSlider.min.js') ?>
<script type="text/javascript">
  $(function () {
    /* ION SLIDER */
    $("#price").ionRangeSlider({
      min: 0,
      max: 5000,
      from: 100,
      to: 500,
      type: 'double',
      step: 1,
      prefix: "$",
      prettify: false,
      hasGrid: true
    }); 
    
    $('#firstTab').click();
  });
  
  // Add posts
    //Json
    /*
    var addPostJson = function() {
        var post_id;
        //insert post
        $.ajax({
            url     : 'admin/Posts/publishJson/',
            method  : 'post',
            cache   : false,
            dataType: 'json',
            data    : { content:    $('#content').val(),
                        tags:       '',
                        price:      $('#price').val(),
                        currency:   $.trim($('#currency option:selected').text()),
                        wishlists:  $('#wishlists').val(),
                      },
        })
        .fail(function(data) {
            $('#runtimePosts').append('<div><?= __("An error occur when you post. You will be redirect to login page.") ?></div>');
            //redirect to login page
            $(location).attr('href','Users/login');
            
            console.log(data);
        })
        .success(function(data) {
            $('#runtimePosts').append(data.main_content);
            //post_id = data.post_id.id;
            console.log(data);
        });
    */
        
    //html    
    var addPost = function() {
//console.log($('input[name=file]'));
        var post_id;
        //insert post
        $.ajax({
            url     : 'admin/Posts/publishHtml/',
            method  : 'get',
            cache   : false,
            dataType: 'html',
            data    : { content:    $('#content').val(),
                        tags:       $('#tags').val(),
                        price:      $('#price').val(),
                        currency:   $.trim($('#currency option:selected').text()),
                        wishlists:  $('#wishlists').val(),
                        //qqfile:     $('input[name=file]'),
                      },
        })
        /*.done(function(data) {
            $('#runtimePosts').html('done: ' + data.content);
        })*/
        .fail(function(data) {
            $('#runtimePosts').append('<div><?= __("An error occur when you post. You will be redirect to login page.") ?></div>');
            //redirect to login page
            //$(location).attr('href','Users/login');
            
            console.log(data);
        })
        .success(function(data) {
            $('#runtimePosts').append(data);
            //post_id = data.post_id.id;
            //console.log(data);
        });
        
        
        //create media
      /*  
        $.ajax({
            url     : 'ajax_multi_upload/Uploads/upload/',
            method  : 'post',
            dataType: 'json',
            cache   : false,
            data    : {
                post_id : data
            },
        })
        .success(function(data) {
            console.log(data);
        });
     */   
    };
</script>
<!-- ion slider Nice -->

<!-- /Add posts -->