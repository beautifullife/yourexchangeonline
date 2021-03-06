<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exchange->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exchanges'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="exchanges form large-10 medium-9 columns">
    <?= $this->Form->create($exchange) ?>
    <fieldset>
        <legend><?= __('Edit Exchange') ?></legend>
        <?php
            echo $this->Form->input('from_post_id');
            echo $this->Form->input('to_post_id');
            echo $this->Form->input('note');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
