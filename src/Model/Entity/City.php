<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity.
 */
class City extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'region_id' => true,
        'name' => true,
        'timezone' => true,
        'region' => true,
        'users' => true,
    ];
}
