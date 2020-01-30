<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ratingUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ratingUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rating User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="ratingUser form large-10 medium-9 columns">
    <?= $this->Form->create($ratingUser) ?>
    <fieldset>
        <legend><?= __('Edit Rating User') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('rate');
            echo $this->Form->input('coins');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
