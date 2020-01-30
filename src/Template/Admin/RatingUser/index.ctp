<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Rating User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('coins') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ratingUser as $ratingUser): ?>
        <tr>
            <td><?= $this->Number->format($ratingUser->id) ?></td>
            <td>
                <?= $ratingUser->has('user') ? $this->Html->link($ratingUser->user->id, ['controller' => 'Users', 'action' => 'view', $ratingUser->user->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($ratingUser->coins) ?></td>
            <td><?= h($ratingUser->created) ?></td>
            <td><?= h($ratingUser->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $ratingUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ratingUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ratingUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingUser->id)]) ?>
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
