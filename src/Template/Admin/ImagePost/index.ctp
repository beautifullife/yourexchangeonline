<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Image Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('post_id') ?></th>
            <th><?= $this->Paginator->sort('image_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($imagePost as $imagePost): ?>
        <tr>
            <td><?= $this->Number->format($imagePost->id) ?></td>
            <td>
                <?= $imagePost->has('post') ? $this->Html->link($imagePost->post->id, ['controller' => 'Posts', 'action' => 'view', $imagePost->post->id]) : '' ?>
            </td>
            <td>
                <?= $imagePost->has('image') ? $this->Html->link($imagePost->image->id, ['controller' => 'Images', 'action' => 'view', $imagePost->image->id]) : '' ?>
            </td>
            <td><?= h($imagePost->created) ?></td>
            <td><?= h($imagePost->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $imagePost->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagePost->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagePost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagePost->id)]) ?>
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
