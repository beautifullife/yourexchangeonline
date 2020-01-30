<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Message User'), ['controller' => 'MessageUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message User'), ['controller' => 'MessageUser', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="messages view large-10 medium-9 columns">
    <h2><?= h($message->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $message->has('user') ? $this->Html->link($message->user->id, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($message->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($message->id) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $this->Number->format($message->type) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($message->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($message->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($message->content)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related MessageUser') ?></h4>
    <?php if (!empty($message->message_user)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Message Id') ?></th>
            <th><?= __('To User Id') ?></th>
            <th><?= __('Read') ?></th>
            <th><?= __('Sent') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($message->message_user as $messageUser): ?>
        <tr>
            <td><?= h($messageUser->id) ?></td>
            <td><?= h($messageUser->message_id) ?></td>
            <td><?= h($messageUser->to_user_id) ?></td>
            <td><?= h($messageUser->read) ?></td>
            <td><?= h($messageUser->sent) ?></td>
            <td><?= h($messageUser->created) ?></td>
            <td><?= h($messageUser->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'MessageUser', 'action' => 'view', $messageUser->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'MessageUser', 'action' => 'edit', $messageUser->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MessageUser', 'action' => 'delete', $messageUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messageUser->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
