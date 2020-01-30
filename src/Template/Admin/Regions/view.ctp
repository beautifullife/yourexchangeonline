<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="regions view large-10 medium-9 columns">
    <h2><?= h($region->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Iso') ?></h6>
            <p><?= h($region->iso) ?></p>
            <h6 class="subheader"><?= __('Iso3') ?></h6>
            <p><?= h($region->iso3) ?></p>
            <h6 class="subheader"><?= __('Fips') ?></h6>
            <p><?= h($region->fips) ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= h($region->country) ?></p>
            <h6 class="subheader"><?= __('Continent') ?></h6>
            <p><?= h($region->continent) ?></p>
            <h6 class="subheader"><?= __('Currency Code') ?></h6>
            <p><?= h($region->currency_code) ?></p>
            <h6 class="subheader"><?= __('Currency Name') ?></h6>
            <p><?= h($region->currency_name) ?></p>
            <h6 class="subheader"><?= __('Phone Prefix') ?></h6>
            <p><?= h($region->phone_prefix) ?></p>
            <h6 class="subheader"><?= __('Postal Code') ?></h6>
            <p><?= h($region->postal_code) ?></p>
            <h6 class="subheader"><?= __('Languages') ?></h6>
            <p><?= h($region->languages) ?></p>
            <h6 class="subheader"><?= __('Geonameid') ?></h6>
            <p><?= h($region->geonameid) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($region->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Cities') ?></h4>
    <?php if (!empty($region->cities)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Region Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Timezone') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($region->cities as $cities): ?>
        <tr>
            <td><?= h($cities->id) ?></td>
            <td><?= h($cities->region_id) ?></td>
            <td><?= h($cities->name) ?></td>
            <td><?= h($cities->timezone) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
