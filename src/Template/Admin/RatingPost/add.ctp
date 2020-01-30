<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Rating Post'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="ratingPost form large-10 medium-9 columns">
    <?= $this->Form->create($ratingPost) ?>
    <fieldset>
        <legend><?= __('Add Rating Post') ?></legend>
        <?php
            echo $this->Form->input('post_id', ['options' => $posts]);
            echo $this->Form->input('rate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
