<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imagePost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imagePost->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Image Post'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="imagePost form large-10 medium-9 columns">
    <?= $this->Form->create($imagePost) ?>
    <fieldset>
        <legend><?= __('Edit Image Post') ?></legend>
        <?php
            echo $this->Form->input('post_id', ['options' => $posts]);
            echo $this->Form->input('image_id', ['options' => $images]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
