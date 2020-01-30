<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit View Post'), ['action' => 'edit', $viewPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete View Post'), ['action' => 'delete', $viewPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List View Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="viewPost view large-10 medium-9 columns">
    <h2><?= h($viewPost->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $viewPost->has('user') ? $this->Html->link($viewPost->user->id, ['controller' => 'Users', 'action' => 'view', $viewPost->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Post') ?></h6>
            <p><?= $viewPost->has('post') ? $this->Html->link($viewPost->post->id, ['controller' => 'Posts', 'action' => 'view', $viewPost->post->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($viewPost->id) ?></p>
            <h6 class="subheader"><?= __('Views') ?></h6>
            <p><?= $this->Number->format($viewPost->views) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($viewPost->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($viewPost->modified) ?></p>
        </div>
    </div>
</div>
