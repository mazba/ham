<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
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
        parent::initialize($config);

        $this->table('sys_users');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CreatedBy', [
            'className'=>'Users',
            'foreignKey' => 'created_by'
        ]);
        $this->belongsTo('UpdatedBy', [
            'className'=>'Users',
            'foreignKey' => 'updated_by'
        ]);
        $this->addBehavior('FileUpload',['upload_path'=>'u_load/usr','field'=>'photo']);
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
//
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');

        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');

        $validator
            ->add('dob', 'valid', ['rule' => 'numeric'])
            ->requirePresence('dob', 'create')
            ->notEmpty('dob');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->allowEmpty('photo','update')
            ->add('photo', 'file', [
            'rule' => ['extension',array('jpeg','jpg','png','gif')],
            'message' => 'File type is Not valid!',
        ]);

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }
}
