<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Message User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="messageUser form large-10 medium-9 columns">
    <?= $this->Form->create($messageUser) ?>
    <fieldset>
        <legend><?= __('Add Message User') ?></legend>
        <?php
            echo $this->Form->input('message_id', ['options' => $messages]);
            echo $this->Form->input('to_user_id', ['options' => $users]);
            echo $this->Form->input('read');
            echo $this->Form->input('sent');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
