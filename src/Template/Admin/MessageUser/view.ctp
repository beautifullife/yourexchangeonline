<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Message User'), ['action' => 'edit', $messageUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message User'), ['action' => 'delete', $messageUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messageUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Message User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="messageUser view large-10 medium-9 columns">
    <h2><?= h($messageUser->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Message') ?></h6>
            <p><?= $messageUser->has('message') ? $this->Html->link($messageUser->message->name, ['controller' => 'Messages', 'action' => 'view', $messageUser->message->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($messageUser->id) ?></p>
            <h6 class="subheader"><?= __('To User Id') ?></h6>
            <p><?= $this->Number->format($messageUser->to_user_id) ?></p>
            <h6 class="subheader"><?= __('Sent') ?></h6>
            <p><?= $this->Number->format($messageUser->sent) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($messageUser->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($messageUser->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Read') ?></h6>
            <?= $this->Text->autoParagraph(h($messageUser->read)) ?>
        </div>
    </div>
</div>
