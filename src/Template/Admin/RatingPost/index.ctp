<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Rating Post'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('post_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ratingPost as $ratingPost): ?>
        <tr>
            <td><?= $this->Number->format($ratingPost->id) ?></td>
            <td>
                <?= $ratingPost->has('post') ? $this->Html->link($ratingPost->post->id, ['controller' => 'Posts', 'action' => 'view', $ratingPost->post->id]) : '' ?>
            </td>
            <td><?= h($ratingPost->created) ?></td>
            <td><?= h($ratingPost->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $ratingPost->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ratingPost->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ratingPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingPost->id)]) ?>
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
