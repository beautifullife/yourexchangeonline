<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exchange Entity.
 */
class Exchange extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'from_post_id' => true,
        'to_post_id' => true,
        'note' => true,
        'status' => true,
    ];
}
