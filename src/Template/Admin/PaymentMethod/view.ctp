<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Payment Method'), ['action' => 'edit', $paymentMethod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Method'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Method'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Method'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="paymentMethod view large-10 medium-9 columns">
    <h2><?= h($paymentMethod->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($paymentMethod->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($paymentMethod->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($paymentMethod->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($paymentMethod->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($paymentMethod->modified) ?></p>
        </div>
    </div>
</div>
