<?php
namespace App\Model\Table;

use App\Model\Entity\City;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 */
class CitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cities');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'city_id'
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
            ->allowEmpty('id', 'create')
            ->add('region_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('region_id')
            ->allowEmpty('name')
            ->allowEmpty('timezone');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        return $rules;
    }

    /**
     * getCitiesByCountryCode
     *
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/05/2015
     * @version 1.0
     * @return multitype:
     */
    public function getCitiesByCountryCode($countryCode) {
    	$cities = array();

    	//SQL Builder
    	$sqlString = $this->find('all')
    					  ->select(['cities.id', 'cities.name'])
    					  ->rightJoin('regions', 'cities.region_id = regions.id')
    					  ->where('regions.iso = "' . $countryCode . '"');

    	return $sqlString;
    }

    /**
     * getAllCities
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/05/2015
     * @version 1.1
     * @return multitype:
     */
    public function getAllCities() {
		return $this->find('all');
    }

    /**
     * getCitiesForOption
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @version 1.0
     * @return multitype:
     */
    public function getCitiesForOption() {
    	$returnOptions = array();
    	$citiesOption = $this->getAllCities();
    	
    	if (!empty($citiesOption) && count($citiesOption) > 0) {
    		foreach ($citiesOption as $valOptions) {
    			$returnOptions['cities'][$valOptions->id] = $valOptions->name;
    			$returnOptions['regions'][$valOptions->id] = $valOptions->region_id;
    		}
    	}
    	
    	return $returnOptions;
    }

    /**
     * getCitiesNameByID
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @version 1.0
     * @param unknown $citiesID
     * @return boolean|unknown
     */
    public function getCitiesNameByID($citiesID) {
    	$citiesName = NULL;
    	//Check param
    	if (empty($citiesID) || !is_numeric($citiesID)) return FALSE;
    	$citiesName = $this->find('all')->select(['id', 'region_id', 'name'])->where(['id = ' => $citiesID])->first();
    	
    	return $citiesName;
    }

    public function getCitiesIDByName($citiesName) {
        $citiesID = NULL;
        //Cities Name
        if (empty($citiesName) || !is_string($citiesName)) return FALSE;
        $citiesID = $this->find('all')->select(['id'])->where(["name LIKE " => "%" . $citiesName . "%"])->first();

        return $citiesID->id;
    }

    /**
     * getCitiesNameByID
     *
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @version 1.0
     * @param unknown $citiesID
     * @return boolean|unknown
     */
    public function getCitiesNameByRegionID($regionsID) {
    	$citiesName = NULL;
    	//Check param
    	if (empty($regionsID) || !is_numeric($regionsID)) return FALSE;
    	$citiesName = $this->find('all')->select(['id', 'name'])->where(['region_id = ' => $regionsID]);
    	 
    	return $citiesName;
    }
}
