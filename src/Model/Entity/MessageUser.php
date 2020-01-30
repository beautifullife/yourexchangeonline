<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MessageUser Entity.
 */
class MessageUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'message_id' => true,
        'to_user_id' => true,
        'read' => true,
        'sent' => true,
        'message' => true,
        'to_user' => true,
    ];
}
