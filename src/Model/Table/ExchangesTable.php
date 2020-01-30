<?php
namespace App\Model\Table;

use App\Model\Entity\Exchange;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exchanges Model
 *
 * @property \Cake\ORM\Association\BelongsTo $posts
 * @property \Cake\ORM\Association\BelongsTo $posts
 */
class ExchangesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('exchanges');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Posts', [
            'foreignKey' => 'from_post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Posts', [
            'foreignKey' => 'to_post_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('note');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['from_post_id'], 'Posts'));
        $rules->add($rules->existsIn(['to_post_id'], 'Posts'));
        return $rules;
    }
    
    /**
    *	@function   checkExist - check exist exchange
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		from_post_id int, to_post_id int
    *	@date		7-Sep-2015
    * 	@return		boolean
    */
    public function checkExist($fromPostId,$toPostId) {
        if (!is_numeric($fromPostId) || !is_numeric($toPostId)) {
            return false;
        }
        $result = $this->find()->where("from_post_id = {$fromPostId} AND to_post_id = {$toPostId}")->limit(1);
               
        return $result->count() > 0 ? true : false;
    }
}
