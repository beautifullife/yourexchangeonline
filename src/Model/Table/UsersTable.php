<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('CommentLike', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Likes', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type')
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->allowEmpty('full_name')
            ->allowEmpty('gender')
            ->allowEmpty('short_desc')
            ->allowEmpty('image')
            ->add('birthday', 'valid', ['rule' => 'date'])
            ->allowEmpty('birthday')
            ->add('phone', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('phone')
            ->allowEmpty('address')
            ->add('city_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('city_id')
            ->allowEmpty('ip_address')
            ->allowEmpty('facebook')
            ->allowEmpty('google')
            ->allowEmpty('twitter');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        return $rules;
    }

    /**
     * getUserByID
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/07/2015
     * @version 1.0
     * @param unknown $userID
     * @return (object)
     */
    public function getUserByID($userID) {
    	return $this->find('all')->where(['id = ' => $userID])->first();
    }

    public function findUserByEmail($email) {
    	return $this->find('all')->where(['email = ' => $email])->first();
    }

    /**
     * updateUser
     *
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @version 1.0
     * @param unknown $param
     * @return (bool)
     */
    public function updateUser($userID, $param) {
    	$userProfile = $this->get($userID);

    	foreach ($param as $key => $value) {
    		$userProfile->$key = $value;
    	}

    	$this->save($userProfile);
    	return TRUE;
    }

    /**
     * tempDelUsers
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/16/2015
     * @version 1.0
     * @return unknown
     */
    public function tempDelUsers($userID) {
    	$this->updateAll(['status' => 0], ['id' => $userID]);
    	return TRUE;
    }
}
