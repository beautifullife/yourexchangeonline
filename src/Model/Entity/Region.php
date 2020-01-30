<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Region
 * 
 * @author doanphancongminh <minhdpc@gmail.com>
 * @version 1.0
 */
class Region extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'iso' => true,
        'iso3' => true,
        'fips' => true,
        'country' => true,
        'continent' => true,
        'currency_code' => true,
        'currency_name' => true,
        'phone_prefix' => true,
        'postal_code' => true,
        'languages' => true,
        'geonameid' => true,
        'cities' => true,
    ];
}
