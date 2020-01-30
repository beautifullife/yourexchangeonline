<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $media->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medias'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="medias form large-10 medium-9 columns">
    <?= $this->Form->create($media) ?>
    <fieldset>
        <legend><?= __('Edit Media') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('folder');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
