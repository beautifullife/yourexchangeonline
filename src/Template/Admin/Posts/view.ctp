<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Image Post'), ['controller' => 'ImagePost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Post'), ['controller' => 'ImagePost', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rating Post'), ['controller' => 'RatingPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating Post'), ['controller' => 'RatingPost', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List View Post'), ['controller' => 'ViewPost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Post'), ['controller' => 'ViewPost', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="posts view large-10 medium-9 columns">
    <h2><?= h($post->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Price') ?></h6>
            <p><?= h($post->price) ?></p>
            <h6 class="subheader"><?= __('Currency') ?></h6>
            <p><?= h($post->currency) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($post->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($post->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($post->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($post->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($post->content)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Tags') ?></h6>
            <?= $this->Text->autoParagraph(h($post->tags)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Wishlists') ?></h6>
            <?= $this->Text->autoParagraph(h($post->wishlists)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Comments') ?></h4>
    <?php if (!empty($post->comments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Content') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($post->comments as $comments): ?>
        <tr>
            <td><?= h($comments->id) ?></td>
            <td><?= h($comments->post_id) ?></td>
            <td><?= h($comments->user_id) ?></td>
            <td><?= h($comments->content) ?></td>
            <td><?= h($comments->created) ?></td>
            <td><?= h($comments->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ImagePost') ?></h4>
    <?php if (!empty($post->image_post)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('Image Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($post->image_post as $imagePost): ?>
        <tr>
            <td><?= h($imagePost->id) ?></td>
            <td><?= h($imagePost->post_id) ?></td>
            <td><?= h($imagePost->image_id) ?></td>
            <td><?= h($imagePost->created) ?></td>
            <td><?= h($imagePost->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ImagePost', 'action' => 'view', $imagePost->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ImagePost', 'action' => 'edit', $imagePost->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ImagePost', 'action' => 'delete', $imagePost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagePost->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Likes') ?></h4>
    <?php if (!empty($post->likes)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($post->likes as $likes): ?>
        <tr>
            <td><?= h($likes->id) ?></td>
            <td><?= h($likes->post_id) ?></td>
            <td><?= h($likes->user_id) ?></td>
            <td><?= h($likes->created) ?></td>
            <td><?= h($likes->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $likes->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $likes->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $likes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likes->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related RatingPost') ?></h4>
    <?php if (!empty($post->rating_post)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('Rate') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($post->rating_post as $ratingPost): ?>
        <tr>
            <td><?= h($ratingPost->id) ?></td>
            <td><?= h($ratingPost->post_id) ?></td>
            <td><?= h($ratingPost->rate) ?></td>
            <td><?= h($ratingPost->created) ?></td>
            <td><?= h($ratingPost->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'RatingPost', 'action' => 'view', $ratingPost->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'RatingPost', 'action' => 'edit', $ratingPost->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RatingPost', 'action' => 'delete', $ratingPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingPost->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ViewPost') ?></h4>
    <?php if (!empty($post->view_post)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('Views') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($post->view_post as $viewPost): ?>
        <tr>
            <td><?= h($viewPost->id) ?></td>
            <td><?= h($viewPost->user_id) ?></td>
            <td><?= h($viewPost->post_id) ?></td>
            <td><?= h($viewPost->views) ?></td>
            <td><?= h($viewPost->created) ?></td>
            <td><?= h($viewPost->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ViewPost', 'action' => 'view', $viewPost->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ViewPost', 'action' => 'edit', $viewPost->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ViewPost', 'action' => 'delete', $viewPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewPost->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
