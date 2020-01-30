<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity.
 */
class Notification extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'post_relation_id' => true,
        'exchange_relation_id' => true,
        'user_id' => true,
        'is_read' => true,
        'type' => true,
        'send_all' => true,
        'post_relation' => true,
        'exchange_relation' => true,
        'user' => true,
    ];
}
