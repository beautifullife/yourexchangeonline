<ul class="timeline">

    <?php
        if (!empty($userItems)) :
        foreach ($userItems as $itemKeys => $itemValues) : 
    ?>
    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-green">
            <?= date_format($itemValues->created, 'd M. Y')?>
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li class="draggable-item">
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-green"></i>
        <div class="timeline-item">
            <?= $this->Form->input('fid_'.base64_encode($itemValues->id),[
                'value' => base64_encode($itemValues->id),
                'type'  => 'hidden',
                'id'    => 'fid_'.base64_encode($itemValues->id),
            ]) ?>            
            <span class="time"><i class="fa fa-clock-o"></i> <?= date_format($itemValues->created, 'H:i')?></span>

            <h3 class="timeline-header"><a href="#"><?= $itemValues->content ?></a></h3>

            <div class="timeline-body">
                <?= $itemValues->content ?>
            </div>

            <div class='timeline-footer'>
                <a class="btn btn-success btn-xs">detail</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    <?php
        endforeach;
        endif;
    ?>
</ul>

<div id="dialog-box">
    <div class="exchange_intro"></div>
	<div> <?= __('Note:') ?> </div>
    <div>
        <?= $this->Form->textarea('note',[
            'class' => 'form-control dialog-note',
            'rows'  => 4,
        ]) ?>
    </div>
    
    <?= $this->Form->button('exchange',[
        'class'    => 'exchange-execute',
    ]) ?>
    
</div>

<div id="dialog-box-2">
    <div class="exchange_intro_2"></div>
    <div>
        <?= $this->Form->input(__('fid'), [
            'options'   => $postArr,
            'class'     => '',
            'default'   => 0,
            'label'     => __('chose your items: ')
        ]) ?>
    </div>
    
	<div> <?= __('Note:') ?> </div>
    <div>
        <?= $this->Form->textarea('note',[
            'class' => 'form-control dialog-note',
            'rows'  => 4,
        ]) ?>
    </div>
    
    <?= $this->Form->button('exchange',[
        'class'    => 'exchange-execute-2',
    ]) ?>
    
</div>
