<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coin Entity.
 */
class Coin extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'accept_methods' => true,
        'status' => true,
    ];
}
