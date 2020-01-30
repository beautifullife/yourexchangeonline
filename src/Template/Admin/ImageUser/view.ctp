<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Image User'), ['action' => 'edit', $imageUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image User'), ['action' => 'delete', $imageUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Image User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="imageUser view large-10 medium-9 columns">
    <h2><?= h($imageUser->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Image') ?></h6>
            <p><?= $imageUser->has('image') ? $this->Html->link($imageUser->image->id, ['controller' => 'Images', 'action' => 'view', $imageUser->image->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $imageUser->has('user') ? $this->Html->link($imageUser->user->id, ['controller' => 'Users', 'action' => 'view', $imageUser->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($imageUser->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($imageUser->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($imageUser->modified) ?></p>
        </div>
    </div>
</div>
