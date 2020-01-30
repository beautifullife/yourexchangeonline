<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Currency Converter'), ['action' => 'edit', $currencyConverter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency Converter'), ['action' => 'delete', $currencyConverter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currencyConverter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Currency Converter'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency Converter'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="currencyConverter view large-10 medium-9 columns">
    <h2><?= h($currencyConverter->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('From') ?></h6>
            <p><?= h($currencyConverter->from) ?></p>
            <h6 class="subheader"><?= __('To') ?></h6>
            <p><?= h($currencyConverter->to) ?></p>
            <h6 class="subheader"><?= __('Rates') ?></h6>
            <p><?= h($currencyConverter->rates) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($currencyConverter->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($currencyConverter->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($currencyConverter->modified) ?></p>
        </div>
    </div>
</div>
