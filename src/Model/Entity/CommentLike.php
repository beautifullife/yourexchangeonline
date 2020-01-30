<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommentLike Entity.
 */
class CommentLike extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'comment_id' => true,
        'user_id' => true,
        'comment' => true,
        'user' => true,
    ];
}
