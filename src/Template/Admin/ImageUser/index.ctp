<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Image User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="imageUser index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('image_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($imageUser as $imageUser): ?>
        <tr>
            <td><?= $this->Number->format($imageUser->id) ?></td>
            <td>
                <?= $imageUser->has('image') ? $this->Html->link($imageUser->image->id, ['controller' => 'Images', 'action' => 'view', $imageUser->image->id]) : '' ?>
            </td>
            <td>
                <?= $imageUser->has('user') ? $this->Html->link($imageUser->user->id, ['controller' => 'Users', 'action' => 'view', $imageUser->user->id]) : '' ?>
            </td>
            <td><?= h($imageUser->created) ?></td>
            <td><?= h($imageUser->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $imageUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imageUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imageUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageUser->id)]) ?>
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
