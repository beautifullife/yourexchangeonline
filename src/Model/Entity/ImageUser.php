<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImageUser Entity.
 */
class ImageUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'image_id' => true,
        'user_id' => true,
        'image' => true,
        'user' => true,
    ];
}
