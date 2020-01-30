<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Payment Method'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="paymentMethod form large-10 medium-9 columns">
    <?= $this->Form->create($paymentMethod) ?>
    <fieldset>
        <legend><?= __('Add Payment Method') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
