<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Like'), ['action' => 'edit', $like->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Like'), ['action' => 'delete', $like->id], ['confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="likes view large-10 medium-9 columns">
    <h2><?= h($like->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Post') ?></h6>
            <p><?= $like->has('post') ? $this->Html->link($like->post->id, ['controller' => 'Posts', 'action' => 'view', $like->post->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $like->has('user') ? $this->Html->link($like->user->id, ['controller' => 'Users', 'action' => 'view', $like->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($like->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($like->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($like->modified) ?></p>
        </div>
    </div>
</div>
