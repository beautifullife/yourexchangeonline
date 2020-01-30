<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Image Post'), ['action' => 'edit', $imagePost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image Post'), ['action' => 'delete', $imagePost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagePost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Image Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="imagePost view large-10 medium-9 columns">
    <h2><?= h($imagePost->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Post') ?></h6>
            <p><?= $imagePost->has('post') ? $this->Html->link($imagePost->post->id, ['controller' => 'Posts', 'action' => 'view', $imagePost->post->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Image') ?></h6>
            <p><?= $imagePost->has('image') ? $this->Html->link($imagePost->image->id, ['controller' => 'Images', 'action' => 'view', $imagePost->image->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($imagePost->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($imagePost->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($imagePost->modified) ?></p>
        </div>
    </div>
</div>
