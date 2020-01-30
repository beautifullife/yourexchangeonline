<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Coin'), ['action' => 'edit', $coin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coin'), ['action' => 'delete', $coin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coin'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coins view large-10 medium-9 columns">
    <h2><?= h($coin->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($coin->name) ?></p>
            <h6 class="subheader"><?= __('Accept Methods') ?></h6>
            <p><?= h($coin->accept_methods) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($coin->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($coin->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($coin->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($coin->modified) ?></p>
        </div>
    </div>
</div>
