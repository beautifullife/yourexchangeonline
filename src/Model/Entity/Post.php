<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity.
 */
class Post extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'content' => true,
        'tags' => true,
        'price' => true,
        'currency' => true,
        'wishlists' => true,
        'status' => true,
        'user' => true,
        'comments' => true,
        'image_post' => true,
        'likes' => true,
        'rating_post' => true,
        'view_post' => true,
    ];
}
