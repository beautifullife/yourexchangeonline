<?php
namespace App\Model\Table;

use App\Model\Entity\Region;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @property \Cake\ORM\Association\HasMany $Cities
 */
class RegionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('regions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Cities', [
            'foreignKey' => 'region_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('iso');
            
        $validator
            ->allowEmpty('iso3');
            
        $validator
            ->allowEmpty('fips');
            
        $validator
            ->allowEmpty('country');
            
        $validator
            ->allowEmpty('continent');
            
        $validator
            ->allowEmpty('currency_code');
            
        $validator
            ->allowEmpty('currency_name');
            
        $validator
            ->allowEmpty('phone_prefix');
            
        $validator
            ->allowEmpty('postal_code');
            
        $validator
            ->allowEmpty('languages');
            
        $validator
            ->allowEmpty('geonameid');

        return $validator;
    }

    /**
     * getAllRegions
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/05/2015
     * @version 1.0
     * @return \Cake\ORM\Query
     */
    public function getAllRegions() {
    	return $this->find('all');
    }

    /**
     * getRegionByID
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @versio 1.0n
     * @param unknown $regionID
     */
    public function getRegionByID($regionID) {
    	$returnRegions = array();

    	//SqlBuilder
    	return $this->find('all')->where(['id = ' => $regionID])->first();
    }
    
    /**
    *	@function   getValidCurrencyCodeList
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		
    *	@date		11-Aug-2015
    * 	@return		string
    */
    public function getValidCurrencyCodeList() {
        return $this->find('list',['limit'=>300])->where('currency_code != ""');
    }
}
