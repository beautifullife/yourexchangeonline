<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Currency Converter'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="currencyConverter form large-10 medium-9 columns">
    <?= $this->Form->create($currencyConverter) ?>
    <fieldset>
        <legend><?= __('Add Currency Converter') ?></legend>
        <?php
            echo $this->Form->input('from');
            echo $this->Form->input('to');
            echo $this->Form->input('rates');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
