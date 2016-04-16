<?php
namespace App\Model\Table;

use App\Model\Entity\UserGroup;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroups Model
 *
 * @property \Cake\ORM\Association\HasMany $UserGroupPermissions
 * @property \Cake\ORM\Association\HasMany $UserGroupRole
 * @property \Cake\ORM\Association\HasMany $Users
 */
class UserGroupsTable extends Table
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

        $this->table('sys_user_groups');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->belongsTo('CreatedBy', [
            'className'=>'Users',
            'foreignKey' => 'created_by'
        ]);
        $this->belongsTo('UpdatedBy', [
            'className'=>'Users',
            'foreignKey' => 'updated_by'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');


        $validator
            ->add('ordering', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ordering', 'create')
            ->notEmpty('ordering');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
