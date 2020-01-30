<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Image Post'), ['controller' => 'ImagePost', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Post'), ['controller' => 'ImagePost', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="images view large-10 medium-9 columns">
    <h2><?= h($image->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($image->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($image->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($image->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Path') ?></h6>
            <?= $this->Text->autoParagraph(h($image->path)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ImagePost') ?></h4>
    <?php if (!empty($image->image_post)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Post Id') ?></th>
            <th><?= __('Image Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($image->image_post as $imagePost): ?>
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
