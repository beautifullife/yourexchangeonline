<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coin->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coins'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="coins form large-10 medium-9 columns">
    <?= $this->Form->create($coin) ?>
    <fieldset>
        <legend><?= __('Edit Coin') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('accept_methods');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
