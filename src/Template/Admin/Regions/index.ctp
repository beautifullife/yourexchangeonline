<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('iso') ?></th>
            <th><?= $this->Paginator->sort('iso3') ?></th>
            <th><?= $this->Paginator->sort('fips') ?></th>
            <th><?= $this->Paginator->sort('country') ?></th>
            <th><?= $this->Paginator->sort('continent') ?></th>
            <th><?= $this->Paginator->sort('currency_code') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($regions as $region): ?>
        <tr>
            <td><?= $this->Number->format($region->id) ?></td>
            <td><?= h($region->iso) ?></td>
            <td><?= h($region->iso3) ?></td>
            <td><?= h($region->fips) ?></td>
            <td><?= h($region->country) ?></td>
            <td><?= h($region->continent) ?></td>
            <td><?= h($region->currency_code) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $region->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $region->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?>
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
