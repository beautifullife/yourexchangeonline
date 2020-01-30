<!-- Morris chart -->
<?= $this->Html->css('morris.css') ?>
<!-- Morris.js charts -->
<?= $this->Html->script('raphael-min.js') ?>
<?= $this->Html->script('morris.min.js') ?>
<!-- Jquery Knob -->
<?= $this->Html->script('jquery.knob.js') ?>

<!-- solid sales graph -->
<div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <i class="fa fa-th"></i>
      <h3 class="box-title">Sales Graph</h3>
      <!-- <div class="box-tools pull-right">
        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <div class="box-body border-radius-none">
      <div class="chart" id="exchange-chart" style="height: 250px;"></div>
      <div class="chart" id="trade-chart" style="height: 250px;"></div>
    </div><!-- /.box-body -->
    <div class="box-footer no-border">
      <div class="row">
        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
          <input type="text" class="knob" data-readonly="true" value="100" data-width="60" data-height="60" data-fgColor="#00ca6d"/>
          <div class="knob-label"><?= __('Exchange') ?></div>
        </div><!-- ./col -->
        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
          <input type="text" class="knob" data-readonly="true" value="100" data-width="60" data-height="60" data-fgColor="#F0AD4E"/>
          <div class="knob-label"><?= __('Trade') ?></div>
        </div><!-- ./col -->
      </div><!-- /.row -->
    </div><!-- /.box-footer -->
</div><!-- /.box -->


<script>

$(function(){ 
    
    /* jQueryKnob */
    $(".knob").knob();
    
    //get data
    $.ajax({
        url: 'exchanges/exchangeGraphAjax/',
        method: 'POST',
        cache: false,
        dataType: 'json',
        data: {
            
        }
    })
    .fail(function(result){
       console.log('Fail: '+result.content);
    })
    .success(function(result){
        
        /* Morris.js Charts */
        //Exchange graph
        var Exchange = new Morris.Line({
            element: 'exchange-chart',
            resize: true,
            data: JSON.parse(result.content),
            //data: [tmp],
            xkey: 'key',
            ykeys: ['count'],
            labels: ['Exchange Item'],
            lineColors: ['#efefef'],
            lineWidth: 2,
            hideHover: 'auto',
            gridTextColor: "#fff",
            gridStrokeWidth: 0.4,
            pointSize: 4,
            pointStrokeColors: ["#efefef"],
            gridLineColor: "#efefef",
            gridTextFamily: "Open Sans",
            gridTextSize: 10
        });
        
    });
    
    //Trade graph
    var Trade = new Morris.Line({
        element: 'trade-chart',
        resize: true,
        data: [
          {"y": "2011 Q2", "item1": "2778000"},
          {"y": "2011 Q3", "item1": "3453450"},          
          {"y": "2011 Q4", "item1": "3053450"},
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#F0AD4E'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10
    });  
  
});

</script>