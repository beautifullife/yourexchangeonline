<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Coin'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('accept_methods') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($coins as $coin): ?>
        <tr>
            <td><?= $this->Number->format($coin->id) ?></td>
            <td><?= h($coin->name) ?></td>
            <td><?= h($coin->accept_methods) ?></td>
            <td><?= $this->Number->format($coin->status) ?></td>
            <td><?= h($coin->created) ?></td>
            <td><?= h($coin->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $coin->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coin->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coin->id)]) ?>
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
