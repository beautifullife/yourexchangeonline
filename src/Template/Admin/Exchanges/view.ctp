<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Exchange'), ['action' => 'edit', $exchange->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exchange'), ['action' => 'delete', $exchange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exchanges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exchange'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="exchanges view large-10 medium-9 columns">
    <h2><?= h($exchange->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($exchange->id) ?></p>
            <h6 class="subheader"><?= __('From Post Id') ?></h6>
            <p><?= $this->Number->format($exchange->from_post_id) ?></p>
            <h6 class="subheader"><?= __('To Post Id') ?></h6>
            <p><?= $this->Number->format($exchange->to_post_id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($exchange->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($exchange->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($exchange->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($exchange->note)) ?>
        </div>
    </div>
</div>
