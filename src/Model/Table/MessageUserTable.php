<?php
namespace App\Model\Table;

use App\Model\Entity\MessageUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MessageUser Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Messages
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class MessageUserTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('message_user');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Messages', [
            'foreignKey' => 'message_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'to_user_id',
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('read', 'create')
            ->notEmpty('read');
            
        $validator
            ->add('sent', 'valid', ['rule' => 'numeric'])
            ->requirePresence('sent', 'create')
            ->notEmpty('sent');

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
        $rules->add($rules->existsIn(['message_id'], 'Messages'));
        $rules->add($rules->existsIn(['to_user_id'], 'Users'));
        return $rules;
    }
    
    /**
    *	@function   getMessageUserByUserId
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		int
    *	@date		11-Aug-2015
    * 	@return		object
    */
    public function getMessageUserByUserId($userId) {
        $messageUser = $this->find('all')
                        ->select(['messages.user_id','messages.name', 'messages.content'])
                        ->innerJoin('messages', 'messageUser.message_id = messages.id')
                        ->where("to_user_id = {$userId}");
                        
        return $messageUser;
    }
}
