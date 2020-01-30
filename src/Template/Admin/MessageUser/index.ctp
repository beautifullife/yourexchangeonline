<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Message User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('message_id') ?></th>
            <th><?= $this->Paginator->sort('to_user_id') ?></th>
            <th><?= $this->Paginator->sort('sent') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($messageUser as $messageUser): ?>
        <tr>
            <td><?= $this->Number->format($messageUser->id) ?></td>
            <td>
                <?= $messageUser->has('message') ? $this->Html->link($messageUser->message->name, ['controller' => 'Messages', 'action' => 'view', $messageUser->message->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($messageUser->to_user_id) ?></td>
            <td><?= $this->Number->format($messageUser->sent) ?></td>
            <td><?= h($messageUser->created) ?></td>
            <td><?= h($messageUser->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $messageUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $messageUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $messageUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messageUser->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
