<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Rating User'), ['action' => 'edit', $ratingUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rating User'), ['action' => 'delete', $ratingUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rating User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ratingUser view large-10 medium-9 columns">
    <h2><?= h($ratingUser->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $ratingUser->has('user') ? $this->Html->link($ratingUser->user->id, ['controller' => 'Users', 'action' => 'view', $ratingUser->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($ratingUser->id) ?></p>
            <h6 class="subheader"><?= __('Coins') ?></h6>
            <p><?= $this->Number->format($ratingUser->coins) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($ratingUser->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($ratingUser->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Rate') ?></h6>
            <?= $this->Text->autoParagraph(h($ratingUser->rate)) ?>
        </div>
    </div>
</div>
