<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Image Post'), ['controller' => 'ImagePost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image Post'), ['controller' => 'ImagePost', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rating Post'), ['controller' => 'RatingPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rating Post'), ['controller' => 'RatingPost', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List View Post'), ['controller' => 'ViewPost', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New View Post'), ['controller' => 'ViewPost', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="posts form large-10 medium-9 columns">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Edit Post') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('content');
            echo $this->Form->input('tags');
            echo $this->Form->input('price');
            echo $this->Form->input('currency');
            echo $this->Form->input('wishlists');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
