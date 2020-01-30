<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Comment Like'), ['action' => 'edit', $commentLike->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment Like'), ['action' => 'delete', $commentLike->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentLike->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comment Like'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment Like'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="commentLike view large-10 medium-9 columns">
    <h2><?= h($commentLike->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Comment') ?></h6>
            <p><?= $commentLike->has('comment') ? $this->Html->link($commentLike->comment->id, ['controller' => 'Comments', 'action' => 'view', $commentLike->comment->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $commentLike->has('user') ? $this->Html->link($commentLike->user->id, ['controller' => 'Users', 'action' => 'view', $commentLike->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($commentLike->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($commentLike->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($commentLike->modified) ?></p>
        </div>
    </div>
</div>
