<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'status' => true,
        'email' => true,
        'password' => true,
        'full_name' => true,
        'gender' => true,
        'short_desc' => true,
        'image' => true,
        'birthday' => true,
        'phone' => true,
        'address' => true,
        'city_id' => true,
        'ip_address' => true,
        'facebook' => true,
        'google' => true,
        'twitter' => true,
        'city' => true,
        'comment_like' => true,
        'comments' => true,
        'likes' => true,
    ];
    
    /*  hash password
    *	@function 	
    *	@access		
    *	@date		
    * 	@return		
    */
    protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
