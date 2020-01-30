<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comment Like'), ['controller' => 'CommentLike', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment Like'), ['controller' => 'CommentLike', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="comments view large-10 medium-9 columns">
    <h2><?= h($comment->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Post') ?></h6>
            <p><?= $comment->has('post') ? $this->Html->link($comment->post->id, ['controller' => 'Posts', 'action' => 'view', $comment->post->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $comment->has('user') ? $this->Html->link($comment->user->id, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($comment->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($comment->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($comment->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Content') ?></h6>
            <?= $this->Text->autoParagraph(h($comment->content)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related CommentLike') ?></h4>
    <?php if (!empty($comment->comment_like)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Comment Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($comment->comment_like as $commentLike): ?>
        <tr>
            <td><?= h($commentLike->id) ?></td>
            <td><?= h($commentLike->comment_id) ?></td>
            <td><?= h($commentLike->user_id) ?></td>
            <td><?= h($commentLike->created) ?></td>
            <td><?= h($commentLike->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'CommentLike', 'action' => 'view', $commentLike->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'CommentLike', 'action' => 'edit', $commentLike->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CommentLike', 'action' => 'delete', $commentLike->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentLike->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
