<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity.
 */
class Comment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'post_id' => true,
        'user_id' => true,
        'content' => true,
        'post' => true,
        'user' => true,
        'comment_like' => true,
    ];
}
