<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Comment Like'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('comment_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($commentLike as $commentLike): ?>
        <tr>
            <td><?= $this->Number->format($commentLike->id) ?></td>
            <td>
                <?= $commentLike->has('comment') ? $this->Html->link($commentLike->comment->id, ['controller' => 'Comments', 'action' => 'view', $commentLike->comment->id]) : '' ?>
            </td>
            <td>
                <?= $commentLike->has('user') ? $this->Html->link($commentLike->user->id, ['controller' => 'Users', 'action' => 'view', $commentLike->user->id]) : '' ?>
            </td>
            <td><?= h($commentLike->created) ?></td>
            <td><?= h($commentLike->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $commentLike->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentLike->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentLike->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentLike->id)]) ?>
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
