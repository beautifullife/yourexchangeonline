<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Rating Post'), ['action' => 'edit', $ratingPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rating Post'), ['action' => 'delete', $ratingPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rating Post'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ratingPost view large-10 medium-9 columns">
    <h2><?= h($ratingPost->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Post') ?></h6>
            <p><?= $ratingPost->has('post') ? $this->Html->link($ratingPost->post->id, ['controller' => 'Posts', 'action' => 'view', $ratingPost->post->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($ratingPost->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($ratingPost->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($ratingPost->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Rate') ?></h6>
            <?= $this->Text->autoParagraph(h($ratingPost->rate)) ?>
        </div>
    </div>
</div>
