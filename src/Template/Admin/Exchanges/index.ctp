<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Exchange'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('from_post_id') ?></th>
            <th><?= $this->Paginator->sort('to_post_id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($exchanges as $exchange): ?>
        <tr>
            <td><?= $this->Number->format($exchange->id) ?></td>
            <td><?= $this->Number->format($exchange->from_post_id) ?></td>
            <td><?= $this->Number->format($exchange->to_post_id) ?></td>
            <td><?= $this->Number->format($exchange->status) ?></td>
            <td><?= h($exchange->created) ?></td>
            <td><?= h($exchange->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $exchange->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exchange->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exchange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id)]) ?>
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
