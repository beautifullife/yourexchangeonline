<?php
namespace App\Model\Table;

use App\Model\Entity\Post;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $ImagePost
 * @property \Cake\ORM\Association\HasMany $Likes
 * @property \Cake\ORM\Association\HasMany $RatingPost
 * @property \Cake\ORM\Association\HasMany $ViewPost
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('posts');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'post_id'
        ]);
        $this->hasMany('ImagePost', [
            'foreignKey' => 'post_id'
        ]);
        $this->hasMany('Likes', [
            'foreignKey' => 'post_id'
        ]);
        $this->hasMany('RatingPost', [
            'foreignKey' => 'post_id'
        ]);
        $this->hasMany('ViewPost', [
            'foreignKey' => 'post_id'
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
            ->allowEmpty('content');

        $validator
            ->allowEmpty('tags');

        $validator
            ->allowEmpty('price');

        $validator
            ->allowEmpty('currency');

        $validator
            ->allowEmpty('wishlists');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

	/**
	 * getPosts
	 * 
	 * @author doanphancongminh <minhdpc@gmail.com>
     * @version 1.2
	 * @access public
	 * @date 08/05/2015
	 * @param string $cities
	 * @param string $isPost
	 * @return object
	 */
    public function getPosts($searchCities = NULL, $searchPost = NULL) {
    	$return = array();

    	$return = $this->find('all',['fields' => [  'id', 'user_id', 'content', 'tags', 'price', 'currency', 'wishlists', 'created', 'modified',
                                                    'users.id', 'users.full_name', 'users.image']])
                ->innerJoin('users', 'posts.user_id = users.id');
    	//Search by tag and location
        if (isset($searchPost)) {
            $return->orWhere(['posts.tags LIKE ' => "%{$searchPost}%"])
                    ->orWhere(['posts.content LIKE ' => "%{$searchPost}%"])
                    ->orWhere(['posts.wishlists LIKE ' => "%{$searchPost}%"]);
        }
		if (!empty($searchCities)) {
			$return->innerJoin('cities', 'cities.id = users.city_id')->where(['cities.id = ' => $searchCities]);
		}

    	$return->where(['posts.status = ' => 1])->order(['posts.created' => 'desc']);
    	return $return;
    }

    /**
     * [getPostsByUserID description]
     * @author doanphancongminh <minhdpc@gmail.com>
     * @version 1.0
     * @date 08/28/2015
     * @param  [type] $userID [description]
     * @return [type]         [description]
     */
    public function getPostsByUserID($userID, $type = 'all', $displayField = null) {
        if ($displayField != null) {
            $this->displayField($displayField);
        }
        return $this->find($type)->where(['user_id = ' => $userID])->order(['created' => 'desc']);
    }

    /**
     * tempDelPost
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @version 1.0
     * @access public
     * @date 08/16/2015
     * @param unknown $userID
     */
    public function tempDelPost($userID) {
    	$this->updateAll(['status' => 0], ['user_id' => $userID]);
    	return TRUE;
    }
    
    /**
    *	@function   checkUserPost - check a post is of a user
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		from_post_id int, to_post_id int
    *	@date		7-Sep-2015
    * 	@return		boolean
    */
    public function checkUserPost($toPostId, $userId) {
        if (!is_numeric($toPostId)) {
            return false;
        }
        $result = $this->find()->where("id = {$toPostId} AND user_id = {$userId}")->limit(1);
               
        return $result->count() > 0 ? true : false;
    }
}
