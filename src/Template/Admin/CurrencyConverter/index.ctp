<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Currency Converter'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('from') ?></th>
            <th><?= $this->Paginator->sort('to') ?></th>
            <th><?= $this->Paginator->sort('rates') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($currencyConverter as $currencyConverter): ?>
        <tr>
            <td><?= $this->Number->format($currencyConverter->id) ?></td>
            <td><?= h($currencyConverter->from) ?></td>
            <td><?= h($currencyConverter->to) ?></td>
            <td><?= h($currencyConverter->rates) ?></td>
            <td><?= h($currencyConverter->created) ?></td>
            <td><?= h($currencyConverter->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $currencyConverter->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $currencyConverter->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $currencyConverter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currencyConverter->id)]) ?>
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
