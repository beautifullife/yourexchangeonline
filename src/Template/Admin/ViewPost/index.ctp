<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New View Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('post_id') ?></th>
            <th><?= $this->Paginator->sort('views') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($viewPost as $viewPost): ?>
        <tr>
            <td><?= $this->Number->format($viewPost->id) ?></td>
            <td>
                <?= $viewPost->has('user') ? $this->Html->link($viewPost->user->id, ['controller' => 'Users', 'action' => 'view', $viewPost->user->id]) : '' ?>
            </td>
            <td>
                <?= $viewPost->has('post') ? $this->Html->link($viewPost->post->id, ['controller' => 'Posts', 'action' => 'view', $viewPost->post->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($viewPost->views) ?></td>
            <td><?= h($viewPost->created) ?></td>
            <td><?= h($viewPost->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $viewPost->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $viewPost->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $viewPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewPost->id)]) ?>
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
