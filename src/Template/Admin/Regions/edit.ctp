<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $region->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="regions form large-10 medium-9 columns">
    <?= $this->Form->create($region) ?>
    <fieldset>
        <legend><?= __('Edit Region') ?></legend>
        <?php
            echo $this->Form->input('iso');
            echo $this->Form->input('iso3');
            echo $this->Form->input('fips');
            echo $this->Form->input('country');
            echo $this->Form->input('continent');
            echo $this->Form->input('currency_code');
            echo $this->Form->input('currency_name');
            echo $this->Form->input('phone_prefix');
            echo $this->Form->input('postal_code');
            echo $this->Form->input('languages');
            echo $this->Form->input('geonameid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
