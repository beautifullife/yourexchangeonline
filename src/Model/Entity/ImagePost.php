<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImagePost Entity.
 */
class ImagePost extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'post_id' => true,
        'image_id' => true,
        'post' => true,
        'image' => true,
    ];
}
