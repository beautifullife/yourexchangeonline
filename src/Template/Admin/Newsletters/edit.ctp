<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $newsletter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Newsletters'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="newsletters form large-10 medium-9 columns">
    <?= $this->Form->create($newsletter) ?>
    <fieldset>
        <legend><?= __('Edit Newsletter') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content');
            echo $this->Form->input('status');
            echo $this->Form->input('sent_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
